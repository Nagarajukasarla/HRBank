const firstName = document.getElementById('firstName')
const lastName = document.getElementById('lastName')
const username = document.getElementById('username')
const email = document.getElementById('email')
const password = document.getElementById('password')
const retypePassword = document.getElementById('retype-password')

const firstNameError = document.getElementById('firstNameError')
const lastNameError = document.getElementById('lastNameError')
const usernameError = document.getElementById('usernameError')
const emailError = document.getElementById('emailError')
const passwordError = document.getElementById('passwordError')
const retypePasswordError = document.getElementById('retypePasswordError')

function validateFirstName() {
    if (firstName.value.length < 5) {
        firstNameError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    firstNameError.innerHTML = '<img src="../Img/check.png">'
}
function validateLastName() {
    if (lastName.value.length < 5) {
        lastNameError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    lastNameError.innerHTML = '<img src="../Img/check.png">'
}
function validateUsername() {
    if (username.value.length < 8) {
        usernameError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    usernameError.innerHTML = '<img src="../Img/check.png">'
}
function validatePassword() {
    if (password.value.length < 8) {
        passwordError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    passwordError.innerHTML = '<img src="../Img/check.png">'
}
function validateRetypePassword() {
    if (retypePassword.value.length < 8  || retypePassword.value != password.value) {
        retypePasswordError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    retypePasswordError.innerHTML = '<img src="../Img/check.png">'
}

function validateEmail () {
    if (!(email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)))
    {
        emailError.innerHTML = '<img src="../Img/wrong.png">'
        return false
    }
    emailError.innerHTML = '<img src="../Img/check.png">'
}