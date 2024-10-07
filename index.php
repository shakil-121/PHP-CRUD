<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php form handling</title>
    <!-- Bootstrap CDN  -->--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <?php

    include './database.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "INSERT INTO students (name,email,phone) VALUES ('$name','$email','$phone')";
        $result = $conn->query(query: $sql);

        if ($result) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    ?>


    <h1 class="text-center">Student Information Form</h1>
    <br>
    <hr>
    <!-- <form action="" name="stuForm" onsubmit="validation(event)" method="POST"> -->
    <!-- <form action="" name="stuForm" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br> <br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone"><br> <br>
        <input type="submit" value="submit">
    </form> -->


    <form class="mx-5" action="" name="stuForm" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="email" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-warning"><a class="text-decoration-none text-dark" href="./student_list.php">Students List</a></button>
            </div>
        </div>
    </div>




    <!-- externel js file  -->
    <script src="main.js" type="text/javascript"></script>
    <!-- Bootstrap CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>