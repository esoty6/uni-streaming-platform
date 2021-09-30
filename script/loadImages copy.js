let frame = document.getElementById("videos");

const br = document.createElement("br");
const hr = document.createElement("hr");

const titles = new Array();

let loadVideos = (nb, ids) => {
    for(let i = 0; i < nb; i++){

        let img = document.createElement("img");
        let path = "./images/filmy/film"+ids[i]+".jpg";

        img.setAttribute("class", "img-responsive")
        img.setAttribute("src", path);

        let div1 = document.createElement("div");
        div1.setAttribute("class", "col-sm-12 col-md-6");
        div1.appendChild(img);

        let div2 = document.createElement("div");
        div2.setAttribute("class", "col-sm-12 col-md-6");

        let h = document.createElement("h1");
        h.innerHTML = titles[i] + "<br><br>";
        h.id = ids[i];

        let btn = document.createElement("button");
        btn.setAttribute("class", "btn");
        btn.setAttribute("onclick", "buy()");
        btn.innerHTML = "Wykup subskrypcję<br>";

        div2.innerHTML = "<br><br><br>";
        div2.appendChild(h);
        div2.appendChild(btn);

        let div3 = document.createElement("div");
        div3.setAttribute("class", "row justify-content-center");
        div3.innerHTML = "<br>";
        
        div3.appendChild(div1);
        div3.appendChild(div2);

        frame.appendChild(div3);
        frame.appendChild(br.cloneNode(true));
        frame.appendChild(hr.cloneNode(true));
    }
}

let loadTitles = (title) => {
    titles.push(title);
}