<?php
session_start();

include("../config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); // Make sure to stop executing the script after the redirect
}

$id = mysqli_real_escape_string($con, $_SESSION['id']);
$query = mysqli_query($con, "SELECT * FROM users WHERE Id='$id'");

if (!$query) {
    die("Error: " . mysqli_error($con));
}

while ($result = mysqli_fetch_assoc($query)) {
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_Age = $result['Age'];
    $res_id = $result['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextTech</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../img/python-5.svg" type="image/x-icon">
</head>
<body>
    <main class="main">
         <!-- header -->
         <header class="header">
            <!-- top header -->
            <div class="topheader">
                <div class="num">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" style="cursor:pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone mr-10"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                   <p> <a href="tel:+2348149570768"> +2348149570768 </a></p>
                </div>
                <div class="mail">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  
                    style="cursor:pointer" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" class="feather feather-mail mr-10">
                      <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                   <p> <a href="mailto:nexttech@techsupport.com">nextech@techsupport.com</a> </p> 
                </div>
                <div class="searchBar">
                    <input type="text" placeholder="search" id="search" name="search">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search mr-10"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </div>
                <div class="out">
                    <p><a href='../edit.php?Id=<?php echo urlencode($id); ?>'><?php echo $_SESSION['username']; ?></a></p>
                        <a href="logout.php">LogOut</a>
                </div>  
                
            </div>
            <!-- bottom header -->
            <div class="bottomheader">
                <nav class="navigation">
                    
                    <input type="checkbox" name="" id="menubtn" class="menubtn"> 
                    <label for="menubtn" class="menuicon">
                        <span class="navicon"></span>
                    </label>

                    <a href="home.php" class="logo">
                    <span id="Nex">Nex</span><span id="Tec">Tech</span>
                    </a>
                    
                    <ul class="mainmenu">
                        <li><a href="home.php">  Home  </a></li>
                        <li><a href="#"> Courses </a></li>
                        <li><a href="do.php"> What We do</a></li>
                        <li><a href="#"> Portfolio</a></li>
                        <li><a href="contact.php"> Contact</a></li>
                    </ul>

                </nav>
            </div>
        </header>
        <!-- for the body -->
        <div class="maibody">
            <div class="contactdiv">
                <!-- first section -->
                <div class="firstsection">
                    <div class="slideshow">
                        <div class="ani">              
                                <img class="image_one" src="../img/calls.avif" alt="websiteOne"> 
                                <p class="pppl" >
                                    Contact Us
                                </p>                        
                        </div> 
                        <div class="ani">
                            <img class="image_one" src="..\img/calls2.avif" alt="studentone">
                            <p class="pppl" >
                                    Contact Us
                            </p>   
                        </div>
                        <div class="ani">
                            <img class="image_one" src="../img/solutions-one.jpg" alt="solutionOne">
                            <p class="pppl" >
                                    Contact Us
                            </p>   
                        </div>
                    </div>
                </div>
                <div class="secoundsection-contact">
                    <div class="secoudoe">
                       <div class="contactInfo">
                            <h2>Contact Us</h2>
                            <p>Shop K37 Adebayo Market</p>
                            <p><a href="tel:08149570768">08149570768</a>, <a href="tel:+2348149570768">09122345678</a></p>
                            <p><a href="mailto:okoriefranklyn16@gmail.com">Nextech@techsupport</a></p>
                            <p>Want to make an Enquiry?<br> Kindly Fill the Form</p>
                        </div>
                       <div class="maps">
                            <div class="eeers"> <div>Find us</div>  <div class="line"></div> </div>
                            <p class="map" style="cursor: pointer;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.
                                            866130347062!2d3.3913918141789177!3d6.538584895270698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                                            1!3m3!1m2!1s0x103b8d113fd4fb57%3A0x16f766670d40ae66!2sAdebayo%20Rd%2C%20Somolu%20102216%2C%20Ike
                                            ja%2C%20Lagos!5e0!3m2!1sen!2sng!4v1680038516490!5m2!1sen!2sng" 
                                            width="600" height="650" style="border:0;" allowfullscreen=""  
                                            referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </p>
                       </div>
                       <div class="socials">
                            <div class="eeers"> <div>Follow us</div> <div class="line"></div></div>
                            <p>
                                <span>Facebook</span>
                                <span>Twiter</span>
                                <span>Linkein</span>
                                <span>instagram</span>
                            </p>
                       </div>
                    </div>
                    <div class="secoudtwo">
                        <p>Send Us A Message</p>
                        <form action="https://formspree.io/f/xwkdkpql" method="post">
                            <input type="text" placeholder="Full Name" name="name" id="name" required>
                            <input type="email" placeholder="Email" name="email" id="email" required>
                            <input type="number" placeholder="Mobiel number" name="number" id="number">
                            <input type="text" placeholder="Subject" name="subject" id="subject" required>
                            <textarea name="message" id="message" placeholder="Your message" cols="30" rows="10"></textarea>
                            <input type="submit" value="Send" name="button" id="button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footerwidth">
            <p>© 2023 Next Tech. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="index.js"></script>
</body>
</html>