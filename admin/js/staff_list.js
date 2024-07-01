document.getElementById('addButton').addEventListener('click', function() {
  window.location.href = 'staff_add.php';
});

// Set selected department filter based on URL parameter
const urlParams = new URLSearchParams(window.location.search);
const departmentParam = urlParams.get('department');
if (departmentParam) {
  document.getElementById('department').value = departmentParam;
}