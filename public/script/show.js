import {url, port} from "./domain.js";

(async() => {
    const id = document.getElementById('form').dataset.taskid;
    const api = await fetch(`${url}:${port}/show?id=` + id, {
        method: "GET",
        headers: {"Content-Type": "application/json"},
    });

    const data = await api.json();

    const info = data.message[1];
    const task = data.message[0][0];

    document.getElementById('nameTask').textContent = `Task: ${task.name}`;
    document.getElementById('descriptionTask').textContent = `Resume: ${task.description}`;

    const container = document.getElementById('containerList');

    for (let i = 0; i < info.length; i++) {
        const p = document.createElement('p');
        
        const inputDelete = document.createElement('input');
        inputDelete.type = 'button';
        inputDelete.value = 'X';
        inputDelete.dataset.id = info[i].message.id;
        inputDelete.classList.add('delete-list');
 
        p.textContent = info[i].message.description;

        container.appendChild(p);
        container.appendChild(inputDelete);
    }

    document.querySelectorAll('.delete-list').forEach(async element => {
        element.addEventListener('click', async e => {
            const id = e.target.dataset.id;

            const api = await deleteIdTaskList(id);
            if (api.success) {
                window.location.reload()
            } else {
                alert(api);
            }
        })
    });
})();

const deleteIdTaskList = async (id) => {
    try {
        const api = await fetch(`${url}:${port}/task-list`,{
            headers: {
                'Content-Type': 'application/json'
            },
            method: 'DELETE',
            body: JSON.stringify({
                'id': id 
            })
        })
        const data = await api.json();
        if (data.success) {
            return data;
        } else {
            console.log(data)
            return "Have a problem to delete this id list task";
        }
    } catch (e) {
        alert(e)
    }
}

document.getElementById('form').addEventListener('submit', e => {
    e.preventDefault();

    const id = document.getElementById('form').dataset.taskid;
    const description = e.target[0].value;

    fetch(`${url}:${port}/new-task-list`, {
        method: 'POST',
        headers: {"Content-Type": "application/json" },
        body:JSON.stringify({
            "id_task": id,
            "description": description 
        })
    }).then(e => {
        if (e.ok) {window.location.reload()}
    }).catch(e => {
        console.log(e)
        alert(e);
    })
}) 


