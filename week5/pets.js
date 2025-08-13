var slct = document.getElementById("animals");
slct.addEventListener("change", showChange);
function showChange(){
    let value = slct.value;
    document.getElementById("test").innerHTML = value;
    
    let pets = document.getElementsByClassName("pet");
    for (let x = 0; x<= pets.length; x++){
        pets[x].style.display = 'none';
    }

    if (value === "all") {
        for (let x = 0; x < pets.length; x++) {
            pets[x].style.display = 'block';
        }
    } else {
        let filtered = document.getElementsByClassName(value.slice(0, -1)); // "dogs" -> "dog"
        for (let x = 0; x < filtered.length; x++) {
            filtered[x].style.display = 'block';
        }
    }

}