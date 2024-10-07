<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php form handling</title>
</head>
<body> 
    <?php
    $hostname="localhost"; 
    $user="root"; 
    $password="";
    $dbname="crud"; 

    $conn=new mysqli($hostname,$user,$password,$dbname); 

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $phone = $_POST['phone']; 

        $sql="INSERT INTO students (name,email,phone) VALUES ('$name','$email','$phone')";
        $result=$conn->query($sql); 

        if ($result) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    
    ?>
    
    
    <h1>Student Information Form</h1>
    <br> <hr> 
    <!-- <form action="" name="stuForm" onsubmit="validation(event)" method="POST"> -->
    <form action="" name="stuForm" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br> <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" ><br> <br>
        <input type="submit"  value="submit">
    </form>
    


    <!-- externel js file  --> 
     <script src="main.js" type="text/javascript"></script>
</body>
</html>