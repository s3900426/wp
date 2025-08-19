document.addEventListener("DOMContentLoaded", function () {

    const photoGallery = document.querySelectorAll(".gallery");
    const modalImage = document.getElementById("modalImage");

    photoGallery.forEach(img => {
        img.addEventListener("click", function () {
            modalImage.src = this.src;
            modalImage.alt = this.alt;
        });
    });
});