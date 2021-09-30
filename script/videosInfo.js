let getVideoName = (x) => {
    let name = document.getElementById(x+'-h1').innerText;
    document.getElementById(x+'-h1').nodeValue = name;
}

let getVideosLength = () => {
    for (let i = 1; i <= document.getElementsByTagName("form").length; i++) {

        document.getElementsByTagName("h1")[i].id = i+'-h1';

        let inputer = document.createElement("input");

        inputer.setAttribute("type", "hidden");
        inputer.name = "film-"+i;

        inputer.value = document.getElementById(i+'-h1').innerText;

        document.getElementsByTagName("form")[i-1].appendChild(inputer);

        document.getElementsByTagName("button")[i].onclick = () => {getVideoName(i)};

    }
}

window.onload = getVideosLength();

let loadVideo = (url) => {
    let iframe = document.createElement("playerDiv");
    iframe.setAttribute("src", url);
    iframe.setAttribute("id", "ifrm");
    iframe.setAttribute("width", "1280");
    iframe.setAttribute("height", "720");
}