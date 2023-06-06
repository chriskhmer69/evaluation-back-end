window.addEventListener('DOMContentLoaded', (event) => {
    const forms = document.getElementsByTagName('form');
    for (let i = 0; i < forms.length; i++) {
        forms[i].addEventListener('submit', function(event) {
            const inputs = this.getElementsByTagName('input');
            for (let j = 0; j < inputs.length; j++) {
                if (inputs[j].value.trim() === '') {
                    event.preventDefault();
                    inputs[j].classList.add('error');
                }
            }

            const textareas = this.getElementsByTagName('textarea');
            for (let j = 0; j < textareas.length; j++) {
                if (textareas[j].value.trim() === '') {
                    event.preventDefault();
                    textareas[j].classList.add('error');
                }
            }
        });
    }
});
