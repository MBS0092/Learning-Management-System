<?php 
session_start();
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Courses</title>
    <link rel="stylesheet" href="./css/studentdashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="side-bar">
        <div class="logo-name">
            <h1>Register Courses</h1>
        </div>
        <ul>
            <li><a href="./Student Dashboard.php">Home</a></li>
            <li><a href="./studentregisteredcourses.php">Courses</a></li>
            <li><a href="./Student Profile.php">My Profile</a></li>
            <li><a href="./logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="header">
          <h5>E - Learning Website</h5>
            <div class="user">
                 <?php echo $_SESSION['firstname'], "&nbsp",$_SESSION['secondname']; ?>
            </div>
        </div>


        <div class="content">


            <div class="cards">
                  <?php 

                  $sql1 = "SELECT `courseid` FROM `studentenrollcourse` WHERE student_id= '".$_SESSION['id']."' " ;
                
                  $result1 = $conn->query($sql1);

               if($result1->num_rows > 0){
               
            while($row1 = $result1->fetch_assoc()){

                $registercourse =$row1['courseid'];

               $sql=" SELECT `courseid`, `coursename`,  `coursephoto` FROM `teacheraddcourse` where courseid = '".$registercourse."' ";

                $result = $conn->query($sql);

               if($result->num_rows > 0){
               
            while($row = $result->fetch_assoc()) {
          ?>

         <div class="card">
                    <div class="box">
                        <img src="<?php echo $row['coursephoto']?>" height="200px" alt="Error">
                        <button onclick="window.location.href='studentviewcourse.php?courseid=<?php echo $row['courseid'] ?>' ">View Course</button>
                       
                        
                    </div>
                </div>

             <?php  
                }
               }
   }
        }

             ?>

         

               

               
            </div>

        </div>
</body>

</html>

