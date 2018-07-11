<?php 
if (isset($_POST['submit'])) {
  include_once('semsol/ARC2.php'); 
  $config = array("remote_store_endpoint" => "http://localhost:2020/sparql");
  $store = ARC2::getRemoteStore($config); 
  $kategori = $_POST['kategori'];
  $brand = $_POST['brand'];
  $gaming="";
  $selfie="";
  $fotografi="";
  $all = "";
  $all2 = "";
  $nama_brand="";
    	if ($brand == 1) {
  		$nama_brand = "Apple";
  	}else if ($brand == 2) {
  		$nama_brand = "Asus";
  	}else if ($brand == 3) {
  		$nama_brand = "Oppo";
  	}else if ($brand == 4) {
  		$nama_brand = "samsung";
  	}else if ($brand == 5) {
  		$nama_brand = "Sony";
  	}else if ($brand == 6) {
  		$nama_brand = "Vivo";
  	}else if ($brand == 7) {
  		$nama_brand = "Xiaomi";
  	}else{
  		$nama_brand="";
  	}

  if ($brand == "allbrand" && $kategori == "allkategori") {
  	$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?id_smartphone ?brand ?tipe ?kapasitas_baterai ?resolusi_kamera_belakang ?resolusi_kamera_depan ?resolusi_layar ?kapasitas_penyimpanan ?prosesor 
					WHERE{
					        ?q vocab:smartphone_id_smartphone ?id_smartphone;
					         vocab:smartphone_id_brand ?id_brand;
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

					         
					         
					}";
                 $all = $store->query($query, 'rows');
  }else if($brand == "allbrand" && $kategori == "gaming"){
			$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?id ?tipe ?brand ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan ?prosesor ?ram
					WHERE{
					  ?p vocab:ram_jumlah_ram ?ram.FILTER(?ram >= 4).
					        ?q vocab:smartphone_id_ram ?p;
					           vocab:smartphone_id_smartphone ?id;
					           vocab:smartphone_tipe ?tipe;
					           vocab:smartphone_id_brand ?id_brand;
					           vocab:smartphone_id_baterai ?id_baterai;
					           vocab:smartphone_id_layar ?id_layar;
					           vocab:smartphone_id_penyimpanan ?id_penyimpanan;
					           vocab:smartphone_id_prosesor ?id_prosesor.
					         ?id_brand vocab:brand_brand ?brand.
					         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
					         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
					         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.         
					         ?id_prosesor vocab:prosesor_prosesor ?prosesor.
					}";
                 $gaming = $store->query($query, 'rows');

  }else if($brand == "allbrand" && $kategori == "fotografi"){
			$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?id ?tipe ?brand ?resolusi_kamera_belakang ?resolusi_kamera_depan ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan
			          WHERE{
			            ?p vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.FILTER(?resolusi_kamera_belakang >= 13).
			                  ?q vocab:smartphone_id_kamera_belakang ?p;
			                  vocab:smartphone_id_smartphone ?id;
			                     vocab:smartphone_tipe ?tipe;
			                     vocab:smartphone_id_brand ?id_brand;
			                     vocab:smartphone_id_baterai ?id_baterai;
			                     vocab:smartphone_id_layar ?id_layar;
			                     vocab:smartphone_id_kamera_depan ?id_kamera_depan;
			                     vocab:smartphone_id_penyimpanan ?id_penyimpanan.
			                   ?id_brand vocab:brand_brand ?brand.
			                   ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
			                   ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
			                   ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.
			                   ?id_kamera_depan vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.          
			          }";
              $fotografi = $store->query($query, 'rows');
  }else if($brand == "allbrand" && $kategori == "selfie"){
				$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
				        PREFIX owl: <http://www.w3.org/2002/07/owl#>
				        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
				        PREFIX vocab: <http://localhost:2020/resource/vocab/>
				        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
				        PREFIX map: <http://localhost:2020/resource/#>
				        PREFIX db: <http://localhost:2020/resource/>
				        SELECT ?id ?tipe ?brand ?resolusi_kamera_belakang ?resolusi_kamera_depan ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan
				            WHERE{
				              ?p vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.FILTER(?resolusi_kamera_depan >= 13).
				                    ?q vocab:smartphone_id_kamera_depan ?p;
				                    vocab:smartphone_id_smartphone ?id;
				                       vocab:smartphone_tipe ?tipe;
				                       vocab:smartphone_id_brand ?id_brand;
				                       vocab:smartphone_id_baterai ?id_baterai;
				                       vocab:smartphone_id_layar ?id_layar;
				                       vocab:smartphone_id_kamera_belakang ?id_kamera_belakang;
				                       vocab:smartphone_id_penyimpanan ?id_penyimpanan.
				                     ?id_brand vocab:brand_brand ?brand.
				                     ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
				                     ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
				                     ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.
				                     ?id_kamera_belakang vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.           

				            }";
              $selfie = $store->query($query, 'rows');
  }else if($brand != "allbrand" && $kategori == "allkategori"){
				$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
				        PREFIX owl: <http://www.w3.org/2002/07/owl#>
				        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
				        PREFIX vocab: <http://localhost:2020/resource/vocab/>
				        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
				        PREFIX map: <http://localhost:2020/resource/#>
				        PREFIX db: <http://localhost:2020/resource/>
				        SELECT ?id_brand ?brand ?tipe ?kapasitas_baterai  ?resolusi_kamera_belakang  ?resolusi_kamera_depan ?resolusi_layar ?kapasitas_penyimpanan ?id
						WHERE{
							?p vocab:brand_id_brand ?id_brand.FILTER(?id_brand = $brand).
						        ?p vocab:brand_brand ?brand.
						        ?q vocab:smartphone_id_brand ?p;
						           vocab:smartphone_tipe ?tipe;
						           vocab:smartphone_id_baterai ?id_baterai;
						           vocab:smartphone_id_kamera_belakang ?id_kamera_belakang;
						           vocab:smartphone_id_kamera_depan ?id_kamera_depan;
						           vocab:smartphone_id_layar ?id_layar;
						vocab:smartphone_id_smartphone ?id;
						           vocab:smartphone_id_penyimpanan ?id_penyimpanan.

						         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
						         ?id_kamera_belakang vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.
						         ?id_kamera_depan vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.
						         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
						         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.

						        
						}";
              $all2 = $store->query($query, 'rows');
  }else if($brand != "" && $kategori == "gaming"){
$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?tipe ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan ?prosesor ?ram ?id
					WHERE{
						?p vocab:ram_jumlah_ram ?ram.FILTER(?ram >= 4).
					        ?q vocab:smartphone_id_ram ?p.
					        ?r vocab:brand_id_brand ?id_brand.FILTER(?id_brand = $brand).
					        ?q vocab:smartphone_id_brand ?r;
					           vocab:smartphone_tipe ?tipe;
					           vocab:smartphone_id_baterai ?id_baterai;
					           vocab:smartphone_id_layar ?id_layar;
					           vocab:smartphone_id_penyimpanan ?id_penyimpanan;
					vocab:smartphone_id_smartphone ?id;
					           vocab:smartphone_id_prosesor ?id_prosesor.

					         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
					         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
					         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.         
					         ?id_prosesor vocab:prosesor_prosesor ?prosesor.

					        
					        
					}";
                 $gaming = $store->query($query, 'rows');
  }else if($brand != "" && $kategori == "fotografi"){
$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?tipe ?resolusi_kamera_belakang ?resolusi_kamera_depan ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan ?id
					WHERE{
						?p vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.FILTER(?resolusi_kamera_belakang >= 13).
					        ?q vocab:smartphone_id_kamera_belakang ?p.
					        ?r vocab:brand_id_brand ?id_brand.FILTER(?id_brand = $brand).
					        ?q vocab:smartphone_id_brand ?r;
					           vocab:smartphone_tipe ?tipe;
					           vocab:smartphone_id_baterai ?id_baterai;
					           vocab:smartphone_id_layar ?id_layar;
					           vocab:smartphone_id_kamera_depan ?id_kamera_depan;
					vocab:smartphone_id_smartphone ?id;
					           vocab:smartphone_id_penyimpanan ?id_penyimpanan.
					         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
					         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
					         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.
					         ?id_kamera_depan vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.          
					}";
                 $fotografi = $store->query($query, 'rows');
  }else if($brand != "" && $kategori == "selfie"){
  	$query = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
			        PREFIX owl: <http://www.w3.org/2002/07/owl#>
			        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
			        PREFIX vocab: <http://localhost:2020/resource/vocab/>
			        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
			        PREFIX map: <http://localhost:2020/resource/#>
			        PREFIX db: <http://localhost:2020/resource/>
			        SELECT ?tipe ?resolusi_kamera_belakang ?resolusi_kamera_depan ?kapasitas_baterai ?resolusi_layar ?kapasitas_penyimpanan ?id
					WHERE{
						?p vocab:kamera_depan_resolusi_kamera_depan ?resolusi_kamera_depan.FILTER(?resolusi_kamera_depan >= 13).
					        ?q vocab:smartphone_id_kamera_depan ?p.
					        ?r vocab:brand_id_brand ?id_brand.FILTER(?id_brand = $brand).
					        ?q vocab:smartphone_id_brand ?r;
					           vocab:smartphone_tipe ?tipe;
					           vocab:smartphone_id_baterai ?id_baterai;
					           vocab:smartphone_id_layar ?id_layar;
					           vocab:smartphone_id_kamera_belakang ?id_kamera_belakang;
					vocab:smartphone_id_smartphone ?id;
					           vocab:smartphone_id_penyimpanan ?id_penyimpanan.
					   
					         ?id_baterai vocab:baterai_kapasitas_baterai ?kapasitas_baterai.
					         ?id_layar vocab:layar_resolusi_layar ?resolusi_layar.
					         ?id_penyimpanan vocab:penyimpanan_kapasitas_penyimpanan ?kapasitas_penyimpanan.
					         ?id_kamera_belakang vocab:kamera_belakang_resolusi_kamera_belakang ?resolusi_kamera_belakang.           

					}
					";
                 $selfie = $store->query($query, 'rows');

  }


}else{
	header("location: index.php");
}
 ?>


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

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Berikut Smartphone yang kamu cari</div>
          
        </div>
      </div>
    </header>

    <!-- Services -->
    <section class="container" id="portfolio" align="center">
