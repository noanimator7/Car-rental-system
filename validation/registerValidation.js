window.addEventListener('pageshow', function(event) {
  if (event.persisted) {
      // The page was loaded from cache, clear the form fields
      document.getElementById('signupForm').reset();
  }
});

$(document).ready(function(){
  $("#signupForm").submit(function(e){
      e.preventDefault();
      validates();
  });
});

function validates() {
  var inputs = document.getElementsByClassName('inputs');
  var error = document.getElementById('error');
  error.innerText = "";

  console.log(inputs.length);

  for (let i = 0; i < inputs.length; i++) {
    if(inputs[i].value.trim().length == 0){
      error.innerText = "INVALID!! " + inputs[i].getAttribute('placeholder');
      return;
    }
  }
  //password and confirm password validation
  if(inputs[3].value != inputs[4].value){
    error.innerText = "Password and confirm password don't match.";
    return;
  }
  // //email validation
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if(!emailRegex.test(inputs[2].value)){
    console.log("invalid email");
    error.innerText = "INVALID email format.";
    return;
  }

  $.ajax({
    type: "POST",
    url: "register.php",
    data: {
      fname: inputs[0].value,
      lname: inputs[1].value,
      email: inputs[2].value,
      password: inputs[3].value,
      ssn: inputs[5].value,
      dob: inputs[6].value,
      address: inputs[7].value,
      contact_number: inputs[8].value,
      city: inputs[9].value,
      country: inputs[10].value,
      register: true
    },
    dataType: "text",
    success: function(response){
      console.log(response);
      if(response === 'success'){
        window.location.href = "profile.php";
      } else if(response === 'email'){
        error.innerText = "Email Already Exists";
      } else if(response === 'sqlfailure'){
        error.innerText = "Error sql query failure";
      }
      else if(response === 'ssn'){
        error.innerText = "SSN already exists"
      }
      else {
        error.innerText = "Error";
      }
    }
});
}