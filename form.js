document.addEventListener('DOMContentLoaded', function() {
    // implementing focus/blur method for form elements
    const fields = document.getElementsByTagName("input");
    
    for (let f of fields)
    {
    f.addEventListener("focus", setElementBackground);
    f.addEventListener("blur", setElementBackground);
    }
    
    /*Input Validation*/
    const form = document.getElementById("pokemonForm");
    form.addEventListener("submit", evaulateInput);
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
function evaulateInput(e) {
    // A boolean value to keep track whether the form should be submitted or not
    const validInput = true;
    const pokemon = document.getElementById("f-pokemon").value;
    if (pokemon == null || pokemon == "") {
        e.preventDefault();
        validInput = false;
        alert("You must enter a Pokemon")
    }

    const generation = document.getElementById("f-generation").value;
    if (generation == "Choose a generation") {
        e.preventDefault();
        validInput = false;
        alert("You must select a generation")
    }

    const email = document.getElementById("f-email").value;
    /* Regular Expression to check for email, I used these sources to help construct the regular expression: 
    https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions - basic knowledge
    https://www.w3schools.com/js/js_regexp.asp - basic knowledge
    https://stackoverflow.com/questions/28848180/regular-expression-for-wild-card-search-in-javascript - .+ is wildcard with min 1 char
    This regular expression is equivalent to "_@_._" where "_" is at least one character*/
    const regularExpression = /.+@.+\..+/;
    if (!regularExpression.test(email)) {
        e.preventDefault();
        validInput = false;
        alert("You must enter a valid email address")
    }

    /*Exit if Input is invalid*/
    if (!validInput) {
        return
    }
    /*Successful Form - therefore replace page with JSON output*/
    const pokemonInfo = {Pokemon: pokemon, Generation: generation, Email: email};
    document.write(JSON.stringify(pokemonInfo));
}
