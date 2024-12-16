<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextTech</title>
</head>
<body>
    <form action="login.php" method="post">
        <h2>Login page</h2>
        <?php if(isset($_GET['error'])){ ?>
            <p class="Error"><?php echo $_GET['error']; ?></p>

        <?php } ?>
        <input type="text" placeholder="UserName" Id="UserName" name="UserName" >
        <input type="password" placeholder="Password" Id="Password" name="Password">

        <button type="Submit"> Login </button>
    </form>
</body>
</html>