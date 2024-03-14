document.addEventListener('DOMContentLoaded', function () {
    const toggleFormButtons = document.querySelectorAll('.toggleFormButton');
    const formContainers = document.querySelectorAll('.formContainer');

    toggleFormButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            const formContainer = formContainers[index];
            formContainer.classList.toggle('hidden');
        });
    });
});