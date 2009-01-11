<? 
header("Content-Type: text/html; charset=UTF-8"); 
$this->load->helper('url');
?>
<html>
<head>
	<title> <?=$title?> </title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>
<body>
	<h1><?=$heading?> </h1>
	
	<ol>
		<?php foreach($query->result() as $row): ?>
		<li><?=$row->firstName ?>, <?=$row->lastName ?></li>
		<?php endforeach; ?>
	</ol>
	
	<script type="text/javascript">
		function handlerAdd() {

			var url = "<?php echo site_url("student/add/");?>" + document.getElementById("data").value;
			location.href = url;
			
		}
	</script>

	<form action="add" method="post">
	<input type="hidden" name="data" id="data" value="<?=$tem?>">
	<button type="summit" >OK</button>
	</form>
</body>
</html>