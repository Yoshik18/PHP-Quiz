<?php require("./includes/header.php") ?>

<?php
  session_start();

  $number = (int) $_GET['n'];
  //Get Total Questions
  $query = "SELECT * FROM questions";
  $result = $conn -> query($query) or die();
  $no_of_questions = $result -> num_rows;
  
  //Get Question
  $query = "SELECT * FROM questions WHERE question_no = $number";
  $result = $conn -> query($query) or die();
  $question = $result->fetch_assoc();


  //Get Answers
  $query = "SELECT * FROM answers WHERE question_no = $number";
  $results = $conn -> query($query) or die();

  

?>

<div class="container mt-3">
      <div class="jumbotron">
        <h2 class="current display-5">Question <?php echo $question['question_no']; ?> of <?php echo $no_of_questions; ?></h2>
        <p class="question mt-4"><b><?php echo $question['question_text']; ?></b></p>
        <form action="action.php" method="POST">
          <?php while($answers = $results->fetch_assoc()): ?>
          <div class="form-group">
              <input type="radio" name="answer" value="<?php echo $answers['id'] ?>" /><?php echo $answers['answer_text'] ?>
          </div>
          <?php endwhile; ?>
          <input class="btn btn-primary mt-3" type="submit" value="Submit" />
          <input type="hidden" name="number" value="<?php echo $number; ?>" />
        </form>
      </div>
    </div>

<?php require("./includes/footer.php") ?>