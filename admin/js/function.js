function confirmDelete(selector, targetClass, success, fail) {
	document.querySelector(selector).addEventListener("click", function(e) {
		if (e.target.className == targetClass) {
			var url = e.target.getAttribute("href");
			if (confirm("确定删除？")) {
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						JSON.parse(xhr.responseText);
						if (JSON.parse(xhr.responseText).success) {
							success(JSON.parse(xhr.responseText).message);
						} else {
							fail(JSON.parse(xhr.responseText).message);
						}
					}
				}
				xhr.open("POST", url, true);
				xhr.send();
			}
			e.preventDefault();
		}
	});
}

function formAjax(selector, success, fail) {
	selector.addEventListener("submit", function(e) {
		var url = e.target.getAttribute("action");
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				JSON.parse(xhr.responseText);
				if (JSON.parse(xhr.responseText).success) {
					success(JSON.parse(xhr.responseText).message);
				} else {
					fail(JSON.parse(xhr.responseText).message);
				}
			}
		}
		xhr.open("POST", url, true);
		xhr.send(new FormData(e.target));
		e.preventDefault();
	});
}

function showEdit(selector, tagName, display) {
	document.querySelector(selector).addEventListener("click", function(e){
		var list = e.target;
		if (e.target.tagName == "A" && e.target.innerText == "编辑") {
			do {
				list = list.parentNode;
			} while (list.tagName !== tagName);
			list.style.display = "none";
			list.nextElementSibling.style.display = "block";
			e.preventDefault();
		} else if (e.target.getAttribute("type") == "button" && e.target.value == "取消") {
			do {
				list = list.parentNode;
			} while (list.tagName !== tagName);
			list.style.display = "none";
			list.previousElementSibling.style.display = "block";
		}
	});
}