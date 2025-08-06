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

//Filepond untuk input Avatar yang ada di form edit Profile
document.addEventListener("DOMContentLoaded", () => {
    const inputAvatar = document.querySelector("#avatar");
    if (!inputAvatar) return;

    FilePond.create(inputAvatar, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",
        server: {
            url: "upload-avatar",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        },
        onload: (response) => {
            try {
                const res = JSON.parse(response);
                document.querySelector("#avatar-path").value = res.path;
                return res.path; // kirim kembali path agar bisa dibaca saat submit form
            } catch (error) {
                console.error("Invalid JSON response from Server", response);
                console.error("Invalid JSON response dari Server", response);
                return null;
            }
        },
        onerror: (response) => {
            console.error("Upload error:", response);
        },
    });
});

//Filepond untuk input Thumbnail yang ada di form edit
document.addEventListener("DOMContentLoaded", () => {
    const inputThumbnail = document.querySelector("#thumbnail");
    if (!inputThumbnail) return;

    FilePond.create(inputThumbnail, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",
        server: {
            url: "upload-thumbnail",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        },
        onload: (response) => {
            try {
                const res = JSON.parse(response);
                document.querySelector("#thumbnail-path").value = res.path;
                return res.path; // kirim kembali path agar bisa dibaca saat submit form
            } catch (error) {
                console.error("Invalid JSON response from Server", response);
                console.error("Invalid JSON response dari Server", response);
                return null;
            }
        },
        onerror: (response) => {
            console.error("Upload error:", response);
        },
    });
});
