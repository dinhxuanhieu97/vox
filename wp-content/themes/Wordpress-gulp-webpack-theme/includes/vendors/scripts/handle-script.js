/*----- Handle ------- */
jQuery(function ($) {
	// on upload button click
	$('body').on('click', '.misha-upl', function (e) {
		e.preventDefault()

		var button = $(this),
			custom_uploader = wp
				.media({
					title: 'Insert image',
					library: {
						// uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
						type: 'image',
					},
					button: {
						text: 'Use this image', // button label text
					},
					multiple: false,
				})
				.on('select', function () {
					// it also has "open" and "close" events
					var attachment = custom_uploader
						.state()
						.get('selection')
						.first()
						.toJSON()
					button
						.html('<img src="' + attachment.url + '">')
						.next()
						.val(attachment.id)
						.next()
						.show()
				})
				.open()
	})

	// on remove button click
	$('body').on('click', '.misha-rmv', function (e) {
		e.preventDefault()

		var button = $(this)
		button.next().val('') // emptying the hidden field
		button.hide().prev().html('Upload Logo')
	})
})
let colorPickers = document.querySelectorAll('.color_field')
colorPickers.forEach((item) => {
	Pickr.create({
		el: item,
		theme: 'classic', // or 'monolith', or 'nano'

		swatches: [
			'rgba(244, 67, 54, 1)',
			'rgba(233, 30, 99, 0.95)',
			'rgba(156, 39, 176, 0.9)',
			'rgba(103, 58, 183, 0.85)',
			'rgba(63, 81, 181, 0.8)',
			'rgba(33, 150, 243, 0.75)',
			'rgba(3, 169, 244, 0.7)',
			'rgba(0, 188, 212, 0.7)',
			'rgba(0, 150, 136, 0.75)',
			'rgba(76, 175, 80, 0.8)',
			'rgba(139, 195, 74, 0.85)',
			'rgba(205, 220, 57, 0.9)',
			'rgba(255, 235, 59, 0.95)',
			'rgba(255, 193, 7, 1)',
		],

		components: {
			// Main components
			preview: true,
			opacity: true,
			hue: true,

			// Input / output Options
			interaction: {
				hex: true,
				rgba: true,
				hsla: true,
				hsva: true,
				cmyk: true,
				input: true,
				clear: true,
				save: true,
			},
		},
	})
})
/*----- Handle ------- */
function get_tinymce_content(id) {
	var content
	var inputid = id
	var editor = tinyMCE.get(inputid)
	var textArea = jQuery('textarea#' + inputid)
	if (textArea.length > 0 && textArea.is(':visible')) {
		content = textArea.val()
	} else {
		content = editor.getContent()
	}
	return content
}
/*-----Api-------*/
let buttonSubmit = document.querySelector(
	'.finish--button.menu-setting-btn .btn'
)
if (buttonSubmit) {
	buttonSubmit.onclick = () => {
		let editor = get_tinymce_content('mycustomeditor')
		let logo = document.querySelector(
				'.menu-setting.menu-setting-btn.image--upload > .misha-upl'
			),
			imgLogo,
			menuSec = [
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
				{
					image: '',
					content: '',
					link: '',
					color: '',
				},
			]
		let logoItem, imgLogoItem
		if (logo) {
			imgLogo = logo.querySelector('img').getAttribute('src')
		}
		let menuSecItems = Array.prototype.slice.call(
			document.querySelectorAll('.menu-secondary .menu-secondary__item')
		)
		if (menuSecItems.length !== 0) {
			menuSecItems.forEach((item, index) => {
				logoItem = item.querySelector('.misha-upl img')
				imgLogoItem = logoItem.getAttribute('src')
				menuSec[index]['image'] = imgLogoItem
				menuSec[index]['content'] = item.querySelector(
					'.menu-secondary--content input'
				).value
				menuSec[index]['link'] = item.querySelector(
					'.menu-secondary--content select'
				).value
				menuSec[index]['color'] = item
					.querySelector('.menu-secondary--content .pickr button')
					.getAttribute('style')
					.replace('color: ', '')
				menuSec[index]['text'] = item
					.querySelector('.menu-secondary--text .pickr button')
					.getAttribute('style')
					.replace('color: ', '')
			})
		}
		let apiUrlUser = `${apiObject.rootapiurl}hambuger/v1/save-data?_wpnonce=${apiObject.nonce}`
		fetch(apiUrlUser, {
			method: 'POST',
			mode: 'cors',
			headers: {
				'Content-Type': 'application/json', // sent request
				Accept: 'application/json', // expected data sent back
			},
			body: JSON.stringify({
				logo: imgLogo,
				menu_secondary: JSON.stringify(menuSec),
				content_left: editor,
				wp_rest: apiObject.nonce,
			}),
		})
			.then((response) => location.reload())
			.catch((err) => console.log(err))
	}
}

/*-----Api-------*/
