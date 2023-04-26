document.addEventListener("click", async (e) => {
    if (e.target.classList.contains("order__btn_black")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/tables/users/orderConfirm.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });
        e.target.closest(".conteiner__block").remove();
        await response.json();
    }

    if (e.target.classList.contains("read_reason_cancel")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/tables/users/orderConfirm.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });
        e.target.closest(".conteiner__block").remove();
        await response.json();
    }
})