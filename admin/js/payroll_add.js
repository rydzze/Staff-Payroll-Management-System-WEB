document.addEventListener('DOMContentLoaded', function() {
    function autofillBasicSalary(ID) {
        if (ID !== '') {
            fetch(`includes/fetch_basicsalary.php?staff_ID=${ID}`)
                .then(response => response.text())
                .then(data => {
                    const basicSalary = parseFloat(data);
                    if (!isNaN(basicSalary)) {
                        document.getElementById('payroll_basicsalary').value = basicSalary.toFixed(2);
                    } else {
                        document.getElementById('payroll_basicsalary').value = '';
                    }
                    calculateTotalSalary();
                })
                .catch(error => console.error('Error fetching basic salary:', error));
        } else {
            document.getElementById('payroll_basicsalary').value = '';
        }
    }

    document.getElementById('staff_ID').addEventListener('change', function() {
        const selectedStaffID = this.value;
        autofillBasicSalary(selectedStaffID);
    });

    function calculateTotalSalary() {
        const basicSalary = parseFloat(document.getElementById('payroll_basicsalary').value) || 0;
        const allowancePay = parseFloat(document.getElementById('payroll_allowancepay').value) || 0;
        const overtimePay = parseFloat(document.getElementById('payroll_overtimepay').value) || 0;

        const totalSalary = basicSalary + allowancePay + overtimePay;
        document.getElementById('total_salary').value = totalSalary.toFixed(2);

        calculateNetSalary();
    }

    document.getElementById('payroll_basicsalary').addEventListener('input', calculateTotalSalary);
    document.getElementById('payroll_allowancepay').addEventListener('input', calculateTotalSalary);
    document.getElementById('payroll_overtimepay').addEventListener('input', calculateTotalSalary);

    function calculateTotalDeduction() {
        const epf = parseFloat(document.getElementById('payroll_epf').value) || 0;
        const socso = parseFloat(document.getElementById('payroll_socso').value) || 0;

        const totalDeduction = epf + socso;
        document.getElementById('total_deduction').value = totalDeduction.toFixed(2);

        calculateNetSalary();
    }

    document.getElementById('payroll_epf').addEventListener('input', calculateTotalDeduction);
    document.getElementById('payroll_socso').addEventListener('input', calculateTotalDeduction);

    function calculateNetSalary() {
        const totalSalary = parseFloat(document.getElementById('total_salary').value) || 0;
        const totalDeduction = parseFloat(document.getElementById('total_deduction').value) || 0;

        const netSalary = totalSalary - totalDeduction;
        document.getElementById('net_salary').value = netSalary.toFixed(2);
    }
});