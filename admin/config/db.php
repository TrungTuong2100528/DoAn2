<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'Web_tbyt';
    
    $con = new mysqli($server,$user,$pass ,$database);

    // Check connection
    if (  $con )
    {
       mysqli_query($con,"SET NAMES 'utf8' ");
      
       
    }
        // Change character set to utf8
        mysqli_set_charset($con, "utf8");

	


?>