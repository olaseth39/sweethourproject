<?php
    $title = '|orderditems.php';
    include('innerheader.php')
?>

<?php
    $result = "Dear ". $_SESSION['lname'] ." ". $_SESSION['fname']. ", your order was successful!"."<br/>";
    $result .= "Your ordered items would be delivered within 24 hours of the delivery hours. Thank you for your patronage! ";
    //echo $result;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success Message</title>
</head>
<body>
    <p class="alert alert-success" style="color: orange; text-align: center;"><?php echo $result; ?></p>
</body>
</html>