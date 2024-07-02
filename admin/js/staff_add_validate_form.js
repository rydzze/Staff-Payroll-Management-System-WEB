document.addEventListener("DOMContentLoaded", function () {
  function validateIC() {
    const icInput = document.getElementById('ic');
    const ic = icInput.value;
    const icErrorElement = document.getElementById('ic-error');
    icErrorElement.textContent = '';

    if (ic.length === 12) {
      const year = parseInt(ic.substring(0, 2), 10);
      const month = parseInt(ic.substring(2, 4), 10);
      const day = parseInt(ic.substring(4, 6), 10);

      const fullYear = year < 25 ? `20${year.toString().padStart(2, '0')}` : `19${year.toString().padStart(2, '0')}`;

      if (month < 1 || month > 12) {
        icInput.classList.add('error');
        icErrorElement.textContent = "Invalid IC. Month must be between 01 and 12.";
        return false;
      } else {
        const daysInMonth = new Date(fullYear, month, 0).getDate();
        if (day < 1 || day > daysInMonth) {
          icInput.classList.add('error');
          icErrorElement.textContent = `Invalid IC. Day must be between 01 and ${daysInMonth} for the given month.`;
          return false;
        } else {
          icInput.classList.remove('error');
        }
      }
    } else {
      icInput.classList.add('error');
      icErrorElement.textContent = "Invalid IC. Please enter a 12-digit IC number.";
      return false;
    }
    return true;
  }

  const form = document.getElementById('staff-form');
  const icInput = document.getElementById('ic');

  icInput.addEventListener('blur', validateIC);

  const fields = [
    { id: 'ic', validate: validateIC, errorMessage: "Invalid IC. Please enter a 12-digit IC number." },
    { id: 'first_name', pattern: /^[A-Za-z\s]+$/, errorMessage: "First name can only contain letters and spaces." },
    { id: 'last_name', pattern: /^[A-Za-z\s]+$/, errorMessage: "Last name can only contain letters and spaces." },
    { id: 'email', pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/, errorMessage: "Please enter a valid email address." },
    { id: 'phone_number', pattern: /^\d{10,15}$/, errorMessage: "Please enter a valid phone number with 10 to 15 digits." },
    { id: 'address', pattern: /.+/, errorMessage: "Please enter a valid address." },
    { id: 'department', pattern: /.+/, errorMessage: "Please select a department." },
    { id: 'basic_salary', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid salary greater than 0." },
    { id: 'position', pattern: /.+/, errorMessage: "Please select a position." }
  ];

  form.addEventListener('submit', function (event) {
    let valid = true;

    fields.forEach(field => {
      const input = document.getElementById(field.id);
      const errorElement = document.getElementById(`${field.id}-error`);
      errorElement.textContent = '';

      if(field.id='ic'){
        valid = validateIC();
      }
      else{
        if (!field.pattern.test(input.value)) {
          input.classList.add('error');
          errorElement.textContent = field.errorMessage;
          valid = false;
        } else {
          input.classList.remove('error');
        }
      }
    });
    if (!valid) {
      event.preventDefault();
    }
  });
});
