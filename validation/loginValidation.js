window.addEventListener('pageshow', function (event) {
    if (event.persisted) {
        document.getElementById('loginForm').reset();
    }
});

$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();
        validate();
    });
});


function validate() {
    var inputs = document.getElementsByClassName('input');
    var error = document.getElementById('error');
    error.innerText = "";

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.trim().length == 0) {
            error.innerText = "INVALID!! " + inputs[i].getAttribute('placeholder');
            return;
        }
    }

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(inputs[0].value)) {
        error.innerText = "INVALID email format.";
        return;
    }

    $.ajax({
        type: "POST",// hb3t
        url: "login.php",// go to login code
        data: {
            email: inputs[0].value,// set name to the value(email)
            password: inputs[1].value,
            login: true
        },
        dataType: "text",
        success: function (response) {
            console.log(response);
            if (response === 'success') {
                window.location.href = "profile.php";
            } else if (response === 'invalidPassword') {
                error.innerText = "Invalid Password";
            } else if (response === 'invalidEmail') {
                error.innerText = "Invalid Email";
            } else {
                error.innerText = "Error";
            }
        }
    });
}