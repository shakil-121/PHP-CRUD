<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php form handling</title>
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
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- External css file    -->
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>

    <div class="container d-flex justify-content-end">
        <button class="btn btn-primary  mt-5 me-5"><a href="index.php" class="text-decoration-none text-light"> ADD
                STUDENT <i class="fa-solid fa-user-plus"></i></a></button>
    </div>
   <div class="container px-3 py-1 rounded-5 shadow my-4" style="background-color: #F4F6FF;">
   <div class="mt-5" id="list">
        <h1 class="text-center ">STUDENTS LIST</h1>
    </div>
    <div>
   </div>
        <table id="tbl" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'database.php';
               
                if(isset($_GET['delId'])){
                    $id=$_GET['delId']; 

                    $sql="DELETE FROM students WHERE id='$id'";

                    $deletestudent=$conn->query($sql); 
                    if($deletestudent){
                        header("Location:student_list.php"); 
                        echo "Delete Successfully";
                    }else{
                        echo "Something wrong! ". $conn->error;
                    }
                }

                $query = "SELECT * FROM students";
                $result = $conn->query(query: $query);
                $i = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // echo "<th scope='row'>" . $row["id"] . "</th>";
                        echo "<th scope='row'>" . $i++ . "</th>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>
                                <a href='single_student.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-eye'></i> View </a>
                                <a href='?delId=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete <i class='fa-solid fa-trash'></i></a>
                              </td>";
                        echo "</tr>";

                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>













    





    <!-- <a href='single_student.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'><i class='fa-solid fa-eye'></i> View </a>
    <a href='?delId=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete <i class='fa-solid fa-trash'></i></a> -->

















    <?php
    include 'database.php';
    $studentData = null;

    // Check if the 'id' parameter is set in the URL and fetch student data
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $studentData = $result->fetch_assoc();
        }
    }
    ?>

    <!-- Bootstrap Modal -->
    <div class="modal fade <?php echo isset($studentData) ? 'show d-block' : ''; ?>" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="<?php echo isset($studentData) ? 'display: block; background: rgba(0, 0, 0, 0.5);' : ''; ?>">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if ($studentData): ?>
                        <h4>Name: <?php echo $studentData['name']; ?></h4>
                        <h4>Email: <?php echo $studentData['email']; ?></h4>
                    <?php else: ?>
                        <h4>No student information available.</h4>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit <i
                            class="fa-solid fa-pen-to-square"></i></button>
                </div>
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