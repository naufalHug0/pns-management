const role_option = document.getElementById('role-option')

document.getElementById('role-option-toggler').addEventListener('click', () => {
    if (role_option.classList.contains('animate-scale-appear')) {
        role_option.classList.remove('animate-scale-appear')
        role_option.classList.add('animate-scale-disappear')
    } else {
        role_option.classList.remove('animate-scale-disappear')
        role_option.classList.add('animate-scale-appear')
    }
})