<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  	<h1>
	    	<?= $this->title['main']; ?>
	    	<small><?= $this->title['sub']; ?></small>
	  	</h1>
	  	<!-- breadcrumb -->
	  	<ol class="breadcrumb">
	    	<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
	    	<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
	    	<li class="active">Here</li>
	  	</ol>
	  	<!-- end breadcrumb -->

	</section>
	<!-- Main content -->
	<section class="content container-fluid">
		<table class="table">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Umur</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($this->data as $key => $value) {
						echo "<tr>";
						foreach($value as $row){
							echo "<td>".$row."</td>";
							echo "<td>".$row."</td>";
						}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</section>
	<!-- /.content -->
</div>