<?php
include_once '../dbconfig.php';
if(!$user->is_loggedin())
{
 $user->redirect('../index.php');
}
$user_id = $_SESSION['user_session'];
$stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="../style.css" type="text/css"  />
<title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

<div class="header">
 <div class="left">
     <label><a href="../../index.php">Eventpublication</a></label>
    </div>
    <div class="right">
     <label><a href="../logout.php?logout=true"><i class="glyphicon glyphicon-log-out"></i> logout</a></label>
    </div>
</div>
<div class="content">
welcome : <?php print($userRow['user_name']); ?>
</div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i>&nbsp;Tambah Data</a>
</div>
<div class="container">
  <div class="row">
  <div class="col-xs-12 col-md-12 col-md-offset-0">
     <?php $mysqli=new mysqli ('localhost', 'root', '' ,'db_config'); ?>
     <table class="table table-striped">
     <tr>
       <th>Judul</th>
       <th>Deskripsi</th>
       <th>Tempat</th>
       <th>Tanggal</th>
       <th>CP</th>
       <th>HTM</th>
       <th>image</th>
       <th colspan="2" align="center">Actions</th>
     </tr>
     <?php
             $sql = "SELECT * FROM posting";
              $result =mysqli_query($mysqli,$sql) or die(mysqli_eror());
              $no=1;
              while($row = mysqli_fetch_array($result)){
                  ?>
                  <tr>
                  <td><?php echo $row['judul'];?></td>
                  <td><?php echo $row['deskripsi'];?></td>
                  <td><?php echo $row['tempat'];?></td>
                  <td><?php $tanggal = $row['tanggal']; echo date("d F Y", strtotime($tanggal));?></td>
                  <td><?php echo $row['cp'];?></td>
                  <td>Rp <?php $harga=number_format($row['htm'],0,",","."); echo"$harga";?>,00
                  </td>
                  <td><?php echo $row['file'];?></td>
                  <td>
                    <a href="index.php?menu=hapus&id=<?php echo $row['judul'];?>">Hapus</a>
                  </td>
                  </tr>
                  <?php
                $no++;
              }
              ?>
</table>
</div>
    
</div>
</div>
  <?php 
  if (empty($_GET['menu'])) {
  }else{
    switch ($_GET['menu']) {
      case 'hapus':
          $id = $_GET['id'];
          $query = "delete from posting where judul='$id'";
          if( $mysqli->query($query) ){
              header("location:index.php");
          }
        break;
      
      default:
        
        break;
    }
  }?>
</body>
</html>