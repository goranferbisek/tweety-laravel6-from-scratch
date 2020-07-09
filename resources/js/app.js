 /**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


let dropZone = document.querySelector('.drop-zone');
let imageInput = document.querySelector('.tweet-image');

dropZone.addEventListener('dragover', e => {
    e.preventDefault();
    dropZone.classList.add('font-bold');
});

dropZone.addEventListener('drop', e => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
        imageInput.files = e.dataTransfer.files;
        console.log(imageInput.files[0]);

    }
});

['dragleave', 'dragend'].forEach(type => {
    dropZone.addEventListener(type, e => {
        dropZone.classList.remove('font-bold');
    });
});