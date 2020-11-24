<?php
    $UserName = "root";
    $Password =  "";
    $Server = "localhost";
    $DbName = "Sys_judge";
    $conn = new mysqli($Server,$UserName,$Password,$DbName);
    if($conn->connect_errno)
    {
        echo "mysqli Eroor : " . $conn->connect_error;
    }
?>