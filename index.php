<html>
<head>
    <script type="application/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>

    function showHint(str) {
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            var p = $('#pallete').val();
            xmlhttp.open("GET", "csvProcess.php?q=" + str +'&p=' + p, true);
            xmlhttp.send();
        }
    }


// only init when the page has loaded
$(document).ready(function() {
    var pressed = false;
    var chars = [];

    $(window).keypress(function(e) {

        if (e.which >= 48 && e.which <= 57) {
            chars.push(String.fromCharCode(e.which));
        }

        console.log(e.which + ":" + chars.join("|"));

        if (pressed == false) {
            setTimeout(function(){
                if (chars.length >= 10) {
                    var barcode = chars.join("");
                    console.log("Barcode Scanned: " + barcode);
                    $("#barcode").val(barcode);

                    showHint(barcode);
                }
                chars = [];
                pressed = false;
            },500);
        }

        pressed = true;
    });
});

$("#barcode").keypress(function(e){
    if ( e.which === 13 ) {
        console.log("Prevent form submit.");
        e.preventDefault();
    }
});

</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
Pallet Number: <input type="text" name="pallet" id="pallete" value="">
Serial number: <input type="text" id="barcode" >
</form>
<p>Suggestions: <span id="txtHint"></span></p>
</body>
</html>





