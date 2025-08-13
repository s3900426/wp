function calculatepercent(){

    try {
        let original = document.getElementById('field1').value;
        let percentage = document.getElementById('field2').value;
        let discountdecimal =percentage/100;
        let discount = original - (original * discountdecimal);
        if (isNumber(original) == true && isNumber(discount) == true){
            document.getElementById("field3").value = discount;
        }else{
            document.getElementById("field3").value = "ERROR: invalid inputs";
        }
    }
    catch(err) {
        document.getElementById("field3").value = "ERROR: invalid inputs";
    }

}
function isNumber (n) {
  return ! isNaN (n-0);
}