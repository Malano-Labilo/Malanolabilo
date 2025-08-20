// FilePond core
import * as FilePond from "filepond";

// Optional plugin untuk preview gambar
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import FilePondPluginImageResize from "filepond-plugin-image-resize";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";

// Import style CSS bawaan filepond
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

//Register Plugin
FilePond.registerPlugin(
    FilePondPluginImagePreview,
    FilePondPluginImageResize,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);
// Ambil CSRF token dari meta tag yang merujuk <meta name="csrf-token" content="{{ csrf_token() }}"> di file layouts/app.blade.php
const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

//FILEPOND untuk input Avatar yang ada di form edit Profile
document.addEventListener("DOMContentLoaded", () => {
    const inputAvatar = document.querySelector("#avatar"),
        submitBtn = document.querySelector("#button-submit"),
        form = document.querySelector("#profile-form");

    if (!inputAvatar) return;

    const pond = FilePond.create(inputAvatar, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",

        onprocessfilestart: () => {
            submitBtn.disabled = true; //Matikan tombol saat upload mulai
        },
        onprocessfile: () => {
            submitBtn.disabled = false; //Aktifkan tombol saat upload selesai
        },
        onprocessfileabort: () => {
            submitBtn.disabled = false; //Aktifkan tombol jika upload dibatalkan
        },
        onprocessfileerror: () => {
            submitBtn.disabled = false; //Aktifkan tombol jika upload gagal
        },
        server: {
            process: {
                url: "upload-avatar",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },

                onload: (response) => {
                    try {
                        const res = JSON.parse(response);
                        document.querySelector("#avatar-path").value = res.path;

                        return res.path; // kirim kembali path agar bisa dibaca saat submit form
                    } catch (error) {
                        console.error(
                            "Invalid JSON response from Server",
                            response
                        );
                        console.error(
                            "Invalid JSON response dari Server",
                            response
                        );
                        return null;
                    }
                },
            },
            revert: (uniqueFileId, load, error) => {
                fetch("/profile/delete-avatar", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ path: uniqueFileId }),
                })
                    .then((res) => {
                        if (!res.ok) throw new Error("Failed to delete");
                        return res.json();
                    })
                    .then(() => {
                        load(); // kasih tahu FilePond kalau sukses
                    })
                    .catch((err) => {
                        console.error(err);
                        error("Error deleting file");
                    });
            },
        },
    });

    // Cegah submit kalau Proses upload Avatar belum selesai
    form.addEventListener("submit", (e) => {
        const stillProcessing = pond
            .getFiles()
            .some(
                (file) =>
                    file.status !== FilePond.FileStatus.PROCESSING_COMPLETE &&
                    file.status !== FilePond.FileStatus.IDLE
            );
        if (stillProcessing) {
            e.preventDefault();
            alert("Harap Tunggu Sampai Upload Selesai!");
        }
    });

    //Helper CleanUp
    function sendTempCleanup() {
        //Ambil daftar file yang sudah pernah di-upload ke server (punya serverId)
        const files = pond
            .getFiles()
            .map((f) => f.serverId)
            .filter(Boolean); // buang null/undefined

        if (files.length === 0) return;

        //(Tanpa exempt CSRF): sertakan _token di body form-encoded
        const csrf = csrfToken;
        const body = new URLSearchParams();
        body.set("_token", csrf);
        files.forEach((p) => body.append("files[]", p));
        const blob = new Blob([body.toString()], {
            type: "application/x-www-form-urlencoded;charset=UTF-8",
        });
        navigator.sendBeacon("/delete-temp-avatar", blob);
    }

    // Pakai event yang paling reliable
    window.addEventListener("pagehide", sendTempCleanup);

    // Backup untuk browser tertentu (mis. iOS Safari)
    document.addEventListener("visibilitychange", () => {
        if (document.visibilityState === "hidden") sendTempCleanup();
    });

    // (Opsional) cadangan terakhir
    window.addEventListener("beforeunload", sendTempCleanup);
});

