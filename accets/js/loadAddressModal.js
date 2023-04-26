async function outResult(productId, action) {
    let { productInBasket, sum, count } = await postJSON('/app/tables/basket/save.basket.php', productId, action)
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('delete')) {
            outResult(e.target.id, 'delete')
            e.target.closest('.basket__flex').remove()
        }
        if (e.target.classList.contains('clear')) {
            outResult('', 'clear')
            document.querySelectorAll('.basket__flex').forEach(item => {
                item.remove()
            })
        }
    })
})


