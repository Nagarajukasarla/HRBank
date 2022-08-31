const floatingProfile = document.querySelector('.floating-profile')
const userProfile = document.querySelector('.user-profile')
const closeProfile = document.querySelector('.floating-profile img')
const profileUsername = document.querySelector('.user-profile p')

userProfile.addEventListener('click', () => {
    floatingProfile.style.display = "block"
    profileUsername.style.display = "none"
})
closeProfile.addEventListener('click', () => {
    floatingProfile.style.display = "none"
    profileUsername.style.display = "block"
})