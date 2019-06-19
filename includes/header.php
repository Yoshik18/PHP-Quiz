<?php include 'db.php' ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css"
    />
    <link rel="stylesheet" href="styles/style.css" />
    <title>PHP Quiz</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="/php quiz/index.php">PHP Quiz</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarColor01"
          aria-controls="navbarColor01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="/php quiz/add-question.php">Add Question</a> </li>
          </ul>
        </div>
      </div>
    </nav>
