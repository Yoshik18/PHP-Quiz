<?php require("./includes/header.php") ?>
<?php 
    $admin_mail = "Enter your mail";
    $score = $_SESSION['score'];

    mail($admin_mail, 'PHP QUIZ', 'Score of recent\'s game is '.$score);

?>

<div class="container text-center mt-3">
    <div class="jumbotron">
        <h2 class="display-4">Congratulations, you've successfully completed the test</h2>
        <p>Your final score is: <?php echo $_SESSION['score']; ?></p>
        <a href="questions.php?n=1" class="btn btn-primary">Take Again</a>
    </div>
</div>

<?php 
    if(isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
        }   
?>

<?php require("./includes/footer.php") ?>