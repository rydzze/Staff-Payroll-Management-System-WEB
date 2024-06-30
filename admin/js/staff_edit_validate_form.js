// Adding event listener to the confirm button to validate the form when clicked
document.getElementById('confirmButton').addEventListener('click', validateForm);

// Function to show an error message for a specific input field
function showError(inputId, message) {
    const errorElement = document.getElementById(`${inputId}-error`); // Get the error message element
    const inputElement = document.getElementById(inputId); // Get the input field element

    inputElement.classList.add('error'); // Add 'error' class to the input field
    errorElement.textContent = message; // Set the error message
    errorElement.style.display = 'block'; // Display the error message
}

// Function to hide an error message for a specific input field
function hideError(inputId) {
    const errorElement = document.getElementById(`${inputId}-error`); // Get the error message element
    const inputElement = document.getElementById(inputId); // Get the input field element

    inputElement.classList.remove('error'); // Remove 'error' class from the input field
    errorElement.textContent = ''; // Clear the error message
    errorElement.style.display = 'none'; // Hide the error message
}

// Function to validate IC (Identification Code) using regex
function validateIC(ic) {
    const icRegex = /^[0-9]{12}$/; // IC must be exactly 12 digits
    return icRegex.test(ic); // Return true if IC matches the regex, else false
}

// Function to validate name, ensuring it's not empty
function validateName(name) {
    return name.trim() !== ''; // Return true if name is not empty after trimming spaces
}

// Function to validate age using regex
function validateAge(age) {
    const ageRegex = /^(0|[1-9][0-9]?|1[01][0-9]|120)$/; // Age must be between 0 and 120
    return ageRegex.test(age); // Return true if age matches the regex, else false
}

// Function to validate email using regex
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format validation
    return emailRegex.test(email); // Return true if email matches the regex, else false
}

// Function to validate phone number using regex
function validatePhoneNumber(phoneNumber) {
    const phoneRegex = /^[0-9]{10,15}$/; // Phone number must be between 10 and 15 digits
    return phoneRegex.test(phoneNumber); // Return true if phone number matches the regex, else false
}

// Function to validate department, ensuring it's not empty
function validateDepartment(department) {
    return department.trim() !== ''; // Return true if department is not empty after trimming spaces
}

// Function to validate position, ensuring it's not empty
function validatePosition(position) {
    return position.trim() !== ''; // Return true if position is not empty after trimming spaces
}

// Function to validate basic salary, ensuring it's a positive number
function validateBasicSalary(basicSalary) {
    return !isNaN(basicSalary) && basicSalary > 0; // Return true if basic salary is a positive number
}

// Function to auto-correct and set the birthdate based on the IC (Identification Code)
function autoCorrectBirthdate(ic) {
    const birthdateInput = document.getElementById('birthdate'); // Get the birthdate input field
    const yearPrefix = parseInt(ic.substring(0, 2)) > new Date().getFullYear() % 100 ? '19' : '20'; // Determine the century
    const birthdate = yearPrefix + ic.substring(0, 2) + '-' + ic.substring(2, 4) + '-' + ic.substring(4, 6); // Construct the birthdate
    birthdateInput.value = birthdate; // Set the birthdate input field value
}

