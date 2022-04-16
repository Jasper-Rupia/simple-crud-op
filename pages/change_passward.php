
<div class="container">
    <form method="POST">
        <input class="form-control my-3" type="password" name="old_password" placeholder="Old password" required>
        <input class="form-control my-3" type="password" name="new_password" placeholder="New password" required>
        <input class="form-control my-3" type="password" name="confirm_password" placeholder="Confirm new password" required>
        <input class="btn btn-primary my-3" type="submit" name="change_password" value="Change password">
    </form>
</div>

<?php
    require './head.html';
    require './test_db_conn.php';
    if(isset($_POST['change_password'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if($new_password == $confirm_password){
            //$new_password = md5($new_password);
            $sql = "SELECT * crud WHERE Id = 4";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($row['Password'] == $old_password){
                $sql = "UPDATE crud SET Password = '$new_password' WHERE Id = 4";
                $result = mysqli_query($conn, $sql);
    
                if ($result) {
                    echo '<script type="text/javascript"> alert("PASSWORDS SUCCESSFULL CHANGED"); </script>';
                    mysqli_close($conn);
                }
            }
        }
        else{
            echo '<script type="text/javascript"> alert("Error: PASSWORDS DO NOT MATCH. "); </script>';
        }
    }
?>

