document.querySelector('.registration__img_password_one').addEventListener('click', (e) => {
    let input = document.querySelector('.registration__type_password_one')
    show(e.target, input)
})

document.querySelector('.registration__img_password_two').addEventListener('click', (e) => {
    let input = document.querySelector('.registration__type_password_two')
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