//FILEPOND untuk input Thumbnail yang ada di form Create Work
document.addEventListener("DOMContentLoaded", () => {
    const inputThumbnail = document.querySelector("#thumbnail-create"),
        submitBtn = document.querySelector("#createProductModalButton"),
        cancelBtn = document.getElementById("cencelProductModalButton"),
        hiddenPathInput = document.getElementById("thumbnail-path"),
        form = document.querySelector("#post-create-form");

    if (!inputThumbnail) return;

    const pond = FilePond.create(inputThumbnail, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",

        server: {
            process: {
                url: "/dashboard/upload-thumbnail",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },

                onload: (response) => {
                    try {
                        const res = JSON.parse(response);
                        document.querySelector("#thumbnail-path").value =
                            res.path;
                        return res.path; // kirim kembali path agar bisa dibaca saat submit form
                    } catch (error) {
                        console.error(
                            "Invalid JSON response from Server",
                            response
                        );
                        console.error(
                            "Invalid JSON response dari Server",
                            response
                        );
                        return null;
                    }
                },
                onerror: (response) => {
                    console.error("Upload error:", response);
                },
            },
            revert: (uniqueFieldId, load, error) => {
                fetch("/dashboard/delete-thumbnail", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ path: uniqueFieldId }),
                })
                    .then((res) => {
                        if (!res.ok) throw new Error("Failed to delete");
                        return res.json();
                    })
                    .then(() => {
                        load(); // kasih tahu FilePond kalau sukses
                    })
                    .catch((err) => {
                        console.error(err);
                        error("Error deleting file");
                    });
            },
        },
    });

    // Cegah submit kalau ada file yang masih diupload
    cancelBtn.addEventListener("click", async (e) => {
        e.preventDefault(); // 🔹 blok navigasi bawaan <a>
        const stillProcessing = pond
            .getFiles()
            .some(
                (file) =>
                    file.status !== FilePond.FileStatus.PROCESSING_COMPLETE &&
                    file.status !== FilePond.FileStatus.IDLE
            );

        if (stillProcessing) {
            alert("Harap tunggu sampai upload selesai!");
            return; // 🔹 stop di sini, jangan lanjut redirect
        }

        const thumbnailPath = hiddenPathInput?.value?.trim();
        cancelBtn.disabled = true;

        if (thumbnailPath) {
            try {
                await fetch("/dashboard/delete-thumbnail", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({ path: thumbnailPath }),
                    credentials: "same-origin",
                });
            } catch (err) {
                console.error("Error di Cancel Delete", err);
            } finally {
                hiddenPathInput.value = "";
                window.location.href = "/dashboard"; // pindah halaman hanya di sini
            }
        } else {
            window.location.href = "/dashboard";
        }
    });

    // Cegah submit kalau ada file yang masih diupload
    form.addEventListener("submit", (e) => {
        const stillProcessing = pond
            .getFiles()
            .some(
                (file) =>
                    file.status !== FilePond.FileStatus.PROCESSING_COMPLETE &&
                    file.status !== FilePond.FileStatus.IDLE
            );
        if (stillProcessing) {
            e.preventDefault();
            alert("Harap Tunggu Sampai Upload Selesai!");
        }
    });

    //Helper Cleanup
    function sendTempCleanup() {
        //Ambil daftar file yang sudah pernah di-upload ke server (punya serverId)
        const files = pond
            .getFiles()
            .map((f) => f.serverId)
            .filter(Boolean); // buang null/undefined

        if (files.length === 0) return;

        // (Tanpa exempt CSRF): sertakan _token di body form-encoded
        const csrf = csrfToken;
        const body = new URLSearchParams();
        body.set("_token", csrf);
        files.forEach((p) => body.append("files[]", p));
        const blob = new Blob([body.toString()], {
            type: "application/x-www-form-urlencoded;charset=UTF-8",
        });
        navigator.sendBeacon("/dashboard/delete-temp-thumbnail", blob);
    }
    // Pakai event yang paling reliable
    window.addEventListener("pagehide", sendTempCleanup);

    // Backup untuk browser tertentu (mis. iOS Safari)
    document.addEventListener("visibilitychange", () => {
        if (document.visibilityState === "hidden") sendTempCleanup();
    });

    // (Opsional) cadangan terakhir
    window.addEventListener("beforeunload", sendTempCleanup);
});

