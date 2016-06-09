<?php
include_once '../dbconfig.php';
$mysqli = new mysqli('localhost','root', '','db_config');
if(isset($_POST['btn-save']))
{
	$kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];
	$tanggal = $_POST['tanggal'];
    $tempat = $_POST['tempat'];
    $htm = $_POST['htm'];
	$cp = $_POST['cp'];
	$by = date("d");
    $file = $_FILES['gambar']['name'];
    $file_loc = $_FILES['gambar']['tmp_name'];
    $folder = "foto/$file";

    if (move_uploaded_file($file_loc, "$folder")){

        $query = "insert into posting set kategori='$kategori', post_by='$by', judul = '$judul', deskripsi= '$deskripsi', tanggal = '$tanggal' ,tempat = '$tempat' , htm = '$htm' , cp ='$cp' , created_at = '$tanggal', file = '$file'";
        mysqli_query($mysqli,$query);
        header("location:../../index.php");

    }
    else {echo "gagal";}
/*
	if($crud->create($judul,$deskripsi,$tanggal,$tempat,$htm,$cp, $file, $file_loc))
	{
		header("Location: add-data.php?inserted");
	}
	else
	{
		header("Location: add-data.php?failure");
	}
  */  
}

?>
<?php include_once 'header.php'; ?>
<div class="clearfix"></div>

<?php
if(isset($_GET['inserted']))
{
	?>
    <div class="container">
	<div class="alert alert-info">
    <strong>Success!</strong> Data berhasil Ditambah <a href="index.php">HOME</a>!
	</div>
	</div>
    <?php
}
else if(isset($_GET['failure']))
{
	?>
    <div class="container">
	<div class="alert alert-warning">
    <strong>ERROR!</strong> tambah data gagal !
	</div>
	</div>
    <?php
}
?>

<div class="clearfix"></div><br />

<div class="container">

 	
	 <form method='post'  enctype="multipart/form-data">
 
    <table class='table table-bordered'>
        <tr>
            <td>Kategori</td>
            <td><input type='text' name='kategori' class='form-control' required>
            </td>
        </tr>
        <tr>
            <td>Judul</td>
            <td><input type='text' name='judul' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Deskripsi</td>
            <td><input type='text' name='deskripsi' class='form-control' required></td>
        </tr>
        
        <tr>
            <td>Tanggal</td>
            <td><input type='date' name='tanggal' class='form-control' required></td>
        </tr>
 
        <tr>
            <td>Tempat</td>
            <td><input type='text' name='tempat' class='form-control' required></td>
        </tr>

        <tr>
            <td>htm</td>
            <td><input type='text' name='htm' class='form-control' required></td>
        </tr>

        <tr>
            <td>Contact Person</td>
            <td><input type='text' name='cp' class='form-control' required></td>
        </tr>
 
        <tr>
            <td colspan="2">
            <input type="file" name="gambar" /><br>
            <button type="submit" class="btn btn-primary" name="btn-save">
            <span class="glyphicon glyphicon-plus"></span> Tambah Data
			</button>  
            <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Kembali</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>