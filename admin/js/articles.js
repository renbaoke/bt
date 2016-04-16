window.onload = function() {
	confirmDelete("#articles", "delete_article");
	confirmDelete("#types", "delete_article_type");
	Array.prototype.forEach.bind(document.querySelectorAll("form"))(formAjax);
	showEdit("#types", "LI")
}