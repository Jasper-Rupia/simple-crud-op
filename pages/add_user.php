
<body>
    <div class="container my-5">
        <form method="post" class="w-25">

            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="floatingInput" placeholder="#" autocomplete="off" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="mobile" class="form-control" id="floatingInput" placeholder="#" autocomplete="off" required>
                <label for="floatingInput">Mobile number</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="#" autocomplete="off" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="#" autocomplete="off" required>
                <label for="floatingPassword">Enter password</label>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary my-3"> Continue </button>
        </form>
    </div>
</body>


<?php
    $id = @$_GET['add_id'];
    if(!$id){
        header("location: ./login.php");
    }

    include './head.html';
    include './test_db_conn.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // CHEKING EMAIL DUPLICATION
        $sql = "SELECT * FROM crud WHERE Email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount == 1){
            die ("<script> alert('THIS EMAIL $email ALREADY EXIST WITH ANOTHER ACCOUNT!') </script>");
        }

        $sql = "INSERT INTO crud (Name, Mobile, Email, Password)
                VALUES('$name', $mobile, '$email', '$password')";
        
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: ./index.php");
        }      
    }
?>