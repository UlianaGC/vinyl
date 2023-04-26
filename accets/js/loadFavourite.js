async function outResult(productId, action) {
    let { productInBasket } = await postJSON('/app/tables/basket/save.favourite.php', productId, action)
    console.log(productInBasket)
    if (productInBasket == 'clear') {
        document.querySelector('.empty').textContent = 'Добавьте пластинки своей мечты'
        document.querySelector('.empty_desc').textContent = 'Так вы их точно не потеряете'
        document.querySelector('.clear').style.display = 'none'
        // document.querySelector('.basket_sum').style.display = 'none'
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('delete')) {
            outResult(e.target.id, 'delete')
            e.target.closest('.basket__flex').remove()
            if (document.querySelectorAll('.basket__flex').length == 0) {
                document.querySelector('.empty').textContent = 'Добавьте пластинки своей мечты'
                document.querySelector('.empty_desc').textContent = 'Так вы их точно не потеряете'
                document.querySelector('.clear').style.display = 'none'
            }
        }
        if (e.target.classList.contains('clear')) {
            outResult('', 'clear')
            document.querySelectorAll('.basket__flex').forEach(item => {
                item.remove()
            })
        }


    })
})


