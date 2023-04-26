document.addEventListener("click", async (e) => {

    if (e.target.classList.contains("remove")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/admin/deleteCountry.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });

        e.target.closest(".table__body_countries").remove();

        await response.json();
    }

    if (e.target.classList.contains("insertCountries")) {
        let country = document.querySelector('#country').value;
        let id = await postJSON("/app/admin/addCountry.php", country);
        if (id != 0) {
            document.querySelector('.body_country').insertAdjacentHTML('beforeend', `
        <div class="table__body_countries">
                    <p>${id}</p>
                    <p>${country}</p>
                    <div class="doing">
                        <img class="remove" data-id="${id}" src="/accets/img/free-icon-remove-1828804.png" alt="icon">

                    </div>
                </div>`)
        }
        document.querySelector('.modal-wrapper').style.display = 'none'
    }

    if (e.target.classList.contains("removeArea")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/admin/deleteArea.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });

        e.target.closest(".table__body_areas").remove();

        await response.json();
    }

    if (e.target.classList.contains("insertAreas")) {
        let area = document.querySelector('#area').value
        let country = document.querySelector('#country').value
        let id = await postJSON("/app/admin/addArea.php", area, country);
        if (id != 0) {
            let resCountry = document.querySelector('#country').options[document.querySelector('#country').selectedIndex].text
            document.querySelector('.body_area').insertAdjacentHTML('beforeend', `
        <div class="table__body_areas">
        <p>${id}</p>
        <p>${resCountry}</p>
        <p>${area}</p>
        <div class="doing">
            <img class="removeArea" data-id="${id}" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
        </div>
    </div>`)
        }

        document.querySelector('.modal-wrapper').style.display = 'none'
    }

    if (e.target.classList.contains("removeCity")) {
        id = e.target.dataset.id;
        let response = await fetch("/app/admin/deleteCity.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id }),
        });

        e.target.closest(".table__body_cities").remove();

        await response.json();
    }

    if (e.target.classList.contains("insertCities")) {
        let city = document.querySelector('#city').value
        let area = document.querySelector('#area').value
        let price = document.querySelector('#price').value
        let id = await postAddCity("/app/admin/addCity.php", city, area, price);
        if (id != 0) {
            let resArea = document.querySelector('#area').options[document.querySelector('#area').selectedIndex].text
            document.querySelector('.body_city').insertAdjacentHTML('beforeend', `
                <div class="table__body_cities">
                            <p>${id}</p>
                            <p>${resArea}</p>
                            <p>${city}</p>
                            <p>${price}</p>
                            <div class="doing">
                                <img class="removeCity" data-id="${id}" src="/accets/img/free-icon-remove-1828804.png" alt="icon">
                                <img class="update" data-id="${id}" src="/accets/img/free-icon-edit-1160119.png" alt="icon">
                            </div>
                        </div>`)
        }
        document.querySelector('.modal-wrapper').style.display = 'none'
    }


    let priceArea = document.querySelector(`.price-${e.target.dataset.id}`)
    if (e.target.classList.contains("update")) {
        let price = priceArea.textContent
        priceArea.style.display = 'none'
        document.querySelector(`.name-${e.target.dataset.id}`).insertAdjacentHTML('afterend', `<div class="updatePriceBlock"data-div="${e.target.dataset.id}"><input class="price" type="number" name="price" id="price" data-update=${e.target.dataset.id} value=${price}>
        <button class="updatePrice" data-id="${e.target.dataset.id}">ОК</button></div>`)

    }
    if (e.target.classList.contains("updatePrice")) {
        let updatePrice = document.querySelector(`[data-update='${e.target.dataset.id}']`).value
        let id = e.target.dataset.id
        let response = await fetch("/app/admin/updateCityPrice.php", {
            method: "POST",
            headers: { "Content-Type": "application/json;charset=UTF-8", },
            body: JSON.stringify({ id, updatePrice }),
        });
        await response.json();
        priceArea.style.display = 'block'
        priceArea.innerHTML = updatePrice
        document.querySelector(`[data-div='${e.target.dataset.id}']`).style.display = 'none'
    }
})