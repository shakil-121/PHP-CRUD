<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php form handling</title>
    <!-- Bootstrap CDN  -->--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- External css file    -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body id="main" style="background-color: #17153B;">
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

    <div class="container">
        <div class=" d-flex justify-content-end">
            <div class="text-center">
                <button type="button" class="btn btn-primary "><a class="text-decoration-none text-light"
                        href="./student_list.php"><i class="fa-solid fa-list"></i> Students List</a></button>
            </div>
        </div>
    </div>
    <div class="container px-3 py-2 rounded-5 shadow my-5" style="background-color: #F4F6FF;">
        <h1 id="'heading" class="text-center mt-3">CREATE NEW STUDENT</h1>
        <br>
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
                <input type="text" name="name" class="form-control" 
                    aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Student <i class="fa-solid fa-user-plus"></i></button>
        </form>
        <br><br>

    </div>


    <!-- externel js file  -->
    <script src="main.js" type="text/javascript"></script>
    <!-- Bootstrap CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <p class="text-center mt-5">©Develop By Shahadat Hossain</p>
</body>

</html>