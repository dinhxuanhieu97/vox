import $ from 'jquery'
import 'slick-carousel'

export const blogSlider = () => {
	let blogSlider = document.querySelector('.footer__blog-list')
	let $prev = `<button type="button" class="slick-prev slick-arrow" style="display: block;" aria-label="slider-next-icon">
				<img src="${apiObject.homeUrl}/dist/images/next.png" alt="next-icon">
				</button>`
	let $next = `<button type="button" class="slick-next slick-arrow" style="display: block;"  aria-label="slider-prev-icon">
				<img src="${apiObject.homeUrl}/dist/images/prev.png" alt="prev-icon">
				</button>`
	if (blogSlider) {
		$(blogSlider).slick({
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			centerMode: true,
			variableWidth: true,
			nextArrow: $prev,
			prevArrow: $next,
		})
	}
}

const carousel = () => {
	let carousel = document.querySelector('.carousel'),
		carousels
	if (carousel) {
		carousels = carousel.querySelector('.carousel__container')
		$(carousels).slick({
			infinite: true,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			fade: true,
			cssEase: 'linear',
			adaptiveHeight: true,
		})
	}
}

export default carousel
