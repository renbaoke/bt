<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/photos.css">
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/photos.js"></script>
	<title>管理照片</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="albums_upload_photo">
<div id="albums">
	<ul>
<?php foreach ($albums as $album) {?>
		<li><span><?php echo $album_id == $album["id"] ? $album["name"] : "<a href=photos.php?album=" . $album["id"] . ">" . $album["name"] . "</a>" ?></span><a class="edit_album" href="control/album.control.php?operation=update">编辑</a><a class="delete_album" href="control/album.control.php?operation=delete&id=<?php echo $album["id"]?>">删除</a></li>
		<li>
			<form action="control/album.control.php?operation=update" method="post">
				<input type="hidden" name="id" value="<?php echo $album["id"]?>">
				<input type="text" name="name" value="<?php echo $album["name"]?>">
				<input type="submit" value="确定">
				<input type="button" value="取消">
			</form>
		</li>
<?php }?>
	</ul>
	<form action="control/album.control.php?operation=add" method="post">
		<input type="text" name="name">
		<input type="submit" value="添加">
	</form>
</div>
<div id="upload_photo">
	<form action="control/photo.control.php?operation=add" method="post" enctype="multipart/form-data">
<?php foreach ($albums as $album){?>
		<div class="input"><input type="radio" name="album" value="<?php echo $album["id"]?>" <?php if ($album["id"] == $album_id) echo "checked=\"checked\""?>><?php echo $album["name"]?></div>
<?php }?>
		<div class="input"><input type="file" name="photo"></div>
		<div class="input"><textarea rows="3" cols="20" name="intro"></textarea></div>
		<div class="input"><input type="submit" value="上传"></div>
	</form>
</div>
</div>
<div id="photos">
<p>照片总数：<?php echo $photo_count ?></p>
<?php foreach ($photos as $photo){?>
	<div class="photo">
		<img src="<?php echo $root . $config ["upload_dir"] . "image/" . $photo["file"]?>"  alt = "<?php echo $photo["file"]?>">
		<div>
			<p class="intro"><?php echo $photo["intro"]?></p>
			<span><a class="edit_photo" href="control/photo.control.php?operation=update">编辑</a><a class="delete_photo" href="control/photo.control.php?operation=delete&id=<?php echo $photo["id"]?>">删除</a></span>
		</div>
		<div>
			<form action="control/photo.control.php?operation=update" method="post">
				<textarea rows="3" cols="20" name="intro"><?php echo $photo["intro"]?></textarea><br>
				<input type="submit" value="确定">
				<input type="button" value="取消">
			</form>
		</div>
	</div>
<?php }?>
<p><?php echo $page > 1 ? "<a href=photos.php?album=".$album_id."&page=".($page-1).">上一页</a>" : "上一页" ?><span><?php echo $page . "/" . $page_count?></span><?php echo $page < $page_count ? "<a href=photos.php?album=".$album_id."&page=".($page+1).">下一页</a>" : "下一页" ?></p>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>