// Function to validate the entire form
function validateForm(event) {
    event.preventDefault(); // Prevent the form from submitting by default
    let isValid = true; // Initialize form validity flag

    // Validate IC and show/hide error message accordingly
    const ic = document.getElementById('ic').value;
    if (!validateIC(ic)) {
        showError('ic', 'IC must be in numeric value.');
        isValid = false;
    } else {
        hideError('ic');
        autoCorrectBirthdate(ic); // Auto-correct birthdate based on IC
    }

    // Validate first name and show/hide error message accordingly
    const firstName = document.getElementById('first_name').value;
    if (!validateName(firstName)) {
        showError('first_name', 'First name cannot be empty.');
        isValid = false;
    } else {
        hideError('first_name');
    }

    // Validate last name and show/hide error message accordingly
    const lastName = document.getElementById('last_name').value;
    if (!validateName(lastName)) {
        showError('last_name', 'Last name cannot be empty.');
        isValid = false;
    } else {
        hideError('last_name');
    }

    // Validate age and show/hide error message accordingly
    const age = document.getElementById('age').value;
    if (!validateAge(age)) {
        showError('age', 'Age must be a number between 0 and 120.');
        isValid = false;
    } else {
        hideError('age');
    }

    // Validate email and show/hide error message accordingly
    const email = document.getElementById('email').value;
    if (!validateEmail(email)) {
        showError('email', 'Invalid email format.');
        isValid = false;
    } else {
        hideError('email');
    }

    // Validate phone number and show/hide error message accordingly
    const phoneNumber = document.getElementById('phone_number').value;
    if (!validatePhoneNumber(phoneNumber)) {
        showError('phone_number', 'Phone number must be between 10 to 15 digits.');
        isValid = false;
    } else {
        hideError('phone_number');
    }

    // Validate address and show/hide error message accordingly
    const address = document.getElementById('address').value;
    if (!validateName(address)) {
        showError('address', 'Address cannot be empty.');
        isValid = false;
    } else {
        hideError('address');
    }

    // Validate department and show/hide error message accordingly
    const department = document.getElementById('department').value;
    if (!validateDepartment(department)) {
        showError('department', 'Department cannot be empty.');
        isValid = false;
    } else {
        hideError('department');
    }

    // Validate position and show/hide error message accordingly
    const position = document.getElementById('position').value;
    if (!validatePosition(position)) {
        showError('position', 'Position cannot be empty.');
        isValid = false;
    } else {
        hideError('position');
    }

    // Validate basic salary and show/hide error message accordingly
    const basicSalary = document.getElementById('basic_salary').value;
    if (!validateBasicSalary(basicSalary)) {
        showError('basic_salary', 'Basic salary must be a positive number.');
        isValid = false;
    } else {
        hideError('basic_salary');
    }

    // If all validations pass, submit the form
    if (isValid) {
        document.getElementById('staffEditForm').submit();
    }
}
// Adding event listener to the confirm button to validate the form when clicked
document.getElementById('confirmButton').addEventListener('click', validateForm);

// Function to show an error message for a specific input field
function showError(inputId, message) {
    const errorElement = document.getElementById(`${inputId}-error`); // Get the error message element
    const inputElement = document.getElementById(inputId); // Get the input field element

    inputElement.classList.add('error'); // Add 'error' class to the input field
    errorElement.textContent = message; // Set the error message
    errorElement.style.display = 'block'; // Display the error message
}

// Function to hide an error message for a specific input field
function hideError(inputId) {
    const errorElement = document.getElementById(`${inputId}-error`); // Get the error message element
    const inputElement = document.getElementById(inputId); // Get the input field element

    inputElement.classList.remove('error'); // Remove 'error' class from the input field
    errorElement.textContent = ''; // Clear the error message
    errorElement.style.display = 'none'; // Hide the error message
}

// Function to validate IC (Identification Code) using regex
function validateIC(ic) {
    const icRegex = /^[0-9]{12}$/; // IC must be exactly 12 digits
    return icRegex.test(ic); // Return true if IC matches the regex, else false
}

// Function to validate name, ensuring it's not empty
function validateName(name) {
    return name.trim() !== ''; // Return true if name is not empty after trimming spaces
}

// Function to validate age using regex
function validateAge(age) {
    const ageRegex = /^(0|[1-9][0-9]?|1[01][0-9]|120)$/; // Age must be between 0 and 120
    return ageRegex.test(age); // Return true if age matches the regex, else false
}

// Function to validate email using regex
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email format validation
    return emailRegex.test(email); // Return true if email matches the regex, else false
}

// Function to validate phone number using regex
function validatePhoneNumber(phoneNumber) {
    const phoneRegex = /^[0-9]{10,15}$/; // Phone number must be between 10 and 15 digits
    return phoneRegex.test(phoneNumber); // Return true if phone number matches the regex, else false
}

