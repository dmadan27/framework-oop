<?php
	$content = "";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Layout</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- load css default -->
		<?php require_once "layout/css/css.php"; ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php 
				require_once "layout/header.php"; 
				require_once "layout/sidebar.php"; 
				// require_once "layout/content.php"; 
				// require_once "layout/footer.php"; 
			?>
			<!-- Content -->
			<div class="content-wrapper">
			    <?= $content; ?>
		  	</div>
		  	<!-- /.content-wrapper -->

		  	<?php require_once "layout/footer.php";  ?>


		</div>

		<!-- load default js -->
		<?php require_once "layout/js/js.php"; ?>
	</body>
</html>