var li1 = document.getElementById('li1');
var li2 = document.getElementById('li2');
var li3 = document.getElementById('li3');
var li4 = document.getElementById('li4');
var li5 = document.getElementById('li5');

function change1(){
	if(li2.classList == "selected" || li3.classList == "selected" || li4.classList == "selected" || li5.classList == "selected"){
		li2.classList.remove('selected');
		li3.classList.remove('selected');
		li4.classList.remove('selected');
		li5.classList.remove('selected');

	}

	li1.classList.add('selected');
}

function change2() {	

	if(li1.classList == "selected" || li3.classList == "selected" || li4.classList == "selected" || li5.classList == "selected"){

		li1.classList.remove('selected');
		li3.classList.remove('selected');
		li4.classList.remove('selected');
		li5.classList.remove('selected');

	}
	console.log("nadim");
	li2.classList.add('selected');

}

function change3() {
	if(li1.classList == "selected" || li2.classList == "selected" || li4.classList == "selected" || li5.classList == "selected"){
		li1.classList.remove('selected');
		li2.classList.remove('selected');
		li4.classList.remove('selected');
		li5.classList.remove('selected');

	}
	li3.classList.add('selected');

}
function change4() {
	if(li1.classList == "selected" || li2.classList == "selected" || li3.classList == "selected" || li5.classList == "selected"){
		li1.classList.remove('selected');
		li2.classList.remove('selected');
		li3.classList.remove('selected');
		li5.classList.remove('selected');

	}
	li4.classList.add('selected');

}

function change5() {
	if(li1.classList == "selected" || li2.classList == "selected" || li4.classList == "selected" || li3.classList == "selected"){
		li1.classList.remove('selected');
		li2.classList.remove('selected');
		li4.classList.remove('selected');
		li3.classList.remove('selected');

	}
	li5.classList.add('selected');

}




