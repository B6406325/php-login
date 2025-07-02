<?php 
    session_start();
    include('db.php');

    $errors = array();

    if(isset($_POST['reg'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    $user_check_query = "SELECT * FROM user WHERE name = '$name' OR email = '$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if($result){
        if($result["name"] === $name){
            array_push($errors, "Name Aready Exists");
        }
        if($result["email"] === $email){
            array_push($errors, "Email Aready Exists");
        }
    }

    if(count($errors) == 0){
        $password_db = md5($password);

        $sql = "INSERT INTO user (name, email, password) VALUE ('$name', '$email', '$password_db')";
        mysqli_query($conn, $sql);

        $_SESSION["name"] = $name;
        $_SESSION["success"] = "You are now login";
        header("location: dashboard.php");
    }else{
        array_push($errors, "Name/Email Aready Exists Try Again");
        $_SESSION["error"] = "Name/Email Aready Exists Try Again";
        header("location: index.php");
    }
?>