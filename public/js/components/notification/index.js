const notification = document.querySelector('.notification-button.dismissable')

if (notification) {
    notification.addEventListener('click', () => {
            document.querySelector('.notification').remove()
            document.querySelector('.overlay').remove()
    })
}

// add profile foto
// update pegawai

// petugas, pegawai
// add petugas middleware
// modify print