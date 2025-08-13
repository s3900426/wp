function displaymessage() {
    var greet = new Array(
        "Hi there",
        "Howdy",
        "How do you do",
        "Hello","Welcome",
        "How are you?"
    );
    var text = greet[Math.floor(Math.random() * greet.length)]
    document.getElementById("message").innerHTML = text;

}
var btn = document.getElementById("showMessage");
btn.addEventListener("click", displaymessage);