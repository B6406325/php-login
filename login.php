<?php 
    session_start();
    include('db.php');

    $errors = array(); 

    if(isset($_POST["log"])){
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
    }
    
    if(count($errors) == 0){
        $password_db = md5($password);
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password_db'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);

            $_SESSION["email"] = $user["email"];
            $_SESSION["name"] = $user["name"];
            $_SESSION["success"] = "You are now login";
            header("location: dashboard.php");
        }else{
            array_push($errors, "Wrong email/password");
            $_SESSION["error"] = "Wrong email/password";
            header("location: index.php");
        }
    }
?>