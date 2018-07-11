<?php 
if (isset($_GET['id'])) {
	include_once('semsol/ARC2.php'); 
	$id = $_GET['id'];
	$config = array("remote_store_endpoint" => "http://localhost:2020/sparql");
  $store = ARC2::getRemoteStore($config); 
  //query untuk menampilkan smartphone berdasarkan id
  $query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
        PREFIX owl: <http://www.w3.org/2002/07/owl#>
        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
        PREFIX vocab: <http://localhost:2020/resource/vocab/>
        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
        PREFIX map: <http://localhost:2020/resource/#>
        PREFIX db: <http://localhost:2020/resource/>
        SELECT ?brand ?tipe ?kapasitas_baterai ?resolusi_kamera_belakang ?resolusi_kamera_depan ?resolusi_layar ?kapasitas_penyimpanan ?prosesor 
WHERE{
        ?q vocab:smartphone_id_smartphone ?id_smartphone.FILTER(?id_smartphone = $id).
        ?q vocab:smartphone_id_brand ?id_brand;
           vocab:smartphone_tipe ?tipe;
           vocab:smartphone_id_baterai ?id_baterai;
           vocab:smartphone_id_kamera_belakang ?id_kamera_belakang;
           vocab:smartphone_id_kamera_depan ?id_kamera_depan;
           vocab:smartphone_id_layar ?id_layar;
           vocab:smartphone_id_penyimpanan ?id_penyimpanan;
           vocab:smartphone_id_prosesor ?id_prosesor.
           
         ?id_brand vocab:brand_brand ?brand.
         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
         ?id_kamera_belakang vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.
         ?id_kamera_depan vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.
         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.         
         ?id_prosesor vocab:prosesor_prosesor ?prosesor.

         
         
}
";
 $result = $store->query($query, 'rows');
}else{
header('location: index.php');
 }?>

 
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Disini Tempatnya Cari Smartphone Android</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/smartphone">Cari Smartphone</a>
        <button id="show" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services"> </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<?php foreach ($result as $row) { ?>
    <!-- Header -->
    <header class="">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in"></div>
          
        </div>
      </div>
    </header>
    <div align="center" class="col-md-12">

    	<br><br><br>
    	<img src="assets/img/<?= $id; ?>.jpg" height="400px"><br><br>
    	<h3><?=$row['brand']; ?> <?=$row['tipe']; ?></h3>
    </div>

    <!-- Services -->
    <section class="container" id="portfolio" align="center">


<br><br>
    <div class="row">
    	<div class="col-md-12" align="center">
    	<h2>Prosesor</h2>
    	<?=$row['prosesor']; ?>
    	<h2>Kamera Depan</h2>
    	<p><?=$row['resolusi_kamera_depan']; ?> MP</p>
    	<h2>Kamera Belakang</h2>
    	<p><?=$row['resolusi_kamera_belakang']; ?> MP</p>
    	<h2>Penyimpanan</h2>
    	<p><?=$row['kapasitas_penyimpanan']; ?> GB</p>
    	<h2>Resolusi Layar</h2>
    	<p><?=$row['resolusi_layar']; ?> Incd</p>
    </div>
    <a href="index.php">BACK TO HOME</a>
   </div>


    </section>
<?php } ?>
   

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Semantic Web 2018</span>
          </div>
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">15523173</a>
              </li>
              <li class="list-inline-item">
                <a href="#">15523249</a>
              </li>
              <li class="list-inline-item">
                <a href="#">15523034</a>
              </li>
              <li class="list-inline-item">
                <a href="#">14523258</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>

