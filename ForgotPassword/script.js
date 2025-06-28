const pwField = document.querySelectorAll('.signupPassword'),
      pwShowHide = document.querySelectorAll('.showHidepw1');

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () =>{
        pwField.forEach(pawField => {
            if(pawField.type === "password"){
                pawField.type = "text";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("fa-eye-slash","fa-eye")
                })
            }else{
                pawField.type = "password";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("fa-eye","fa-eye-slash")
                })
            }
        })
    })
})