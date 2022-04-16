
<?php
    require './head.html';
    include './test_db_conn.php';
    

    $id = @$_GET['update_id'];
    if(!$id){
        header("location: ./login.php");
    }

    $sql = "SELECT * FROM crud WHERE Id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // UPDATING INFO
    $name = $row['Name'];
    $mobile = $row['Mobile'];
    $email = $row['Email'];
    $password = $row['Password'];
    
    if(isset($_POST['update'])){
        $name = $_POST["name"];
        $mobile = $_POST['mobile'];
        $new_email = $_POST['email'];
        $password = $_POST['password'];

        //CHECK DUPLICATION OF USER EMAIL
        if($email != $new_email){
            $sql = "SELECT * FROM crud WHERE Email='$new_email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount == 1)
                die ("<script> alert('THIS EMAIL $new_email ALREADY EXIST WITH ANOTHER ACCOUNT!') </script>");
        }

        //UPDATING USER INFO
        $sql = "UPDATE crud 
                SET Name='$name', Mobile=$mobile, Email='$new_email', Password='$password' 
                WHERE Id=$id";

        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: ./index.php");
            echo "<script> alert('DATA UPDATED') </script>";
        }
    }
?>


<body>
    <div class="container my-5">
        <form method="POST" class="w-25">
            <div class="my-3">
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $name; ?>" autocomplete="off">
            </div>
            <div class="my-3">
                <input type="number" name="mobile" class="form-control" placeholder="Enter your phone number" value="<?php echo $mobile; ?>">
            </div>
            <div class="my-3">
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $email; ?>"> 
            </div>
            <div class="my-3">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" value="<?php echo $password; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-success"> Update now </button>
        </form>
    </div>
</body>
