document.addEventListener("click", async (e) => {

    if (e.target.classList.contains("remove")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/admin/deleteCategory.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });
        e.target.closest(".table__body_category").remove();
        await response.json();
    }

    if (e.target.classList.contains("insertCategories")) {
        let category = document.querySelector('.input__category').value;
        let id = await postJSON("/app/admin/addCategory.php", category);
        if (id != 0) {
            document.querySelector('.body__category').insertAdjacentHTML('beforeend', `
        <div class="table__body_category">
                <p>${id}</p>
                <p>${category}</p>
                <div class="doing">
                    <img class="remove" data-id="${id}" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                    <a class="detailed" href="/app/admin/productsByCategory.php?id=<?= ${id}">подробнее</a>
                </div>
            </div>`)
        }
        document.querySelector('.modal-wrapper').style.display = 'none'
    }
})