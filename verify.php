<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 0;

//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT id,email,password,fname,type from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email === $username && $obj->password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      user_recognized();
      //header("location:index.php");
    } else {
        if($flag === 0){
          redirect();
          $flag = -1;
        }
    }
  }
}

function redirect() {
  include"login.php";
  echo "<script>
          swal({
          title: \"Wrong email or password !\",
          text: \"Please retry or create an account ! \",
          icon: \"error\"
          })
          .then(() => {
              window.location.href = \"login.php\";
              
          });
       </script>";

}

function user_recognized()
{
    echo "<script>
          swal({
          title: \"Hi bro !\",
          text: \"Pleasure to see you again ! \",
          icon: \"success\"
          })
          .then(() => {
              window.location.href = \"index.php\";
          });
       </script>";

}

?>