// Function to validate department, ensuring it's not empty
function validateDepartment(department) {
    return department.trim() !== ''; // Return true if department is not empty after trimming spaces
}

// Function to validate position, ensuring it's not empty
function validatePosition(position) {
    return position.trim() !== ''; // Return true if position is not empty after trimming spaces
}

// Function to validate basic salary, ensuring it's a positive number
function validateBasicSalary(basicSalary) {
    return !isNaN(basicSalary) && basicSalary > 0; // Return true if basic salary is a positive number
}

// Function to auto-correct and set the birthdate based on the IC (Identification Code)
function autoCorrectBirthdate(ic) {
    const birthdateInput = document.getElementById('birthdate'); // Get the birthdate input field
    const yearPrefix = parseInt(ic.substring(0, 2)) > new Date().getFullYear() % 100 ? '19' : '20'; // Determine the century
    const birthdate = yearPrefix + ic.substring(0, 2) + '-' + ic.substring(2, 4) + '-' + ic.substring(4, 6); // Construct the birthdate
    birthdateInput.value = birthdate; // Set the birthdate input field value
}

// Function to validate the entire form
function validateForm(event) {
    event.preventDefault(); // Prevent the form from submitting by default
    let isValid = true; // Initialize form validity flag

    // Validate IC and show/hide error message accordingly
    const ic = document.getElementById('ic').value;
    if (!validateIC(ic)) {
        showError('ic', 'IC must be in numeric value.');
        isValid = false;
    } else {
        hideError('ic');
        autoCorrectBirthdate(ic); // Auto-correct birthdate based on IC
    }

    // Validate first name and show/hide error message accordingly
    const firstName = document.getElementById('first_name').value;
    if (!validateName(firstName)) {
        showError('first_name', 'First name cannot be empty.');
        isValid = false;
    } else {
        hideError('first_name');
    }

    // Validate last name and show/hide error message accordingly
    const lastName = document.getElementById('last_name').value;
    if (!validateName(lastName)) {
        showError('last_name', 'Last name cannot be empty.');
        isValid = false;
    } else {
        hideError('last_name');
    }

    // Validate age and show/hide error message accordingly
    const age = document.getElementById('age').value;
    if (!validateAge(age)) {
        showError('age', 'Age must be a number between 0 and 120.');
        isValid = false;
    } else {
        hideError('age');
    }

    // Validate email and show/hide error message accordingly
    const email = document.getElementById('email').value;
    if (!validateEmail(email)) {
        showError('email', 'Invalid email format.');
        isValid = false;
    } else {
        hideError('email');
    }

    // Validate phone number and show/hide error message accordingly
    const phoneNumber = document.getElementById('phone_number').value;
    if (!validatePhoneNumber(phoneNumber)) {
        showError('phone_number', 'Phone number must be between 10 to 15 digits.');
        isValid = false;
    } else {
        hideError('phone_number');
    }

    // Validate address and show/hide error message accordingly
    const address = document.getElementById('address').value;
    if (!validateName(address)) {
        showError('address', 'Address cannot be empty.');
        isValid = false;
    } else {
        hideError('address');
    }

    // Validate department and show/hide error message accordingly
    const department = document.getElementById('department').value;
    if (!validateDepartment(department)) {
        showError('department', 'Department cannot be empty.');
        isValid = false;
    } else {
        hideError('department');
    }

    // Validate position and show/hide error message accordingly
    const position = document.getElementById('position').value;
    if (!validatePosition(position)) {
        showError('position', 'Position cannot be empty.');
        isValid = false;
    } else {
        hideError('position');
    }

    // Validate basic salary and show/hide error message accordingly
    const basicSalary = document.getElementById('basic_salary').value;
    if (!validateBasicSalary(basicSalary)) {
        showError('basic_salary', 'Basic salary must be a positive number.');
        isValid = false;
    } else {
        hideError('basic_salary');
    }

    // If all validations pass, submit the form
    if (isValid) {
        document.getElementById('staffEditForm').submit();
    }
}
