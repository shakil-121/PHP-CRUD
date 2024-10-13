<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Student</title>
    <!-- Bootstrap CDN  -->
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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <!-- External css file    -->
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="d-flex border-1 justify-content-center align-items-center vh-100 bg-primary-subtle ">
        <div>
            <img style="width:200px; border-radius:50px;" class="pe-3" src="img/user.png" alt="">
        </div>
        <div class="Poppins">
            <?php
            session_start(); // Start the session
            include 'database.php';

            // Check if there is a success message to show the toast
            if (isset($_SESSION['success_message'])) {
                echo "<script>window.onload = function() { showToast(); };</script>";
                unset($_SESSION['success_message']); // Clear the success message after displaying it
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM students WHERE id='$id'";
                $students = $conn->query($sql);
                if ($students && $students->num_rows > 0) {
                    $row = $students->fetch_assoc(); // Fetch data once
            
                    // Display student information
                    ?>
                    <h3>Name: <?php echo $row['name']; ?></h3>
                    <h3>E-mail: <?php echo $row['email']; ?></h3>
                    <h3>Phone: <?php echo $row['phone']; ?></h3>

                    <button type="button" class="btn btn-primary">
                        <a href="student_list.php" class="text-decoration-none text-light"><i class="fa-solid fa-backward"></i> Back</a>
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>

                    <!-- Modal Structure -->
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student Information</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="update.php" method="POST" id="editForm">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="<?php echo $row['name']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo $row['email']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                value="<?php echo $row['phone']; ?>" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" form="editForm"><i class="fa-solid fa-upload"></i> Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "<h3>No student found with the given ID.</h3>";
                }
            }
            ?>

            <!-- Toast Notification -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                <div id="liveToast" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Success</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Student information updated successfully!
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS and Popper.js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"
                integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>


            <script>
                // Function to show the toast notification
                function showToast() {
                    var toastElement = document.getElementById('liveToast');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                }
            </script>

        </div>
    </div>
</body>

</html>