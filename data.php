<?php 
$koneksi = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($koneksi, "smartphone");
if(!$db){
    die("Tidak bisa menggunakan database :".mysqli_error());
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Data</h2>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Data Smartphone</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
        <form method="post" style="margin-left: 10%; margin-right: 10%; ">
              <h2><u>Tambah Data</u></h2>
              <div class="form-group">
                <label for="tipe">tipen</label>
                <input type="text" class="form-control"  name="tipe" required>
              </div>
              <div class="form-group">
                <label for="sel1">Brand:</label>
                <select class="form-control" id="sel1" name="brand">
                  <option value="1">Apple </option>
                  <option value="2">Asus</option>
                  <option value="3">Oppo</option>
                  <option value="4">Samsung</option>
                  <option value="5">sony  </option>
                  <option value="6">vivo</option>
                  <option value="7">xiaomi</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sel2">Baterai:</label>
                <select class="form-control" id="sel2" name="baterai">
                  <option value="1">1800</option>
                  <option value="2">2000</option>
                  <option value="3">2100</option>
                  <option value="4">2500</option>
                  <option value="5">2800  </option>
                  <option value="6">3000</option>
                  <option value="7">3400</option>
                  <option value="8">3500</option>
                  <option value="9">3800</option>
                  <option value="10">4000</option>
                  <option value="11">4500</option>
                  <option value="12">5000</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sel3">kamerabelakang:</label>
                <select class="form-control" id="sel3" name="kamerabelakang">
                  <option value="1">5</option>
                  <option value="2">8</option>
                  <option value="3">12</option>
                  <option value="4">13</option>
                  <option value="5">16  </option>
                  <option value="6">20</option>
                  <option value="7">24</option>
                </select>
              </div>
                            <div class="form-group">
                <label for="sel4">kameradepan:</label>
                <select class="form-control" id="sel4" name="kameradepan">
                  <option value="1">2</option>
                  <option value="2">5</option>
                  <option value="3">8</option>
                  <option value="4">12</option>
                  <option value="5">13  </option>
                  <option value="6">26</option>
                  <option value="7">20</option>
                  <option value="8">24</option>

                </select>
              </div>
                <div class="form-group">
                <label for="sel5">layar:</label>
                <select class="form-control" id="sel5" name="layar">
                  <option value="1">3</option>
                  <option value="2">3.5</option>
                  <option value="3">4</option>
                  <option value="4">4.5</option>
                  <option value="5">5 </option>
                  <option value="6">5.5</option>
                  <option value="7">6</option>
                  <option value="8">6.5</option>
                  <option value="8">7</option>
                </select>
              </div>
                <div class="form-group">
                <label for="sel6">penyimpanan:</label>
                <select class="form-control" id="sel6" name="penyimpanan">
                  <option value="1">8</option>
                  <option value="2">16</option>
                  <option value="3">32</option>
                  <option value="4">64</option>
                  <option value="5">128</option>
                  <option value="6">256</option>
                </select>
              </div>
                <div class="form-group">
                <label for="sel7">prosesor:</label>
                <select class="form-control" id="sel7" name="prosesor">
                  <option value="1">intel</option>
                  <option value="2">mediatek</option>
                  <option value="3">snapdragon</option>
                </select>
              </div>
                <div class="form-group">
                <label for="sel8">ram:</label>
                <select class="form-control" id="sel8" name="ram">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">6</option>
                  <option value="6">8</option>

                </select>
              </div>
                              <div class="form-group">
                <label for="sel9">versios:</label>
                <select class="form-control" id="sel9" name="versios">
                  <option value="1">j</option>
                  <option value="2">k</option>
                  <option value="3">l</option>
                  <option value="4">m</option>
                  <option value="5">n</option>
                  <option value="6">o</option>

                </select>
              </div>
              <button type="submit" class="btn btn-primary zz" name="submit">Submit</button>
            </form><br><br>
            <?php 
              if(isset($_POST['submit'])){
                echo $baterai = $_POST['baterai'];
                echo $brand = $_POST['brand'];
                echo $tipe = $_POST['tipe'];
                echo $kameradepan = $_POST['kameradepan'];
                echo $kamerabelakang = $_POST['kamerabelakang'];
                echo $layar = $_POST['layar'];
                echo $penyimpanan = $_POST['penyimpanan'];
                echo $prosesor = $_POST['prosesor'];
                echo $ram = $_POST['ram'];
                echo $versios = $_POST['versios'];









                $query = mysqli_query($koneksi, "INSERT INTO `smartphone`(`id_brand`, `tipe`, `id_baterai`, `id_kamera_belakang`, `id_kamera_depan`, `id_layar`, `id_penyimpanan`, `id_prosesor`, `id_ram`, `id_versi_os`) VALUES ('$brand','$tipe','$baterai','$kamerabelakang','$kameradepan','$layar','$penyimpanan','$prosesor','$ram', '$versios')");            
                if ($query) {
                              echo "<script>alert('sukses')</script>";
                            }            
                }
             ?>


<?php 
if (isset($_GET['id_pelanggan'])) {
  $id_pel = $_GET['id_pelanggan'];
  mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = '$id_pel'");
}
 ?>

          </div>
        </div>
      </div>
    </div>
   
</div> 
</body>
</html>
