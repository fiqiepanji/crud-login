<!DOCTYPE html>
<html>
<head>
	<title>list menu</title>
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
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">Menu List</a></li>
						<li><a href="index.html">Contact Us</a></li>
					</ul>
					<form class="navbar-form navbar-right">
						<div class="form-group">	
							<input type="text" placeholder="search" class="form-control">
							<div class="form-group">
								<button type="submit" class="btn btn-default">cari</button>
							</div>
							
						</form>
					</div><!-- /.navbar-collapse -->
				</div><!--/.navbar-collapse -->
			</nav>
	
			 <div id="cont" class="container">
              	<br/><br/><br/><br/>
						<?php
							$mysqli=new mysqli ('localhost', 'root', '' ,'db_config');

							$sql = "SELECT * FROM posting";
							$result =mysqli_query($mysqli,$sql) or die(mysqli_eror());
							$no=1;
							while($row = mysqli_fetch_array($result)){
							?>
								<div class="row">
									<div class="col-xs-12 col-md-8  col-md-offset-2">
									<div class="panel panel-default">
				  						<div class="panel-heading">
									    <h1 class="panel-title"><h1><?php echo $row['judul'];?></h1>
									</div>
									<div class="panel-body">
									
									<div class="col-xs-12 col-md-6">
					               	<img src="admin/dashboard/foto/<?php echo $row['file'];?>" alt="img" width="225" height="300">
					 	  				
					 	  			</div>	
						  			<div class="col-xs-12 col-md-6">

									<table class="table table-striped">
									<tr>
										<td>
											<strong>Description</strong>
										</td>
										<td style="text-align: justify">
											<?php echo $row['deskripsi'];?>
										</td>
									</tr>
									<tr>
										<td><strong>Date</strong></td>
										<td><?php $tanggal = $row['tanggal']; echo date("d F Y", strtotime($tanggal));?></td>
									</tr>
									<tr>
										<td><strong>Place</strong>
										</td>
										<td><?php echo $row['tempat'];?></td>
									</tr>
									<tr>
										<td><strong>Contact Person</strong>
										</td>
										<td><?php echo $row['cp'];?></td>
									</tr>
									</table>
					  				</div>
				    
								  </div>
								</div>
								</div>
							</div>
									<?php
								$no++;
							}
						?>
            <div colspan="7" align="center">
                <div class="pagination-wrap">
                  <ul class="pagination"><li><a href='/index.php?page_no=1' style='color:red;'>1</a></li></ul>                </div>
            </div>
    </div>


      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div>
    </div>
  </body>

</body>
</html>