document.getElementById('password').addEventListener('keyup', (e) => {
    if (e.getModifierState('CapsLock')) {
        document.querySelector('.capsState').style.display = 'block';
    }
    else {
        document.querySelector('.capsState').style.display = 'none';
    }
});
