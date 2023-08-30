document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(event) {
        const genderOptions = form.querySelectorAll('input[name="gender"]');
        const hobbiesOptions = form.querySelectorAll('input[name="hobbies"]');
        const nationalitySelect = form.querySelector('#nationality');

        let isValid = true;

        if (!isChecked(genderOptions)) {
            isValid = false;
            highlightInvalid(genderOptions);
        }

        if (!isChecked(hobbiesOptions)) {
            isValid = false;
            highlightInvalid(hobbiesOptions);
        }

        if (nationalitySelect.value === '') {
            isValid = false;
            highlightInvalid(nationalitySelect);
        }

        if (!isValid) {
            event.preventDefault();
            alert('Vui lòng điền đầy đủ thông tin bắt buộc.');
        }
    });

    function isChecked(elements) {
        for (const element of elements) {
            if (element.checked) {
                return true;
            }
        }
        return false;
    }

    function highlightInvalid(elements) {
        for (const element of elements) {
            element.classList.add('required');
        }
    }
});
