<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

if($mysqli->query("INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')")){
    include 'register.php';
	echo "<script>
          swal({
          title: \"Account registered!\",
          text: \"You are successfully registered and now redirected to login page ! \",
          icon: \"success\"
          })
          .then(() => {
              window.location.href = \"login.php\";
          });
       </script>";
}

//header ("location:login.php");

?>
