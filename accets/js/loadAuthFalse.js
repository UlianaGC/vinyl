let modalWrapper = document.querySelector('.modal-wrapper')
let modalClose = document.querySelector('.closed')

let closeModalWindow = () => {
    modalWrapper.style.display = 'none'
}

document.addEventListener('click', (e) => {
    if (e.target.classList.contains('message')) {
        modalWrapper.style.display = 'block'
    }
})

modalClose.onclick = function () {
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
