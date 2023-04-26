let btnModalShow = document.querySelector('.basket__icon_address')
let modalWrapper = document.querySelector('.modal-window-address')
let modalClose = document.querySelector('.modal__close')
let deny = document.querySelector('.deny')

let closeModalWindow = () => {
    modalWrapper.style.display = 'none'
}

btnModalShow.onclick = function () {
    modalWrapper.style.display = 'block'
}

modalClose.onclick = function () {
    closeModalWindow()
}

deny.onclick = function () {
    closeModalWindow()
}

modalWrapper.addEventListener('click', (event) => {
    if (event.target == event.currentTarget)
        closeModalWindow()
})

document.addEventListener('keyup', (e) => {
    if (e.code == 'Escape')
        closeModalWindow()
})
