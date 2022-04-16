<?php

    $sql = "SELECT * FROM crud WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        
    $id = $row['Id'];
    $picture = $row['Picture'];

    if(isset($_POST['sign-out'])){
        session_destroy();
        header("location: ./pages/login.php");
    }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="#"><img src="./assets/er_logo.png" alt="logo" width="60"></a>
    
    <a href="./picture.php?picture_id='.$id.'">
        <img src="./all_pictures/<?php echo $picture ?>" width="50" height="50" class="rounded-circle"> 
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">See posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Add posts</a>
            </li>
        </ul>

        <form method="POST" class="d-flex">
            <input class="btn btn-outline-secondary mx-2" type="submit" name="sign-out" value="Sign Out">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

  </div>
</nav>