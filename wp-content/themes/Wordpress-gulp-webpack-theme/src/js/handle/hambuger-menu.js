const hambugerMenu = () => {
	let hambugerMenuBtn = document.querySelector(
		'button[aria-label="btn-navbar"]'
	)
	let hambugerMenu = document.querySelector('.hambugerMenu'),
		menuClose
	let html = document.querySelector('html')
	if (hambugerMenuBtn && hambugerMenu) {
		menuClose = hambugerMenu.querySelector('.hambugerMenu__container-close')
		hambugerMenuBtn.onclick = () => {
			let header = document.querySelector(
				'.page-template-Homepage .header--home'
			)
			hambugerMenu.classList.add('is-active')
			hambugerMenu.classList.add('d-block')
			html.style.overflowY = 'hidden'
			if (header) {
				header.style.display = 'none'
			}
		}
		menuClose.onclick = () => {
			let header = document.querySelector(
				'.page-template-Homepage .header--home'
			)
			hambugerMenu.classList.remove('is-active')
			hambugerMenu.classList.remove('d-block')
			html.style.overflowY = 'unset'
			if (header) {
				header.style.display = 'block'
			}
		}
	}
}

export default hambugerMenu
