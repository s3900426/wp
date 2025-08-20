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
document.getElementById("skillForm").addEventListener("submit", function(event){
    const fileInput = document.getElementById('imageUpload');
    const

    if (!fileInput.files[0].name.match(/\.(jpg|jpeg|png|gif)$/i))
        alert('not an image');



}