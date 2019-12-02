<?php
    ob_start();
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
        }
        else
        {
            // Define $username and $password
            $username=$_POST['username'];
            $password=$_POST['password'];
            // Establishing Connection with Server by passing server_name, user_id and password as a parameter
            $connection = mysqli_connect("localhost", "root", "", "apotik");
            // To protect MySQL injection for Security purpose
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            // Selecting Database
            //$db = mysqli_select_db("test", $connection);
            // SQL query to fetch information of registerd users and finds user match.
            $query = mysqli_query($connection, "select * from user where password='$password' AND username='$username'");

            $rows = mysqli_num_rows($query);
            $result = mysqli_fetch_assoc($query);
            
            if ($rows == 0) {
                $error = "Username or Password is invalid";
                //header('Location:index.php');
            
            }  elseif($result['user_ind'] == '1'){
                        $_SESSION['login_admin']=$username; // Initializing Session
                        header("Location: index.php"); // Redirecting To Other Page
                    }   elseif($result['user_ind'] == '2'){
                                $_SESSION['login_apoteker']=$username; // Initializing Session
                                header("Location: Log_apoteker/index.php"); // Redirecting To Other Page
                            }   elseif($result['user_ind'] == '3'){
                                    $_SESSION['login_pemilik']=$username; // Initializing Session
                                    header("Location: log_pemilik/index.php"); // Redirecting To Other Page
                            }              
            ob_end_flush();
            mysqli_close($connection); // Closing Connection
        }
    }
?>