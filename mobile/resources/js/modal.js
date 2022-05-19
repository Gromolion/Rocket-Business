const form = document.getElementById('appointment_form');
const menu = document.getElementById('menu');

function open_form() {
    form.style.display = 'block';
}

function close_form() {
    form.style.display = 'none';
}

function open_menu() {
    menu.style.display = 'block';
    document.getElementById('menu-button').setAttribute('onclick', 'close_menu()');
    document.getElementById('menu-button-img').setAttribute('src', 'resources/img/close_menu.svg');
    document.body.style.overflow = 'hidden';
}

function close_menu() {
    menu.style.display = 'none';
    document.getElementById('menu-button').setAttribute('onclick', 'open_menu()');
    document.getElementById('menu-button-img').setAttribute('src', 'resources/img/open_menu.svg');
    document.body.style.overflow = 'scroll';
}