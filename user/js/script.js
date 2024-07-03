function myFunction() {
  var x = document.getElementById("userOTP");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}