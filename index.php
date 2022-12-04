<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Laundry</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="javascript/indexJava.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><b>Laundry Express</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#process">PROCESS</a></li>
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
        <img src="iklan/wash.jpg" alt="Washing" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Washing</h3>
          <p>Mencuci Pakaian Anda Dengan Alat dan Detergen Terbaik.</p>
        </div>      
      </div>

      <div class="item">
        <img src="iklan/drying.jpg" alt="Dyaring" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Drying</h3>
          <p>Kami Memastikan Agar Pakaian Anda Kering dan Siap Digunakan!</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="iklan/ironing.jpg" alt="Ironing" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Ironing</h3>
          <p>Membuat Pakaian Anda Sempurna Tanpa Merusaknya.</p>
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

<!-- Container (About Laundry Section) -->
<div id="about" class="container text-center">
  <h3>LAUNDRY</h3>
  <p><em>Yuk Laundry!</em></p>
  <p>Takut pakaian Anda rusak karna asal cuci? Ingin praktis, mudah dan Hemat. Mobilitas yang sangat tinggi, sehingga tidak sempat untuk mengurusinya sendiri Ingin menghilangkan noda di pakaian ( noda tinta, getah & Minyak ) ingin pakaian lebih bersih, awet dan wangi Ingin tetap nyaman dan terlihat baru meskipun sering di cuci, yuks ke delivery laundry express kami di jamin amanah 1000%</p>

</div>

<!-- Container (Process Section) -->
<div id="process" class="bg-1">
  <div class="container">
    <h3 class="text-center">OUR SERVICES</h3>
    <div class="row text-center">
        <div class="thumbnail">
          <img src="images/proses.jpg" alt="proses" width="1200" height="700">
          <br>
          <p>Bagaimana Anda Dapat Menggunakan Layanan Kami</p>
          <button class="btn" data-toggle="modal" data-target="#myModal"><a href="login.php"> Pesan Sekarang</a></button>
        </div>
    </div>
  </div>
</div>

<!-- Image of location/map -->
<img src="images/maps.png" class="img-responsive" style="width:100%">

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Delivery Laundry Express<a href="login.php" data-toggle="tooltip" title="Login Sekarang"> Disini</a></p> 
</footer>

</body>
</html>
