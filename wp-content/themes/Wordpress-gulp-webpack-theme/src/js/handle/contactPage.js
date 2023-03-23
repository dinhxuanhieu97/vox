const pushDataToSendMail = (name, email, phone, budget, inquiry) => {
	let api = `${apiObject.rootapiurl}contact/v1/send-mail?_wpnonce=${apiObject.nonce}`
	return fetch(api, {
		method: 'POST',
		mode: 'cors',
		headers: {
			'Content-Type': 'application/json',
			Accept: 'application/json',
		},
		body: JSON.stringify({
			name: name,
			email: email,
			phone: phone,
			budget: budget,
			inquiry: inquiry,
			wp_rest: apiObject.nonce,
		}),
	})
		.then((response) => response.json())
		.then((data) => {
			return data
		})
}

const checkPhoneRegExp = (value) => {
	let result
	var patternPhone = new RegExp('^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-s./0-9]*$')
	if (!patternPhone.test(value)) {
		result = false
	} else {
		result = true
	}
	return result
}

const checkEmailRegExp = (value) => {
	let result = false
	var patternEmail = new RegExp(
		'^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@' +
			'[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$'
	)
	if (!patternEmail.test(value)) {
		result = false
	} else {
		result = true
	}
	return result
}

const checkValidateInquirys = (inquiryArrray) => {
	let activeInquirys = Array.prototype.slice.call(
			document.querySelectorAll(
				'.contact-page__big-item-contain-checkbox.active'
			)
		),
		result = false
	if (activeInquirys.length !== 0) {
		activeInquirys.forEach((item) => inquiryArrray.push(item.innerText))
		result = true
	}
	return result
}
class inputContact {
	constructor(input, mode) {
		this.input = input
		this.mode = mode
	}
	validate() {
		let result = true
		this.input.onkeyup = () => {
			if (this.mode == 'text') {
				if (this.input.value) {
					this.input.nextElementSibling.innerHTML = ''
					result = true
				} else {
					this.input.nextElementSibling.innerHTML =
						'This field is empty *'
					result = false
				}
			}
			if (this.mode == 'email') {
				if (checkEmailRegExp(this.input.value)) {
					this.input.nextElementSibling.innerHTML = ''
					result = true
				} else {
					this.input.nextElementSibling.innerHTML =
						'This email is incorrect *'
					result = false
				}
			}
			if (this.mode == 'phone') {
				if (checkPhoneRegExp(this.input.value)) {
					this.input.nextElementSibling.innerHTML = ''
					result = true
				} else {
					this.input.nextElementSibling.innerHTML =
						'This phone is incorrect *'
					result = false
				}
			}
		}
		return result
	}
}

const validatedContactForm = (
	nameInput,
	emailInput,
	phoneInput,
	budgetInput,
	inquiryArrray
) => {
	let result = true
	let nameValidate = new inputContact(nameInput, 'text')
	let emailValidate = new inputContact(emailInput, 'email')
	let phoneValidate = new inputContact(phoneInput, 'phone')
	let budgetValidate = new inputContact(budgetInput, 'text')
	result =
		nameValidate.validate() &&
		emailValidate.validate() &&
		phoneValidate.validate() &&
		budgetValidate.validate() &&
		checkValidateInquirys(inquiryArrray)
	return result
}

const handleInqurys = (inquirys) => {
	inquirys.forEach((item) => {
		item.onclick = () => {
			item.classList.toggle('active')
		}
	})
}

const contactPage = () => {
	let contactPageCheck = document.querySelector('.contact-page-template'),
		nameInput,
		emailInput,
		phoneInput,
		budgetInput,
		inquirys,
		inquiryArrray = [],
		validated,
		buttonSubmit,
		loading
	if (contactPageCheck) {
		nameInput = contactPageCheck.querySelector('#contactName')
		emailInput = contactPageCheck.querySelector('#contactEmail')
		phoneInput = contactPageCheck.querySelector('#contactTelephone')
		budgetInput = contactPageCheck.querySelector('#contactBudget')
		buttonSubmit = contactPageCheck.querySelector(
			'.contact-page__big-item-submit .btn'
		)
		inquirys = Array.prototype.slice.call(
			contactPageCheck.querySelectorAll(
				'.contact-page__big-item-contain-checkbox'
			)
		)
		handleInqurys(inquirys)
		validatedContactForm(
			nameInput,
			emailInput,
			phoneInput,
			budgetInput,
			inquiryArrray
		)
		buttonSubmit.onclick = () => {
			validated = validatedContactForm(
				nameInput,
				emailInput,
				phoneInput,
				budgetInput,
				inquiryArrray
			)
			loading =
				'<i id="loadingIcon" style="color: #ffffff; font-size: 14px" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
			buttonSubmit.insertAdjacentHTML('beforeend', loading)
			if (validated) {
				const dataRespone = pushDataToSendMail(
					nameInput.value,
					emailInput.value,
					phoneInput.value,
					budgetInput.value,
					inquiryArrray
				)
				dataRespone
					.then((data) => {
						if (data == 'Submit form success') {
							alert(data)
							window.location.href = apiObject.homeUrl
						}
					})
					.catch((err) => {
						console.log(err)
					})
			}
		}
	}
}

export default contactPage
