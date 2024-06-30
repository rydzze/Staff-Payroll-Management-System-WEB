function autofill() {
  const ic = document.getElementById('ic').value;
  if (ic.length === 12) {
      const year = parseInt(ic.substring(0, 2), 10);
      const month = ic.substring(2, 4);
      const day = ic.substring(4, 6);

      const fullYear = year < 25 ? `20${year.toString().padStart(2, '0')}` : `19${year.toString().padStart(2, '0')}`;
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
