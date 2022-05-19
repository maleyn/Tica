// Menu burger de la partie Admin

let btn_burger_open = document.getElementById('bouton_burger_open');
let btn_burger_close = document.getElementById('bouton_burger_close');
let menuBurger = document.getElementById('menu_burger');

btn_burger_open.addEventListener("click", function(e) {
    e.preventDefault();
    showmenu();
})
btn_burger_close.addEventListener("click", function(e) {
    e.preventDefault();
    showmenu();
})

function showmenu() {

    if (menuBurger.classList.contains('hidden_burger')) { 
        menuBurger.classList.remove('hidden_burger');
        btn_burger_open.classList.add('hidden_burger');
        btn_burger_close.classList.remove('hidden_burger');
    } else {
        menuBurger.classList.add('hidden_burger');
        btn_burger_close.classList.add('hidden_burger');
        btn_burger_open.classList.remove('hidden_burger');
    }
    
}