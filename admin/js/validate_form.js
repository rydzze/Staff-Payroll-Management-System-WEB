document.getElementById('confirmButton').addEventListener('click', validateForm);

function showError(inputId, message) {
    const errorElement = document.getElementById(`${inputId}-error`);
    const inputElement = document.getElementById(inputId);

    inputElement.classList.add('error');
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

function hideError(inputId) {
    const errorElement = document.getElementById(`${inputId}-error`);
    const inputElement = document.getElementById(inputId);

    inputElement.classList.remove('error');
    errorElement.textContent = '';
    errorElement.style.display = 'none';
}

function validateIC(ic) {
    const icRegex = /^[0-9]{12}$/;
    return icRegex.test(ic);
}

function validateName(name) {
    return name.trim() !== '';
}

function validateAge(age) {
    const ageRegex = /^(0|[1-9][0-9]?|1[01][0-9]|120)$/;
    return ageRegex.test(age);
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePhoneNumber(phoneNumber) {
    const phoneRegex = /^[0-9]{10,15}$/;
    return phoneRegex.test(phoneNumber);
}

function validateDepartment(department) {
    return department.trim() !== '';
}

function validatePosition(position) {
    return position.trim() !== '';
}

function validateBasicSalary(basicSalary) {
    return !isNaN(basicSalary) && basicSalary > 0;
}

function autoCorrectBirthdate(ic) {
    const birthdateInput = document.getElementById('birthdate');
    const yearPrefix = parseInt(ic.substring(0, 2)) > new Date().getFullYear() % 100 ? '19' : '20';
    const birthdate = yearPrefix + ic.substring(0, 2) + '-' + ic.substring(2, 4) + '-' + ic.substring(4, 6);
    birthdateInput.value = birthdate;
}

function validateForm(event) {
    event.preventDefault();
    let isValid = true;

    const ic = document.getElementById('ic').value;
    if (!validateIC(ic)) {
        showError('ic', 'IC must be in numeric value.');
        isValid = false;
    } else {
        hideError('ic');
        autoCorrectBirthdate(ic);
    }

    const firstName = document.getElementById('first_name').value;
    if (!validateName(firstName)) {
        showError('first_name', 'First name cannot be empty.');
        isValid = false;
    } else {
        hideError('first_name');
    }

    const lastName = document.getElementById('last_name').value;
    if (!validateName(lastName)) {
        showError('last_name', 'Last name cannot be empty.');
        isValid = false;
    } else {
        hideError('last_name');
    }

    const age = document.getElementById('age').value;
    if (!validateAge(age)) {
        showError('age', 'Age must be a number between 0 and 120.');
        isValid = false;
    } else {
        hideError('age');
    }

    const email = document.getElementById('email').value;
    if (!validateEmail(email)) {
        showError('email', 'Invalid email format.');
        isValid = false;
    } else {
        hideError('email');
    }

    const phoneNumber = document.getElementById('phone_number').value;
    if (!validatePhoneNumber(phoneNumber)) {
        showError('phone_number', 'Phone number must be between 10 to 15 digits.');
        isValid = false;
    } else {
        hideError('phone_number');
    }

    const address = document.getElementById('address').value;
    if (!validateName(address)) {
        showError('address', 'Address cannot be empty.');
        isValid = false;
    } else {
        hideError('address');
    }

    const department = document.getElementById('department').value;
    if (!validateDepartment(department)) {
        showError('department', 'Department cannot be empty.');
        isValid = false;
    } else {
        hideError('department');
    }

    const position = document.getElementById('position').value;
    if (!validatePosition(position)) {
        showError('position', 'Position cannot be empty.');
        isValid = false;
    } else {
        hideError('position');
    }

    const basicSalary = document.getElementById('basic_salary').value;
    if (!validateBasicSalary(basicSalary)) {
        showError('basic_salary', 'Basic salary must be a positive number.');
        isValid = false;
    } else {
        hideError('basic_salary');
    }

    if (isValid) {
        document.getElementById('staffEditForm').submit();
    }
}
