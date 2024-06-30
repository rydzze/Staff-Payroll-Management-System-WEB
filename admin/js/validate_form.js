// Function to validate IC (Example: IC should be 12 characters long)
function validateIC(ic) {
  return ic.length === 12;
}

// Function to validate names (Example: Name should contain only letters and spaces)
function validateName(name) {
  return /^[A-Za-z\s]+$/.test(name);
}

// Function to validate age (Example: Age should be between 1 and 119)
function validateAge(age) {
  return age > 0 && age < 200;
}

// Function to validate birthdate (Example: Birthdate should be a valid date)
function validateBirthdate(birthdate) {
  return !isNaN(Date.parse(birthdate));
}

// Function to validate email (Example: Simple email validation)
function validateEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

// Function to validate phone number (Example: Phone number should be between 10 and 15 digits)
function validatePhoneNumber(phoneNumber) {
  return /^\d{10,15}$/.test(phoneNumber);
}

// Function to synchronize birthdate with IC
function synchronizeBirthdate(ic) {
  if (ic.length !== 12) return null;

  var year = ic.substring(0, 2);
  var month = ic.substring(2, 4);
  var day = ic.substring(4, 6);

  // Assume year < 50 is 2000s and year >= 50 is 1900s
  year = parseInt(year) < 25 ? '20' + year : '19' + year;

  return `${year}-${month}-${day}`;
}

// Function to validate the entire form
function validateForm() {
  var isValid = true;

  var ic = document.getElementById('ic').value;
  var firstName = document.getElementById('first_name').value;
  var lastName = document.getElementById('last_name').value;
  var age = document.getElementById('age').value;
  var birthdate = document.getElementById('birthdate').value;
  var email = document.getElementById('email').value;
  var phoneNumber = document.getElementById('phone_number').value;

  // Synchronize birthdate with IC
  var synchronizedBirthdate = synchronizeBirthdate(ic);
  if (synchronizedBirthdate) {
      document.getElementById('birthdate').value = synchronizedBirthdate;
  }

  if (!validateIC(ic)) {
      displayError('ic', 'Invalid IC');
      isValid = false;
  } else {
      clearError('ic');
  }

  if (!validateName(firstName)) {
      displayError('first_name', 'Invalid First Name');
      isValid = false;
  } else {
      clearError('first_name');
  }

  if (!validateName(lastName)) {
      displayError('last_name', 'Invalid Last Name');
      isValid = false;
  } else {
      clearError('last_name');
  }

  if (!validateAge(age)) {
      displayError('age', 'Invalid Age');
      isValid = false;
  } else {
      clearError('age');
  }

  if (!validateBirthdate(birthdate)) {
      displayError('birthdate', 'Invalid Birthdate');
      isValid = false;
  } else {
      clearError('birthdate');
  }

  if (!validateEmail(email)) {
      displayError('email', 'Invalid Email');
      isValid = false;
  } else {
      clearError('email');
  }

  if (!validatePhoneNumber(phoneNumber)) {
      displayError('phone_number', 'Invalid Phone Number');
      isValid = false;
  } else {
      clearError('phone_number');
  }

  return isValid;
}

// Function to display error messages
function displayError(fieldId, message) {
  var field = document.getElementById(fieldId);
  var errorDiv = document.getElementById(fieldId + '-error');
  field.classList.add('error');
  errorDiv.innerText = message;
  errorDiv.style.display = 'block';
}

// Function to clear error messages
function clearError(fieldId) {
  var field = document.getElementById(fieldId);
  var errorDiv = document.getElementById(fieldId + '-error');
  field.classList.remove('error');
  errorDiv.innerText = '';
  errorDiv.style.display = 'none';
}

// Event listener to show input fields and hide text values on edit button click
document.getElementById('editButton').addEventListener('click', function () {
  var detailValues = document.querySelectorAll('.detailValue');
  var detailInputs = document.querySelectorAll('.detailInput');
  detailValues.forEach(function (element) {
      element.style.display = 'none';
  });
  detailInputs.forEach(function (element) {
      element.style.display = 'inline';
  });
  document.getElementById('editButton').style.display = 'none';
  document.getElementById('confirmButton').style.display = 'inline';
  document.getElementById('cancelButton').style.display = 'inline';
});

// Event listener to cancel edit and revert to displaying text values
document.getElementById('cancelButton').addEventListener('click', function () {
  var detailValues = document.querySelectorAll('.detailValue');
  var detailInputs = document.querySelectorAll('.detailInput');
  detailValues.forEach(function (element) {
      element.style.display = 'inline';
  });
  detailInputs.forEach(function (element) {
      element.style.display = 'none';
      element.value = element.defaultValue; // Reset input values to default
  });
  document.getElementById('editButton').style.display = 'inline';
  document.getElementById('confirmButton').style.display = 'none';
  document.getElementById('cancelButton').style.display = 'none';
});

// Event listener to validate form on confirm button click
document.getElementById('staffDetailsForm').addEventListener('submit', function (event) {
  if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
  }
});
