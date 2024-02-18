<?php 
    $connections = mysqli_connect ("localhost:3307","root","","myDB");
        if(mysqli_connect_errno()){

            echo"failed to connect in mySQL:" ,mysqli_connect_error();
        }else{
            echo"connected";
        }

?>