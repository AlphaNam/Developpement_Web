<!DOCTYPE html>
<html>
<head>
    <!--<script  src="js/sweetalert.min.js"></script>-->
    <script  src="https://cdn.jsdelivr.net/npm/sweetalert2@8.13.5/dist/sweetalert2.all.min.js"></script>
</head>
<body>
<div style="background-color: white"></div>
</body>
</html>



<?php


  session_start();
/*echo "<script>
          swal(\"Are you sure you want to do this?\", {
          buttons: [\"NO\", true],
           })
          .then(() => {
              window.location.href = \"index.php\";
          });
       </script>";*/

echo "<script>
 Swal.fire({
  title: 'Are you sure?',
  text: \"You will be disconnected !\",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, I disconnect !'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Disconnected!',
      'You have been disconnected.',
      'success'
    ).then(()=>{        
        window.location.href = \"index.php\"
    });
  }  
});
</script>";


session_unset();
session_destroy();


  //header("location:index.php");
  exit();


?>
