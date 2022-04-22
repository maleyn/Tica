// classe active pour la pagination

let btnPage = document.querySelectorAll('.page-item');
console.log(btnPage[0]);

for (let i = 0; i < btnPage.length; i++) {
    btnPage[i].addEventListener('click', function() {
        let current = document.getElementsByClassName('active_pag');
        current[0].className = current[0].className.replace('active_pag', '');
        this.className += 'active_pag';
    });
    
}
