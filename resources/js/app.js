require('./bootstrap');

window.submitForm = formId => {
    document.querySelector(`#${formId}`).submit();
}
