// FilePond core
import * as FilePond from "filepond";

// Optional plugin untuk preview gambar
import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Import style-nya
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"; // Import style untuk plugin preview gambar
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type"; // Plugin untuk validasi tipe file
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size"; // Plugin untuk validasi ukuran file
import FilePondPluginImageTransform from "filepond-plugin-image-transform"; // Plugin untuk transformasi gambar (resize, crop, dll)
import FilePondPluginImageResize from "filepond-plugin-image-resize"; // Plugin untuk resize gambar

FilePond.registerPlugin(FilePondPluginImagePreview); // Register the plugin "Image preview"
FilePond.registerPlugin(FilePondPluginFileValidateType); // Register the plugin "File validate type"
FilePond.registerPlugin(FilePondPluginFileValidateSize); // Register the plugin "File validate size"
FilePond.registerPlugin(FilePondPluginImageTransform); // Register the plugin "Image transform"
FilePond.registerPlugin(FilePondPluginImageResize); // Register the plugin "Image resize"

// Get a reference to the file input element
const inputElementAvatar = document.querySelector("#avatar");
// Create a FilePond instance for the avatar input
const pond = FilePond.create(inputElementAvatar, {
    acceptedFileTypes: ["image/jpg", "image/jpeg", "image/png", "image/webp"],
    maxFileSize: "20MB",
    imageResizeTargetWidth: 600, // Resize image to a maximum width of 600px
    imageResizeMode: "contain", // Maintain aspect ratio while resizing
    imageResizeUpscale: false, // Do not upscale images smaller than the target width
    server: {
        url: "upload-avatar",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        onload: (response) => {
            const data = JSON.parse(response);
            document.getElementById("avatar-path").value = data.path;
            return data.path; // kirim kembali path agar bisa dibaca saat submit form
        },
        onerror: (err) => {
            console.error("Upload error:", err);
        },
    },
});

const inputElementThumbnail = document.querySelector("#thumbnail");
const slug = inputElementThumbnail.dataset.slug; // Ambil slug dari data-slug
const submitButton = document.getElementById("work-submit-button"); // tombol submit
// Create a FilePond instance for the thumbnail input
const pondThumbnail = FilePond.create(inputElementThumbnail, {
    acceptedFileTypes: ["image/jpg", "image/jpeg", "image/png", "image/webp"],
    maxFileSize: "20MB",
    imageResizeTargetWidth: 600, // Resize image to a maximum width of 600px
    imageResizeMode: "contain", // Maintain aspect ratio while resizing
    imageResizeUpscale: false, // Do not upscale images smaller than the target width
    server: {
        url: `upload-thumbnail`,
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        onload: (response) => {
            const data = JSON.parse(response);
            document.getElementById("thumbnail-path").value = data.path;

            // ✅ Enable tombol submit setelah upload selesai
            if (submitButton) submitButton.disabled = false;
            return data.path; // kirim kembali path agar bisa dibaca saat submit form
        },
        onerror: (err) => {
            console.error("Upload error:", err);
            if (submitButton) submitButton.disabled = false;
        },
    },
    // 🔒 Disable tombol saat mulai upload
    onaddfile: () => {
        if (submitButton) submitButton.disabled = true;
    },
    // ✅ Enable tombol setelah upload selesai
    onprocessfile: () => {
        if (submitButton) submitButton.disabled = false;
    },
});
