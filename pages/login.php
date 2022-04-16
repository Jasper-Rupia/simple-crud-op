
<div class="container text-center my-5 w-25">
    <form method="POST" class="form-group py-5">
        <input class="form-control my-3" type="email" name="email" placeholder="Enter your username" required>
        <input class="form-control my-3" type="password" name="password" placeholder="Enter your password" required>
        <input class="btn btn-primary px-5" type="submit" name="sign-in" value="Sign In">
    </form>
</div>


<?php
    include './head.html';
    include './test_db_conn.php';

    if(isset($_POST['sign-in'])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM crud 
                WHERE Email = '$email' 
                AND Password = '$password'";

        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if(!$rowCount == 1){
            die ("<script> alert('USERNAME or PASSWORD INCORRECT!') </script>");
        }
        else {
            $row = mysqli_fetch_assoc($result);
            $role = $row['Role'];

            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            
            if($role === "admin"){
                header("location: ./index.php");
            }
            else if($role === "user"){
                header("Location: ../index.php");
            }
        }
    }   
?>
