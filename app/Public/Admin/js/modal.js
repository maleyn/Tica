let modal = document.getElementsByClassName("modaljs")[0];
let btnmodal = document.getElementsByClassName("btn-modal")[0];
let closemodal1 = document.getElementsByClassName('button-close1')[0];
let closemodal2 = document.getElementsByClassName('button-close2')[0];

btnmodal.onclick = function() {
    modal.classList.add('modal-on');
    modal.classList.remove('modal-off');
}

closemodal1.onclick = function() {
    modal.classList.add('modal-off');
    modal.classList.remove('modal-on');
}

closemodal2.onclick = function() {
    modal.classList.add('modal-off');
    modal.classList.remove('modal-on');
}


