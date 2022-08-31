const floatingProfile = document.querySelector('.floating-profile')
const userProfile = document.querySelector('.user-profile')
const closeProfile = document.querySelector('.floating-profile img')
const profileUsername = document.querySelector('.user-profile p')
const popUpBtn = document.querySelector('.hidden-popup #ok-btn')
const popUp = document.querySelector('.hidden-popup')
const transferBtn = document.querySelector('#transfer-btn')
let balanceStatus = document.querySelector('input[type="hidden"]').value;

userProfile.addEventListener('click', () => {
    floatingProfile.style.display = "block"
    profileUsername.style.display = "none"
})
closeProfile.addEventListener('click', () => {
    floatingProfile.style.display = "none"
    profileUsername.style.display = "block"
})
console.log(balanceStatus);
if (balanceStatus == 2) {
    popUp.classList.add('visible-popup')
    popUp.classList.remove('hidden-popup')
}
popUpBtn.addEventListener('click', () => {
    popUp.classList.remove('visible-popup')
    popUp.classList.add('hidden-popup')
})