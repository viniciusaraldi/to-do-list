import {url, port} from "./domain.js";

document.getElementById('form').addEventListener('submit', e => {
    e.preventDefault();

    const name = e.target[0].value;
    const description = e.target[1].value;

    fetch(`${url}:${port}/new-task`, {
        method: 'POST',
        headers: {"Content-Type": "application/json" },
        body:JSON.stringify({
            "name": name,
            "description": description 
        })
    }).then(e => {
        if (e.ok) {window.location.href = `${url}:${port}`}
    }).catch(e => {
        alert(e);
    })
}) 