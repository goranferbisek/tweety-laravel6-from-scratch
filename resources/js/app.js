 /**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


const dropZone = document.querySelector('.drop-zone');
const publishForm = document.querySelector('#publish-form');
const uploadInfo = document.querySelector('.upload-info');
const imageInput = document.querySelector('.tweet-image');

dropZone.addEventListener('dragover', e => {
    e.preventDefault();
    uploadInfo.classList.add('font-bold');
});

dropZone.addEventListener('drop', e => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
        imageInput.files = e.dataTransfer.files;
        uploadInfo.innerHTML = 'image uploaded';
        uploadInfo.classList.remove('font-bold');
    }
});

['dragleave', 'dragend'].forEach(type => {
    dropZone.addEventListener(type, e => {
        uploadInfo.classList.remove('font-bold');
    });
});



publishForm.addEventListener('submit', e => {
    e.preventDefault();

    let data = new FormData();
    data.append('body', dropZone.value);

    if (imageInput.files.length) {
        data.append('image', imageInput.files[0]);
    }

    axios.post('/tweets', data)
        .then(function (response) {
            location.reload();
        })
        .catch(function (error) {
            console.log(error.response.data);
            let errorMsg = error.response.data.errors.image[0];
            uploadInfo.classList.add('text-red-600');
            uploadInfo.innerHTML = `${errorMsg} Try again...`;
        });
});