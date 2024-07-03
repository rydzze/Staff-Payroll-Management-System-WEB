function autofill() {
    const ic = document.getElementById('ic').value;

    if (ic.length === 12) {
        const year = parseInt(ic.substring(0, 2), 10);
        const month = ic.substring(2, 4);
        const day = ic.substring(4, 6);

        const current_year = new Date().getFullYear().toString().slice(-2);
        const fullYear = year <= current_year ? `20${year.toString().padStart(2, '0')}` : `19${year.toString().padStart(2, '0')}`;

        const birthdate = `${fullYear}-${month}-${day}`;

        const birthdateObj = new Date(birthdate);
        const today = new Date();

        let age = today.getFullYear() - birthdateObj.getFullYear();
        const monthDifference = today.getMonth() - birthdateObj.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdateObj.getDate())) {
            age--;
        }

        document.getElementById('birthdate').value = birthdate;
        document.getElementById('age').value = age;
    }
}

function updatePositions() {
  var department = document.getElementById("department").value;
  var positionSelect = document.getElementById("position");
  positionSelect.innerHTML = "";

  if (department === "HR") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Manager", "Manager");
      addOption(positionSelect, "Specialist", "Specialist");
      addOption(positionSelect, "Designer", "Designer");
      addOption(positionSelect, "Assistant", "Assistant");
      addOption(positionSelect, "Recruiter", "Recruiter");
      addOption(positionSelect, "Specialist", "Specialist");
  } else if (department === "IT") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Developer", "Developer");
      addOption(positionSelect, "Specialist", "Specialist");
      addOption(positionSelect, "Engineer", "Engineer");
      addOption(positionSelect, "Analyst", "Analyst");
      addOption(positionSelect, "Admin", "Admin");
      addOption(positionSelect, "Tester", "Tester");
      addOption(positionSelect, "Support", "Support");
  } else if (department === "Finance") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Manager", "Manager");
      addOption(positionSelect, "Accountant", "Accountant");
      addOption(positionSelect, "Clerk", "Clerk");
      addOption(positionSelect, "Auditor", "Auditor");
  } else if (department === "Sales") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Manager", "Manager");
      addOption(positionSelect, "Representative", "Representative");
      addOption(positionSelect, "Coordinator", "Coordinator");
  } else if (department === "Support") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Technician", "Technician");
      addOption(positionSelect, "Consultant", "Consultant");
      addOption(positionSelect, "Operator", "Operator");
  } else if (department === "Legal") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Advisor", "Advisor");
      addOption(positionSelect, "Paralegal", "Paralegal");
      addOption(positionSelect, "Lawyer", "Lawyer");
  } else if (department === "Operations") {
      addOption(positionSelect, "Select Position", "");
      addOption(positionSelect, "Manager", "Manager");
      addOption(positionSelect, "Operator", "Operator");
      addOption(positionSelect, "Supervisor", "Supervisor");
  } else {
      addOption(positionSelect, "Select Position", "");
  }
}

function addOption(selectElement, text, value) {
  var option = document.createElement("option");
  option.textContent = text;
  option.value = value;
  selectElement.appendChild(option);
}

document.getElementById('department').addEventListener('change', updatePositions);