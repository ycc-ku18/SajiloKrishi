var select = document.getElementById('selectedList');
var subtotalPrice = document.getElementById('subtotalPrice');
var deliveryCharge = document.getElementById('deliveryCharge');
var totalPrice = document.getElementById('totalPrice');
var unitPrice = document.getElementById('unitPrice');
function show() {

	subtotalPrice.value = parseInt(select.value) * parseInt(unitPrice.value);
	totalPrice.value = parseInt(subtotalPrice.value) + parseInt(deliveryCharge.value);
}

