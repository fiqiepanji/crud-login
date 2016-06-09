<?php

class prosses
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	/*membuat postingan baru */
	public function create($judul,$deskripsi,$tanggal,$tempat,$htm,$cp, $file, $file_loc)
	{
		try
		{
			$folder="uploads/".$file;

			if(move_uploaded_file($file_loc, $folder)) {
				$stmt = $this->db->prepare("INSERT INTO posting(judul, deskripsi, tanggal, tempat, htm, cp, file, post_by) VALUES(:judul, :deskripsi, :tanggal, :tempat, :htm, :cp, :file, :post_by)");
				$stmt->bindparam(":judul",$judul);
				$stmt->bindparam(":deskripsi",$deskripsi);
				$stmt->bindparam(":tanggal",$tanggal);
				$stmt->bindparam(":tempat",$tempat);
				$stmt->bindparam(":htm",$htm);
				$stmt->bindparam(":cp",$cp);
				$stmt->bindparam(":file",$file);
				$stmt->bindparam(":post_by",$_SESSION['user_session']);	
				$stmt->execute();
				return true;
			} 
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}

	public function getID($id)
	{
		$stmt = $this->db->prepare("SELECT * FROM posting WHERE id=:id");
		$stmt->execute(array(":id"=>$id));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	/* edit postingan */
	public function update($id,$judul,$deskripsi,$tanggal,$tempat,$htm,$cp)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE posting SET judul=:judul, 
		                                               deskripsi=:deskripsi, 
													   tanggal=:tanggal, 
													   tempat=:tempat,
													   htm=:htm,
													   cp=:cp
													WHERE id=:id");
			$stmt->bindparam(":judul",$judul);
			$stmt->bindparam(":deskripsi",$deskripsi);
			$stmt->bindparam(":tanggal",$tanggal);
			$stmt->bindparam(":tempat",$tempat);
			$stmt->bindparam(":htm",$htm);
			$stmt->bindparam(":cp",$cp);
			$stmt->bindparam(":id",$id);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	/* delete postingan */
	public function delete($id)
	{
		$stmt = $this->db->prepare("DELETE FROM posting WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	
	/* delete user */
	public function deleteuser($user_id) {
		$stmt = $this->db->prepare("DELETE FROM users WHERE user_id=:user_id");
		$stmt->bindparam(":user_id", $user_id);
		$stmt->execute();
		return true;
	}
	
	/* menampilkan data pada halaman admin */
	public function dataview($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['judul']); ?></td>
                <td><?php print($row['deskripsi']); ?></td>
                <td><?php print($row['tempat']); ?></td>
                <td><?php print($row['tanggal']); ?></td>
                <td><?php print($row['cp']); ?></td>
                <td><?php print($row['htm']); ?></td>
                <td><?php print($row['file']); ?></td>
                <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	/* menampilkan data pada menu utama */
	public function dataviewutama($query)
	{

		$stmt = $this->db->prepare($query);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$query2 =  "SELECT * FROM users WHERE user_id = ?";
				$stmt2 = $this->db->prepare($query2);
				$stmt2->execute(array($row['post_by']));
				$row2 = $stmt2->fetch();
				?>
				<div class="row">
					<div class="col-xs-12 col-md-8  col-md-offset-2">
					<div class="panel panel-default">
  						<div class="panel-heading">
					    <h1 class="panel-title"><h1><?php print($row['judul']); ?></h1>
					</div>
					<div class="panel-body">
					<?php print($row['created_at']); ?> oleh <?php print($row2['user_name']); ?><br />
					<br/>
					<div class="col-xs-12 col-md-6">
	               	<img class="img-responsive" src="<?php print "admin/dashboard/uploads/".$row['file'] ?>"/>
	 	  				
	 	  			</div>	
		  			<div class="col-xs-12 col-md-6">

					<table class="table table-striped">
					<tr>
						<td>
							<strong>Description</strong>
						</td>
						<td style="text-align: justify">
							<?php print($row['deskripsi']); ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Time</strong>
						</td>
						<td>
							<?php print($row['tanggal']); ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Place</strong>
						</td>
						<td>
							<?php print($row['tempat']); ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Registration</strong>
						</td>
						<td>
							<?php print($row['htm']); ?>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Contact Person</strong>
						</td>
						<td>
							<?php print($row['cp']); ?>
						</td>
					</tr>
					</table>
	  				</div>
    
				  </div>
				</div>
				</div>

 	  			
	  
	</div>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}

	/* menampilkan data setiap pada halaman admin */
	public function userdataview($query) 
	{	
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['judul']); ?></td>
                <td><?php print($row['deskripsi']); ?></td>
                <td><?php print($row['tempat']); ?></td>
                <td><?php print($row['tanggal']); ?></td>
                <td><?php print($row['cp']); ?></td>
                <td><?php print($row['htm']); ?></td>
                <td><?php print($row['file']); ?></td>
                <td align="center">
                <a href="edit-data.php?edit_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                <a href="delete.php?delete_id=<?php print($row['id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
	}

	/* menampilkan user pada halaman admin */
	public function usertable($userquery)
	{	
		$stmt = $this->db->prepare($userquery);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td><?php print($row['user_name']); ?></td>
                <td><?php print($row['user_email']); ?></td>
                <td align="center">
                <a href="deleteuser.php?delete_user=<?php print($row['user_id']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}	
	}
	
	/* paging */
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */
	
}
