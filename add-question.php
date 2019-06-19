<?php require("./includes/header.php") ?>
<?php  
    if(!isset($_SESSION['user'])){
       header("Location: index.php");
    }

    if(isset($_POST['add_submit'])){
        $question_number = $_POST['question_number'];
        $correct_answer = $_POST['correct_answer'];
        $question_text = $_POST['question_text'];
        $answers = array();
        $answers[1] = $_POST['answer1'];
        $answers[2] = $_POST['answer2'];
        $answers[3] = $_POST['answer3'];
        $answers[4] = $_POST['answer4'];

        //Validate
        if(!empty($question_number) && !empty($question_text) && !empty($answers[1]) && !empty($answers[2]) && !empty($answers[3]) && !empty($answers[4])){
            //Add query
            $query = "INSERT INTO questions (question_no, question_text) VALUES ('$question_number', '$question_text')";
            $insert = $conn -> query($query) or die($conn->error.__LINE__);

            if($insert){
                foreach($answers as $answer => $value){
                    if($correct_answer == $answer){
                        $is_correct = 1;
                    }
                    else{
                        $is_correct = 0;
                    }

                    //Insert into answers
                    $query = "INSERT INTO answers (question_no, is_correct, answer_text) VALUES
                              ('$question_number', '$is_correct', '$value')";

                    $insert = $conn -> query($query) or die($conn->error.__LINE__);

                    if($insert){
                        continue;
                    }
                    else{
                        echo('Error: '.$conn->errno. '--'. $conn->error);
                    }
                }
                $msg = "Question Inserted Successfully!!";
                $msg_alert = "alert-success";
            }

        }
        else{
            $msg = "Please fill all the fields";
            $msg_alert = "alert-danger";
        }
    }


    //Get Total Questions
    $query = "SELECT * FROM questions";
    $run = $conn -> query($query) or die($conn->error.__LINE__);
    $total = $run->num_rows;
    
?>

<div class="container mt-3">
    <?php if(isset($msg)):  ?>
        <div class="alert <?php echo $msg_alert; ?>"><?php echo $msg; ?></div>
    <?php endif; ?>
    <div class="jumbotron">
    <h2 class="display-5">Add A Question</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="form-group">
                <label>Question No: </label>
                <input type="number" class="form-control" name="question_number" value="<?php echo $total+1; ?>" />
            </div>
            <div class="form-group">
                <label>Question Text: </label>
                <input type="text" class="form-control" name="question_text" />
            </div>
            <div class="form-group">
                <label>Answer 1 </label>
                <input type="text" class="form-control" name="answer1" />
            </div>
            <div class="form-group">
                <label>Answer 2 </label>
                <input type="text" class="form-control" name="answer2" />
            </div>
            <div class="form-group">
                <label>Answer 3 </label>
                <input type="text" class="form-control" name="answer3" />
            </div>
            <div class="form-group">
                <label>Answer 4</label>
                <input type="text" class="form-control" name="answer4" />
            </div>
            <div class="form-group">
                <label>Correct Answer Number</label>
                <input type="number" class="form-control" name="correct_answer" />
            </div>
            <input type="submit" class="btn btn-primary" name="add_submit" />
        </form>
    </div>
</div>

<?php require("./includes/footer.php") ?>