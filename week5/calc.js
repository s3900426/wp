function calculate(){

    var num1 = document.getElementById("Number1").value;
    var num2 = document.getElementById("Number2").value;
    var operator = document.getElementById("operand")

    num1 = parseFloat(num1);
    num2 = parseFloat(num2);
    var zeroCheck = false;

    switch (operator.value){
        case "add":
            final = num1 + num2;
            break;
        case "subtract":
            final = num1 - num2;
            break;
        case "multiply":
            final = num1 * num2;
            break;
        case "divide":
            if (num1 === 0 || num2 === 0){
                var zeroCheck = true;
                document.getElementById("sum").innerHTML = "ERROR: Can't divide by 0";
            }else
                var zeroCheck =false;
                final = num1 / num2;
            break;
    }
    if (isNumber(num1) == true && isNumber(num2) == true){
        if (zeroCheck == true){
            document.getElementById("sum").innerHTML = "ERROR: Can't divide by 0";
        } else{
            document.getElementById("sum").innerHTML = final;
        } 
    }else{
        document.getElementById("sum").innerHTML = "ERROR: invalid inputs, only numbers";
    }
}
function isNumber (n) {
  return ! isNaN (n-0);
}
var btn = document.getElementById("calculate");
btn.addEventListener("click", calculate);