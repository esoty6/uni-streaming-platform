
let printer = () => {
    let select = document.getElementsByTagName("select");
    let submit = document.getElementById("dodajbutton");

    if (select.length == 0)
        submit.removeAttribute("disabled");

    for (let i = 0; i < select.length; i++){
        if (!(select[i].value == "")){
            submit.removeAttribute("disabled");
            select[i].style.border = "2px solid green";
        } 
        else{
            submit.setAttribute("disabled", "true");
            select[i].style.border = "2px solid red";
            setTimeout(printer, 2500);
        } 
    }
}

window.onload = printer;
