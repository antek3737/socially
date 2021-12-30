const passwordInputs = document.querySelectorAll("input[type='password']");


function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                passwordInputs[0].value,
                passwordInputs[1].value
            );
            markValidation(passwordInputs[1], condition);
        },
        1000
    );
}

passwordInputs[1].addEventListener('keyup', validatePassword)