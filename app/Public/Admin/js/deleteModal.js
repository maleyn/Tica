let nbtotal = document.getElementsByClassName('nbtotal')[0].getAttribute('data-nbtotal');
let modal = document.getElementsByClassName("modaljs")[0];
let btnmodal = document.getElementsByClassName("btn-modal");
let closemodal1 = document.getElementsByClassName('button-close1')[0];
let closemodal2 = document.getElementsByClassName('button-close2')[0];
let action = '';

    let btnsup = document.querySelectorAll('.btn-modal');

    btnsup.forEach(del => {
        del.addEventListener("click", function(e) {
            e.preventDefault();
            action = document.querySelector('.modalform').action;
            btnmodal.onclick = modon(del.dataset.id); 

    })
    }); 

[closemodal1,closemodal2].forEach((element)=>{
    element.addEventListener('click', function(e) {
        
        element.onclick = modoff();
    })
    
});

function modon(id) {
    modal.classList.add('modal-on');
    modal.classList.remove('modal-off');
    document.getElementsByClassName('modalform')[0].action = action + id;
}

function modoff() {
    modal.classList.add('modal-off');
    modal.classList.remove('modal-on');
    document.getElementsByClassName('modalform')[0].action = action;
}

