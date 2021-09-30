let boxSolo = document.getElementById("solo");

let boxDuo = document.getElementById("duo");

let boxBundle = document.getElementById("bundle");

let pS = document.createElement("p");
let pD = document.createElement("p");
let pB = document.createElement("p");

boxSolo.appendChild(pS);
boxDuo.appendChild(pD);
boxBundle.appendChild(pB);

let pakietKupiony = false;

boxSolo.addEventListener("mouseenter", () => {
    boxSolo.style.transition = 'all 0.85s';
    boxDuo.style.transition = 'all 0.85s';
    boxBundle.style.transition = 'all 0.85s';

    boxSolo.style.transform = 'scale(0.95, 0.95)';
    boxDuo.style.transform = 'scale(0.75, 0.75)';
    boxBundle.style.transform = 'scale(0.75, 0.75)';
    solo();
})

boxSolo.addEventListener("mouseleave", () => {
    boxSolo.style.transform = 'scale(0.85,0.85)';
    boxDuo.style.transform = 'scale(0.85,0.85)';
    boxBundle.style.transform = 'scale(0.85,0.85)';
    boxSolo.removeChild(pS);
})

boxDuo.addEventListener("mouseenter", () => {
    boxSolo.style.transition = 'all 0.85s';
    boxDuo.style.transition = 'all 0.85s';
    boxBundle.style.transition = 'all 0.85s';

    boxDuo.style.transform = 'scale(0.95, 0.95)';

    boxSolo.style.transform = 'scale(0.75, 0.75)';
    boxBundle.style.transform = 'scale(0.75, 0.75)';
    duo();
})

boxDuo.addEventListener("mouseleave", () => {
    boxSolo.style.transform = 'scale(0.85,0.85)';
    boxDuo.style.transform = 'scale(0.85,0.85)';
    boxBundle.style.transform = 'scale(0.85,0.85)';
    boxDuo.removeChild(pD);
})

boxBundle.addEventListener("mouseenter", () => {
    boxSolo.style.transition = 'all 0.85s';
    boxDuo.style.transition = 'all 0.85s';
    boxBundle.style.transition = 'all 0.85s';

    boxBundle.style.transform = 'scale(0.95, 0.95)';

    boxSolo.style.transform = 'scale(0.75, 0.75)';
    boxDuo.style.transform = 'scale(0.75, 0.75)';
    bundle();
})

boxBundle.addEventListener("mouseleave", () => {
    boxSolo.style.transform = 'scale(0.85,0.85)';
    boxDuo.style.transform = 'scale(0.85,0.85)';
    boxBundle.style.transform = 'scale(0.85,0.85)';
    boxBundle.removeChild(pB);
})

let solo = () => {
    if (!pakietKupiony){
        pS.innerHTML="Czy chcesz kupić ten pakiet?";
        boxSolo.appendChild(pS);
    }
}

let duo = () => {
    if (!pakietKupiony){
        pD.innerHTML="Czy chcesz kupić ten pakiet?";
        boxDuo.appendChild(pD);
    }
}

let bundle = () => {
    if (!pakietKupiony){
        pB.innerHTML="Czy chcesz kupić ten pakiet?";
        boxBundle.appendChild(pB);
    }
}

let soloBuy = () =>{
    if (!pakietKupiony) {
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;
        boxSolo.style.border = '2px solid white';
        boxSolo.style.color = 'white';
        boxSolo.style.textShadow = '0px 0px 2px black';
        boxSolo.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        
        boxSolo.appendChild(pa);
        boxSolo.removeChild(pS);
        
        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxDuo.appendChild(by);
        boxBundle.appendChild(by2);
        
        cloneBox();
        window.location.href = "kupnoPakietuSolo.php";
    }
}


let duoBuy = () => {
    if (!pakietKupiony) {
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;
        
        boxDuo.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        boxDuo.style.color = 'white';
        boxDuo.style.textShadow = '0px 0px 2px black';
        boxDuo.style.border = '2px solid white';

        boxDuo.appendChild(pa);
        boxDuo.removeChild(pD);

        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxSolo.appendChild(by);
        boxBundle.appendChild(by2);
        
        cloneBox();
        window.location.href = "kupnoPakietuDuo.php";
    }
}

let bundleBuy = () => {
    if (!pakietKupiony) {
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;

        boxBundle.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        boxBundle.style.color = 'white';
        boxBundle.style.textShadow = '0px 0px 2px black';
        boxBundle.style.border = '2px solid white';

        boxBundle.appendChild(pa);
        boxBundle.removeChild(pB);

        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxDuo.appendChild(by);
        boxSolo.appendChild(by2);
        
        cloneBox();
        window.location.href = "kupnoPakietuBundle.php";
    }
}

let soloBought = () =>{
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;
        boxSolo.style.border = '2px solid white';
        boxSolo.style.color = 'white';
        boxSolo.style.textShadow = '0px 0px 2px black';
        boxSolo.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        
        boxSolo.appendChild(pa);
        boxSolo.removeChild(pS);

        boxSolo.style.transform = 'scale(0.95, 0.95)';
        boxDuo.style.transform = 'scale(0.75, 0.75)';
        boxBundle.style.transform = 'scale(0.75, 0.75)';
        
        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxDuo.appendChild(by);
        boxBundle.appendChild(by2);
        
        cloneBox();
}


let duoBought = () => {
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;
        
        boxDuo.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        boxDuo.style.color = 'white';
        boxDuo.style.textShadow = '0px 0px 2px black';
        boxDuo.style.border = '2px solid white';

        boxDuo.style.transform = 'scale(0.95, 0.95)';
        boxSolo.style.transform = 'scale(0.75, 0.75)';
        boxBundle.style.transform = 'scale(0.75, 0.75)';

        boxDuo.appendChild(pa);
        boxDuo.removeChild(pD);

        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxSolo.appendChild(by);
        boxBundle.appendChild(by2);
        
        cloneBox();
}

let bundleBought = () => {
        let pa = document.createElement("p");
        pa.innerHTML="Aktywny pakiet";
        pakietKupiony = true;

        boxBundle.style.background = "radial-gradient(circle at bottom, rgb(0, 214, 186), transparent 90%),radial-gradient(ellipse at top, #ff3b3b, transparent 75%)";
        boxBundle.style.color = 'white';
        boxBundle.style.textShadow = '0px 0px 2px black';
        boxBundle.style.border = '2px solid white';

        boxBundle.style.transform = 'scale(0.95, 0.95)';
        boxSolo.style.transform = 'scale(0.75, 0.75)';
        boxDuo.style.transform = 'scale(0.75, 0.75)';

        boxBundle.appendChild(pa);
        boxBundle.removeChild(pB);

        let by = document.createElement("p");
        by.innerHTML="Masz aktywny inny pakiet";
        let by2 = by.cloneNode(true);
        boxDuo.appendChild(by);
        boxSolo.appendChild(by2);
        
        cloneBox();
}

let cloneBox = () => {
    boxSoloNew = boxSolo.cloneNode(true);
    boxSolo.parentNode.replaceChild(boxSoloNew, boxSolo);
    
    boxDuoNew = boxDuo.cloneNode(true);
    boxDuo.parentNode.replaceChild(boxDuoNew, boxDuo);

    boxBundleNew = boxBundle.cloneNode(true);
    boxBundle.parentNode.replaceChild(boxBundleNew, boxBundle);
}