document.querySelector('.enterance__img_password').addEventListener('click', (e) => {
    let input = document.querySelector('.entrance__type_password')
    show(e.target, input)
})

function show(img, input) {
    if (input.type == 'password') {
        input.type = 'text'
        img.src = '/accets/img/passw2.png'
        console.log(1)
    }
    else {
        input.type = 'password'
        img.src = '/accets/img/passw1.png'
        console.log(2)
    }
}
