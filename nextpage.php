<!DOCTYPE html>
<html>
<head>
    <title>Display Mobile Number</title>
</head>
<body>
    <h1>Your Mobile Number:</h1>
    <p><?php 
session_start();
 echo $_SESSION['Balatoken']; ?></p>
</body>
</html>