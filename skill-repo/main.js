// fake user
let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
const listAccount = [
    {
        email: "1@gmail.com",
        password: "123456"
    },
    {
        email: "2@gmail.com",
        password: "123456"
    },  
    {
        email: "3@gmail.com",
        password: "123456"
    },
]

function addClass(selector, add){
    document.getElementById(selector).classList.add(add);
}   
function removeClass(selector, remove){
    document.getElementById(selector).classList.remove(remove);
}
function showError(selector, message){
    document.getElementById(selector).innerHTML = message;
}
function checkEmpty(selector){
    if(selector.value.trim() == "") return true;
}
function checkValidate(ID, borderError, inputError, message ){
    addClass(ID, borderError);
    showError(inputError, message);
}
//onlick button
let element = document.getElementById("button");
element.onclick = function login(e){
    e.preventDefault();
    let email = document.forms['form']['email'];
    let password = document.forms['form']['password'];
    let checkEmail = false;
    let checkPass = false;
    let checkLogin = listAccount.some(value => value.email === email.value && value.password === password.value);
    //check email
    if(checkEmpty(email)){
        checkValidate("email", "form-input-error", "errorEmail", "Chưa nhập email");
    }else if(!(email.value.match(regex))){
        checkValidate("email", "form-input-error", "errorEmail", "Email không đúng định dạng");
    }else{
        showError("errorEmail","");
        removeClass("email","form-input-error");
        checkEmail = true;
    }
    //check password
    if(checkEmpty(password)){ 
        checkValidate("password", "form-input-error", "errorPassword", "Chưa nhập password");
    }else if(password.value.length >20){
        checkValidate("password", "form-input-error", "errorPassword", "Password không được nhập quá 20 ký tự");
    }else{
        showError("errorPassword","");
        removeClass("password","form-input-error");
        checkPass = true;
    }
    //check login thanh cong
    if(checkEmail && checkPass){
        if(!checkLogin){
            addClass("errorBoth","errorBoth");
            showError("errorBoth","Email hoặc mật khẩu chưa đúng");
        }else{
            sessionStorage.setItem("token",email.value);
            setTimeout(function(){
                window.location.href = "home.html"
            }, 500);
        }
    }else{
        removeClass("errorBoth","errorBoth");
    } 
}



     