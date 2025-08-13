var clickTotal = 0;
function clicked(){
    clickTotal += 1
    document.getElementById("totalClicked").innerHTML = "Clicked "+ clickTotal + " times.";
}
var btn = document.getElementById("clickMe");
btn.addEventListener("click", clicked);