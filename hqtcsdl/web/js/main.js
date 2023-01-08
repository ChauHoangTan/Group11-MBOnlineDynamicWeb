/*function moreProduct(amount ){
	var formData = {};
	formData["amount"] = amount;
	$.post({
		url: baseUrl + controllerId + "/index",
		data: formData,
	}).done(function() {
		alert('thanh công');
	})
		.fail(function() {

		});
}	
function addProductToCart(id ){
	
	$.get({
		url: baseUrl + controllerId + "/add-product-to-cart?id=" + id

		}).done(function(html) {
			alert('Đã thêm sản phẩm vào giỏ hàng');
		})
}
