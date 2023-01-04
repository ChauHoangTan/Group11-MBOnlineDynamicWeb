
var obj = [];
$(document).ready(function() {
	obj = JSON.parse(JSON.stringify(html));
	if (obj.length == 0) {
		$("#main").html("Không có sản phẩm đạt yêu cầu");
	}

	//else $("#main").html(display(obj, obj.length));

});

function SortProductDecrease() {
	var products = obj;
	for (var i = 0; i < products.length; i++) {
		for (var j = i + 1; j < products.length; j++) {
			if (products[i].price < products[j].price) {
				var temp = products[i];
				products[i] = products[j];
				products[j] = temp;
			}
		}
	}
	$("#main").html(display(products, products.length));
}
function SortProductIncrease() {
	var products = obj;
	for (var i = 0; i < products.length; i++) {
		for (var j = i + 1; j < products.length; j++) {
			if (products[i].price > products[j].price) {
				var temp = products[i];
				products[i] = products[j];
				products[j] = temp;
			}
		}
	}
	$("#main").html(display(products, products.length));
}







