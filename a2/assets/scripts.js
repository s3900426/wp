document.addEventListener("DOMContentLoaded", function () {
    const photoGallery = document.querySelectorAll(".gallery");
    const modalImage = document.getElementById("modalImage");
    const detailsPhoto = document.querySelectorAll(".details");

    photoGallery.forEach((img) => {
        img.addEventListener("click", function () {
            modalImage.src = this.src;
            modalImage.alt = this.alt;
        });
    });
    detailsPhoto.forEach((img) => {
        img.addEventListener("click", function () {
            modalImage.src = this.src;
            modalImage.alt = this.alt;
        });
    });
    const categorySelect = document.getElementById("category");
    if (categorySelect) {
        categorySelect.addEventListener("change", function (event) {
            const currentCat = this.value;
            const galDivs = document.querySelectorAll(".galdiv");

            galDivs.forEach((item) => {
                if (currentCat == "none" || item.classList.contains(currentCat)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    }

    const skillForm = document.getElementById("skillForm")
    if (skillForm) {
        skillForm.addEventListener('submit', function (event) {
            const fileInput = document.getElementById("imageUpload").value.trim();
            const alert = document.getElementById("alert");
            const correctFile = /\.(webp|jpg|jpeg|png|gif)$/i;
            if (alert) {
                alert.innerHTML = "";

                if (!correctFile.test(fileInput)) {
                    alert.innerHTML = "Only image files are allowed(JPG, PNG, GIF, WEBP)";
                    alert.classList.remove("hiddenAlert");
                    alert.classList.add("shownAlert");
                    event.preventDefault();
                    return;
                } else {
                    alert.classList.add("hiddenAlert");
                    alert.classList.remove("shownAlert");
                    return;
                }
            }
        });
    }
});
