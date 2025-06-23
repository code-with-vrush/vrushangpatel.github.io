<?php 
session_start();
//<------------------PHP Code  Verification Of user-------------------------->
if(isset($_POST['stu-log'])) {
    // Create connection
    $con =  mysqli_connect("localhost", "root", "", "project");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from form
    $er_number = $_POST['Er_number'];
    $password = $_POST['Password'];
    $_SESSION['E_num']=$er_number;

    // Prepare and execute SQL query
    $qry = "SELECT * FROM student_info WHERE E_num = '$er_number' AND pas='$password'";
    $ans = mysqli_query($con, $qry);

    if ($ans) {
        if (mysqli_num_rows($ans) == 1) {
            echo '<script>alert("User has an account.")</script>';
        } else {
            echo '<script>alert("User does not have an account.")</script>';
            exit();
        }
    } else {
        echo '<script>alert("Query failed: ' . mysqli_error($con) . '")</script>';
        exit();
    }

    mysqli_close($con);
    echo '<script>window.location.href = "page_s.php";</script>';
    
    exit();
}
//<------------------PHP Code  Verification Of user-------------------------->
if(isset($_POST['HOD'])) {
    // Create connection
    $con =  mysqli_connect("localhost", "root", "", "project");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = $_POST['h_id'];
    $password = $_POST['h_pas'];


    // Prepare and execute SQL query
    $qry = "SELECT * FROM hod_info WHERE user_id = '$id' AND pas='$password'";
    $ans = mysqli_query($con, $qry);

    if ($ans) {
        if (mysqli_num_rows($ans) == 1) {
            $_SESSION['h_id']= $id;
            echo '<script>alert("User has an account.")</script>';
        } else {
            echo '<script>alert("User does not have an account.")</script>';
        }
    } else {
        echo '<script>alert("Query failed: ' . mysqli_error($con) . '")</script>';
    }

    mysqli_close($con);
    echo '<script>window.location.href = "page_h.php";</script>';
    exit();
}
//<--------------------PHP Code  Verification Of user-------------------------->
if(isset($_POST['F'])) {
    // Create connection
    $con =  mysqli_connect("localhost", "root", "", "project");

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $f_id = $_POST['F_id'];
    $password = $_POST['F_pas'];


    // Prepare and execute SQL query
    $qry = "SELECT * FROM faculty_info WHERE user_id = '$f_id' AND pas='$password'";
    $ans = mysqli_query($con, $qry);

    if ($ans) {
        if (mysqli_num_rows($ans) == 1) {
            $_SESSION['f_id']= $f_id;
            echo '<script>alert("User has an account.")</script>';
        } else {
            echo '<script>alert("User does not have an account.")</script>';
        }
    } else {
        echo '<script>alert("Query failed: ' . mysqli_error($con) . '")</script>';
    }

    mysqli_close($con);
    echo '<script>window.location.href = "page_f.php";</script>';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/website-attandence-features-page.png" >
    <title>Log in page-Attendees management system</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://www.google.com/recaptcha/api.js?render='6LfGe-EpAAAAAJwWTJPXp-UkzCtNpkom6dbs36ly'"></script>
</head>
<body>
    <dvi class="navbar">
        <div class="navbarlogo"><h2>welcome to prime college attendance management system</h2></div>
        <div class="navbar-buttons">
            <a href="home.php" class="navbar-button">Home Page</a>
            <a href="Register.php" class="navbar-button">Register Page</a>
        </div>
    </dvi>
    <div class="container">
        <div class="form-container">
            <h1 class="tit"id="output"></h1>
            <hr>
            <p class="tit-n">Select your log in Type</p>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen" value="Admin">Admin</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')" value="HOD">HOD</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')" value="Faculty">Faculty</button>
                    <button class="tablinks" onclick="openCity(event, 'Student')" value="Student">Student</button>
                  </div>
                  <br>
                  <!-- Tab content -->
                  <div id="London" class="tabcontent" method="post">
                    <form>
                        <input type="text"  name="usre_id"placeholder="usre id" >
                        <input type="password"  placeholder="Password" >
                        <div class="ch"><label><input type="checkbox">I agree </label><a href="forgot password">Forgot Password?</a></div>
                        <div class="g-recaptcha" data-sitekey="6LfGe-EpAAAAAJwWTJPXp-UkzCtNpkom6dbs36ly" ></div>
                        <button id="log-but">log in</button>
                        
                    </form>
                  </div>
                  
                  <div id="Paris" class="tabcontent">
                    <form name="f1" method="post">
                        <input type="text"  placeholder="usre id" name="h_id" >
                        <input type="password"  placeholder="Password" name="h_pas" >
                        <div class="ch"><label><input type="checkbox">I agree </label><a href="forgot password">Forgot Password?</a></div>
                        <div class="g-recaptcha" data-sitekey="6LfGe-EpAAAAAJwWTJPXp-UkzCtNpkom6dbs36ly" ></div>
                        <button id="log-but" name="HOD">log in</button>
                        </form>
                  </div>
                  
                  <div id="Tokyo" class="tabcontent">
                    <form name="f1" method="post">
                        <input type="text"  placeholder="usre id" name="F_id" >
                        <input type="password" placeholder="Password" name="F_pas" >
                        <div class="ch"><label><input type="checkbox">I agree </label><a href="forgot password">Forgot Password?</a></div>
                        <div class="g-recaptcha" data-sitekey="6LfGe-EpAAAAAJwWTJPXp-UkzCtNpkom6dbs36ly" ></div>
                        <button id="log-but" name="F">log in</button>
                    </form>
                  </div>
                    <div id="Student" class="tabcontent">
                        <form name="f1" method="post">
                            <input type="text"  placeholder="Er_number" name="Er_number">
                            <input type="password"  placeholder="Password" name="Password">
                            <div class="ch"><label><input type="checkbox">I agree </label><a href="forgot password">forgot password</a></div>
                            <div class="g-recaptcha" data-sitekey="6LfGe-EpAAAAAJwWTJPXp-UkzCtNpkom6dbs36ly"></div>
                            <button id="log-but" name="stu-log">log in</button>
                        </form>
                        </div>
                 <div class="re"><center>Don't have an account? <a href="Register.php">Register</a></div>
            </form>
        </div>
</body>
<!----------------------------Script for animations---------------------------------------->
<script>
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";

            // Store button value in variable 'oppg' and print it in the output element
            var oppg = evt.currentTarget.value;
            var but = oppg+' Log in page';
            document.getElementById('output').innerText = but;
        }

        // Trigger click on the defaultOpen element
        document.getElementById("defaultOpen").click();
        function onSubmit(token) {
     document.getElementById("demo-form").submit();

   }
</script>
</html>
