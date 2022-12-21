<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'my_crud';

$con = mysqli_connect($servername, $username , $password, $dbname);
if($con){
    ?>
     <script>
        alert("Connection Successfull");
     </script>
    <?php
}else{
    ?>
    <script>
       alert("No Connection With Database");
    </script>
   <?php
}

?>