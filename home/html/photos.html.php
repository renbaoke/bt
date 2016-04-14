<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../smile.ico">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/photos.css">
	<title>我的照片</title>
</head>
<body>
<?php require 'html/header.html.php';?>
<div id="albums">
	<ul>
<?php foreach ($albums as $album) {?>
		<li><?php echo $album_id == $album["id"] ? $album["name"] : "<a href=photos.php?album=" . $album["id"] . ">" . $album["name"] . "</a>" ?></li>
<?php }?>
	</ul>
</div>
<div id="photos">
<p>照片总数：<?php echo $photo_count ?></p>
<?php foreach ($photos as $photo){?>
	<div class="photo">
		<img src="<?php echo $root . $config ["upload_dir"] . "image/" . $photo["file"]?>"  alt = "<?php echo $photo["file"]?>">
		<p id="intro"><?php echo $photo["intro"]?></p>
	</div>
<?php }?>
<p><?php echo $page > 1 ? "<a href=photos.php?album=".$album_id."&page=".($page-1).">上一页</a>" : "上一页" ?><span><?php echo $page . "/" . $page_count?></span><?php echo $page < $page_count ? "<a href=photos.php?album=".$album_id."&page=".($page+1).">下一页</a>" : "下一页" ?></p>
</div>
<?php require 'html/footer.html.php';?>
</body>
</html>