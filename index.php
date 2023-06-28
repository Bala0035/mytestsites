<?php

session_start();

function myFunction($name) {
    
    // $data="<html><script>document.writeln(name);</script></html>";
    $myPhpVar= $_COOKIE['myJavascriptVar'];
   //  $data=  "<script language=javascript>document.write(name);</script>";
    $_SESSION['Balatoken']=$myPhpVar;
    // echo "<script>document.writeln(name);</script>";
    if ($_SESSION['Balatoken']=='bala') {
    
       header('Location:nextpage.php');
       }
    
    // PHP code here
    $message = "Hello, $name! This message is from the PHP function.";
    return $message;
}

if (isset($_GET['function'])) {
    $function = $_GET['function'];
    if ($function == 'myFunction') {
        $name = $_GET['name']; // Get the parameter value
        $result = myFunction($name);
        echo $result;
        exit; // Stop further execution after invoking the function
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calling PHP Function with JavaScript</title>
</head>
<body>
    <input type="text" id="nameInput" placeholder="Enter your name">
    <button onclick="callPHPFunction()">Invoke PHP Function</button>

    <script>
        function callPHPFunction() {
         

            var name = document.getElementById("nameInput").value;
           document.cookie = "myJavascriptVar = " +  document.getElementById("nameInput").value;

           
            
            if (name === '') {
                console.log("Please enter a name.");
                return;
            }
         
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var response = this.responseText;
                    console.log(response);
                    alert(response); // Show success message in an alert box
                }
            };
            xhttp.open("GET", "?function=myFunction&name=" + "name", true);
            xhttp.send();
        }
    </script>

</body>
</html>
