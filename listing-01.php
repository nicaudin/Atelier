

<?php 
require_once('inc/init.php');
$r = $pdo->query("SELECT * FROM cars"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="SH Auto - Achats et ventes de véhicules d'occasion" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>SH Auto - Achats et ventes de véhicules d'occasion</title>

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

<!-- flaticon -->
<link rel="stylesheet" type="text/css" href="css/flaticon.css" />

<!-- mega menu -->
<link rel="stylesheet" type="text/css" href="css/mega-menu/mega_menu.css" />

<!-- mega menu -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

<!-- jquery-ui -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" >

<!-- main style -->
<link rel="stylesheet" type="text/css" href="css/style.css" />

<!-- responsive -->
<link rel="stylesheet" type="text/css" href="css/responsive.css" />

<!-- logo font -->
<link href="https://fonts.googleapis.com/css?family=Sonsie+One" rel="stylesheet">
 
</head>

<body>
 
<!--=================================
  loading -->
  
 <div id="loading">
  <div id="loading-center">
      <img src="images/loader.gif" alt="">
 </div>
</div>

<!--=================================
  loading -->
  

<!--=================================
 header -->

<header id="header" class="defualt">
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="topbar-left text-lg-left text-center">
           <ul class="list-inline">
             <li> <i class="fa fa-envelope-o"> </i> contact@lethauto.com</li> 
             <li> <i class="fa fa-clock-o"></i> Lun - Sam 9.00 - 19.00. Dim Fermé</li>
           </ul>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="topbar-right text-lg-right text-center">
           <ul class="list-inline">
             <li> <i class="fa fa-phone"></i> (+33) 7 82 14 81 41</li> 
             <li><a href="https://www.facebook.com/sam.lethauto.39"><i class="fa fa-facebook"></i></a></li>   
             <li><a href="https://www.instagram.com/sam.shauto/"><i class="fa fa-instagram"></i></a></li>
           </ul>
        </div>
      </div>
    </div>
  </div>
</div>
 
<!--=================================
 mega menu -->

<div class="menu">  
  <!-- menu start -->
   <nav id="menu" class="mega-menu">
    <!-- menu list items container -->
    <section class="menu-list-items">
     <div class="container"> 
      <div class="row"> 
       <div class="col-md-12"> 
        <!-- menu logo -->
        <ul class="menu-logo">
            <li>
                <a href="index.php"><img id="logo_img" src="images/logo2.png" alt="logo" style="filter: brightness(0) invert(1);"> </a>
                <p id="company-name" style="font-family: 'Sonsie One', cursive;color:white;text-align:center"> SH Auto </p>
            </li>
        </ul>
        <!-- menu links -->
        <ul class="menu-links">
            <li><a href="index.php"> Accueil</a>
            </li>
            <li class="active"><a href="listing-01.php">Voitures <i class="fa fa-angle-down fa-indicator"></i></a>

                <ul class="drop-down-multilevel">
                    <li><a href="purchase.php">Achat</a></li>
                    <li><a href="listing-01.php">Vente</a></li>
                    <li><a href="car-demand.php">Demande précise</a></li>
                </ul>
            </li>
            <li><a href="contact.php"> Contact </a>

            </li>
            <li><a href="opinion.php">Avis </a> 
            </li>
            
            </ul>
           </div>
          </div>
         </div>
        </section>
       </nav>
     </div>
</header>
 
 <section class="inner-intro bg-22 bg-overlay-black-70">
  <div class="container">
     <div class="row text-center intro-title">
           <div class="col-md-6 text-md-left d-inline-block">
             <h1 class="text-white">Notre parc </h1>
           </div>
           <div class="col-md-6 text-md-right float-right">
     </div>
  </div>
</section>

<section class="product-listing page-section-ptb">
 <div class="container">
  <div class="row">
   
     <div class="col-lg-12 col-md-12">
       
        <div class="row">


<?php while($cars = $r->fetch(PDO::FETCH_ASSOC)) {  ?>
          <!-- INSERT NEW VEHICULES FROM HERE -->

          <!-- RENDRE CETTE PARTIE DYNAMIQUE -->
          <!-- SELECTIONNER EN BASE TOUTES LES VOITURES DISPO ET ITÉRER DANS LA CARD -->

          <div class='col-lg-4'><div class='car-item gray-bg text-center'><div class='car-image'><img class='img-fluid' src='<?php echo $cars["imgs"];?>' alt=''><div class='car-overlay-banner'><ul> <li><a href="cars/descriptif_vehicule.php?id_car=<?php echo $cars['id_car'] ?>"><i class='fa fa-link'></i></a></li><!--<li><a href='#'><i class='fa fa-shopping-cart'></i></a></li>--></ul></div></div><div class='car-list'><ul class='list-inline'><li><i class='fa fa-registered'></i> <?php echo $cars["year"];?></li><li><i class='fa fa-cog'></i><?php echo $cars["gearbox"];?> </li><li><i class='fa fa-shopping-cart'></i><?php echo $cars["km"];?></li></ul></div><div class='car-content'><div class='star'><i class='fa fa-star orange-color'></i><i class='fa fa-star orange-color'></i><i class='fa fa-star orange-color'></i><i class='fa fa-star orange-color'></i><i class='fa fa-star-o orange-color'></i></div><a href='#'><?php echo $cars["brand_car"];?></a><div class='separator'></div><div class='price'><span class='old-price'><?php echo $cars["old_seiling_price"];?></span><span class='new-price'><?php echo $cars["seiling_price"];?></span></div></div></div></div>

         
 <?php } ?>

       </div>
     </div>
  </div>
</section>

<!--=================================
product-listing  -->
 
 
<!--=================================
 footer -->

<footer class="footer bg-2 bg-overlay-black-90">
  <div class="container">
    <div class="row">
     <div class="col-md-12">
      <div class="social" style="margin-bottom:40px">
        <ul>
          <li style="opacity:0"><a class="pinterest" href="#">pinterest <i class="fa fa-pinterest-p"></i> </a></li>
          <li style="opacity:0"><a class="dribbble" href="#">dribbble <i class="fa fa-dribbble"></i> </a></li>
          <li><a class="facebook" href="https://www.facebook.com/sam.lethauto.39">facebook <i class="fa fa-facebook"></i> </a></li>
          <li><a class="twitter" href="https://www.instagram.com/sam.shauto/">instagram <i class="fa fa-instagram"></i> </a></li>
          <li style="opacity:0"><a class="google-plus" href="#">google plus <i class="fa fa-google-plus"></i> </a></li>
          <li style="opacity:0"><a class="behance" href="#">behance <i class="fa fa-behance"></i> </a></li>
        </ul>
       </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="about-content">
          <img class="img-fluid" id="logo-footer" src="images/logo2.png" alt="" style="filter: brightness(0) invert(1);">
          <p id="company-name" style="font-family: 'Sonsie One', cursive;color:white;margin-top: 10px;"> SH Auto</p>
          <p>SH Auto est spécialisé dans la vente et l'achat de véhicules d'occasions et vous propose également des services de réparations pour l'entretien de votre véhicule. </p>
        </div>
        <div class="address">
          <ul>
            <li style="margin-bottom:0px;padding-bottom:0px"><span>68 Rue Boucicaut</span> </li>
            <li><span>92260 Fontenay-aux-Roses</span> </li>
            <li> <i class="fa fa-phone"></i><span>(+33) 7 82 14 81 41</span> </li>
            <li> <i class="fa fa-envelope-o"></i><span>contact@lethauto.com</span> </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="usefull-link">
        <h6 class="text-white">Liens Utils</h6>
          <ul>
            <li><a href="listing-01.php"><i class="fa fa-angle-double-right"></i> Vente de véhicules </a></li>
            <li><a href="purchase.php"><i class="fa fa-angle-double-right"></i> Achat de véhicules</a></li>
            <li><a href="mecanic.php"><i class="fa fa-angle-double-right"></i> Préstations liées à la mécanique</a></li>
            <li><a href="purchase.php"><i class="fa fa-angle-double-right"></i> Devis pour achat de véhicule </a></li>
            <li><a href="cost-estimate.php"><i class="fa fa-angle-double-right"></i> Devis pour réparation de véhicule</a></li>
          </ul>
        </div> 
      </div>
      <div class="col-lg-3 col-md-6">
       <div class="recent-post-block">
        <h6 class="text-white">Dernières actualités </h6>
          <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/01.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.php">Salon de l'auto</a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
         <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/02.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.php">Classiques des 80's </a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
         <div class="recent-post">
            <div class="recent-post-image">
              <img class="img-fluid" src="images/car/03.jpg" alt=""> 
            </div>
            <div class="recent-post-info">
                <a href="events.php">"Avoir un joint de culasse?" </a>
                <span class="post-date"><i class="fa fa-calendar"></i>10 Septembre 2017</span>
            </div>
         </div>
       </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="news-letter">
        <h6 class="text-white">Inscrivez-vous à notre newsletter </h6>
         <p>Inscrivez-vous à notre newsletter pour ne rien manquer quant à l'entrée de nouveaux véhicules dans notre parc automobile.</p>
         <form class="news-letter">
           <input type="email" placeholder="Entrez votre courriel" class="form-control placeholder">
           <a class="button red" href="#">S'inscrire</a>
         </form>
        </div> 
      </div>
    </div>
    <hr />
    <div class="copyright">
     <div class="row">
      <div class="col-lg-6 col-md-12">
       <div class="text-lg-left text-center">
        <p>©Copyright 2018 SH Auto </a></p>
       </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <ul class="list-inline text-lg-right text-center">
          <li><a href="terms-and-conditions.php"> Conditions générales </a> |</li> 
          <li><a href="contact.php"> Nous contacter </a></li>
        </ul>
      </div>
     </div>
    </div>
  </div>
</footer>
 
<!--=================================
 footer -->
 
 

 <!--=================================
 back to top -->

<div class="car-top">
  <span><img src="images/car.png" alt=""></span>
</div>

 <!--=================================
 back to top -->
 

<!--=================================
 jquery -->

<!-- jquery  -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
 
<!-- bootstrap -->
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- mega-menu -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

<!-- jquery-ui -->
<script type="text/javascript" src="js/jquery-ui.js"></script>

<!-- select -->
<script type="text/javascript" src="js/select/jquery-select.js"></script>

<!-- magnific popup -->
<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
 
<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>
  
</body>
</html>
