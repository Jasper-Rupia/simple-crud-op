
<?php

  include './head.html';
  include './test_db_conn.php';
  $id = $_GET['picture_id'];

if(isset($_POST["set_picture"]))
{
    //$var1 = rand(1111,9999);  // generate random number in $var1 variable
    //$var2 = rand(1111,9999);  // generate random number in $var2 variable
    //$var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    //$var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number
    
    $file = $_FILES['picture'];
    $filename = $_FILES["picture"]["name"];    // get the picture name in $fnm variable
    $tmp_name = $_FILES['picture']['tmp_name']; // temp location
    $temp_extension = explode('.', $filename);
    $fileExtension = strtolower(end($temp_extension));
    $new_fileNane = uniqid('', true) . "." . $fileExtension;
    $file_destinstion = "../all_pictures/".$new_fileNane;  // storing picture path into the {all_pictures} folder with 32 characters hex number and file name

    move_uploaded_file($tmp_name, $file_destinstion);  // move picture into the {all_pictures} folder with 32 characters hex number and picture name
    $sql = "UPDATE crud SET Picture='$new_fileNane' WHERE Id=$id";
    $check = mysqli_query($conn, $sql);  
		
    if($check){
    	echo '<script type="text/javascript"> alert("Profile picture updated"); </script>'; 
    }
    else{
    	echo '<script type="text/javascript"> alert("Error Uploading Data! TO DB"); </script>';  
    }
}
?>



<form method="post" enctype="multipart/form-data">
    <div class="container text-center">
        <div id="drag_area" class="alert-primary p-4 my-5">
            <div class="icon">
              <i class="fas fa-cloud-upload-alt"></i>
            </div>
            <h3 class="py-4">Drag and Drop Image Here</h3>
            <h4 class="py-1">Or</h4>
            <input type="file" id="file" name="picture" class="btn btn-primary d-none" >
            <label for="file" class="btn btn-primary p-3"> Select Image </label>
        </div>

        <div class="">
          <button type="submit" name="set_picture" class="btn btn-primary px-3"> Set picture </button>
        </div>
    </div>

</form>

<script type="text/javascript" src="../js/drag_and_drop.js"></script> 
