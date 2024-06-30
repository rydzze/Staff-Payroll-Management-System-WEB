document.getElementById('editButton').addEventListener('click', function() {
  var detailValues = document.querySelectorAll('.detailValue');
  var detailInputs = document.querySelectorAll('.detailInput');
  detailValues.forEach(function(element) {
      element.style.display = 'none';
  });
  detailInputs.forEach(function(element) {
      element.style.display = 'inline';
  });
  document.getElementById('editButton').style.display = 'none';
  document.getElementById('confirmButton').style.display = 'inline';
  document.getElementById('cancelButton').style.display = 'inline';
});

document.getElementById('cancelButton').addEventListener('click', function() {
  var detailValues = document.querySelectorAll('.detailValue');
  var detailInputs = document.querySelectorAll('.detailInput');
  detailValues.forEach(function(element) {
      element.style.display = 'inline';
  });
  detailInputs.forEach(function(element) {
      element.style.display = 'none';
  });
  document.getElementById('editButton').style.display = 'inline';
  document.getElementById('confirmButton').style.display = 'none';
  document.getElementById('cancelButton').style.display = 'none';
});

