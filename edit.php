<?php
session_start();
include("config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); // Stop executing the script after the redirect
}
if (!isset($_SESSION['id'])) {
   echo "Whao ma pami now";
 
}else{
    $id = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="php/home.php"> Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <?php
            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $age = mysqli_real_escape_string($con, $_POST['age']);

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con, "UPDATE users SET Username='$username', Email='$email', Age='$age' WHERE Id=$id");

                if ($edit_query) {
                    echo "<div class='message'>
                    <p>Profile Updated!</p>
                </div> <br>";
                    echo "<a href='php/home.php'><button class='btn'>Go Home</button>";
                } else {
                    echo "Error updating record: " . mysqli_error($con);
                }
            } else {
                
                $query = mysqli_query($con, "SELECT * FROM users WHERE id=$id");

                if ($query) {
                    // Fetch the result only if the query was successful
                    while ($result = mysqli_fetch_assoc($query)) {
                        $res_Uname = $result['Username'];
                        $res_Email = $result['Email'];
                        $res_Age = $result['Age'];
                    }
                } else {
                    echo "Error: " . mysqli_error($con);
                }
                ?>
                <header>Change Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($res_Uname); ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($res_Email); ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" value="<?php echo htmlspecialchars($res_Age); ?>" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Update" required>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>


