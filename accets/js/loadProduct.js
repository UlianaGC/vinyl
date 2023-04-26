document.addEventListener("click", async (e) => {

  if (e.target.classList.contains("remove")) {
    id = e.target.dataset.id;
    image = e.target.dataset.image;
    console.log(image)
    let response = await fetch("/app/admin/delete.product.php", {
      method: "POST",
      headers: { "Content-Type": "application/json;charset=UTF-8", },
      body: JSON.stringify({ id, image }),
    });

    e.target.closest(".table__productsByCategory").remove();

    await response.json();
  }

  if (e.target.classList.contains("plusTreck")) {
    document.querySelector('.first_input').insertAdjacentHTML('afterend', '<input class="first_input" type="text" placeholder="введите трек"></input>')
  }
})

