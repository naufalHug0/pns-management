document.getElementById('image').addEventListener('change', (e) => {
    let file = e.target.files[0];

    if (file && file.type.match('image.*')) {
        let reader = new FileReader();
        
        reader.onload = function (e) {
            const previousImage = document.getElementById('image-prev').src
            document.getElementById('image-prev').src = e.target.result;

            if (document.getElementById('image').classList.contains('input-edit-file')) {
                sessionStorage.setItem('initial-value', previousImage)
                document.querySelector('.input-action-btn.edit-image').classList.remove('hidden')
                document.querySelector('.input-action-btn.edit-image').classList.add('flex')
            }
            console.log('tes')
        };
        
        reader.readAsDataURL(file);
    }
})