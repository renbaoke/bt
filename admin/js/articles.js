function refresh(message) {
	alert(message);
	location.reload();
}

function error(message) {
	alert(message);
}

function formAjaxArticle(selector) {
	formAjax(selector, refresh, error);
}

window.onload = function() {
	confirmDelete("#articles", "delete_article", refresh, error);
	confirmDelete("#types", "delete_article_type", refresh, error);
	Array.prototype.forEach.bind(document.querySelectorAll("form"))(formAjaxArticle);
	showEdit("#types", "LI");
}