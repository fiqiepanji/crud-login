<!DOCTYPE html>
<html>
<head>
	<title>Event</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link type="text/css" href="asset/style.css" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">

		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Event Publication</a>
			</div>

			<div id="navbar" class="navbar-collapse collapse">
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="about.php">Menu List</a></li>
						

					</ul>
					<form class="navbar-form navbar-right">
						<div class="form-group">	
							<input type="text" placeholder="search" class="form-control">
							<div class="form-group">
								<button type="submit" class="btn btn-default">cari</button>
							</div>
							<button  type="submit" class="btn btn-success" ><a href=" admin/index.php " style="color:#fff"> login</a></button>
						</form>
					</div><!-- /.navbar-collapse -->
				</div><!--/.navbar-collapse -->
			</nav>
			<div class="container">
				<div class="row">
					<dir class="col-md-12" id="content">
					<div style="width:100%;margin-top:50px;">
						<div style="background:none;width:70%;;padding:2px">
							<h3 style="padding-left:15px">Education</h3>
						<?php
							$mysqli=new mysqli ('localhost', 'root', '' ,'db_config');

							$sql = "SELECT * FROM posting where kategori ='education'";
							$result =mysqli_query($mysqli,$sql) or die(mysqli_eror());
							$no=1;
							while($row = mysqli_fetch_array($result)){
									?>
									<div class="col-md-2" style="border-radius:4px;margin-right:40px;overflow:hidden;width:200px">
										<img src="admin/dashboard/foto/<?php echo $row['file'];?>" alt="img" width="200" height="300">
										<?php echo $row['file'];?>
									</div>
									<?php
								$no++;
							}
						?>

						</div>
						<div style="background:none;width:70%;;padding:2px;clear:both;">
							<h3 style="padding-left:15px"><br/><br/><br/>Entertainment</h3>
						<?php
							$mysqli=new mysqli ('localhost', 'root', '' ,'db_config');

							$sql = "SELECT * FROM posting where kategori ='entertainment'";
							$result =mysqli_query($mysqli,$sql) or die(mysqli_eror());
							$no=1;
							while($row = mysqli_fetch_array($result)){
									?>
									<div class="col-md-2" style="border-radius:4px;margin-right:40px;overflow:hidden;width:200px">
										<img src="admin/dashboard/foto/<?php echo $row['file'];?>" alt="img" width="200" height="300">
										<?php echo $row['file'];?>
									</div>
									<?php
								$no++;
							}
						?>

						</div><br/><br/>
						<div style="background:none;width:70%;;padding:2px;clear:both;">
							<h3 style="padding-left:15px"><br/><br/><br/>Other</h3>
						<?php
							$mysqli=new mysqli ('localhost', 'root', '' ,'db_config');

							$sql = "SELECT * FROM posting where kategori ='other'";
							$result =mysqli_query($mysqli,$sql) or die(mysqli_eror());
							$no=1;
							while($row = mysqli_fetch_array($result)){
									?>
									<div class="col-md-2" style="border-radius:4px;margin-right:40px;overflow:hidden;width:200px">
										<img src="admin/dashboard/foto/<?php echo $row['file'];?>" alt="img" width="200" height="300">
										<?php echo $row['file'];?>
									</div>
									<?php
								$no++;
							}
						?>

						</div><br/><br/>
						<div style="background:red;width:27%;float:right;">
							<div class="col-md-3 pull-right" style="position:absolute;left:900px;top:50px">
							<div class="list-group">
								<a href="#" class="list-group-item active">Liat</a>
								<a href="#" class="list-group-item">Januari</a>
								<a href="#" class="list-group-item">Febuari</a>
								<a href="#" class="list-group-item">Maret</a>
								<a href="#" class="list-group-item">April</a>
								<a href="#" class="list-group-item">Mei</a>
								<a href="#" class="list-group-item">Juni</a>
								<a href="#" class="list-group-item">Juli</a>
								<a href="#" class="list-group-item">Agustus</a>
								<a href="#" class="list-group-item">September</a>
								<a href="#" class="list-group-item">Oktober</a>
								<a href="#" class="list-group-item">November</a>
								<a href="#" class="list-group-item">Desember</a>
							</div>
						</div>
						</div>
					</div>
					


					
					<!================================================================================================================edukasi>
					


						
				</div>
			</div>
	</body>
</html>