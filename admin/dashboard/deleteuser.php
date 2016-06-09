<?php
include_once '../dbconfig.php';

if(isset($_POST['btn-del']))
{
	$user_id = $_GET['delete_user'];
	$crud->deleteuser($user_id);
	header("Location: deleteuser.php?deleted");	
}

?>

<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">

	<?php
	if(isset($_GET['deleted']))
	{
		?>
        <div class="alert alert-success">
    	<strong>Success!</strong> user sudah dihapus... 
		</div>
        <?php
	}
	else
	{
		?>
        <div class="alert alert-danger">
    	<strong>apa anda yakin ingin menghapus nya ?</strong> 
		</div>
        <?php
	}
	?>	
</div>

<div class="clearfix"></div>

<div class="container">
 	
	 <?php
	 if(isset($_GET['delete_user']))
	 {
		 ?>
         <table class='table table-bordered'>
         <tr>
         <th>Nama User</th>
         <th>Email</th>
         </tr>
         <?php
         $stmt = $DB_con->prepare("SELECT * FROM users WHERE user_id=:user_id");
         $stmt->execute(array(":user_id"=>$_GET['delete_user']));
         while($row=$stmt->fetch(PDO::FETCH_BOTH))
         {
             ?>
             <tr>
                <td><?php print($row['user_name']); ?></td>
                <td><?php print($row['user_email']); ?></td>
             </tr>
             <?php
         }
         ?>
         </table>
         <?php
	 }
	 ?>
</div>

<div class="container">
<p>
<?php
if(isset($_GET['delete_user']))
{
	?>
  	<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>" />
    <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
    </form>  
	<?php
}
else
{
	?>
    <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
    <?php
}
?>
</p>
</div>