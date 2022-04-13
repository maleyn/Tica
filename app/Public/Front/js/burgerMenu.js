let menuPrincipal = document.getElementById('menu_principal');
let account = document.getElementById('account_header');
let btn_burger = document.getElementById('bouton_burger');
let menuBurger = document.getElementById('menu_burger');

btn_burger.onclick = showmenu;


function showmenu() {

    if (menuBurger.classList.contains('hidden')) {
        menuBurger.classList.add('show');
        menuBurger.classList.remove('hidden');
    } else {
        menuBurger.classList.add('hidden');
        menuBurger.classList.remove('show');
    }
    
}