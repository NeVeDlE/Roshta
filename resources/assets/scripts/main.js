document.querySelector(".Hamburger").addEventListener("click", function () {
    document.querySelector(".Hamburger").classList.toggle("active");
    document.querySelector(".navMenu").classList.toggle("active");
});
document.querySelector(".navLink").addEventListener("click", function () {
    document.querySelector(".Hamburger").classList.toggle("active");
    document.querySelector(".navMenu").classList.toggle("active");
});

function chooseRole() {
    document.getElementById("dropRoles").classList.toggle("show");
}

function JoinJob() {
    document.getElementById("dropJobs").classList.toggle("show");
}

let searchBtn = document.getElementById("searchBtn");
let searchBar = document.getElementById("searchBar");
window.onclick = function (event) {
    // if (!event.target.matches(".dropbtn")) {
    //   var dropDown = document.getElementsByClassName("drop-roles");
    //   for (var i = 0; i < dropDown.length; i++) {
    //     var openDropDown = dropDown[i];
    //     if (openDropDown.classList.contains("show")) {
    //       openDropDown.classList.remove("show");
    //     }
    //   }
    // }
    if (!event.target.matches(".dropbtnJoin")) {
        var dropJobs = document.getElementsByClassName("drop-Jobs");
        for (var i = 0; i < dropJobs.length; i++) {
            var openJobs = dropJobs[i];
            if (openJobs.classList.contains("show")) {
                openJobs.classList.remove("show");
            }
        }
    }
};

function openSearch() {
    searchBar.classList.toggle("show");
}

window.onscroll = function () {
    searchBar.classList.remove("show");
};
var mainToggler = document.getElementById("TogglersideBar");
var mainSideBar = document.getElementById("sideBar");
mainToggler.addEventListener("click", function () {
    mainSideBar.classList.toggle("hide");
});

let searchButton = document.querySelector(
    "#contentHeader form .formInput button "
);
let searchButtonIcon = document.querySelector(
    "#contentHeader form .formInput button fa-magnifying-glass"
);

let searchForm = document.querySelector("#contentHeader form");
let searchIcon = document.querySelector("#contentHeader form searchIcon");
if (window.innerWidth < 768) {
    mainSideBar.classList.add("hide");
}



