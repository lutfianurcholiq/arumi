function numeric(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}
function alphabet(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if ((charCode < 65) && (charCode != 32))

    return false;
  return true;
}