<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    
</body>

<script>
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
<br>
<br>
<br>
<br>
<br>
<br>
    <div class="popup" onclick="myFunction()">Click me!
        <span class="popuptext" id="myPopup">Popup text...</span>
    </div>
</html>


