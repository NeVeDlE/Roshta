$(document).ready(function () {
  $(".Hamburger").on("click", function () {
    $(this).toggleClass("active");
    $(".navMenu").toggleClass("active");
  });
  $(".navLink").on("click", function () {
    $(".Hamburger").toggleClass("active");
    $(".navMenu").toggleClass("active");
  });
  $("#showHideLogin").on("click", function () {
    $(this).toggleClass("showHideActive");
  });
});
var cities = {
  "Cairo": ["West Now", "NasrCity", "Maadi"],
  "Giza": ["6 October", "Faisel", "a;sdfk"],
  "Alexandria": ["Agami", "Montazaa", "Mamora"],
};
var city = document.getElementById("government");
var area = document.getElementById("Area");
city.onchange = function () {
  area.length = 1;
  var arr = cities[city.value];
  for (var i = 0; i < arr.length; i++) {
    area.options[area.options.length] = new Option(arr[i], arr[i]);
  }
};
