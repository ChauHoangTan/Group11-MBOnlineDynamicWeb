
var product = [];
$(document).ready(function() {
	product = JSON.parse(JSON.stringify(html));

});


function plusAmount(id) {
	var sl = $("#amount" + id);
	var sl_val = sl.val();
	if (!isNaN(sl_val)) {
		sl.val(Number(sl.val()) + 1);
		updateProductOnCart(id, 1);
		updateTotal(id, 1)
	}

}
function subAmount(id) {
	var sl = $("#amount" + id);
	var sl_val = sl.val();
	if (!isNaN(sl_val) & sl_val > 0) {
		sl.val(Number(sl.val()) - 1);
		updateProductOnCart(id, -1);
		updateTotal(id, -1);

	}
	return false;
}


function updateTotal(id, amount) {
	var total = 0;

	//var temp  =product[id].price * product[id].amount;
	//alert(temp);
	$("#total" + id).html("hello");
	//$("#total"+id).html((product[id].price * product[id].amount).toLocaleString("en") + 'đ');
	for (var i = 0; i < product.length; i++) {
		if (product[i].id == id) {
			product[i].amount += amount;
			$("#total" + id).html((product[i].price * product[i].amount).toLocaleString("en") + 'đ');

		}
	}

	for (var i = 0; i < product.length; i++) {

		total += product[i].price * product[i].amount;
		$("#totalPrice").html(total.toLocaleString("en") + 'đ');
		//alert(total);
	}
	return total;
}

function updateProductOnCart(id, val) {

	$.get({
		url: baseUrl + controllerId + "/update-product-on-cart?id=" + id + "&val=" + val

	}).done(function(html) {

	})
}
function findIdbyName(obj, name) {
	for (var i = 0; i < obj.length; i++) {
		if (obj[i].name == name) {
			return obj[i].id;
		}

	}
	return -1;
}
// gán dữ liệu khi chọn địa chỉ cấp bật cao hơn

function setValueForProvince(provinceid, address) {
	var str = '<option value="">-- Chọn Quận/Huyện-- </option>';;
	for (var i = 0; i < address.length; i++) {
		if (address[i].provinceid == provinceid) {
			str += '<option value="' + address[i].id + '">' + address[i].name + '</option>';
		}
		alert
	}
	return str;
}
function setValueForDistrict(districtid, address) {
	var str = '<option value="">--Chọn Phường/Xã--</option>';;
	for (var i = 0; i < address.length; i++) {
		if (address[i].districtid == districtid) {
			str += '<option value="' + address[i].id + '">' + address[i].name + '</option>';
		}
		alert
	}
	return str;
}



function choiceProvince() {
	var provinceName = ($("#province option:selected").text());
	var provinceId = findIdbyName(provinces, provinceName);
	$("#districts").html(setValueForProvince(provinceId, districts));
}
function choiceDistrict() {
	var districtName = ($("#districts option:selected").text());
	var districtId = findIdbyName(districts, districtName);

	$("#wards").html(setValueForDistrict(districtId, wards));
}
