import $ from 'jquery'
import { doc } from 'prettier'

const getXPositionElement = (element, type) => {
	var bodyRect = document.body.getBoundingClientRect(),
		elemRect = element.getBoundingClientRect(),
		offset
	type === 'left' && (offset = elemRect.left - bodyRect.left)
	type === 'right' && (offset = bodyRect.right - elemRect.right)
	return offset
}

const serviceHome = () => {
	let widthDevice = window.outerWidth
	let widthResize = window.innerWidth
	let serviceHome = document.querySelector('.services__list-contain'),
		background = document.querySelector('services--background '),
		serviceContain = document.querySelector('.service__list-content'),
		serviceContent = Array.prototype.slice.call(
			document.querySelectorAll(
				'.service__list-content .service__list-contant-inner'
			)
		),
		services,
		img,
		dataImg,
		dataFilter,
		positionX,
		content
	if (serviceHome) {
		services = Array.prototype.slice.call(
			serviceHome.querySelectorAll('.service__list-item')
		)
		if (services.length !== 0) {
			services.forEach((item, index) => {
				if (widthDevice <= 1024 || widthResize <= 1024) {
					item.classList.add('active')
				}
				if (widthDevice > 1024 || widthResize > 1024) {
					$(item).mouseenter((event) => {
						event.preventDefault()
						if (
							!serviceContent[index].classList.contains(
								'active'
							) &&
							!serviceContain.classList.contains('active')
						) {
							setTimeout(() => {
								if (index < 2) {
									positionX = getXPositionElement(
										item,
										'left'
									)
									serviceContain.style.left =
										positionX + item.offsetWidth - 80 + 'px'
								}
								if (index == 2) {
									setTimeout(() => {
										serviceContent[index].querySelector(
											'span:nth-child(2)'
										).style.transform = `translateX(${
											item.offsetWidth + 60
										}px)`
									}, 50)
								}
								if (index == 3) {
									serviceContain.style.left = '10%'
									setTimeout(() => {
										serviceContent[index].querySelector(
											'span:nth-child(2)'
										).style.transform = `translateX(${
											item.offsetWidth + 40
										}px)`
									}, 50)
								}
								if (index > 3) {
									positionX = getXPositionElement(
										item,
										'right'
									)
									serviceContain.style.right =
										positionX + item.offsetWidth - 80 + 'px'
								}
							}, 200)
							setTimeout(() => {
								serviceContain.style.zIndex = '5'
							}, 300)
							serviceContent[index].classList.add('active')
							serviceContain.classList.add('active')
						}
					})

					$(item).mouseleave((event) => {
						event.preventDefault()
						if (
							serviceContent[index].classList.contains(
								'active'
							) &&
							serviceContain.classList.contains('active')
						) {
							setTimeout(() => {
								if (index == 3 || index == 2) {
									serviceContent[index].querySelector(
										'span:nth-child(2)'
									).style.transform = `translateX(0px)`
								}
								serviceContain.style.left = 'unset'
								serviceContain.style.right = 'unset'
								serviceContain.style.zIndex = '1'
							}, 200)
							serviceContent[index].classList.remove('active')
							serviceContain.classList.remove('active')
						}
					})
				}
			})
		}
	}
}

export default serviceHome
