window.onload = function() {
	confirmDelete("#hyperlinks", "delete_hyperlink");
	Array.prototype.forEach.bind(document.querySelectorAll("form"))(formAjax);
}