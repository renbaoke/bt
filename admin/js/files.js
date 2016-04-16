window.onload = function() {
	confirmDelete("#files", "delete_file");
	Array.prototype.forEach.bind(document.querySelectorAll("form"))(formAjax);
}