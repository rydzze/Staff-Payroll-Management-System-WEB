document.getElementById('addButton').addEventListener('click', function(){
  window.location.href = 'staff_add.php';
});

const urlParams = new URLSearchParams(window.location.search);
const departmentParam = urlParams.get('department');

if(departmentParam){
  document.getElementById('department').value = departmentParam;
}