//FILEPOND untuk input Thumbnail yang ada di form Edit Work
document.addEventListener("DOMContentLoaded", () => {
    const inputThumbnail = document.querySelector("#thumbnail"),
        hiddenPathInput = document.querySelector("#thumbnail-path"),
        cancelBtn = document.getElementById("createProductModalButton"),
        submitBtn = document.querySelector("#button-submit"),
        form = document.querySelector("#post-edit-form");

    if (!inputThumbnail) return;

    const pond = FilePond.create(inputThumbnail, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",
        server: {
            process: {
                url: "upload-thumbnail",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },

                onload: (response) => {
                    try {
                        const res = JSON.parse(response);
                        document.querySelector("#thumbnail-path").value =
                            res.path;
                        return res.path; // kirim kembali path agar bisa dibaca saat submit form
                    } catch (error) {
                        console.error(
                            "Invalid JSON response from Server",
                            response
                        );
                        console.error(
                            "Invalid JSON response dari Server",
                            response
                        );
                        return null;
                    }
                },
                onerror: (response) => {
                    console.error("Upload error:", response);
                },
            },
            revert: (uniqueFieldId, load, error) => {
                fetch("/dashboard/delete-thumbnail", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ path: uniqueFieldId }),
                })
                    .then((res) => {
                        if (!res.ok) throw new Error("Failed to delete");
                        return res.json();
                    })
                    .then(() => {
                        load(); // Kasih tahu FilePond kalau sukses
                    })
                    .catch((err) => {
                        console.error(err);
                        error("Error Deleting File");
                    });
            },
        },
    });

    // Cegah submit kalau ada file yang masih diupload
    cancelBtn.addEventListener("click", async (e) => {
        e.preventDefault(); // 🔹 blok navigasi bawaan <a>
        const stillProcessing = pond
            .getFiles()
            .some(
                (file) =>
                    file.status !== FilePond.FileStatus.PROCESSING_COMPLETE &&
                    file.status !== FilePond.FileStatus.IDLE
            );

        if (stillProcessing) {
            alert("Harap tunggu sampai upload selesai!");
            return; // 🔹 stop di sini, jangan lanjut redirect
        }
        const thumbnailPath = hiddenPathInput?.value?.trim();
        cancelBtn.disabled = true;

        if (thumbnailPath) {
            try {
                await fetch("/dashboard/delete-thumbnail", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ path: thumbnailPath }),
                    credentials: "same-origin",
                });
            } catch (error) {
                console.error("Error deleting thumbnail:", error);
            } finally {
                hiddenPathInput.value = "";
                window.location.href = "/dashboard"; // pindah halaman
            }
        } else {
            window.location.href = "/dashboard"; // pindah halaman
        }
    });

    // Cegah submit kalau ada file yang masih diupload
    form.addEventListener("submit", (e) => {
        const stillProcessing = pond
            .getFiles()
            .some(
                (file) =>
                    file.status !== FilePond.FileStatus.PROCESSING_COMPLETE &&
                    file.status !== FilePond.FileStatus.IDLE
            );
        if (stillProcessing) {
            e.preventDefault();
            alert("Harap Tunggu Sampai Upload Selesai!");
        }
    });

    //Helper Cleanup
    function sendTempCleanup() {
        //Ambil daftar file yang sudah pernah di-upload ke server (punya serverId)
        const files = pond
            .getFiles()
            .map((f) => f.serverId)
            .filter(Boolean); // buang null/undefined

        if (files.length === 0) return;

        // (Tanpa exempt CSRF): sertakan _token di body form-encoded
        const csrf = csrfToken;
        const body = new URLSearchParams();
        body.set("_token", csrf);
        files.forEach((p) => body.append("files[]", p));
        const blob = new Blob([body.toString()], {
            type: "application/x-www-form-urlencoded;charset=UTF-8",
        });
        navigator.sendBeacon("/dashboard/delete-temp-thumbnail", blob);
    }

    // Pakai event yang paling reliable
    window.addEventListener("pagehide", sendTempCleanup);

    // Backup untuk browser tertentu (mis. iOS Safari)
    document.addEventListener("visibilitychange", () => {
        if (document.visibilityState === "hidden") sendTempCleanup();
    });
    // (Opsional) cadangan terakhir
    window.addEventListener("beforeunload", sendTempCleanup);
});
