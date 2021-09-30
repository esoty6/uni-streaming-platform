let passFormOpen = false;
let emailFormOpen = false;
let deleteFormOpen = false;

let oldPass;
let newPass;

let appendPassForm = () => {
    let body = document.getElementById("zmiana");
    if(document.getElementById("update-info") !== null){
        let update = document.getElementById("update-info");
        update.remove();
    }
    if(!passFormOpen & !emailFormOpen & !deleteFormOpen){

    let div = document.createElement("div");

    let form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("name", "changePass");
    
    let button = document.createElement("button");
    button.setAttribute("type", "submit");
    button.className = "btn";
    button.name = "submit";
    button.disabled = true;
    button.innerHTML = "Zatwierdź";

    div.className = "container w-25 justify-content-end";

    let oldPass = document.createElement("input");
    oldPass.setAttribute("type", "password");
    oldPass.required = true;
    oldPass.setAttribute("placeholder", "Stare hasło");
    oldPass.name = "oldPass";

    let newPass = document.createElement("input");
    newPass.setAttribute("type", "password");
    newPass.required = true;
    newPass.setAttribute("placeholder", "Nowe hasło");
    newPass.name = "newPass";


    form.append(oldPass);
    form.append(document.createElement("br"));
    form.append(document.createElement("br"));
    form.append(newPass);
    form.append(document.createElement("br"));
    form.append(document.createElement("br"));
    form.append(button);

    div.append(form);

    body.append(div);
    passFormOpen = true;
    newPass.onkeyup = formValPass;
    oldPass.onkeyup = formValPass;
    }
    else if(emailFormOpen){
        emailFormOpen = false;
        body.removeChild(body.lastChild);
        setTimeout(appendPassForm, 100);
    }
    else if(deleteFormOpen){
        deleteFormOpen = false;
        body.removeChild(body.lastChild);
        setTimeout(appendPassForm, 100);
    }
    else {
        passFormOpen = false;
        body.removeChild(body.lastChild);
    }
    
}

let appendEmailForm = () => {
    let body = document.getElementById("zmiana");
    if(document.getElementById("update-info") !== null){
        let update = document.getElementById("update-info");
        update.remove();
    }
    if(!passFormOpen & !emailFormOpen & !deleteFormOpen){
    
        let div = document.createElement("div");
    
        let form = document.createElement("form");
        form.setAttribute("method", "post");
        
        let button = document.createElement("button");
        button.setAttribute("type", "submit");
        button.className = "btn";
        button.innerHTML = "Zatwierdź";
    
        div.className = "container w-25 justify-content-end";
    
        let oldEmail = document.createElement("input");
        oldEmail.setAttribute("type", "email");
        oldEmail.required = true;
        oldEmail.setAttribute("placeholder", "Stary email");
        oldEmail.name = "oldEmail";
    
        let newEmail = document.createElement("input");
        newEmail.setAttribute("type", "email");
        newEmail.required = true;
        newEmail.setAttribute("placeholder", "Nowy email");
        newEmail.name = "newEmail";
    
    
        form.append(oldEmail);
        form.append(document.createElement("br"));
        form.append(document.createElement("br"));
        form.append(newEmail);
        form.append(document.createElement("br"));
        form.append(document.createElement("br"));
        form.append(button);
    
        div.append(form);
    
        body.append(div);
        emailFormOpen = true;
        }
        else if(passFormOpen){
            passFormOpen = false;
            body.removeChild(body.lastChild);
            setTimeout(appendEmailForm, 100);
        }
        else if(deleteFormOpen){
            deleteFormOpen = false;
            body.removeChild(body.lastChild);
            setTimeout(appendEmailForm, 100);
        }
        else {
            emailFormOpen = false;
            body.removeChild(body.lastChild);
        }
}

let deleteAccount = () => {
    let body = document.getElementById("zmiana");
    
    if(document.getElementById("update-info") !== null){
        let update = document.getElementById("update-info");
        update.remove();
    }
    if(!passFormOpen & !emailFormOpen & !deleteFormOpen){
    
        let div = document.createElement("div");
    
        let form = document.createElement("form");
        form.setAttribute("method", "post");
        form.setAttribute("name", "changePass");
        
        let button = document.createElement("button");
        button.setAttribute("type", "submit");
        button.className = "btn";
        button.name = "button";
        button.disabled = true;
        button.innerHTML = "Zatwierdź";
    
        div.className = "container w-25 justify-content-end";
    
        let potwierdzenie = document.createElement("input");
        potwierdzenie.setAttribute("type", "text");
        potwierdzenie.required = true;
        potwierdzenie.setAttribute("placeholder", "Wpisz 'TAK' jeśli chcesz usunąć konto");
        potwierdzenie.name = "confirm";
    
        form.append(document.createElement("br"));
        form.append(document.createElement("br"));
        form.append(potwierdzenie);
        form.append(document.createElement("br"));
        form.append(document.createElement("br"));
        form.append(button);
    
        div.append(form);
    
        body.append(div);
        deleteFormOpen = true;
        potwierdzenie.onkeyup = checkConfirm;
    }
    else if(passFormOpen){
        passFormOpen = false;
        body.removeChild(body.lastChild);
        setTimeout(deleteAccount, 100);
    }
    else if(emailFormOpen){
        emailFormOpen = false;
        body.removeChild(body.lastChild);
        setTimeout(deleteAccount, 100);
    }
    else {
        deleteFormOpen = false;
        body.removeChild(body.lastChild);
    }
}

let formValPass = () => {
    let oldpass = document.forms["changePass"]["oldPass"].value;
    let newpass = document.forms["changePass"]["newPass"].value;
    let btn = document.forms["changePass"]["submit"];

    if(oldpass.length >= 8){
        document.forms["changePass"]["oldPass"].style.border = "2px solid green";
        btn.disabled = false;
    }
    else{
        document.forms["changePass"]["oldPass"].style.border = "2px solid red";
        btn.disabled = true;
    }
    if(newpass.length >= 8){
        document.forms["changePass"]["newPass"].style.border = "2px solid green";
        btn.disabled = false;
    }
    else{
        document.forms["changePass"]["newPass"].style.border = "2px solid red";
        btn.disabled = true;
    }
}

let checkConfirm = () => {
    let confirm = document.forms["changePass"]["confirm"].value;
    let btn = document.forms["changePass"]["button"];

    if(confirm.length == 3 & confirm == 'TAK'){
        document.forms["changePass"]["confirm"].style.border = "2px solid green";
        btn.disabled = false;
    }
    else{
        document.forms["changePass"]["confirm"].style.border = "2px solid red";
        btn.disabled = true;
    }
}
