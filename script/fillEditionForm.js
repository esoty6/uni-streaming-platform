
let loadInfo = (film, gatunek, wytwornia, rezyser) => {
    let inputs = document.getElementsByTagName("input");
    let select = document.getElementsByTagName("select");
    let textarea = document.getElementById("opis");

    inputs[0].value = film['TYTUL'];
    inputs[1].value = film['URL'];
    inputs[2].value = film['IMG'];

    textarea.value += film['OPIS_FILMU'];

    for (let i = 0; i < select.length; i++) {
        if (i == 0){
            for (let j = 0; j < rezyser['IMIE'].length; j++){
                let option = document.createElement("option");
                option.innerText = rezyser['IMIE'][j] + " " + rezyser['NAZWISKO'][j];
                option.value = rezyser['IMIE'][j] + " " + rezyser['NAZWISKO'][j];
        
                select[i].appendChild(option);
            }
        }
        else if (i == 1){
            for (let j = 0; j < gatunek['NAZWA_GATUNKU'].length; j++){
                let option = document.createElement("option");
                option.innerText = gatunek['NAZWA_GATUNKU'][j];
                option.value = gatunek['NAZWA_GATUNKU'][j];
            
                select[i].appendChild(option);
            }
        }
        else if (i == 2){
            for (let j = 0; j < wytwornia["NAZWA_WYTWORNI"].length; j++){
                let option = document.createElement("option");
                option.innerText = wytwornia["NAZWA_WYTWORNI"][j];
                option.value = wytwornia["NAZWA_WYTWORNI"][j];
            
                select[i].appendChild(option);
            }
        }
    }

    let options = document.getElementsByTagName("option");

    for (let i = 0; i < options.length; i++){
        if (film["NAZWA_GATUNKU"] == options[i].value) {
            options[i].selected = true;
        }
        if (film["IMIE"]  + " " + film["NAZWISKO"] == options[i].value) {
            options[i].selected = true;
        }
        if (film["NAZWA_WYTWORNI"] == options[i].value) {
            options[i].selected = true;
        }
    }
}

let loadButtons = () => {
    appendForm();
}

let loadExisting = (gatunek, wytwornia, rezyser) => {
    let select = document.getElementsByTagName("select");

    for (let i = 0; i < select.length; i++) {
        if (i == 0){
            for (let j = 0; j < rezyser['IMIE'].length; j++){
                let option = document.createElement("option");
                option.innerText = rezyser['IMIE'][j] + " " + rezyser['NAZWISKO'][j];
                option.value = rezyser['IMIE'][j] + " " + rezyser['NAZWISKO'][j];
            
                select[i].appendChild(option);
            }
        }
        else if (i == 1){
            for (let j = 0; j < gatunek['NAZWA_GATUNKU'].length; j++){
                let option = document.createElement("option");
                option.innerText = gatunek['NAZWA_GATUNKU'][j];
                option.value = gatunek['NAZWA_GATUNKU'][j];

                select[i].appendChild(option);
            }
        }
        else if (i == 2){
            for (let j = 0; j < wytwornia["NAZWA_WYTWORNI"].length; j++){
                let option = document.createElement("option");
                option.innerText = wytwornia["NAZWA_WYTWORNI"][j];
                option.value = wytwornia["NAZWA_WYTWORNI"][j];
            
                select[i].appendChild(option);
            }
        }
    }
    appendForm();
}

let appendForm = () => {
    let buttons = document.getElementsByClassName("addNew");

    for (let i = 0; i < buttons.length; i++){
        buttons[i].id = "addNew-"+i;
        buttons[i].onclick = appendRezyserForm;
    }
    
    buttons[0].onclick = () => {appendRezyserForm();printer();};
    
    buttons[1].onclick = () => { appendGatunkiForm(); printer();};
    
    buttons[2].onclick = () => { appendWytwornieForm(); printer();};
}

let rezyserFormVisible = false;
let rezyserSelect;

