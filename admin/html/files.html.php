<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/files.css">
	<meta charset="utf-8">
	<title>管理文件</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="files">
	<form action="control/file.control.php?operation=upload" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" value="上传">
	</form>
	<table>
		<tr>
			<th>No.</th>
			<th>文件名</th>
			<th>上传时间</th>
			<th>文件大小</th>
			<th>操作</th>
		</tr>
<?php foreach ($files as $no => $file){?>
		<tr>
			<td><?php echo $no - 1?></td>
			<td><?php echo "<a href=".$root.$config["upload_dir"]."file/".$current_dir.$file["name"].">".$file["name"]."</a>" ?></td>
			<td><?php echo $file["ctime"]?></td>
			<td><?php echo $file["size"]?></td>
			<td><a class="delete_file" href="control/file.control.php?operation=delete&file=<?php echo $file["name"]?>">删除</a></td>
		</tr>
<?php }?>
	</table>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>