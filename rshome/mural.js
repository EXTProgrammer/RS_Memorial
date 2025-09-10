function toggleMenu() {
    const desktopMenu = document.querySelector('.desktop-menu');
    desktopMenu.classList.toggle('active');
}

var cont = 1;

document.getElementById('radio1').checked = true;

setInterval(() => {
    nextImg()
}, 5000);

function nextImg(){
    cont++

    if(cont > 4){
        cont = 1
    }

    document.getElementById('radio' + cont).checked = true
};

var btn = document.querySelector('#show-hide');
var form = document.querySelector('.formulario');

btn.addEventListener('click', function(){
    if(form.style.display === 'block'){
        form.style.display = 'none';
    } else {
        form.style.display = 'block';
    }
});