<?php if ($gaming!="") {
 echo "<h3>Hasil Pencarian Smartphone Yang Cocok Untuk Gaming dari ". $nama_brand."</h3>";
}elseif ($fotografi!="") {
 echo "<h3>Hasil Pencarian Smartphone Untuk Kamu Yang Suka Fotografi pakai". $nama_brand ."</h3>";
  
} elseif ($selfie!="") {
 echo "<h3>Hasil Pencarian Smartphone Untuk Kamu Yang Suka Selfie pakai brand ". $nama_brand."</h3>";
  # code...
} elseif ($all!="") {
 echo "<h3>Hasil Pencarian Semua Smartphone </h3>";
  # code...
}
?>
<br><br>
    <div class="row">
<?php 

        if($gaming!=""){ 
        	//echo "<pre>";
        	if(empty($gaming)){
        		echo "Hasil Tidak ditemukan";
        	}

        foreach ($gaming as $row){
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="detail.php?id=<?=$row['id']; ?>"><img class="card-img-top" src="assets/img/<?=$row['id']; ?>.jpg" alt="" height="400"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="detail.php?id=<?=$row['id']; ?>"><?=$nama_brand; ?> <?=$row['tipe']; ?></a>
                  </h4>
                  <h5>RAM <?=$row['ram']; ?> GB</h5>
                  <p class="card-text">
                    Memiliki resolusi <?=$row['resolusi_layar']; ?> Inch, dengan prosesor <?=$row['prosesor']; ?> dan penyimpanan sebesar <?=$row['kapasitas_penyimpanan']; ?> GB
                  </p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?=$row['id']; ?>"><small class="text-muted">Detail</small></a>
                </div>
              </div>
            </div>
        <?php } 
        ?>

        <?php }else if($fotografi!=""){
         	if(empty($fotografi)){
        		echo "Hasil Tidak ditemukan";
        	}         

        foreach ($fotografi as $row){
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="detail.php?id=<?=$row['id']; ?>"><img class="card-img-top" src="assets/img/<?=$row['id']; ?>.jpg" alt="" height="400"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="detail.php?id=<?=$row['id']; ?>"><?=$nama_brand; ?> <?=$row['tipe']; ?></a>
                  </h4>
                  <h5>KAMERA BELAKANG <?=$row['resolusi_kamera_belakang']; ?> MP</h5>
                  <p class="card-text">
                    Memiliki resolusi <?=$row['resolusi_layar']; ?> Inch, dengan kamera depan <?=$row['resolusi_kamera_depan']; ?> MP dan penyimpanan sebesar <?=$row['kapasitas_penyimpanan']; ?> GB
                  </p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?=$row['id']; ?>"><small class="text-muted">Detail</small></a>
                </div>
              </div>
            </div>
        <?php } ?>
          <?php
          // echo "<pre>";
          // print_r($fotografi);
          // echo "</pre>";
        } else if ($selfie!="") {
        	        	if(empty($selfie)){
        		echo "Hasil Tidak ditemukan";
        	}
        foreach ($selfie as $row){
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="detail.php?id=<?=$row['id']; ?>"><img class="card-img-top" src="assets/img/<?=$row['id']; ?>.jpg" alt="" height="400"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="detail.php?id=<?=$row['id']; ?>"><?=$nama_brand; ?> <?=$row['tipe']; ?></a>
                  </h4>
                  <h5>KAMERA DEPAN <?=$row['resolusi_kamera_depan']; ?> MP</h5>
                  <p class="card-text">
                    Memiliki resolusi <?=$row['resolusi_layar']; ?> Inch, dengan kamera belakang <?=$row['resolusi_kamera_belakang']; ?> MP dan penyimpanan sebesar <?=$row['kapasitas_penyimpanan']; ?> GB
                  </p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?=$row['id']; ?>"><small class="text-muted">Detail</small></a>
                </div>
              </div>
            </div>
        <?php } 


        }else if ($all!="") {
        foreach ($all as $row){
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="detail.php?id=<?=$row['id_smartphone']; ?>"><img class="card-img-top" src="assets/img/<?=$row['id_smartphone']; ?>.jpg" alt="" height="400"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="detail.php?id=<?=$row['id_smartphone']; ?>"><?=$row['brand']; ?> <?=$row['tipe']; ?></a>
                  </h4>
                  <h5>KAMERA DEPAN <?=$row['resolusi_kamera_depan']; ?> MP</h5>
                  <p class="card-text">
                    Memiliki resolusi <?=$row['resolusi_layar']; ?> Inch, dengan kamera belakang <?=$row['resolusi_kamera_belakang']; ?> MP dan penyimpanan sebesar <?=$row['kapasitas_penyimpanan']; ?> GB
                  </p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?=$row['id_smartphone']; ?>"><small class="text-muted">Detail</small></a>
                </div>
              </div>
            </div>
        <?php } 


        }else if ($all2!="") {
        foreach ($all2 as $row){
          ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="detail.php?id=<?=$row['id']; ?>"><img class="card-img-top" src="assets/img/<?=$row['id']; ?>.jpg" alt="" height="400"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="detail.php?id=<?=$row['id']; ?>"><?=$row['brand']; ?> <?=$row['tipe']; ?></a>
                  </h4>
                  <h5>KAMERA DEPAN <?=$row['resolusi_kamera_depan']; ?> MP</h5>
                  <p class="card-text">
                    Memiliki resolusi <?=$row['resolusi_layar']; ?> Inch, dengan kamera belakang <?=$row['resolusi_kamera_belakang']; ?> MP dan penyimpanan sebesar <?=$row['kapasitas_penyimpanan']; ?> GB
                  </p>
                </div>
                <div class="card-footer">
                  <a href="detail.php?id=<?=$row['id']; ?>"><small class="text-muted">Detail</small></a>
                </div>
              </div>
            </div>
        <?php } 


        }?>
      </div>
    </div>
  </div>


   </div>


    </section>

   

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