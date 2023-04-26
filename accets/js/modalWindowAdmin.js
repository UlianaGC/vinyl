document.querySelectorAll('.can').forEach(item => {
    item.addEventListener('click', (e) => {
        let modalWrapper = document.querySelector(`[data-modal='${e.target.dataset.can}']`)
        let modalClose = document.querySelector(`[data-close='${e.target.dataset.can}']`)
        modalWrapper.style.display = 'block'

        let closeModalWindow = () => {
            modalWrapper.style.display = 'none'
        }
    
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
    })
})

let btnModalShow = document.querySelector('.add')
let modalWrapper = document.querySelector('.modal-wrapper')
let modalClose = document.querySelector('.closed')

let closeModalWindow = () => {
    modalWrapper.style.display = 'none'
}

btnModalShow.onclick = function () {
    modalWrapper.style.display = 'block'
}

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


