<?php

    #establish connection
include_once "config.php";
   
    #Define variables and initialize with empty values
        $ignErr = $emailErr = $dc_idErr = $join_dateErr = "";
        $ign = $email = $dc_id = $join_date = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            #VALIDATE IGN
            $input_ign = trim($_POST["ign"]);
                if(empty($input_ign)) {
                $ignErr = "Please Enter your In Game Name.";
                } elseif (!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST["ign"]))) {
                    $ignErr = "your IGN contains letters, numbers, and underscores";
                }else {
                    $ign = $input_ign;
                }

            #validate email address
            $input_email = trim($_POST["email"]); {
            if(empty($input_email)) {
                $emailErr = "Please enter your email";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format!";
                } else {
                    $email = $input_email;
                }
            }

            #Validate discord username
            $input_dc_id = trim($_POST["dc_id"]); {
                if(empty($input_dc_id)) {
                    $dc_id = "Please enter your discord username. (e.g. username#xxxx)";
                } elseif (!preg_match('/^[a-zA-Z0-9#]+$/', trim($_POST["dc_id"]))) {
                        $dc_idErr = "Invalid Discord username!";
                    } else {
                        $dc_id = $input_dc_id;
                        }
            }

            #date joined member
            $input_date = trim($_POST["join_date"]);
            if(empty($input_join_date)){
                $join_dateErr = "When did you join?";
            } else {
                $join_date = $input_address;
            }

            #Check input error before inserting in database
            if(empty($ignErr) && empty($emailErr) && empty($dc_idErr) && empty ($join_dateErr)) {
                #prepare an insert statement
                $sql = mysqli_query($mysqli, "INSERT INTO join_here (ign, email, dc_id, join_date) VALUES ('$ign', '$email', '$dc_id', '$join_date')");
                $query_run = mysqli_query($con, $query);



                if($stmt = mysqli_prepare($link, $sql)) {
                    #bind varialbes to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sss", $param_ign, $param_email, $param_dc_id, $param_join_date);

                    #set parameters
                    $param_ign = $ign;
                    $param_email = $email;
                    $param_dc_id = $dc_id;
                    $param_join_date = $join_date;

                    #attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        #records created sucessfully. Redirect to the page.
                        header("location members.php");
                        exit();
                    } else {
                        echo "Oops something went wrong. Please try again later.";
                    }
                }

                #Close statement
                mysqli_stmt_close($stmt);
            }
            #Close Connection
            mysqli_close($link);
        }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Here</title>
        <!-- swiper css link  -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/join-here.css"> 

        <!-- JQUERY CDN -->
        <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
        </head>
        <body>
        <!-- starts header -->
        <section class="header">
            <div class="logo">
                <a href="index.html"><img src="images/logo 1.png" alt="" class="logo"></a><i id="menu-btn1" class="fa fa-caret-right"></i>
                
                <div class="games">
                    <a href="gta.html">
                        <div class="community">
                            <div class="box-community">
                                <div class="box">
                                    <div class="image">
                                        <img src="images/gta.png" alt="">
                                    </div>
                                    <div class="text">
                                        <h3>Grand Theft Auto V</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="community">
                            <div class="box-community">
                                <div class="box">
                                    <div class="image">
                                        <img src="images/foh.jpg" alt="">
                                    </div>
                                    <div class="text">
                                        <h3>Grand Theft Auto V</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="community">
                            <div class="box-community">
                                <div class="box">
                                    <div class="image">
                                        <img src="images/sot.png" alt="">
                                    </div>
                                    <div class="text">
                                        <h3>Grand Theft Auto V</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            
            <div id="menu-btn" class="fas fa-bars" >
            </div>
            
            <div class="menu-1">
                <div class="bar-image">
                    <a href="index.html"><img src="images/logo 1.png" alt=""></a>
                </div>
                <a href="#">about</a>
                <a href="#">media</a>
                <a href="#">Forum</a>
                <a href=""><button>Join Here</button></a>
            </div>
        </section>
        <!-- ends header -->

        <!-- home section starts -->
        <section class="join">
            <div class="join-background">
                <img src="images/join here image.png" alt="">
                <h1>WELCOME TO BMPH</h1>
            </div>

            
        </section>

        <section class="join1">

            <h1 class="heading-title">JOIN NOW !</h1>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="join-here">
                <div class="flex">
                    <div class="inputBox">
                        <span>InGame Name :</span>
                        <input type="text" placeholder="Enter Your IGN" name="ign">
                        <!-- <span class="error"> <?php #echo $ignErr; ?></span> <br> <br>-->
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="text" placeholder="Enter Your Email" name="email">
                        <!--<span class="error"> <?php #echo $emailErr; ?></span> <br> <br>-->
                    </div>
                    <div class="inputBox">
                        <span>Discord ID :  </span>
                        <input type="text" placeholder="Enter Your Discord ID" name="dc_id">
                        <!--<span class="error"> <?php #echo $dc_idErr; ?></span> <br> <br>-->
                    </div>
                    <div class="inputBox">
                        <span>Date :</span>
                        <input type="date" placeholder="Enter Date today" name="join_date">
                        <!--<span class="error"> <?php #echo $join_dateErr; ?></span> <br> <br>-->
                    </div>
                </div>
    
                <input type="submit" value="submit" class="btn" name="send">
            </form>
        </section>
        <!-- home section ends -->

        <!-- swiper js link  -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- costum js file -->
     <script src="js/script.js"></script>
            
</body>
</html>