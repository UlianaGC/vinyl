async function outResult(text, action) {
    let { reviews } = await postJSON('/app/tables/addReview.php', text, action)
}

function formatTime(d){
	const date = d.getDate().toString().padStart(2, "0");
	const month = (d.getMonth() + 1).toString().padStart(2, "0");
	const year = d.getFullYear();
	return `${year}-${month}-${date}`
}

document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('click', async (e) => {
        if (e.target.classList.contains('reviews__btn')) {
            let text = document.querySelector('#text').value
            outResult(text, 'add')
            let login = e.target.dataset.login
            let firstLetter = e.target.dataset.first
            let date = new Date()
            document.querySelector('.reviews__block').insertAdjacentHTML('beforeend', `
            <div class="reviews__item">
                <div class="reviews__avatar">
                    <p class="reviews__desc">${firstLetter}</p>
                </div>
                <div class="reviews__body">
                    <div class="reviews__login">${login}</div>
                    <div class="reviews__text">${text}</div>
                    <div class="reviews__date">${formatTime(date)}</div>
                </div>
            </div>`)
            document.querySelector('#text').value = ''
        }
    })
})


