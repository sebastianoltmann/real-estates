import scrollToEl from "./scrollTo";

// init display validation form
const forms = document.querySelectorAll('.needs-validation')
if (forms.length) {

    const invalidFeedbackClass = '.invalid-feedback';
    const validatedFormClass = 'was-validated';
    const hideInvalidFeedback = (field) => {
        const target = field.closest('.input-group')|| field;
        const invalidFeedback = target.parentNode.querySelector(invalidFeedbackClass);
        if(invalidFeedback) invalidFeedback.remove();
    }

    const showInvalidFeedback = (field) => {
        const feedback = document.createElement("div");
        feedback.className = invalidFeedbackClass.replace('.','');
        feedback.innerText = field.validationMessage || 'Invalid value.'
        const target = field.closest('.input-group')|| field;
        console.log(target.parentNode);
        target.classList.add('is-invalid')
        target.parentNode.appendChild(feedback)
    }

    const handleFormFieldInput = ({target}) => {
        hideInvalidFeedback(target);
        if(!target.checkValidity()){
            showInvalidFeedback(target);
        }
    }

    const initFormFieldInputEvent = (fields) => {
        fields.forEach(field => {
            field.removeEventListener('input', () => {})
            field.addEventListener('input', handleFormFieldInput);
        })
    }

    forms.forEach(function (form) {

        if(form.classList.contains(validatedFormClass)){
            const formInvalidFields = form.querySelectorAll(':invalid'),
                formValidFields = form.querySelectorAll(':valid');
            initFormFieldInputEvent( [...formInvalidFields, ...formValidFields]);
        }

        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add(validatedFormClass)
            form.querySelectorAll(invalidFeedbackClass).forEach(e => e.parentNode.removeChild(e));

            const formInvalidFields = form.querySelectorAll(':invalid'),
                formValidFields = form.querySelectorAll(':valid');

            initFormFieldInputEvent( [...formInvalidFields, ...formValidFields]);

            if (formInvalidFields.length) {
                formInvalidFields.forEach((field, i) => {
                    if (i === 0) {
                        scrollToEl(field);
                    }
                    showInvalidFeedback(field)
                })
            }

        }, false)
    })
}
