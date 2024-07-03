document.addEventListener('DOMContentLoaded', function(){
    
    document.getElementById('department').addEventListener('change', updatePositions);
    updatePositions();

    function updatePositions(){
        var department = document.getElementById("department").value;
        var positionSelect = document.getElementById("position");
        var defaultPosition = document.getElementById("department").getAttribute("data-position");
        positionSelect.innerHTML = "";

        if(department === "HR"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Manager", "Manager");
            addOption(positionSelect, "Specialist", "Specialist");
            addOption(positionSelect, "Designer", "Designer");
            addOption(positionSelect, "Assistant", "Assistant");
            addOption(positionSelect, "Recruiter", "Recruiter");
        }
        else if(department === "IT"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Developer", "Developer");
            addOption(positionSelect, "Specialist", "Specialist");
            addOption(positionSelect, "Engineer", "Engineer");
            addOption(positionSelect, "Analyst", "Analyst");
            addOption(positionSelect, "Admin", "Admin");
            addOption(positionSelect, "Tester", "Tester");
            addOption(positionSelect, "Support", "Support");
        }
        else if(department === "Finance"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Manager", "Manager");
            addOption(positionSelect, "Accountant", "Accountant");
            addOption(positionSelect, "Clerk", "Clerk");
            addOption(positionSelect, "Auditor", "Auditor");
        }
        else if(department === "Sales"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Manager", "Manager");
            addOption(positionSelect, "Representative", "Representative");
            addOption(positionSelect, "Coordinator", "Coordinator");
        }
        else if(department === "Support"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Technician", "Technician");
            addOption(positionSelect, "Consultant", "Consultant");
            addOption(positionSelect, "Operator", "Operator");
        }
        else if(department === "Legal"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Advisor", "Advisor");
            addOption(positionSelect, "Paralegal", "Paralegal");
            addOption(positionSelect, "Lawyer", "Lawyer");
        }
        else if(department === "Operations"){
            addOption(positionSelect, "Select Position", "");
            addOption(positionSelect, "Manager", "Manager");
            addOption(positionSelect, "Operator", "Operator");
            addOption(positionSelect, "Supervisor", "Supervisor");
        } 
        else{
            addOption(positionSelect, "Select Position", "");
        }

        if(defaultPosition){
            positionSelect.value = defaultPosition;
        }
    }

    function addOption(selectElement, text, value){
        var option = document.createElement("option");
        option.textContent = text;
        option.value = value;
        selectElement.appendChild(option);
    }
});
