document.addEventListener('DOMContentLoaded', function () {
    const toggleFormButtons = document.querySelectorAll('.toggleFormButton');
    const formContainers = document.querySelectorAll('.formContainer');

    toggleFormButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            const formContainer = formContainers[index];
            formContainer.classList.toggle('hidden');
        });
    });

    // Flag to track if any form has been submitted
    let formSubmitted = false;

    document.addEventListener('click', function (e) {
        const isInsideForm = e.target.closest('.formContainer');
        const isFormButton = e.target.closest('.toggleFormButton');
        if (!isInsideForm && !isFormButton && !formSubmitted) {
            formContainers.forEach(function (formContainer) {
                formContainer.classList.add('hidden');
            });
        }
    });

    const closeButtons = document.querySelectorAll('.closeButton');
    closeButtons.forEach(function (closeButton) {
        closeButton.addEventListener('click', function () {
            const formContainer = closeButton.closest('.formContainer');
            formContainer.classList.add('hidden');
        });
    });

    // Example: Assuming form submission triggers formSubmitted = true
    // You should replace this with your actual form submission logic
    document.querySelectorAll('.gform').forEach(function(form) {
        form.addEventListener('submit', function () {
            formSubmitted = true;
        });
    });
});
