var map = document.querySelector(".map");
var button = document.querySelector(".map-link");
if (document.documentElement.clientWidth < 1600) {
	map.removeChild(map.firstChild);
	button.style.display = "block";
	map.style.display = "none";
}