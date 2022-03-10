<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patan E-Library</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.php">Patan E-Library </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="images/profile.png" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php">Your Profile</a></li>
                                    <!--li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Account Settings</a></li-->
                                    <li class="divider"></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="index.php"><i class="menu-icon icon-home"></i>Home
                                </a></li>
                                 <li><a href="message.php"><i class="menu-icon icon-inbox"></i>Messages</a>
                                </li>
                                <li><a href="student.php"><i class="menu-icon icon-user"></i>Manage Students </a>
                                </li>
                                <li><a href="book.php"><i class="menu-icon icon-book"></i>All Books </a></li>
                                <li><a href="addbook.php"><i class="menu-icon icon-edit"></i>Add Books </a></li>
                                <li><a href="requests.php"><i class="menu-icon icon-tasks"></i>Issue/Return Requests </a></li>
                                <li><a href="recommendations.php"><i class="menu-icon icon-list"></i>Book Recommendations </a></li>
                                <li><a href="current.php"><i class="menu-icon icon-list"></i>Currently Issued Books </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>

                    <div class="span9">
                        <div class="content">

                        <div class="module">
                            <div class="module-head">
                                <h3>Book codes</h3>
                            </div>
                            <div class="module-body">
                        <?php
                    
                        
                            $x=$_GET['id'];
                            $sql="select * from LMS.book where BookId='$x'";
                         
                            $result=$conn->query($sql);
                            $row=$result->fetch_assoc();    
                            
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];
                                //fetching data from bookcode table
                                $sql5="select * from LMS.bookcode where BookId='$x'";
                    
                                $result5=$conn->query($sql5);
                            
                                
                             

                                echo "<b>Book ID:</b> ".$bookid."<br><br>";
                                echo "<b>Title:</b> ".$name."<br><br>";
                                $sql1="select * from LMS.author where BookId='$bookid'";
                                $result=$conn->query($sql1);
                                echo "<b>Availability:</b> ".$avail."<br><br>";
                                $generatedNumber = $result5->num_rows;
                                // $generatedNumber = mysqli_num_rows($res)
                                if($result5->num_rows > 0){
                                   while($row = $result5->fetch_assoc()){
                                       echo "Code:".$row['code']."<br>";
                                   }
                                }                                
                                echo "<br>";


                                    if(isset($_POST['button1']))
                                    {
                                       for( $i=0; $i < $avail - $generatedNumber ; $i++){
                                    // printf("uniqid(): %s\r\n", uniqid());
                                  $u=uniqid ($prefix = "PMC");
                                //   echo $u;
                                    $sql2 ="insert into LMS.bookcode (Bookid,code) values ('$bookid','$u');";
                                    // echo $sql2;
                                    $result = $conn->query($sql2);
                                    // echo "<br>";
                                    // echo "<br>"; 
                                        //  echo "rajan";
                                       }
                                       	// if ($conn->query($sql2) === TRUE) {
                                                
                                        //         echo "<script type='text/javascript'>alert('Code Generated')</script>";
                                        // } else {
                                        //                 //echo "Error: " . $sql . "<br>" . $conn->error;
                                        //     echo "<script type='text/javascript'>alert('Already Generated')</script>";
                                        // }
                                        
                                }

                           
                            ?>
                            <br>
                            
                        <a href="book.php" class="btn btn-primary">Go Back</a>  

                       <form method="post">
                           <?php
                           if($generatedNumber >= $avail){
                               echo "<div>Already Generated </div>";
                           }else{
                               echo '<input type="submit" name="button1"
                class="button" value="Generate" />';
                           }
                            ?>
        
          
        
    </form>
                           
                               </div>
                           </div>
                            </div>
                    <!--/.span3-->
                    <!--/.span9-->
                
                    <!--/.span3-->
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
<div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2022 Library Management System </b>All rights reserved.
            </div>
        </div>
        
        <!--/.wrapper-->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>

</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>