<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>上传照片</title>
</head>
<form action="photo.control.php?operation=add" method="post" enctype="multipart/form-data">
<?php foreach ($albums as $album){?>
	<input type="radio" name="album" value="<?php echo $album["id"]?>" <?php if ($album["id"] == $album_id) echo "checked=\"checked\""?> /><?php echo $album["name"]?>
	
<?php }?>
	<input type="file" name="photo" />
	<textarea rows="" cols="" name="intro"></textarea>
	<input type="submit" value="OK" />
</form>
</html>
