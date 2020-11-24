<?php   
    session_start();
    include '../connection/connect.php';
    function check_pass($pass,$confpass)
    {
        if(strcmp($pass,$confpass) == 0)
        {
            return 1;
        }
        return 0;
    }
    function protect_data($data)
    {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    function check_user($userName,$email)
    {
        include '../connection/connect.php';
        $_select_user = "SELECT * FROM challenger where ch_UserName = '$userName' OR  ch_email = '$email'";
        $result = $conn->query($_select_user);
        $rec = $result->num_rows == 0 ? 1 : 0;
        return $rec;        
    }
    if(isset($_POST['submit']))
    {   
        $firstName = protect_data($_POST['firstname']);
        $lastName  = protect_data($_POST['lastname']);
        $email  = protect_data($_POST['email']);
        $password = protect_data($_POST['password']);
        $confpass = protect_data($_POST['confpassword']);
        $phone = protect_data($_POST['phone']);
        $userName = protect_data($_POST['username']);
        $gender = $_POST['gender'];
        if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password) && !empty($confpass) && !empty($phone) && !empty($userName))
        {
            if(preg_match('/@/',$email) && check_pass($password,$confpass) && check_user($userName,$email))
            {
                $query = "INSERT INTO challenger (ch_FirstName,ch_LastName,ch_UserName,ch_email,ch_password,ch_tel,gender) values ('$firstName','$lastName','$userName','$email','$password','$phone','$gender')";
                $execute = $conn->query($query);
                echo "done";
            }
        }
        
    }

?>