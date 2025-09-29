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

document.getElementById("skillForm").addEventListener("submit", function(event) {
    const fileInput = document.getElementById('imageUpload').value.trim();
    const alert = document.getElementById('alert');
    const correctFile = /\.(webp|jpg|jpeg|png|gif)$/i;
    alert.innerHTML = "";

    if (!correctFile.test(fileInput)) {
        alert.innerHTML = "Only image files are allowed(JPG, PNG, GIF, WEBP)";
        alert.classList.remove("hiddenAlert");
        document.getElementById("alert").classList.add("shownAlert");
        event.preventDefault();
        return;
        
    }else{
        document.getElementById("alert").classList.add("hiddenAlert");
        document.getElementById("alert").classList.remove("shownAlert");
        event.preventDefault();
        return;
    }

});