<?php require("./includes/header.php") ?>

<?php 
  //Get number of questions
  $query = "SELECT * FROM questions";
  $result = $conn -> query($query) or die();
  $no_of_questions = $result -> num_rows;
?>
    <div class="container text-center mt-3">
      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1 class="display-3">Test Your Knowledge</h1>
            <p class="lead">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere,
              nihil nobis eos quae cumque in, quas tempore iste deserunt enim
              pariatur incidunt facilis quaerat eveniet.
            </p>
            <ul class="list-group">
              <li class="list-item">
                <strong>Number Of Questions: <?php echo $no_of_questions; ?></strong>
              </li>
              <li class="list-item"><strong>Type Of Quiz: MCQ</strong></li>
              <li class="list-item"><strong>Time: Depends on you</strong></li>
            </ul>
            <a href="questions.php?n=1" class="btn btn-primary mt-1"
              >Start Quiz!!</a
            >
          </div>
        </div>
      </div>
    </div>

    <?php require("./includes/footer.php") ?>