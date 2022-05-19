let modal = document.getElementsByClassName("modaljs")[0];
let btnsup = document.querySelectorAll('.btn-modal');
let closemodal1 = document.getElementsByClassName('button-close1')[0]; 
let closemodal2 = document.getElementsByClassName('button-close2')[0];

btnsup.forEach(del => {
    del.addEventListener("click", function(e) {
        e.preventDefault();
        btnsup.onclick = modon();
    })
});

[closemodal1,closemodal2].forEach((element)=>{
    element.onclick = modoff;
});

function modon() {
    modal.classList.add('modal-on');
    modal.classList.remove('modal-off');
}

function modoff() {
    modal.classList.add('modal-off');
    modal.classList.remove('modal-on');
}