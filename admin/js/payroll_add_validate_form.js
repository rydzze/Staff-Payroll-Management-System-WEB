document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('payroll-form');
  const fields = [
    { id: 'payroll_epf', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid EPF amount greater than 0." },
    { id: 'payroll_allowancepay', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid allowance pay greater than 0." },
    { id: 'payroll_socso', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid SOCSO amount greater than 0." },
    { id: 'payroll_overtimepay', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid overtime pay greater than 0." }
  ];

  form.addEventListener('submit', function(event) {
    let valid = true;

    fields.forEach(field => {
      const input = document.getElementById(field.id);
      const errorElement = document.getElementById(`${field.id}-error`);
      errorElement.textContent = '';

      if (!field.pattern.test(input.value)) {
        input.classList.add('error');
        errorElement.textContent = field.errorMessage;
        valid = false;
      } else {
        input.classList.remove('error');
      }
    });

    if (!valid) {
      event.preventDefault();
    }
  });
});
