const floatingProfile = document.querySelector('.floating-profile')
const userProfile = document.querySelector('.user-profile')
const closeProfile = document.querySelector('.floating-profile img')
const profileUsername = document.querySelector('.user-profile p')
const popUpBtn = document.querySelector('.balance-popup #ok-btn')
const popUp = document.querySelector('.balance-popup')
const inValidUserPopup = document.querySelector('.not-exist-popup')
const inVaildUserPopupBtn = document.querySelector('.not-exist-popup #ok-btn-2')
const transferBtn = document.querySelector('#transfer-btn')
let balanceStatus = document.querySelector('input[type="hidden"]').value
let userStatus = document.querySelector('.user-status input').value
let transactionStatus = document.querySelector('.transaction-status input').value
const transactionPopup = document.querySelector('.transaction-success-popup')
const transactionBtn = document.querySelector('.transaction-success-popup #ok-btn-3')

// Show Profile popup
userProfile.addEventListener('click', () => {
    floatingProfile.style.display = "block"
    profileUsername.style.display = "none"
})

// Hide Profile popup
closeProfile.addEventListener('click', () => {
    floatingProfile.style.display = "none"
    profileUsername.style.display = "block"
})

// Show insufficent balance popup
if (balanceStatus == 2) {
    popUp.classList.add('balance-visible-popup')
    popUp.classList.remove('balance-hidden-popup')
}

// Hide insufficent balance popup
popUpBtn.addEventListener('click', () => {
    popUp.classList.remove('balance-visible-popup')
    popUp.classList.add('balance-hidden-popup')
})

// Show Invalid user popup
if (userStatus == 2) {
    inValidUserPopup.classList.add('user-not-exits-visible-popup')
    inValidUserPopup.classList.remove('user-not-exits-hidden-popup')
}

// Hide Invalid user popup
inVaildUserPopupBtn.addEventListener('click', () => {
    inValidUserPopup.classList.add('user-not-exits-hidden-popup')
    inValidUserPopup.classList.remove('user-not-exits-visible-popup')
})

// Show transaction status
if (transactionStatus == 2) {
    transactionPopup.classList.remove ('transaction-success-hidden-popup')
    transactionPopup.classList.add ('transaction-success-visible-popup')
}

// Hide transaction status
transactionBtn.addEventListener('click', () => {
    transactionPopup.classList.add ('transaction-success-hidden-popup')
    transactionPopup.classList.remove ('transaction-success-visible-popup')
})