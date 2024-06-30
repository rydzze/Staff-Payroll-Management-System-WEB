document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById('staff-form');
  const fields = [
      { id: 'ic', pattern: /^\d{12}$/, errorMessage: "Invalid IC. Please enter a 12-digit IC number." },
      { id: 'fname', pattern: /^[A-Za-z\s]+$/, errorMessage: "Names can only contain letters and spaces." },
      { id: 'lname', pattern: /^[A-Za-z\s]+$/, errorMessage: "Names can only contain letters and spaces." },
      { id: 'email', pattern: /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/, errorMessage: "Please enter a valid email address." },
      { id: 'phone', pattern: /^\d{10,15}$/, errorMessage: "Please enter a valid phone number with 10 to 15 digits." },
      { id: 'address', pattern: /.+/, errorMessage: "Please enter a valid address." },
      { id: 'department', pattern: /.+/, errorMessage: "Please enter a valid department." },
      { id: 'position', pattern: /.+/, errorMessage: "Please enter a valid position." },
      { id: 'salary', pattern: /^(\d+(\.\d{1,2})?)$/, errorMessage: "Please enter a valid salary greater than 0." },
      { id: 'hireDate', pattern: /^\d{4}-\d{2}-\d{2}$/, errorMessage: "Please enter a valid hire date." }
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
          console.log("Form validation failed");
      } else {
          console.log("Form validation passed");
      }
  });
});
