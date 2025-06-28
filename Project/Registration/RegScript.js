const pwShowHide1 = document.querySelectorAll('.showHidepw1'),
    spwField = document.querySelectorAll('.signupPassword');

pwShowHide1.forEach(eyeIcon1 => {
    eyeIcon1.addEventListener("click", () => {
        spwField.forEach(pawField1 => {
            if (pawField1.type === "password") {
                pawField1.type = "text";
                pwShowHide1.forEach(icon1 => {
                    icon1.classList.replace("fa-eye-slash", "fa-eye")
                })
            } else {
                pawField1.type = "password";

                pwShowHide1.forEach(icon1 => {
                    icon1.classList.replace("fa-eye", "fa-eye-slash");
                })
            }
        })
    })
});

document.getElementById("submit").addEventListener("click", function(event) {
    // event.preventDefault();
    // alert("Check!!");

    //textboxes
    const fnamePattern = /^[a-zA-Z\s]+$/;
    const unamePattern = /^[a-zA-Z0-9_]{4,}$/;
    const phonePattern = /^\d{10}$/;
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    let fname = document.getElementById("fname");
    let uname = document.getElementById("uname");
    let email = document.getElementById("email");
    let contact = document.getElementById("contact");
    let pswd = document.getElementById("pswd");
    let cnf_pswd = document.getElementById("cnf-pswd");

    //span labels
    const fnamelbl = document.querySelector('#fnamelbl');
    const unamelbl = document.querySelector('#unamelbl');
    const emaillbl = document.querySelector('#emaillbl');
    const phonelbl = document.querySelector('#phonelbl');
    const pswdlbl = document.querySelector('#pswdlbl');
    const cnfpswdlbl = document.querySelector('#cnfpswdlbl');

    validationForm();

    full_validation();
});

/*
document.getElementById("uname").addEventListener("change", ubnameExistCheck);

function ubnameExistCheck() {
    // var unamelbl = document.querySelector('#unamelbl');
    // var uname = document.getElementById("uname");

    // //check the username in the server using ajax
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //     if (this.readyState == 4 && this.status == 200) {
    //         //parse the response
    //         var response = JSON.parse(this.responseText);
    //         if (response.exists) {
    //             //change the color of the textbox
    //             usernameInput.style.backgroundColor = "red";
    //             unamelbl.innerHTML = 'Username - ALREADY EXIST';
    //             unamelbl.style.color = 'red';
    //             uname.focus();
    //             uname.style.borderColor = "red";
    //         }
    //     }
    // }
    // xhttp.open("GET", "connect.php?username=" + uname.value, true);
    // xhttp.send();



    var uname = document.getElementById("uname");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "connect.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            if (response == "usernameExist") {
                //change color of textbox and lbl
                unamelbl.innerHTML = 'Username - Username - ALREADY EXIST';
                unamelbl.style.color = 'red';
                uname.focus();
                uname.style.borderColor = "red";
                return false;
            }
        }
    }
    xhr.send("username=" + uname.value);

}
*/

document.getElementById("cnf-pswd").addEventListener("keyup", matchPasswords);

function matchPasswords() {
    let pswd = document.getElementById("pswd");
    let cnf_pswd = document.getElementById("cnf-pswd");
    const cnfpswdlbl = document.querySelector('#cnfpswdlbl');

    if (pswd.value !== cnf_pswd.value) {
        cnfpswdlbl.innerHTML = 'Confirm Password - NOT MATCH';
        cnfpswdlbl.style.color = 'red';
        cnf_pswd.focus();
        cnf_pswd.style.borderColor = "red";
        // alert("Passwords do not match");
        event.preventDefault();
        return false;
    } else {
        cnfpswdlbl.innerHTML = 'Confirm Password';
        cnfpswdlbl.style.color = 'black';
        cnf_pswd.style.borderColor = "#199280";
    }
}

