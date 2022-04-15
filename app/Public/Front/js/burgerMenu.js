let menuPrincipal = document.getElementById('menu_principal');
let account = document.getElementById('account_header');
let btn_burger_open = document.getElementById('bouton_burger_open');
let btn_burger_close = document.getElementById('bouton_burger_close');
let menuBurger = document.getElementById('menu_burger');

btn_burger_open.onclick = showmenu;
btn_burger_close.onclick = showmenu;

function showmenu() {

    if (menuBurger.classList.contains('hidden')) {
        menuBurger.classList.add('show');
        menuBurger.classList.remove('hidden');
        btn_burger_open.classList.add('hidden');
        btn_burger_close.classList.remove('hidden');
    } else {
        menuBurger.classList.add('hidden');
        menuBurger.classList.remove('show');
        btn_burger_close.classList.add('hidden');
        btn_burger_open.classList.remove('hidden');
    }
    
}