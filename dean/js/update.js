document.getElementById('editLastname').addEventListener('click', () => {
    const lastname = document.getElementById('lastname');
    if (lastname.hasAttribute('disabled')) {
        lastname.removeAttribute('disabled');
        lastname.focus();
    }
    else {
        lastname.setAttribute('disabled', '');
    }
});

document.getElementById('editFirstname').addEventListener('click', () => {
    const firstname = document.getElementById('firstname');
    if (firstname.hasAttribute('disabled')) {
        firstname.removeAttribute('disabled');
        firstname.focus();
    }
    else {
        firstname.setAttribute('disabled', '');
    }
});

document.getElementById('editMiddlename').addEventListener('click', () => {
    const middlename = document.getElementById('middlename');
    if (middlename.hasAttribute('disabled')) {
        middlename.removeAttribute('disabled');
        middlename.focus();
    }
    else {
        middlename.setAttribute('disabled', '');
    }
});

document.getElementById('editGender').addEventListener('click', () => {
    const gender = document.getElementById('gender');
    if (gender.hasAttribute('disabled')) {
        gender.removeAttribute('disabled');
        gender.focus();
    }
    else {
        gender.setAttribute('disabled', '');
    }
});

document.getElementById('editBirthdate').addEventListener('click', () => {
    const birthdate = document.getElementById('birthdate');
    if (birthdate.hasAttribute('disabled')) {
        birthdate.removeAttribute('disabled');
        birthdate.style.backgroundColor = '#1cb41c';
        birthdate.focus();
    }
    else {
        birthdate.setAttribute('disabled', '');
        birthdate.style.backgroundColor = '#7DCE7D';
    }
});

document.getElementById('editAddress').addEventListener('click', () => {
    const street = document.getElementById('street');
    const town = document.getElementById('town');
    const city = document.getElementById('city');
    if (street.hasAttribute('disabled') || town.hasAttribute('disabled') || city.hasAttribute('disabled')) {
        street.removeAttribute('disabled');
        town.removeAttribute('disabled');
        city.removeAttribute('disabled');
        street.focus();
    }
    else {
        street.setAttribute('disabled', '');
        town.setAttribute('disabled', '');
        city.setAttribute('disabled', '');
    }
});

document.getElementById('editEmergency').addEventListener('click', () => {
    const emergency = document.getElementById('emergency');
    if (emergency.hasAttribute('disabled')) {
        emergency.removeAttribute('disabled');
        emergency.focus();
    }
    else {
        emergency.setAttribute('disabled', '');
    }
});