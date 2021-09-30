
let editVideo = (ids) => {
    let buttons_edit = document.getElementsByClassName("edit");
    for (let i = 0; i < buttons_edit.length; i++){
        buttons_edit[i].name = "film_id_edit"+ids[i];
        buttons_edit[i].value = ids[i];
    }

    let buttons_view = document.getElementsByClassName("view");
    for (let i = 0; i < buttons_view.length; i++){
        buttons_view[i].name = "film_id_view"+ids[i];
        buttons_view[i].value = ids[i];
    }


    let buttons_delete = document.getElementsByClassName("delete");
    for (let i = 0; i < buttons_delete.length; i++){
        buttons_delete[i].name = "film_id_delete"+ids[i];
        buttons_delete[i].value = ids[i];
    }
}


let potwierdz = (x) => {
    for(i = 1; i < document.getElementById('adminTable').rows.length; i++){
        document.getElementById('adminTable').rows[i].cells[1].id = 'row' + i;
    }
    let row = document.getElementById('row'+x).innerText;
    let form = document.getElementById('formDelete'+x);
    
    if(confirm('Czy na pewno chcesz usunąć film: ' + row)){
        let sub = document.getElementsByClassName("delete");

        sub[x-1].setAttribute("type", "submit");

        form.appendChild(input);

        form.submit();
    }
}


let potwierdzPracownik = (x) => {
    for(i = 1; i < document.getElementById('adminTable').rows.length; i++){
        document.getElementById('adminTable').rows[i].cells[1].id = 'row1' + i;
        document.getElementById('adminTable').rows[i].cells[2].id = 'row2' + i;
    }
    let row = document.getElementById('row1'+x).innerText + " " + document.getElementById('row2'+x).innerText;
    let form = document.getElementById('formDelete'+x);
    
    if(confirm('Czy na pewno chcesz zwolnić tego pracownika?: ' + row)){
        let sub = document.getElementsByClassName("delete");

        sub[x-1].setAttribute("type", "submit");

        form.appendChild(input);

        form.submit();
    }
}