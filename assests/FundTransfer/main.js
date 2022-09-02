const floatingProfile = document.querySelector('.floating-profile')
const userProfile = document.querySelector('.user-profile')
const closeProfile = document.querySelector('.floating-profile img')
const profileUsername = document.querySelector('.user-profile p')
const popUpBtn = document.querySelector('.balance-hidden-popup #ok-btn')
const popUp = document.querySelector('.balance-hidden-popup')
const inValidUserPopup = document.querySelector('.user-not-exits-hidden-popup')
const inVaildUserPopupBtn = document.querySelector('.user-not-exits-hidden-popup #ok-btn-2')
const transferBtn = document.querySelector('#transfer-btn')
let balanceStatus = document.querySelector('input[type="hidden"]').value
let userStatus = document.querySelector('.user-status input').value

userProfile.addEventListener('click', () => {
    floatingProfile.style.display = "block"
    profileUsername.style.display = "none"
})
closeProfile.addEventListener('click', () => {
    floatingProfile.style.display = "none"
    profileUsername.style.display = "block"
})
if (balanceStatus == 2) {
    popUp.classList.add('balance-visible-popup')
    popUp.classList.remove('balance-hidden-popup')
}
if (userStatus == 2) {
    inValidUserPopup.classList.add('user-not-exits-visible-popup')
    inValidUserPopup.classList.remove('user-not-exits-hidden-popup')
}
popUpBtn.addEventListener('click', () => {
    popUp.classList.remove('balance-visible-popup')
    popUp.classList.add('balance-hidden-popup')
})
inVaildUserPopupBtn.addEventListener('click', () => {
    inValidUserPopup.classList.add('user-not-exits-hidden-popup')
    inValidUserPopup.classList.remove('user-not-exits-visible-popup')
})
