let menu = document.querySelector(".menu");
let navbar = document.querySelector(".list-menu");
let list = document.querySelector(".list");

menu.onclick = function(){
    if(navbar.style.top != '0px'){
        navbar.style.top = '0px';
        menu.style.backgroundColor ='#F0C605';
        menu.style.color = '#162447';
    }else{
        navbar.style.top ='-166px';
        menu.style.backgroundColor = '#E43F5A';
        menu.style.color = '#fff';
    }
}
