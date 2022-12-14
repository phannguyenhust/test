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
        addClass("email","formInputError");
        showError("errorEmail","Chưa nhập email");
        showError("errorBoth","");
    }else if(!(email.value.match(regex))){
        addClass("email","formInputError");
        showError("errorEmail","Email không đúng định dạng");
        showError("errorBoth","");  
    }else{
        showError("errorEmail","");
        removeClass("email","formInputError");
        checkEmail = true;
    }
    //check password
    if(checkEmpty(password)){
        addClass("password","formInputError");
        showError("errorPassword","Chưa nhập password");
        showError("errorBoth","");  
    }else if(password.value.length >20){
        addClass("password","formInputError");
        showError("errorPassword","Password không được nhập quá 20 ký tự");
        showError("errorBoth","");
    }else{
        showError("errorPassword","");
        removeClass("password","formInputError");
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
    }
} 



     