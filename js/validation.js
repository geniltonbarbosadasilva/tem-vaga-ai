function submitFormUser() {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const error_name = document.getElementById("error-name");
    const error_email = document.getElementById("error-email");
    const error_password = document.getElementById("error-password");
    let error = false;
    error_name.innerText = error_email.innerText = error_password.innerText = "";
    
    if ( name.value.trim() == "" ){
        error_name.innerText = "Campo obrigatório";
        error_name.style.display = "inline";
        error = true;
    } else {
        error_name.style.display = "none";        
    }

    if ( email.value.trim() == "" ){
        error_email.style.display = "inline";
        error_email.innerText = "Campo obrigatório";
        error = true;
    } else {
        const mailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if ( !email.value.match(mailFormat) ){
            error_email.style.display = "inline";
            error_email.innerText = "Email invalido";
            error = true;
        } else {
            error_email.style.display = "none";
        }
    }
    
    if ( password.value.trim() == "" ){
        error_password.style.display = "inline";
        error_password.innerText = "Campo obrigatório";
        error = true;
    } else {
        error_password.style.display = "none";
    }

    if(!error){
        document.getElementById("form-user").submit();
    }
}