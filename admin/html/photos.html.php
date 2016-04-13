<!doctype html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/photo.css">
	<meta charset="utf-8">
	<title>管理照片</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="albums">
	<ul>
<?php foreach ($albums as $album) {?>
		<li><?php echo $album_id == $album["id"] ? $album["name"] : "<a href=photos.php?album=" . $album["id"] . ">" . $album["name"] . "</a>" ?><a class="edit_album" href="control/album.control.php?operation=update">编辑</a><a class="delete_album" href="control/album.control.php?operation=delete&id=<?php echo $album["id"]?>">删除</a></li>
<?php }?>
	</ul>
	<form action="control/album.control.php?operation=add" method="post">
		<input type="text" name="name">
		<input type="submit" value="添加">
	</form>
</div>
<div id="photos">
<p>照片总数：<?php echo $photo_count ?>,<a href="upload_photo.php?album=<?php echo $album_id?>">上传图片</a></p>
<?php foreach ($photos as $photo){?>
	<div class="photo">
	<img src="<?php echo $root . $config ["upload_dir"] . "image/" . $photo["file"]?>"  alt = "<?php echo $photo["file"]?>" />
	<p id="intro"><?php echo $photo["intro"]?></p>
	<span><a class="edit_photo" href="control/photo.control.php?operation=update">编辑</a><a class="delete_photo" href="control/photo.control.php?operation=delete&id=<?php echo $photo["id"]?>">删除</a></span>
	</div>
<?php }?>
<p><?php echo $page > 1 ? "<a href=photos.php?album=".$album_id."&page=".($page-1).">上一页</a>" : "上一页" ?><span><?php echo $page . "/" . $page_count?></span><?php echo $page < $page_count ? "<a href=photos.php?album=".$album_id."&page=".($page+1).">下一页</a>" : "下一页" ?></p>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>