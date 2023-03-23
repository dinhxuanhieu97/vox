import ScrollMagic from 'scrollmagic'

const onePageScroll = () => {
	let homepageCheck = document.querySelector('.home-page-template')
	if (homepageCheck) {
		// init controller
		var controller = new ScrollMagic.Controller()
		/*-----create a scene for subtitle about-----*/
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__subtitle',
			triggerHook: 1, // show, when scrolled 10% into view
			duration: '100%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle(
				'.home-page-template .about__subtitle>h2',
				'd-block'
			)
			.addTo(controller) // assign the scene to the controller
		/*-----create a scene for subtitle about-----*/
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__subtitle',
			triggerHook: 0.95, // show, when scrolled 10% into view
			duration: '80%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle(
				'.home-page-template .about__subtitle>h2',
				'slide-in-left'
			)
			.addTo(controller) // assign the scene to the controller
		/*-----create a scene for title about-----*/
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__title',
			triggerHook: 0.95, // show, when scrolled 10% into view
			duration: '80%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle('.home-page-template .about__title>h1', 'd-block')
			.addTo(controller) // assign the scene to the controller
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__title',
			triggerHook: 0.95, // show, when scrolled 10% into view
			duration: '80%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle(
				'.home-page-template .about__title>h1',
				'slide-in-right'
			)
			.addTo(controller) // assign the scene to the controller
		/*-----create a scene for description about-----*/
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__title',
			triggerHook: 0.95, // show, when scrolled 10% into view
			duration: '80%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle(
				'.home-page-template .about__description',
				'd-block'
			)
			.addTo(controller) // assign the scene to the controller
		new ScrollMagic.Scene({
			triggerElement: '.home-page-template .about__title',
			triggerHook: 0.95, // show, when scrolled 10% into view
			duration: '80%', // hide 10% before exiting view (80% + 10% from bottom)
			offset: 50, // start this scene after scrolling for 50px
		})
			.setClassToggle(
				'.home-page-template .about__description',
				'fade-in'
			)
			.addTo(controller) // assign the scene to the controller
	}
}

export default onePageScroll
