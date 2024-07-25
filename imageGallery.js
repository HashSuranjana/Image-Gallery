document.addEventListener('DOMContentLoaded', () => {
    const showUploadFormButton = document.getElementById('show-upload-form');
    const uploadForm = document.getElementById('upload-form');

    showUploadFormButton.addEventListener('click', () => {
        if (uploadForm.classList.contains('show')) {
            uploadForm.classList.remove('show');
            setTimeout(() => {
                uploadForm.style.display = 'none';
            }, 500); // Match the transition duration
        } else {
            uploadForm.style.display = 'block';
            setTimeout(() => {
                uploadForm.classList.add('show');
            }, 10); // Slight delay to ensure display is set to block before adding the class
        }
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', () => {
        uploadForm.classList.remove('show');
        setTimeout(() => {
            uploadForm.style.display = 'none';
        }, 500); // Match the transition duration
    });
});
