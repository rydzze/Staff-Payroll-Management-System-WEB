document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById('staffEditForm');
  const fields = [
      { id: 'first_name', pattern: /^[A-Za-z\s]+$/, errorMessage: "First name can only contain letters and spaces." },
      { id: 'last_name', pattern: /^[A-Za-z\s]+$/, errorMessage: "Last name can only contain letters and spaces." },
      { id: 'email', pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/, errorMessage: "Please enter a valid email address." },
      { id: 'phone_number', pattern: /^\d{10,15}$/, errorMessage: "Please enter a valid phone number with 10 to 15 digits." },
      { id: 'address', pattern: /.+/, errorMessage: "Please enter a valid address." },
      { id: 'department', pattern: /.+/, errorMessage: "Please select a department." },
      { id: 'basic_salary', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid salary greater than 0." },
      { id: 'position', pattern: /.+/, errorMessage: "Please select a position." }
  ];

  form.addEventListener('submit', function(event) {
      let valid = true;

      fields.forEach(field => {
          const input = document.getElementById(field.id);
          const errorElement = document.getElementById(`${field.id}-error`);
          if (errorElement) {
              errorElement.textContent = '';
          }

          if (!field.pattern.test(input.value)) {
              input.classList.add('error');
              if (errorElement) {
                  errorElement.textContent = field.errorMessage;
              }
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
