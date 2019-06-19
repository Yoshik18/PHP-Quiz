<?php include 'db.php';
session_start();

if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
    $number = $_POST['number'];
    $selected_ans = $_POST['answer'];
    $next_question = $number+1;


    //Get number of questions
    $query = "SELECT * FROM questions";
    $result = $conn -> query($query) or die();
    $no_of_questions = $result -> num_rows;

    //Get if ans is correct or not'
    $query = "SELECT * FROM answers WHERE question_no = $number AND is_correct = 1";
    $result = $conn -> query($query) or die();
    $row = $result -> fetch_assoc();
    $correct_choice = $row['id'];

    if($correct_choice == $selected_ans){
        $_SESSION['score']++;
    }
    if($number == $no_of_questions){
        header("Location: score.php");
        exit();
    }
    else{
        header("Location: questions.php?n=".$next_question);
    }


}

?>