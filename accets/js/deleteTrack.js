document.addEventListener("click", async (e) => {

  if (e.target.classList.contains("remove")) {
    id = e.target.dataset.btn;
    let response = await fetch("/app/admin/deleteTrack.php", {
      method: "POST",
      headers: { "Content-Type": "application/json;charset=UTF-8", },
      body: JSON.stringify({ id }),
    });

    e.target.closest(".doing_treck").remove();

    await response.json();
  }

  if (e.target.classList.contains("update")) {
    id = e.target.dataset.id;
    let name = document.querySelector(`[data-track='${e.target.dataset.id}']`)
    let track = name.textContent
    name.innerHTML = ''
    name.insertAdjacentHTML('beforeend', `<input type="text" name="track" data-input="${id}" value="${track}">`)
    document.querySelector(`[data-id='${e.target.dataset.id}']`).remove()
    document.querySelector(`[data-btn='${e.target.dataset.id}']`).insertAdjacentHTML('afterend', `<img class="ok" data-ok="${id}" src="/accets/img/4.png" alt="icon">`)
  }

  if (e.target.classList.contains("ok")) {
    id = e.target.dataset.ok;
    name = document.querySelector(`[data-input='${e.target.dataset.ok}']`).value
    let response = await fetch("/app/admin/saveTrack.php", {
      method: "POST",
      headers: { "Content-Type": "application/json;charset=UTF-8", },
      body: JSON.stringify({ id, name }),
    });
    await response.json();
    document.querySelector(`[data-ok='${e.target.dataset.ok}']`).remove()
    document.querySelector(`[data-btn='${e.target.dataset.ok}']`).insertAdjacentHTML('afterend', `<img class="update" data-id="${id}" src="/accets/img/free-icon-edit-1160119.png" alt="icon">`)
    document.querySelector(`[data-track='${e.target.dataset.ok}']`).innerHTML = name
    document.querySelector(`[data-input='${e.target.dataset.ok}']`).remove()
  }

  if (e.target.classList.contains("insert")) {
    idProduct = e.target.dataset.insert
    name = document.querySelector('.name').value
    document.querySelector('.name').value = ''
    let id = await postJSON("/app/admin/insertTrack.php", idProduct, name);
    document.querySelector('.newTrack').insertAdjacentHTML('beforebegin', `<div class="doing_treck" data-block="${id}">
        <p class="track__p" data-track="${id}">${name}</p>
        <img class="remove" data-btn="${id}" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
        <img class="update" data-id="${id}" src="/accets/img/free-icon-edit-1160119.png" alt="icon">
    </div>`)
  }
})


