function confirmDelete(selector, targetClass){
	document.querySelector(selector).addEventListener("click", function(e){
		if (e.target.className == targetClass){
			var url = e.target.getAttribute("href");
			if (confirm("确定删除？")){
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = function(){
					if (xhr.readyState == 4 && xhr.status == 200){
						JSON.parse(xhr.responseText);
						if (JSON.parse(xhr.responseText).success){
							location.reload();
						} else {
							alert(JSON.parse(xhr.responseText).message);
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