<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>我的照片</title>
</head>
<?php require 'html/header.html.php';?>
<div id="albums">
	<ul>
<?php foreach ($albums as $album) {?>
		<li><?php echo $album_id == $album["id"] ? $album["name"] : "<a href=photos.php?album=" . $album["id"] . ">" . $album["name"] . "</a>" ?></li>
<?php }?>
	</ul>
</div>
<div id="photos">
<p>照片总数：<?php echo $photo_count ?>,<a href="upload_photo.php?album=<?php echo $album_id?>">上传图片</a></p>
<?php foreach ($photos as $photo){?>
	<div id="photo">
	<p>ID：<?php echo $photo["id"]?><br />
	简介：<?php echo $photo["intro"]?><br />
	<a href="photo.control.php?operation=delete&id=<?php echo $photo["id"]?>">删除</a>
	</p>
	<img src="<?php echo $root . $config ["upload_dir"] . "image/" . $photo["file"]?>"  alt = "<?php echo $photo["file"]?>" />
	</div>
<?php }?>
<p>
<?php echo $page > 1 ? "<a href=photos.php?album=".$album_id."&page=".($page-1).">上一页</a>" : "上一页" ?>
<?php echo $page . "/" . $page_count?>
<?php echo $page < $page_count ? "<a href=photos.php?album=".$album_id."&page=".($page+1).">下一页</a>" : "下一页" ?>
</p>
</div>
<?php require 'html/footer.html.php';?>
</html>