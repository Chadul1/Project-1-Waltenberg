import {addInputValidationListener, validatePasswordStrength, validateUsername } from './JSLibrary.js'; 

const handleValidation = () => {
    const userNameInput = document.querySelector('input[name="username"]');
    const passwordInput = document.querySelector('input[name="password"]');


    //checks username integrity real-time.
    userNameInput.addEventListener('input', (event) => {
        const [isValid, message] = validateUsername(event.target.value);
        addInputValidationListener(event.target, isValid, message);
    });

    //checks password integrity real-time.
    passwordInput.addEventListener('input', (event) => {
        const [isValid, message] = validatePasswordStrength(event.target.value, 8);
        addInputValidationListener(event.target, isValid, message);
    });
} 

document.addEventListener('DOMContentLoaded', handleValidation);