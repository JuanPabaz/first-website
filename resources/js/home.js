document.addEventListener('DOMContentLoaded', function () {
    const icons = document.querySelectorAll('.plus-icon');

    icons.forEach(icon => {
        icon.addEventListener('click', () => {
            const questionDiv = icon.closest('.question');
            const answer = questionDiv.querySelector('.question-answer');

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                icon.classList.remove('fa-circle-plus');
                icon.classList.add('fa-circle-minus');
            } else {
                answer.classList.add('hidden');
                icon.classList.remove('fa-circle-minus');
                icon.classList.add('fa-circle-plus');
            }
        });
    });
});