window.onload = function() {
	confirmDelete("#albums", "delete_album");
	confirmDelete("#photos", "delete_photo");
	Array.prototype.forEach.bind(document.querySelectorAll("form"))(formAjax);
	showEdit("#albums", "LI");
	showEdit("#photos", "DIV")
}