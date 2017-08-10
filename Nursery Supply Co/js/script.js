
var mainDivForItems = document.getElementById("items");
function Constructor(_image, _name) {
	this.image = _image;
	this.name = _name;
}

Constructor.prototype.render = function(){
	var wrap = document.createElement("div");
	wrap.setAttribute("class", "items__wrap");

	var imageWrap = document.createElement("div");
	imageWrap.setAttribute("class", "items__imageWrap");
	
	var image = document.createElement("img");
	image.setAttribute("src", this.image);
	image.setAttribute("class", "items__image");

	var name = document.createElement("h3");
	name.textContent = this.name;
	name.setAttribute("class", "items__name");
	
	var button = document.createElement("button");
	button.textContent = "LEARN MORE";
	button.setAttribute("class", "items__button");

	imageWrap.appendChild(image);
	wrap.appendChild(imageWrap);
	wrap.appendChild(name);
	wrap.appendChild(button);

	return wrap
}

var components = [ 
	["images/potting_soil.png", "Potting Soil"],
	["images/peat_moss.png", "Peat Moss"],
	["images/fertilizers.png", "Fertilizers"],
	["images/mulch.png", "Mulch"],
	["images/compost.png", "Compost"]
];

var items = [];

for(var i = 0; i < components.length; i++) {
	items.push( new Constructor( components[i][0],  components[i][1] ));
};

for(var i = 0; i < items.length; i++) {
	mainDivForItems.appendChild( items[i].render() );
};

var html = document.documentElement;

if(html.clientWidth > 319) {
	document.body.style.overflowX = "hidden";
}

if(html.clientWidth < 768) {
	
	var transparency = document.getElementsByClassName("transparency")[0];
	var menu = document.getElementsByClassName("nav-menu")[0];
	var iconMenu = document.createElement("img");
	iconMenu.setAttribute("src", "images/icon-menu.png");
	iconMenu.setAttribute("alt", "icon-menu");
	iconMenu.setAttribute("class", "iconMenu");

	var value = -60;
	var flag = 0;
	var interval;

	iconMenu.addEventListener("click", function(){
		if(flag == 0){
			value = -60;
			interval = setInterval(fluentOpening.bind(null, 0, 1.4), 10);
			transparency.style.display = "block";
			flag++;
		}
		else {
			value = 0;
			interval = setInterval(fluentClosing.bind(null, 61, 1.4), 10);
			transparency.style.display = "none";
			flag--;
		}
	});

	function fluentOpening(number, speed){
		value += speed;
		if(value > number) {
			clearInterval(interval);
			return false
		}
		else {
			menu.style.left = Math.floor(value) + "%";
		}
	}
	function fluentClosing(number, speed){
		value += speed;
		if(value > number) {
			clearInterval(interval);
			return false
		}
		else {
			menu.style.left = "-" + Math.floor(value) + "%";
		}
	}

	transparency.addEventListener("click", function(){
		value = -60;
		menu.style.left = "-61%";
		transparency.style.display = "none";
		if(flag == 1) {
			flag--;
		}
	});

	document.body.appendChild(iconMenu);
}