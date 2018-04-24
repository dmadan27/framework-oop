<?php
	// include content
	


?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Test</title>
</head>
<body>
	<h1>Ini Halaman Test</h1>
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Umur</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				foreach($data as $row){
					echo "<tr>";
					echo "<td>".$i++."</td>";
					foreach($row as $value){
						echo "<td>".$value."</td>";
					}
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</body>
</html>