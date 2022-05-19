const modal = document.getElementById('appointment_form');

function open_form() {
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function close_form() {
    modal.style.display = 'none';
    document.body.style.overflow = 'scroll';
}
