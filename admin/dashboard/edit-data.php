<?php
include_once '../dbconfig.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $tempat = $_POST['tempat'];
    $htm = $_POST['htm'];
    $cp = $_POST['cp'];
	
	if($crud->update($id,$judul,$deskripsi,$tanggal,$tempat,$htm,$cp))
	{
		$msg = "<div class='alert alert-info'>
				<strong>Success</strong> Data berhasil di update ... <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>ERROR</strong> Update data gagal
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
<?php
if(isset($msg))
{
	echo $msg;
}
?>
</div>

<div class="clearfix"></div><br />

<div class="container">
	 
     <form method='post'>
 
    <table class='table table-bordered'>
 
        <tr>
            <td>Judul </td>
            <td><input type='text' name='judul' class='form-control' value="<?php echo $judul; ?>" required></td>
        </tr>
 
        <tr>
            <td>Deskripsi</td>
            <td><input type='text' name='deskripsi' class='form-control' value="<?php echo $deskripsi; ?>" required></td>
        </tr>
 
        <tr>
            <td>Tanggal</td>
            <td><input type='text' name='tanggal' class='form-control' value="<?php echo $tanggal; ?>" required></td>
        </tr>
 
        <tr>
            <td>Tempat</td>
            <td><input type='text' name='tempat' class='form-control'value="<?php echo $tempat; ?>" required></td>
        </tr>

        <tr>
            <td>htm</td>
            <td><input type='text' name='htm' class='form-control' value="<?php echo $htm; ?>" required></td>
        </tr>

        <tr>
            <td>Contact Person</td>
            <td><input type='text' name='cp' class='form-control' value="<?php echo $cp; ?>" required></td>
        </tr>
 
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Batal</a>
            </td>
        </tr>
 
    </table>
</form>
     
     
</div>