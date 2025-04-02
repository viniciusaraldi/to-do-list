import {url, port} from "./domain.js";

document.querySelectorAll('.createTopicsBtn').forEach(btn => {
    btn.addEventListener('click', e => {
        const id = e.target.dataset.id;
        window.location.href = `${url}:${port}/views-create-list?id=${id}`;
    })
})

const inputDelete = document.querySelectorAll(".deleteTask");
inputDelete.forEach(element => {
    element.addEventListener('click', (e) => {
        const idTask = e.target.dataset['idtask'];

        const form = document.getElementById('formDeleteTask');
        form.dataset['id'] = idTask;
        document.querySelector(".containerModalDelete").style.display = 'flex';
    })
});

const inputCancelDelete = document.getElementById('delete-no')
inputCancelDelete.addEventListener('click', () => {
    const form = document.getElementById('formDeleteTask');
    form.dataset['id'] = 0;
    document.querySelector(".containerModalDelete").style.display = 'none';
})


document.getElementById('formDeleteTask').addEventListener('submit', e => {
    e.preventDefault();

    const id = e.target.dataset.id;

    fetch(`${url}:${port}/delete`, {
        method: 'DELETE',
        headers: {"Content-Type": "application/json" },
        body:JSON.stringify({
            "id": id,
        })
    }).then(e => {
        if (e.ok) {
            alert("Delete task with success!");
            window.location.href = `${url}:${port}/`
        } else {
            alert("Havent a problema to delete of the task");
            window.location.href = `${url}:${port}/`;
        }
    }).catch(e => {
        alert(e);
    })
}) 