document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector(".form");
    const textarea = document.querySelector(".text-area");
    const list = document.querySelector(".list");

    function addTask(text) {
        console.log(text);

        const task = document.createElement("div");
        task.classList.add("task");

        const del = document.createElement("button");
        del.classList.add("del");
        del.innerText = "Usuń";
        del.addEventListener("click", () => {
            task.remove();
        });

        const taskInner = document.querySelector(".task-cont").content.cloneNode(true);

        task.append(taskInner);
        task.append(del);

        task.querySelector(".task-text").innerText = text;

        list.append(task);
    }

    form.addEventListener("submit", hmm => {
        hmm.preventDefault();

        if(textarea.value !== ""){
            addTask(textarea.value);
            textarea.value = "";
        }
    });
});