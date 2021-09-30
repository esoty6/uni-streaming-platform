let btn = document.getElementsByClassName("btn");

let replaceSub = () => {
    for (let i = 0; i < btn.length; i++){
        let form = document.createElement("form");
        
        form.setAttribute("method", "post");
        form.setAttribute("action", "playerPreview.php");
        
        btn[i].innerHTML = "Oglądaj teraz";
        btn[i].parentNode.append(form);
        btn[i].setAttribute("type", "submit");
        btn[i].removeAttribute("onclick");

        let inputer = document.createElement("input");

        inputer.setAttribute("type", "hidden");
        inputer.name = "input-"+i;

        inputer.value = document.getElementsByTagName("h1")[i].id;

        form.appendChild(inputer);
        form.appendChild(btn[i]);
    }
}

window.onload = replaceSub();
