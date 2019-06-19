<?php include 'includes/header.php' ?>
<?php

    if(isset($_POST['login'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['pass']);

        if(!empty($email) && !empty($password)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
                $msg = "Please enter a valid email";
                $msg_alert = "alert-danger";
            }
            else{
                $query = "SELECT * FROM admin WHERE email = '$email' AND pass = '$password'";
                $result = $conn->query($query) or die($conn->error.__LINE__);
                $found = $result->fetch_assoc();

                if($found){
                    $_SESSION['user'] = $email;
                    header("Location: index.php?logged_in=true");
                }
                else{
                    $msg = "Credentails Invalid";
                    $msg_alert = "alert-danger";
                }
            }
        }
        else{
            $msg = "Please fill both the fields";
            $msg_alert = "alert-danger";
        }
    }
?>

<div class="container mt-3">
  <div class="jumbotron">
    <h2 class="display-3 text-center">Login</h2>
    <?php if(isset($msg)): ?>
        <div class="alert <?php echo $msg_alert; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php if(isset($email)){
                echo $email;} ?>" placeholder="Enter your email address" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter your password" />
        </div>
        <input type="submit" name="login" class="btn btn-primary" value="Submit" />
    </form>
  </div>
</div>

<?php include 'includes/footer.php' ?>
