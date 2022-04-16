
<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "test";
    
    class DatabaseException extends Exception{
        public function showError($dbName){
            return "$dbName Database Not Found";
        }
    }

    try{
        $conn = @mysqli_connect( $dbHost, $dbUser, $dbPass, $dbName );
        if(!$conn){
            throw new DatabaseException("ERROR 001: ");
        }
    }
    catch(DatabaseException $exception){
        $error = $exception->getMessage() . $exception->showError($dbName);
        echo "<script> alert('$error') </script>";
    }
?>

