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
}*/	
function addProductToCart(id ){
	
	$.get({
			url: baseUrl + controllerId + "/add-product-to-cart?id=" + id

		}).done(function(html) {
			alert('Đã thêm sản phẩm vào giỏ hàng');
		})
		hh
}
var products = [];
$(document).ready(function() {
	//products = JSON.parse(JSON.stringify(html));
	sortProductbyPrice('');
});

function sortProductbyPrice() {

	var formData = {};
	formData["type"] = $("#myselect option:selected").val();
	//alert($("#myselect option:selected").val());
	$.post({
		url: baseUrl + controllerId + "/content",
		data: formData,
	}).done(function(html) {
	//alert(html);
		display(html);
	})
		.fail(function() {

		});
}
function display(data) {
	$("#content").empty();
	
	$("#content").html(data);
}
function moreProduct() {

	var formData = {};
	formData["type"] = $("#myselect option:selected").val();
	//alert($("#myselect option:selected").val());
	$.post({
		url: baseUrl + controllerId + "/content",
		data: formData,
	}).done(function(html) {
	//alert(html);
		display(html);
	})
		.fail(function() {

		});
}
function defaulamountshow () {

	var formData = {};
	formData["type"] = $("#myselect option:selected").val();
	//alert($("#myselect option:selected").val());
	$.post({
		url: baseUrl + controllerId + "/defaulamountshow",
		data: formData,
	}).done(function() {
	sortProductbyPrice();
	    $("#changeAmountShow").focus();
	})
		.fail(function() {

		});
}
