<?php


$fn = $_POST["name-box"];
$un = $_POST["user-box"];
$em = $_POST["email-box"];
$pb = $_POST["ph-box"];
$pass = $_POST["pass-box"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection Failed : " . mysqli_connect_error());
} else {

    echo "Connection success! <br>";

    $sql = "INSERT INTO reg_tb (fname,user,email,phone,pwd) VALUES ('$fn','$un','$em','$pb','$pass')";

    if (mysqli_query($con, $sql)) {
        echo "inserted row succesfully <br>";
    } else {
        echo "Error: " . $sql . "</br>" . mysqli_error($con);
    }

    $sql = "SELECT * FROM reg_tb";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["fname"] . " - Username: " . $row["user"] . " - Email: " . $row["email"] . " - Phone-No: " . $row["phone"] . " - Password: " . $row["pwd"] . "<br>";
        }
    } else {
        echo "0 records";
    }

}
mysqli_close($con);
?>