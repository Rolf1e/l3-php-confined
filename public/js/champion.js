function allChanpions() {
	document.querySelectorAll(".champion-card")
		.forEach( champion => champion.style.display = "none");
	document.querySelectorAll(".champion-card")
		.forEach( champion => champion.style.display = "inline-block");
}

function onlyFree() {
	document.querySelectorAll(".champion-card")
		.forEach( champion => champion.style.display = "none");
	document.querySelectorAll(".champion-card-free")
		.forEach( champion => champion.style.display = "inline-block");
}

function withoutFree() {
	document.querySelectorAll(".champion-card")
		.forEach( champion => champion.style.display = "inline-block");
	document.querySelectorAll(".champion-card-free")
		.forEach( champion => champion.style.display = "none");
}

