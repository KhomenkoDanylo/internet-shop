// scripts.js
// JavaScript для обработки форм и AJAX-запросов
// Created by Danylo Khomenko

document.querySelector('#registerForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('register.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
    })
    .catch(error => console.error('Ошибка:', error));
});
