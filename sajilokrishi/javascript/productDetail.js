var address = document.getElementById('locationID');
var yesCheckBox = document.getElementById("yesCheckBox");
var noCheckBox = document.getElementById("noCheckBox");
var priceBox = document.getElementById("chargeID");
address.addEventListener("change", function() {
	if(address.value === "Mechi" || address.value === "Koshi" || address.value === "Sagarmatha"){
		priceBox.value = 50;
	}else if(address.value === "Bagmati") {
		priceBox.value = 20;
	}else {
		priceBox.value = 80;
	}	
});
yesCheckBox.addEventListener("change", function() {
	document.getElementById('transportationDivId').style.display = "block";
});
noCheckBox.addEventListener("change", function() {
	document.getElementById('transportationDivId').style.display = "none";
});