document.querySelectorAll('.card__item:not(:nth-child(3n))').forEach(item => {
    item.insertAdjacentHTML("afterend", "<hr noshade='' width='0.3'>")
})
