document.addEventListener('DOMContentLoaded', function() {
    // implementing focus/blur method for form elements
    const fields = document.getElementsByTagName("input");
    
    for (let f of fields)
    {
        f.addEventListener("focus", setElementBackground);
        f.addEventListener("blur", setElementBackground);
    }
    /*Input Validation*/
    const forms = document.getElementsByTagName("form");
    for (let form of forms) {
        form.addEventListener("submit", evaluateInput);
    }
})

// will be called when a form element receives focus
function setElementBackground(e){
    if(e.type == "focus"){
        e.target.classList.toggle("focused");
    }
    else if(e.type == "blur"){
        e.target.classList.toggle("focused");
    }
}

/*Input Validation*/
function evaluateInput(e) {
    // A boolean value to keep track whether the form should be submitted or not
    let validInput = true;
    if (e.target.classList.contains("hasName")) {
        const name = document.getElementById("f-name").value;
        const errorTag = document.getElementById("f-name-err");
            if (name == null || name == "") {
                e.preventDefault();
                validInput = false;
                errorTag.textContent = "You must enter a name";
            } else {
                errorTag.textContent = "";
            }
    }
    if (e.target.classList.contains("hasEmail")) {
        const email = document.getElementById("f-email").value;
        const errorTag = document.getElementById("f-email-err");
        const regularExpression = /.+@.+\..+/;
        if (!regularExpression.test(email)) {
            e.preventDefault();
            validInput = false;
            errorTag.textContent = "You must enter a valid email address.";
        } else {
            errorTag.textContent = "";
        }
    }

    if (e.target.classList.contains("hasPassword")) {
        const password = document.getElementById("f-password").value;
        const errorTag = document.getElementById("f-password-err");
        if (password == null || password.length < 4) {
            e.preventDefault();
            validInput = false;
            errorTag.textContent = "Your password must be at least 4 characters.";
        } else {
            errorTag.textContent = "";
        }
    }

    /*Exit if Input is invalid*/
    if (!validInput) {
        return;
    }
}
