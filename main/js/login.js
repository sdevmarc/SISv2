let input = document.getElementById('password');

input.addEventListener('focus', () => {
    document.querySelector('.show-pas').style.display = 'block';
});

document.getElementById('password').addEventListener('keyup', (e) => {
    if (e.getModifierState('CapsLock')) {
        document.querySelector('.capsState').style.display = 'block';
    }
    else {
        document.querySelector('.capsState').style.display = 'none';
    }
});

document.querySelector('.bx-show').addEventListener('click', () => {
    document.querySelector('.bx-hide').style.display = 'block';
    document.querySelector('.bx-show').style.display = 'none';
    let input = document.getElementById('password');
    if (input.type === 'password') {
        input.type = 'text';
    } else {
        input.type = 'password';
    }
});

document.querySelector('.bx-hide').addEventListener('click', () => {
    document.querySelector('.bx-show').style.display = 'block';
    document.querySelector('.bx-hide').style.display = 'none';
    let input = document.getElementById('password');
    if (input.type === 'text') {
        input.type = 'password';
    } else {
        input.type = 'text';
    }
});