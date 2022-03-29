let nbtotal = document.getElementsByClassName('nbtotal')[0].getAttribute('data-nbtotal');
let modal = document.getElementsByClassName("modaljs")[0];
let btnmodal = document.getElementsByClassName("btn-modal");
let closemodal1 = document.getElementsByClassName('button-close1')[0]; 
let closemodal2 = document.getElementsByClassName('button-close2')[0];
let action = '';
let idelement = '';

for (let i = 1; i < nbtotal; i++) {
    
    this['btn' + i] = document.getElementsByClassName('btnid' + i)[0];
    this['btn' + i].addEventListener("click", function() {

    action = document.getElementsByClassName('modalform')[0].action;
    idelement = document.getElementsByClassName('idelement')[i-1].innerHTML;
    
    btnmodal[i-1].onclick = modon(idelement);
    
    }); 

}

[closemodal1,closemodal2].forEach((element)=>{
    element.onclick = modoff;
});

function modon(idelement) {

    modal.classList.add('modal-on');
    modal.classList.remove('modal-off');
    document.getElementsByClassName('modalform')[0].action = action + idelement;
    
}

function modoff() {
    modal.classList.add('modal-off');
    modal.classList.remove('modal-on');
}

