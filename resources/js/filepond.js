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

document.addEventListener("DOMContentLoaded", () => {
    const input = document.querySelector("#avatar");
    if (!input) return;

    FilePond.create(input, {
        allowMultiple: false,
        acceptedFileTypes: [
            "image/png",
            "image/jpeg",
            "image/jpg",
            "image/webp",
        ],
        maxFileSize: "20MB",
        server: {
            url: "/upload-avatar",
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            // onload: (response) => {
            //     const res = JSON.parse(response);
            //     document.querySelector("#avatar").value = res.path;
            //     return res.path;
            // },
        },
    });
});
