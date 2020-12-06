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

function submitFormProperty() {
    const title = document.getElementById("title");
    const price = document.getElementById("price");
    const description = document.getElementById("description");
    const address = document.getElementById("address");
    const error_title = document.getElementById("error-title");
    const error_price = document.getElementById("error-price");
    const error_description = document.getElementById("error-description");
    const error_address = document.getElementById("error-address");
    let error = false;
    error_title.innerText = error_price.innerText = error_description.innerText = error_address.innerText = "";
    
    if ( title.value.trim() == "" ){
        error_title.innerText = "Campo obrigatório";
        error_title.style.display = "inline";
        error = true;
    } else {
        error_title.style.display = "none";        
    }
    
    if ( price.value.trim() == "" ){
        error_price.innerText = "Campo obrigatório";
        error_price.style.display = "inline";
        error = true;
    } else {
        error_price.style.display = "none";        
    }

    if ( description.value.trim() == "" ){
        error_description.innerText = "Campo obrigatório";
        error_description.style.display = "inline";
        error = true;
    } else {
        error_description.style.display = "none";        
    }

    if ( address.value.trim() == "" ){
        error_address.innerText = "Campo obrigatório";
        error_address.style.display = "inline";
        error = true;
    } else {
        error_address.style.display = "none";        
    }


    if(!error){
        document.getElementById("form-property").submit();
    }
}