function validationForm() {
    // let fname = document.forms['RegForm']['fname'];
    // let fname = document.RegForm.myfname;
    // let fname = document.getElementsByName("myfname")[0];

    var fnameRegex = /^([A-Za-z]+(\s+)){1,}[A-Za-z]+$/;
    if (fname.value.length < 5 || fname.value.length > 20 || !(fnameRegex.test(fname.value))) {
        // alert("Enter valid Full Name!!");
        // document.querySelector('.details').innerHTML = 'Full Name - INVALID';
        fnamelbl.innerHTML = 'Full Name - INVALID';
        fnamelbl.style.color = 'red';
        fname.focus();
        fname.style.borderColor = "red";
        event.preventDefault();
        return false;
    } else {
        fnamelbl.innerHTML = 'Full Name';
        fnamelbl.style.color = 'black';
        fname.style.borderColor = "#199280";
    }

    var unameRegex = /^[A-Za-z]{3}\w+$/;
    // var unameExists = "<?php echo $_SESSION['username_exists']; ?>";
    if (!(unameRegex.test(uname.value))) {
        unamelbl.innerHTML = 'Username - INVALID';
        unamelbl.style.color = 'red';
        uname.focus();
        uname.style.borderColor = "red";
        event.preventDefault();
        return false;
    } else {
        unamelbl.innerHTML = 'Username';
        unamelbl.style.color = 'black';
        uname.style.borderColor = "#199280";
    }

    // email.addEventListener("invalid", function(event) {
    //     // Prevent the browser's default error message
    //     event.preventDefault();

    //     // Show a custom error message in an alert
    //     alert("Please enter a valid email address");

    //     // Set focus to the email input
    //     email.focus();

    //     // Clear the custom error message
    //     email.setCustomValidity("");
    // });

    ///var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!(emailRegex.test(email.value))) {
        emaillbl.innerHTML = 'Email - INVALID';
        emaillbl.style.color = 'red';
        email.focus();
        email.style.borderColor = "red";
        event.preventDefault();
        return false;
    } else {
        emaillbl.innerHTML = 'Email';
        emaillbl.style.color = 'black';
        email.style.borderColor = "#199280";
    }
    
    // var conRegex = /^\d{10}$/;
    var conRegex = /^(0)?[6789]\d{9}$/; // /^(\+91|\+91\-|0)?[6789]\d{9}$/;
    if (!(conRegex.test(contact.value))) {
        phonelbl.innerHTML = 'Phone Number - INVALID';
        phonelbl.style.color = 'red';
        contact.focus();
        contact.style.borderColor = "red";
        event.preventDefault();
        return false;
    }
    else {
        phonelbl.innerHTML = 'Phone Number';
        phonelbl.style.color = 'black';
        contact.style.borderColor = "#199280";
    }

    // function validatePassword() {
    //     if (pswd.length < 8) {
    //         return false;
    //     }
    //     if (!/[a-z]/.test(pswd.value)) {
    //         return false;
    //     }
    //     if (!/[A-Z]/.test(pswd.value)) {
    //         return false;
    //     }
    //     if (!/\d/.test(pswd.value)) {
    //         return false;
    //     }
    //     return true;
    // }

    var passRegs = /^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,16}$/;
    // password must contain 1 number(0 - 9)
    // password must contain 1 uppercase letters
    // password must contain 1 lowercase letters
    // password must contain 1 non - alpha numeric number
    // password is 8 - 16 characters with no space
    if (!(passRegs.test(pswd.value))) {
        pswdlbl.innerHTML = 'Password - INVALID';
        pswdlbl.style.color = 'red';
        pswd.focus();
        pswd.style.borderColor = "red";
        event.preventDefault();
        return false;
    } else {
        pswdlbl.innerHTML = 'Password';
        pswdlbl.style.color = 'black';
        pswd.style.borderColor = "#199280";
    }
    //check username already present
    // ubnameExistCheck();

    //check with every key press
    matchPasswords();
    full_validation();
}


function full_validation()
{
    if (fnamelbl.style.color == 'red' || unamelbl.style.color == 'red' || emaillbl.style.color == 'red' ||
        phonelbl.style.color == 'red' || pswdlbl.style.color == "red" || cnfpswdlbl.style.color == "red") {
        // alert("Something Invalid Entered!!");
        // this.focus()
        event.preventDefault();
    }
    else
        return true;
}