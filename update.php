<?php 
session_start();
include 'database.php'; 

if($_SERVER['REQUEST_METHOD']=='POST')
{ 
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; 

    $sql="UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id='$id'"; 

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message']="Student successfully updated";
        header("Location: single_student.php");
    } else {
        echo "Error updating record: ". $conn->error;
    }
    $conn->close();  // Close the database connection
}



?>