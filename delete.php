<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if($mysqli->query('DELETE FROM users WHERE id ='.$_SESSION['id']));
    include'index.php';
    echo "<script>
          swal({
          title: \"Account deleted!\",
          text: \"You account has been deleted :( \",
          icon: \"success\"
          })
          .then(() => {
              window.location.href = \"index.php\";
          });
       </script>";

//header ("location:login.php");
session_unset();
session_destroy();

?>

