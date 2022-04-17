// remember me function
function setCookies(){
    var date=new Date();
    date.setMonth(date.getMonth(),12);
    var usernamevalue=document.getElementById("username").value;
    var passwordvalue=document.getElementById("password-filed").value;
    document.cookie="remember-me-username="+usernamevalue+";expires="+date;
    
}


//slide show

//Brevious and next forms and buttons
const BackButton = document.querySelectorAll(".bckbtn"),
  NextButton = document.querySelectorAll(".nextbtn"),
  FormSteps = document.querySelectorAll(".form-step");
let FormStepsNumber = 0;

NextButton.forEach((btn) => {
  btn.addEventListener("click", () => {
    event.preventDefault();
    FormStepsNumber++;
    updateFormSteps();
    updateProgressBar();
  });
});
BackButton.forEach((btn) => {
  btn.addEventListener("click", () => {
    FormStepsNumber--;
    updateFormSteps();
    updateProgressBar();
  });
});
function updateFormSteps() {
  FormSteps.forEach((FormStep) => {
    FormStep.classList.contains("active-form") &&
      FormStep.classList.remove("active-form");
  });
  FormSteps[FormStepsNumber].classList.add("active-form");
}

// Brogress Bar Color
const ProgressSteps = document.querySelectorAll(".progressbar-steps");
const ProgressBarLine = document.getElementById("progressbar-line");
function updateProgressBar() {
  ProgressSteps.forEach((ProgressStep, ids) => {
    if (ids < FormStepsNumber + 1) {
      ProgressStep.classList.add("progress-step-active");
    } else {
      ProgressStep.classList.remove("progress-step-active");
    }
  });
//   const progressBarActive = document.querySelectorAll(".progress-step-active");
//   ProgressBarLine.style.width =
//     ((progressBarActive.length-1 ) / (ProgressSteps.length-1)) * 70 + "%";
}


let password=document.getElementById('password-filed'),
    password1=document.getElementById('password-filed1'),
    password2=document.getElementById('password-filed'),
    toggle=document.getElementById('showpas'), 
    toggle1=document.getElementById('showpas1'), 
    showIcon=document.getElementById('shopas'),
    showIcon1=document.getElementById('shopas1');

function ShowHidePass(){
    if(password.type==='password'){
        password.type='text';
        if(password1){
        password1.type='text';
        toggle1.style.color="#26A0DB";
        }
        toggle.style.color="#26A0DB";

    }
    else{
        password.type='password';
        if(password1){
        password1.type='password';
        toggle1.style.color="#0000004d";
        }
        toggle.style.color="#0000004d"; 
    }

}
function checkInput(){

}
if(toggle||toogle1){
toggle.addEventListener('click',ShowHidePass,false);
toggle1.addEventListener('click',ShowHidePass,false);   
}
if(password||password1){
password.addEventListener('keyup',checkInput,false);
password1.addEventListener('keyup',checkInput,false);
}