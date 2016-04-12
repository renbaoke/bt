<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $is_edit ? "编辑" : "添加" ?>文章</title>
</head>
<form action="control/article.control.php?operation=<?php echo $is_edit ? "update" : "add" ?>" method="post">
	<input type="hidden" name="id" value="<?php if ($is_edit) echo $article["id"]?>" />
<?php if ($article_types !== false) foreach ($article_types as $article_type) { ?>
	<input type="checkbox" name="types[]" value="<?php echo $article_type["id"]?>" <?php if ($is_edit and !empty($article["types"]) and in_array($article_type["id"], $article["types"])) echo "checked=\"checked\""?> /><?php echo $article_type["name"]?>

<?php }?>
	<input type="text" name="title" value="<?php if ($is_edit) echo $article["title"]?>" />
	<textarea rows="" cols="" name="body"><?php if ($is_edit) echo $article["body"]?></textarea>
	<input type="submit" value="<?php echo $is_edit ? "更新" : "添加" ?>" />
</form>
</html>