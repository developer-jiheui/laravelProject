
// Helper function to toggle classes
function elementToggleFunc(el) {
    el.classList.toggle("active");
}

// Sidebar toggle functionality for mobile
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector("[data-sidebar]");
    const sidebarBtn = document.querySelector("[data-sidebar-btn]");

    if (sidebar && sidebarBtn) {
        sidebarBtn.addEventListener("click", function () {
            elementToggleFunc(sidebar);
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("profile_photo");
    const fileNameDisplay = document.getElementById("image-name");
    const imagePreviewWrapper = document.getElementById("image-preview");
    const previewImg = document.getElementById("preview-img");

    if (fileInput) {
        fileInput.addEventListener("change", function () {
            const file = this.files[0];

            if (file) {
                fileNameDisplay.textContent = file.name;

                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    imagePreviewWrapper.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                fileNameDisplay.textContent = "No image selected";
                imagePreviewWrapper.style.display = "none";
            }
        });
    }
});
