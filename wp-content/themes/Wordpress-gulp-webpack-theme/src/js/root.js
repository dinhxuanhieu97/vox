import initJS from './support/initJS.js'
import carousel from './support/carousel'
//import jump from 'jump.js'
import { blogSlider } from './support/carousel'
import serviceHome from './support/service-home'
import onePageScroll from './handle/onepage-scroll'
import menuJob from './handle/menu-job'
import contactPage from './handle/contactPage'
import hambugerMenu from './handle/hambuger-menu'
import $ from 'jquery'
// import 'fullpage.js/dist/fullpage.js'
// import 'fullpage.js/vendors/scrolloverflow.min.js'
import * as fullpage from 'fullpage.js'

if (window.innerWidth > 1024) {
	if (document.querySelector('.home-page-template')) {
		new fullpage('.home-page-template', {
			//options here
			autoScrolling: true,
			scrollHorizontally: true,
			anchors: [
				'firstPage',
				'secondPage',
				'thirdPage',
				'fourPage',
				'fivePage',
			],
			onLeave: function (origin, destination, direction) {
				if (destination.index == 0) {
					document.getElementById('checkAbsolute').style.display =
						'block'
				} else {
					document.getElementById('checkAbsolute').style.display =
						'none'
				}
			},
		})
	}
}

initJS()
carousel()
blogSlider()
serviceHome()
onePageScroll()
menuJob()
contactPage()
hambugerMenu()
