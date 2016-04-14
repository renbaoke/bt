<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/files.css">
	<title>我的文件</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="files">
	<table>
		<tr>
			<th>No.</th>
			<th>文件名</th>
			<th>上传时间</th>
			<th>文件大小</th>
		</tr>
<?php foreach ($files as $no => $file){?>
		<tr>
			<td><?php echo $no - 1?></td>
			<td><?php echo "<a href=".$root.$config["upload_dir"]."file/".$current_dir.$file["name"].">".$file["name"]."</a>" ?></td>
			<td><?php echo $file["ctime"]?></td>
			<td><?php echo $file["size"]?></td>
		</tr>
<?php }?>
	</table>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>