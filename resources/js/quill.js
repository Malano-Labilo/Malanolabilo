import Quill from "quill";
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css"; //

document.addEventListener("DOMContentLoaded", function () {
    const quill = new Quill("#quillDescriptionEditor", {
        theme: "snow",
        placeholder: "Type Descriptions...",
        modules: {
            toolbar: [
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block", "link", "image"],
                [{ header: 1 }, { header: 2 }],
                [{ list: "ordered" }, { list: "bullet" }],
                [{ script: "sub" }, { script: "super" }],
                [{ indent: "-1" }, { indent: "+1" }],
                [{ direction: "rtl" }],
                [{ size: ["small", false, "large", "huge"] }],
                [{ header: [1, 2, 3, 4, 5, 6, false] }],
                [{ color: [] }, { background: [] }],
                [{ font: [] }],
                [{ align: [] }],
                ["clean"],
            ],
        },
    });

    const postCreateForm = document.querySelector("#post-create-form");
    const postEditForm = document.querySelector("#post-edit-form");
    const description = document.querySelector("#description");
    const quillDescriptionEditor = document.querySelector(
        "#quillDescriptionEditor"
    );

    if (postCreateForm) {
        postCreateForm.addEventListener("submit", function (e) {
            // quillDescriptionEditor.value = quill.root.innerHTML;
            description.value = quill.root.innerHTML;
        });
    }

    if (postEditForm) {
        postEditForm.addEventListener("submit", function (e) {
            description.value = quill.root.innerHTML;
        });
    }
});
