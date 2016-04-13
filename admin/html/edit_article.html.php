<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/edit_article.css">
	<title><?php echo $is_edit ? "编辑" : "添加" ?>文章</title>
</head>
<body>
<?php require 'html/header.html.php';?>
	<form action="control/article.control.php?operation=<?php echo $is_edit ? "update" : "add" ?>" method="post">
		<input type="hidden" name="id" value="<?php if ($is_edit) echo $article["id"]?>">
		<div id="article_type">
<?php if ($article_types !== false) foreach ($article_types as $article_type) { ?>
			<div class="input"><input type="checkbox" name="types[]" value="<?php echo $article_type["id"]?>" <?php if ($is_edit and !empty($article["types"]) and in_array($article_type["id"], $article["types"])) echo "checked=\"checked\""?>><?php echo $article_type["name"]?></div>
<?php }?>
		</div>
		<div id="edit_article">
			<div class="input"><input type="text" id="title" name="title" value="<?php if ($is_edit) echo $article["title"]?>"></div>
			<div class="input"><textarea rows="36" cols="90" name="body"><?php if ($is_edit) echo $article["body"]?></textarea></div>
			<div class="input"><input type="submit" value="<?php echo $is_edit ? "更新" : "添加" ?>"></div>
		</div>
	</form>
</body>
</html>