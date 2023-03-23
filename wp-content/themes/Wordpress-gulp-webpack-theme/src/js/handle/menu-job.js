const menuJob = () => {
	let menuJobBtnDOM = document.querySelector('.client__job-menu-button'),
		menuJobDOM = document.querySelector('.client__job-menu-main')
	if (menuJobBtnDOM && menuJobDOM) {
		menuJobBtnDOM.onclick = () => {
			menuJobDOM.classList.toggle('d-block')
		}
	}
}

export default menuJob
