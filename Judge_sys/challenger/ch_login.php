<?php
    session_start();
    include '../connection/connect.php';

    function check_user($email,$password)
    {
        include '../connection/connect.php';
        $_select_user = "SELECT * FROM challenger where ch_email = '$email' AND ch_password = '$password' ";
        $result = $conn->query($_select_user);
        $rec = $result->num_rows == 1 ? 1 : 0;
        return $rec;        
    }
    function protect_data($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
    if(isset($_POST['login']))
    {
        $email = protect_data($_POST['email']);
        $password = protect_data($_POST['password']);
        if(check_user($email,$password))
        {
            $_select_user = "SELECT * FROM challenger where ch_email = '$email' AND ch_password = '$password' ";
            $result = $conn->query($_select_user); 
            $row = $result->fetch_assoc();  
            $_SESSION['user'] =  $row['ch_UserName'];
            header("location:ch_interface.php");
        }else{
            echo "incorrect password or email";
        }
    }

?>