let appendRezyserForm = () => {
    let select = document.getElementById("imie-nazwisko");
    let body = document.getElementById("rezyser-div");
    let div = document.createElement("div");

    if (!rezyserFormVisible){
        rezyserSelect = select.cloneNode(true);

        let imieRezysera = document.createElement("input");
        imieRezysera.setAttribute("type", "text");
        imieRezysera.required = true;
        imieRezysera.maxLength = 64;
        imieRezysera.setAttribute("placeholder", "Imie reżysera");
        imieRezysera.name = "imie-rezysera";

        let nazwiskoRezysera = document.createElement("input");
        nazwiskoRezysera.setAttribute("type", "text");
        nazwiskoRezysera.required = true;
        nazwiskoRezysera.maxLength = 64;
        nazwiskoRezysera.setAttribute("placeholder", "Nazwisko reżysera");
        nazwiskoRezysera.name = "nazwisko-rezysera";

        body.removeChild(select);

        div.append(document.createElement("br"));

        div.append(imieRezysera);

        div.append(document.createElement("br"));
        div.append(document.createElement("br"));

        div.append(nazwiskoRezysera);

        div.appendChild(document.createElement("br"));

        body.append(div);
        rezyserFormVisible = true;
    }
    else {
        body.removeChild(body.lastChild);
        body.insertBefore(rezyserSelect, body.firstChild)
        rezyserFormVisible = false;
    }
}


let gatunkiFormVisible = false;
let gatunkiSelect;

let appendGatunkiForm = () => {
    let select = document.getElementById("gatunek");
    let body = document.getElementById("gatunek-div");
    let div = document.createElement("div");

    if (!gatunkiFormVisible){
        gatunkiSelect = select.cloneNode(true);

        let gatunekNew = document.createElement("input");
        gatunekNew.setAttribute("type", "text");
        gatunekNew.required = true;
        gatunekNew.maxLength = 64;
        gatunekNew.setAttribute("placeholder", "Nazwa gatunku");
        gatunekNew.name = "gatunek";


        body.removeChild(select);
        div.appendChild(document.createElement("br"));
        div.append(gatunekNew);
        div.appendChild(document.createElement("br"));

        body.append(div);
        gatunkiFormVisible = true;
    }
    else {
        body.removeChild(body.lastChild);
        body.insertBefore(gatunkiSelect, body.firstChild)
        gatunkiFormVisible = false;
    }
}

let wytwornieFormVisible = false;
let wytrwornieSelect;

let appendWytwornieForm = () => {
    let select = document.getElementById("wytwornia");
    let body = document.getElementById("wytwornia-div");
    let div = document.createElement("div");

    if (!wytwornieFormVisible){
        wytrwornieSelect = select.cloneNode(true);

        let nazwaWytworni = document.createElement("input");
        nazwaWytworni.setAttribute("type", "text");
        nazwaWytworni.required = true;
        nazwaWytworni.maxLength = 64;
        nazwaWytworni.setAttribute("placeholder", "Nazwa wytworni");
        nazwaWytworni.name = "wytwornia";

        body.removeChild(select);
        div.appendChild(document.createElement("br"));
        div.append(nazwaWytworni);
        div.appendChild(document.createElement("br"));

        body.append(div);
        wytwornieFormVisible = true;
    }
    else {
        body.removeChild(body.lastChild);
        body.insertBefore(wytrwornieSelect, body.firstChild)
        wytwornieFormVisible = false;
    }
}

let loadStanowiska = (stanowiska) => {
    let select = document.getElementsByTagName("select");

    for (let j = 0; j < stanowiska['NAZWA_STANOWISKA'].length; j++){
        let option = document.createElement("option");
        option.innerText = stanowiska['NAZWA_STANOWISKA'][j];
        option.value = stanowiska['NAZWA_STANOWISKA'][j];

        select[0].appendChild(option);
        select[0].setAttribute("onclick", "printer()");
    }
}


let fillForm = (pracownik) => {
    let inputs = document.getElementsByTagName("input");

    inputs[0].value = pracownik['IMIE'];
    inputs[1].value = pracownik['NAZWISKO'];
    inputs[2].value = pracownik['NUMER_TEL'];
    inputs[3].value = pracownik['EMAIL'];
    inputs[4].value = pracownik['HASLO'];

    let options = document.getElementsByTagName("option");

    for (let i = 0; i < options.length; i++){
        if (pracownik["NAZWA_STANOWISKA"] == options[i].value) {
            options[i].selected = true;
        }
    }
}