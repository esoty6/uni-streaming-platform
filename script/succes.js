let div = document.getElementById("zmiana");

let display = (option) => {
    let p = document.createElement("p");
    let div1 = document.createElement("div");

    div1.className="flex-rox";
    div1.style.textAlign = "center";
    div1.style.fontSize = "large";
    div1.id = "update-info";

    if (option == 0)
        p.innerHTML = "";
    else if (option == 1){
        p.innerHTML = "Pomyślnie zmieniono dane";
        p.className = "update-succes";
    }
    else if (option == -1){
        p.innerHTML = "Nie udało się zmienić danych";
        p.className = "update-failure";
    }
    else if (option == -2){
        p.innerHTML = "W bazie istnieje już taki email";
        p.className = "update-failure";
    }
    div1.appendChild(p);
    div.appendChild(div1);
}

let printW = () => {
    let body = document.getElementById("body-error");
    let div = document.createElement("div");

    div.innerHTML = "Zaraz zostaniesz przekierowany spowrotem na stronę";

    body.appendChild(div);
    setTimeout(() => {window.location.href = "zarzadzaniePracownikami.php"}, 1500)
}

let registerSucces = (value) => {
    if(!value){
        let div = document.getElementById("result");
        div.className = "error";
        div.innerText = "Nie udało się zarejestrować";
    }
    else {
        let div = document.getElementById("result");
        div.className = "succes";
        div.innerText = "Pomyślnie zarejestrowano";
    }
}


let loginSucces = (value, isWorker) => {
    if(!value & !isWorker){
        let div = document.getElementById("result");
        div.className = "error";
        div.innerText = "Nie udało się zalogować";
    }
    else if (value & isWorker) {
        let div = document.getElementById("result");
        div.className = "succes";
        div.innerText = "Pomyślnie zalogowano";
        setTimeout(() => {window.location.href = "adminPanel.php"},1000);
    }
    else if(value){
        let div = document.getElementById("result");
        div.className = "succes";
        div.innerText = "Pomyślnie zalogowano";
        setTimeout(() => {window.location.href = "indexLogin.php"},1000);
    }
}