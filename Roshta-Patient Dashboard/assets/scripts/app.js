
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

// edit on rows of role table
function editRoleRow(num) {
  document.getElementById("editRoleBtn" + num).style.display = "none";
  document.getElementById("saveRoleBtn" + num).style.display = "block";
  var roleName = document.getElementById("roleName" + num);
  var nameData = roleName.innerHTML;
  roleName.innerHTML =
    "<input type='text' class='new' id='inputRoleName" +
    num +
    "' value='" +
    nameData +
    "'>";
}
function saveRoleRow(num) {
  var roleNameValue = document.getElementById("inputRoleName" + num).value;
  document.getElementById("roleName" + num).innerHTML = roleNameValue;
  document.getElementById("editRoleBtn" + num).style.display = "block";
  document.getElementById("saveRoleBtn" + num).style.display = "none";
}
function deleteRoleRow(num) {
  var roleRow = document.getElementById("row" + num);
  document.getElementById("roleTable").deleteRow(roleRow.rowIndex);
}
function addNewRole() {
  var table = document.getElementById("roleTable");
  var newRole = document.getElementById("inputRoleName").value;
  var tableLen = table.rows.length - 1;
  var row = (table.insertRow(tableLen).outerHTML =
    "<tr id='row" +
    tableLen +
    "'><td id='roleName" +
    tableLen +
    "'>" +
    newRole +
    "</td><td class='Options'><input type='button' value='Edit' class='editBtn' id='editRoleBtn" +
    tableLen +
    "' onclick='editRoleRow(" +
    tableLen +
    ")'><input type='button' class='saveBtn' value='Save' id='saveRoleBtn" +
    tableLen +
    "' onclick='saveRoleRow(" +
    tableLen +
    ")' style='display:none'><input type='button' class='deleteBtn' value='Delete' onclick='deleteRoleRow(" +
    tableLen +
    ")'></td></tr>");
  document.getElementById("inputRoleName").value = "";
}
function editDiseaseRow(num) {
  document.getElementById("editDiseaseBtn" + num).style.display = "none";
  document.getElementById("saveDiseaseBtn" + num).style.display = "block";
  var diseaseName = document.getElementById("diseaseName" + num);
  var nameData = diseaseName.innerHTML;
  diseaseName.innerHTML =
    "<input type='text' class='new' id='inputDiseaseName" +
    num +
    "' value='" +
    nameData +
    "'>";
  var diseaseDetails = document.getElementById("diseaseDetails" + num);
  var detailsData = diseaseDetails.innerHTML;
  diseaseDetails.innerHTML =
    "<textarea type='text' class='new' id='inputDiseaseDetails" +
    num +
    "'>" +
    detailsData +
    "</textarea>";
}
function saveDiseaseRow(num) {
  var diseaseNameValue = document.getElementById(
    "inputDiseaseName" + num
  ).value;
  document.getElementById("diseaseName" + num).innerHTML = diseaseNameValue;
  var diseaseDetailsValue = document.getElementById(
    "inputDiseaseDetails" + num
  ).value;
  document.getElementById("diseaseDetails" + num).innerHTML =
    diseaseDetailsValue;
  document.getElementById("editDiseaseBtn" + num).style.display = "block";
  document.getElementById("saveDiseaseBtn" + num).style.display = "none";
}
function deleteDiseaseRow(num) {
  var diseaseRow = document.getElementById("diseaseRow" + num);
  document.getElementById("diseaseTable").deleteRow(diseaseRow.rowIndex);
}
function addNewDisease() {
  var table = document.getElementById("diseaseTable");
  var newDisease = document.getElementById("inputDiseaseName").value;
  var newDetails = document.getElementById("inputDiseaseDetails").value;
  var tableLen = table.rows.length - 1;
  var row = (table.insertRow(tableLen).outerHTML =
    "<tr id='diseaseRow" +
    tableLen +
    "'><td id='diseaseName" +
    tableLen +
    "'>" +
    newDisease +
    "</td><td id='diseaseDetails" +
    tableLen +
    "'>" +
    newDetails +
    "</td><td class='Options'><input type='button' value='Edit' class='editBtn' id='editDiseaseBtn" +
    tableLen +
    "' onclick='editRow(" +
    tableLen +
    ")'><input type='button' class='saveBtn' value='Save' id='saveDiseaseBtn" +
    tableLen +
    "' onclick='saveRow(" +
    tableLen +
    ")' style='display:none'><input type='button' class='deleteBtn' value='Delete' onclick='deleteRow(" +
    tableLen +
    ")'></td></tr>");
  document.getElementById("inputDiseaseName").value = "";
  document.getElementById("inputDiseaseDetails").value = "";
}
function editMedicineRow(num) {
  document.getElementById("editMedicineBtn" + num).style.display = "none";
  document.getElementById("saveMedicineBtn" + num).style.display = "block";
  var medicineName = document.getElementById("medicineName" + num);
  var nameData = medicineName.innerHTML;
  medicineName.innerHTML =
    "<input type='text' class='new' id='inputMedicineName" +
    num +
    "' value='" +
    nameData +
    "'>";
  var medicineDetails = document.getElementById("medicineDetails" + num);
  var detailsData = medicineDetails.innerHTML;
  medicineDetails.innerHTML =
    "<textarea type='text' class='new' id='inputMedicineDetails" +
    num +
    "'>" +
    detailsData +
    "</textarea>";
  var medicinePrice = document.getElementById("medicinePrice" + num);
  var medicinePriceData = parseFloat(medicinePrice.innerHTML);
  medicinePrice.innerHTML =
    "<input type='number' min='0.5' step='0.5' class='new' id='inputMedicinePrice" +
    num +
    "' value='" +
    medicinePriceData +
    "'>";
}
function saveMedicineRow(num) {
  var medicineNameValue = document.getElementById(
    "inputMedicineName" + num
  ).value;
  document.getElementById("medicineName" + num).innerHTML = medicineNameValue;
  var medicineDetailsValue = document.getElementById(
    "inputMedicineDetails" + num
  ).value;
  document.getElementById("medicineDetails" + num).innerHTML =
    medicineDetailsValue;
  var medicinePriceValue = document.getElementById(
    "inputMedicinePrice" + num
  ).value;
  document.getElementById("medicinePrice" + num).innerHTML =
    medicinePriceValue + "ج.م";
  document.getElementById("editMedicineBtn" + num).style.display = "block";
  document.getElementById("saveMedicineBtn" + num).style.display = "none";
}
function deleteMedicineRow(num) {
  var medicineRow = document.getElementById("medicineRow" + num);
  document.getElementById("medicineTable").deleteRow(medicineRow.rowIndex);
}
function addNewMedicine() {
  var table = document.getElementById("medicineTable");
  var newMedicine = document.getElementById("inputMedicineName").value;
  var newDetails = document.getElementById("inputMedicineDetails").value;
  var newPrice = document.getElementById("inputMedicinePrice").value;
  var tableLen = table.rows.length - 1;
  var row = (table.insertRow(tableLen).outerHTML =
    "<tr id='medicineRow" +
    tableLen +
    "'><td id='medicineName" +
    tableLen +
    "'>" +
    newMedicine +
    "</td><td id='medicineDetails" +
    tableLen +
    "'>" +
    newDetails +
    "</td> <td id='medicinePrice" +
    tableLen +
    "'>" +
    newPrice +
    " ج.م </td><td class='Options'><input type='button' value='Edit' class='editBtn' id='editMedicineBtn" +
    tableLen +
    "' onclick='editMedicineRow(" +
    tableLen +
    ")'><input type='button' class='saveBtn' value='Save' id='saveMedicineBtn" +
    tableLen +
    "' onclick='saveMedicineRow(" +
    tableLen +
    ")' style='display:none'><input type='button' class='deleteBtn' value='Delete' onclick='deleteMedicineRow(" +
    tableLen +
    ")'></td></tr>");
  document.getElementById("inputMedicineName").value = "";
  document.getElementById("inputMedicineDetails").value = "";
  document.getElementById("inputMedicinePrice").value = "";
}
