async function outResult(productId, action) {
    let { productInBasket, sum, count } = await postJSON('/app/tables/basket/save.basket.php', productId, action)
    if (sum.sum == null) {
        document.querySelector('.empty').textContent = 'Добавьте пластинки своей мечты'
        document.querySelector('.empty_desc').textContent = 'Так вы их точно не потеряете'
        sum = 0
        count = 0
        document.querySelector('.basket__btn').disabled = true
        document.querySelector('.clear').style.display = 'none'
        document.querySelector('.basket_sum').style.display = 'none'
    }
    document.querySelector('.sum').textContent = sum.sum
    document.querySelector('.count').textContent = count.count
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('delete')) {
            outResult(e.target.id, 'delete')
            e.target.closest('.basket__flex').remove()
        }
        if (e.target.classList.contains('btn_delete')) {
            outResult(e.target.id, 'delete')
            document.querySelector(`[data-id="${e.target.id}"]`).remove()
            e.target.closest('.disabled_delete').remove()
        }
        if (e.target.classList.contains('clear')) {
            outResult('', 'clear')
            document.querySelectorAll('.basket__flex').forEach(item => {
                item.remove()
            })
        }
    })
})

let selectArea = document.querySelector('.area')
let selectCity = document.querySelector('.city')
let selectCountry = document.querySelector('.country')
let street = document.querySelector('.address__street')
let house = document.querySelector('.address__house')

async function area(id, action) {
    let { address } = await postJSON('/app/tables/basket/address.php', id, action)
    selectArea.innerHTML = '';
    selectCity.innerHTML = '';
    selectArea.insertAdjacentHTML('beforeend', `<option value="" hidden>Регион*</option>`)
    selectCity.insertAdjacentHTML('beforeend', `<option value="" hidden>Город*</option>`)
    address.forEach(item => {
        selectArea.insertAdjacentHTML('beforeend', `<option value="${item.id}">${item.name}</option>`)
    })
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('change', async (e) => {
        if (e.target.classList.contains('country')) {
            area(e.target.value, 'areasByCountry')
        }
    })
})

async function city(id, action) {
    let { address } = await postJSON('/app/tables/basket/address.php', id, action)
    selectCity.innerHTML = '';
    selectCity.insertAdjacentHTML('beforeend', `<option value="" hidden>Город*</option>`)
    address.forEach(item => {
        selectCity.insertAdjacentHTML('beforeend', `<option value="${item.id}">${item.name}</option>`)
    })
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('change', async (e) => {
        if (e.target.classList.contains('area')) {
            city(e.target.value, 'citiesByArea')
        }
    })
})

document.querySelector('#form-address').addEventListener('submit', async (e) => {
    e.preventDefault()
    if (formIsValid()) {
        let fd = new FormData(e.target)
        await postFormData('/app/tables/basket/addressForm.php', fd)
        document.querySelector('.modal-window-address').style.display = 'none'
    }
})

function formIsValid() {
    selectCountry.nextElementSibling.hidden = selectCountry.value != '';
    selectArea.nextElementSibling.hidden = selectArea.value != ''
    selectCity.nextElementSibling.hidden = selectCity.value != ''
    street.nextElementSibling.hidden = street.value != ''
    house.nextElementSibling.hidden = house.value != ''

    return !(selectCountry.value == '' || selectArea.value == '' || selectCity.value == '' || street.value == '' || house.value == '')
}






