const SignInBtn = document.getElementById("sign-in-button");
const SignUpBtn = document.getElementById("sign-up-button");
const SignUpCont = document.getElementById("sign-up-container");
const SignInCont = document.getElementById("sign-in-container");

SignInBtn.addEventListener('click', function(){
    console.log('bad');
    SignInCont.style.display = "block";
    SignUpCont.style.display = "none";
})

SignUpBtn.addEventListener('click', function(){
    console.log('bad');
    SignUpCont.style.display = "block";
    SignInCont.style.display = "none";
})