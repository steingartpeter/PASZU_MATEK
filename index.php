<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="JS/bootstrap421/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="JS/bootstrap421/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/mainStyle.css">

    <script src="JS/jQuery/jquery331.js"></script>
    <script src="JS/popper/popper.js"></script>
    <script src="JS/bootstrap421/js/bootstrap.js"></script>


    <title>INDEX</title>
</head>
<body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" 
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> Kezdőlap <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Alap link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"> Kikapcsolt link </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" 
            href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lenyíló menü</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<main role="main" class="container">

  <div class="starter-template">
    <h1>Alapoldal</h1>
    <p class="lead">Egy alapvető oldal kezdeménye.<br> 
        Itt megvan amit egy nagyon alap webappnak tartlmaznia kell.</p>
  </div>

</main>


</body>
</html>