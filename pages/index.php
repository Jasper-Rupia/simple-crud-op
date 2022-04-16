
<?php
    session_start();
    if($_SESSION['role'] != 'admin' ){
        header("location: ./login.php");
    }
    $email = $_SESSION['email'];

    require './head.html';
    include './test_db_conn.php';
    include './navbar.php';
    
    $sql = "SELECT * FROM crud WHERE Role != 'admin' ORDER BY Date DESC";
    $result = mysqli_query($conn, $sql);
?>

<body>
    <div class="container my-5">
        <form action="./delete.php" method="POST">
            <a href="./add_user.php?add_id=add" class="btn btn-outline-primary"> Add user </a>
            <input type="submit" value="Delete selected" name="delete_many" class="btn btn-outline-danger" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE USERS')"> 
            <div class="table-responsive">
                <table class="table table-hover my-3"> 
                    <thead>
                        <tr>
                            <th> <input type="checkbox" onClick="toggle(this)" class="form-check-input" style="width:25px;height:25px"> </th>
                            <th> Id         </th>
                            <th> Picture    </th>
                            <th> Name       </th>
                            <th> Mobile     </th>
                            <th> Email      </th>
                            <th> Password   </th>
                            <th> Role       </th>
                            <th> Date       </th>
                            <th colspan="2"> Operation  </th>
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
        $password = $row['Password'];
        $role = $row['Role'];
        $date = $row['Date'];

        echo '<tr class="shadow-sm">
                <td> <input type="checkbox" name="item[]" value="'.$id.'"  class="check_item form-check-input" style="width:20px;height:20px"> </td>
                <td> '.$id.'         </td>
                <td> 
                    <a href="./picture.php?picture_id='.$id.'">
                        <img src="../all_pictures/'.$picture.'" width="50" height="50" class="rounded-circle"> 
                    </a>
                </td>
                <td> '.$name.'       </td>
                <td> '.$mobile.'     </td>
                <td> '.$email.'      </td>
                <td> '.$password.'   </td>
                <td> '.$role.'       </td>
                <td> '.$date.'       </td>
                <td> 
                    <a href="./update.php?update_id='.$id.'" class="btn btn-outline-success"> Update </a>
                </td>
                <td> 
                    <a href="./delete.php?delete_id='.$id.'" class="btn btn-outline-danger"> Delete </a>
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
        checkboxes = document.getElementsByName('item[]');
        for(var i=0, n=checkboxes.length; i<n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
