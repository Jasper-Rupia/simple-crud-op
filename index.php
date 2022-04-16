
<?php
    session_start();
    if($_SESSION['role'] != 'user' ){
        header("location: ./pages/login.php");
    }
    $email = $_SESSION['email'];

    require './head.html';
    include './pages/test_db_conn.php';
    include './navbar.php';
    
    $sql = "SELECT * FROM crud WHERE Role != 'admin' AND Email != '$email' ORDER BY Date DESC";
    $result = mysqli_query($conn, $sql);
?>

<body>
    <div class="container my-5">
        <form action="./pages/delete.php" method="POST">
            <div class="table-responsive">
                <table class="table table-hover my-3"> 
                    <thead>
                        <tr>
                            <th> Id         </th>
                            <th> Picture    </th>
                            <th> Name       </th>
                            <th> Mobile     </th>
                            <th> Email      </th>
                            <th> Date       </th>
                            <th> Operation  </th>
                        </tr>
                    </thead>
                    <tbody>
                    
<?php
    while($row = mysqli_fetch_assoc($result)){
        
        $id = $row['Id'];
        $picture = $row['Picture'];
        $name = $row['Name'];
        $mobile = $row['Mobile'];
        $email = $row['Email'];
        $date = $row['Date'];

        echo '<tr class="shadow-sm">
                <td> '.$id.'         </td>
                <td> <img src="./all_pictures/'.$picture.'" width="50" height="50" class="rounded-circle"> </td>
                <td> '.$name.'       </td>
                <td> <a href="tel:'.$mobile.'"> '.$mobile.' </a> </td>
                <td> <a href="mailto:'.$email.'"> '.$email.' </a> </td>
                <td> '.$date.'       </td>
                <td> 
                    <a href="#" class="btn btn-outline-success"> Follow </a>
                </td>
            </tr>';
    }
?>
                    
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>


<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('item_check');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
