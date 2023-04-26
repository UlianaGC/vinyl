async function result(productId, action) {
    let { productInBasket } = await postJSON('/app/tables/basket/save.basket.card.php', productId, action)
console.log(productInBasket)}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (e) => {
        if (e.target.dataset.basket=='add') {
            result(e.target.dataset.id, 'add')
            e.target.dataset.basket = 'basket'
            e.target.src = '/accets/img/tickCheck.png'
        }
        if (e.target.dataset.favourite=='addFav') {
            result(e.target.dataset.id, 'addFav')
            e.target.dataset.favourite = 'favourite'
            e.target.src = '/accets/img/favLove.png'
        }
    })
})


