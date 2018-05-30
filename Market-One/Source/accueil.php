<!DOCTYPE html>
<html>
<head>
    <title>Plateforme de vente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/lib/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.12.0.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
      <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
     }
       
    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:100%;
     }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
     @media (max-width: 100px) {
     .carousel-caption {
       display: none; 
      }
    }


    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="accueil.php">Plateforme de vente</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="accueil.php">Home</a></li>
        <li ><a href="commandevenduer.php">vendeur</a></li>
        <li ><a href="listeTous.php">acheteur</a></li>
        

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li> 
        <span class="icon-bar"></span>
        <li><a href="https://www.facebook.com"> facebook </a></li>
        <li><a href="https://twitter.com"> twitter </a></li>
        <li><a href="https://www.instagram.com"> instagram </a></li>
           
      </ul>
    </div>
  </div>
</nav>


<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/31.png" style="width:100%" alt="">
        <div class="carousel-caption">
          <h3 style="background: black">FAITES VOUS PLAISIR A BAS PRIX</h3>
        </div>      
      </div>

       <div class="item ">
        <img src="images/36.png" style="width:100%" alt="">
        <div class="carousel-caption">
          <h3 style="background: black">VIVEZ LA NOUVELLE COLLECTION</h3>
        </div>      
      </div>

      <div class="item ">
        <img src="images/26.png" style="width:100% " alt="">
        <div class="carousel-caption" >
          <h3 style="background: black">CE QUI FERA PLAISIR AU ENFANTS</h3>
        </div>      
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
  
<div class="container text-center">    
  <h3> Les Produits </h3><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="images/37.jpg" class="img-responsive" style="width:100%" alt="">
     <a href="listecleint.php?ctid=1" class="btn btn-info" role="button">Alimentaire</a>


    </div>
    <div class="col-sm-4">
      <img src="images/39.png" class="img-responsive" style="width:100%" alt="">
      <a href="listecleint.php?ctid=2" class="btn btn-info" role="button">Vêtements</a>
    </div>
    <div class="col-sm-4">
      <img src="images/38.png" class="img-responsive" style="width:100%" alt="">
     <a href="listecleint.php?ctid=3" class="btn btn-info" role="button">Jouets</a>

    </div>
  </div>
</div><br>
    <footer>
          <center>
            <font face="arial">&copy; Copyright 2018 Programmation WEB</font>
          </center>
    </footer>
   


</body>
</html>