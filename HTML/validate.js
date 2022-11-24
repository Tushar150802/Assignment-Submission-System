function validateForm() {
  //let y = document.forms["username"]["password"].value;
  let y = document.getElementById("password").value;
  let l = y.length;
  if (l < 6) {
    alert("Password must contain atleast 6 characters!");
    return false;
  }

  if (!y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Lower case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }

  if (y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Lower case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }

  if (!y.match(/[A-Z]/g) && y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Numeric character!"
    );
    return false;
  }

  if (!y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert(
      "Password must contain atleast one Upper case character!\nPassword must contain atleast one Lower case character!"
    );
    return false;
  }

  if (!y.match(/[A-Z]/g) && y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Upper case character!");
    return false;
  }

  if (y.match(/[A-Z]/g) && !y.match(/[a-z]/g) && y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Lower case character!");
    return false;
  }

  if (y.match(/[A-Z]/g) && y.match(/[a-z]/g) && !y.match(/[0-9]/g)) {
    alert("Password must contain atleast one Numeric character!");
    return false;
  } else if (!y.match(/[!-/]/g)) {
    alert("Password must contain atleast one Special character!");
    return false;
  }
}
