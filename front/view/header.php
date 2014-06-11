<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="js/main.js"></script>
    
    <style>
        #map-canvas {
            height: 200px;
            width: 100%;
        }
    </style>

</head>
<body>

<nav id="top-bar-menu" class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Share Your World</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main-menu">
      <ul class="nav navbar-nav">
        <li id="menu-last-reviews">
            <a href="#">
                Last reviews
            </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Top places <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li id="menu-top-places-abidjan">
                <a href="list" class="link-ajax">
                    Abidjan Airport
                </a>
            </li>
          </ul>
        </li>
        <li id="menu-search">
            <a href="search" class="link-ajax">
                <span class="text-warning">Search Your Place</span>
            </a>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">
            <i class="glyphicon glyphicon-search"></i>
        </button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container" id="content">