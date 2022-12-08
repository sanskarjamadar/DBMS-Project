<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $username = $_POST["loginusername"];
    $password = $_POST["loginpassword"]; 
    
    $sql = "Select * from users where username='$username'"; 
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $row=mysqli_fetch_assoc($result);
        $userId = $row['id'];
        if (password_verify($password, $row['password'])){ 
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['userId'] = $userId;
            $showerror = "Successfully";
            header("location: /OnlineFoodDelivery/OnlineFoodDelivery/index.php?loginsuccess=true=$showerror");
            exit();
        } 
        else{
            header("location: /OnlineFoodDelivery/OnlineFoodDelivery/index.php?loginsuccess=false");
        }
    } 
    else{
        header("location: /OnlineFoodDelivery/OnlineFoodDelivery/index.php?loginsuccess=false");
    }
}    
?>