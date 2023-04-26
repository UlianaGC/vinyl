document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("cancel")) {
        id = e.target.dataset.btn
        reasonCancel = document.querySelector(`[data-text="${e.target.dataset.btn}"]`).value
        if (reasonCancel != '') {
            let response = await fetch("/app/admin/change.php", {
                method: "POST",
                headers: { "Content-Type": "application/json;charset=UTF-8", },
                body: JSON.stringify({ id, reasonCancel }),
            });
            let res = await response.json();
            document.querySelector(`[data-modal='${e.target.dataset.btn}']`).style.display = 'none'
            statusName = document.querySelector(`[data-name='${e.target.dataset.btn}']`)
            statusName.value = ''
            statusName.textContent = 'Отменен'
            document.querySelector(`[data-textarea='${e.target.dataset.btn}']`).textContent = reasonCancel
            document.querySelector(`[data-can='${e.target.dataset.btn}']`).style.display = 'none'
            document.querySelector(`[data-confirm='${e.target.dataset.btn}']`).style.display = 'none'
        }
        else {
            if (document.querySelectorAll(`[data-error='${e.target.dataset.btn}']`).length == 0) {
                document.querySelector(`[data-btn='${e.target.dataset.btn}']`).insertAdjacentHTML('afterend', `<p data-error="${e.target.dataset.btn}">Введите причину отказа</p>`)
            }
        }

    }

    if (e.target.classList.contains("confirm")) {
        id = e.target.dataset.confirm
        let response = await fetch("/app/admin/confirm.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });
        let res = await response.json();
        statusName = document.querySelector(`[data-name='${e.target.dataset.confirm}']`)
        statusName.value = ''
        statusName.textContent = 'Принят'
        document.querySelector(`[data-can='${id}']`).style.display = 'none'
        console.log(document.querySelector(`[data-add='${id}']`))
        document.querySelector(`[data-confirm='${id}']`).style.display = 'none'
        document.querySelector(`[data-det='${id}']`).insertAdjacentHTML('afterend', `<button class="end" data-end="${id}" name="end">Завершить</button>`)
    }

    if (e.target.classList.contains("end")) {
        id = e.target.dataset.end
        let response = await fetch("/app/admin/end.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });
        let res = await response.json();
        statusName = document.querySelector(`[data-name='${e.target.dataset.end}']`)
        statusName.value = ''
        statusName.textContent = 'Завершен'
        e.target.style.display = 'none'
    }
});
