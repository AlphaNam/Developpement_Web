<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'true';

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
      header("location:index.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
    /*echo "<script type='text/javascript'>
                alert('Invalid User Information ! Restart!');
            </script>";
    */
    /*echo '<html>';
    echo '<head>';
    echo '<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript"></script>';
    echo '<head>';




    Swal.fire('test');
    echo '</html>';
    echo '<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>';
    echo "<script language=\"javascript\">";
    /*echo "Swal.fire({";
    echo "  title: 'Error!',";
    echo "  text: 'Do you want to continue',";
    echo "  type: 'error',";
    echo "  confirmButtonText: 'Cool'";
    echo '})';
    echo "Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  type: 'error',
  confirmButtonText: 'Cool'
})";
    echo '</script>';*/


echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css\">";
echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js\">";
echo 'sweetAlert("a", "b", "error");';
echo "</script>";




  header("Refresh: 10; url=login.php");
}



?>
