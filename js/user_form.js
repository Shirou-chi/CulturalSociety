const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('user-form');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

const showSignUpButton = document.getElementById('showSignUp');
const showSignInButton = document.getElementById('showSignIn');

showSignUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});
showSignInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


document.addEventListener('DOMContentLoaded', function () {
	const signUpForm = document.getElementById('signUpForm');

	signUpForm.addEventListener('submit', function (event) {
		event.preventDefault(); // Prevent the form from submitting

		// Validate the form inputs
		const firstNameInput = signUpForm.querySelector('input[name="fName"]');
		const lastNameInput = signUpForm.querySelector('input[name="lName"]');
		const usernameInput = signUpForm.querySelector('input[name="username"]');
		const emailInput = signUpForm.querySelector('input[name="email"]');
		const passwordInput = signUpForm.querySelector('input[name="pass"]');

		// You can add more validation rules as needed
		if (firstNameInput.value.trim() === '') {
			alert('Please enter your first name');
			return;
		}

		if (lastNameInput.value.trim() === '') {
			alert('Please enter your last name');
			return;
		}

		if (usernameInput.value.trim() === '') {
			alert('Please enter a username');
			return;
		}

		// Basic email validation
		const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		if (!emailPattern.test(emailInput.value.trim())) {
			alert('Please enter a valid email address');
			return;
		}

		// Password length validation
		if (passwordInput.value.trim().length < 8) {
			alert('Password must be at least 8 characters long');
			return;
		}

		// If all validation passes, submit the form
		signUpForm.submit();
	});

	const loginForm = document.getElementById('loginForm');

	loginForm.addEventListener('submit', function (event) {
		event.preventDefault(); // Prevent the form from submitting

		// Validate the form inputs
		const loginDataInput = loginForm.querySelector('input[name="loginData"]');
		const passwordInput = loginForm.querySelector('input[name="pass"]');


		// You can add more validation rules as needed

		if (loginDataInput.value.trim() === '') {
			alert('Please enter a username or email');
			return;
		}

		// Password length validation
		if (passwordInput.value.trim().length < 8) {
			alert('Password must be at least 8 characters long');
			return;
		}

		// If all validation passes, submit the form
		loginForm.submit();
	});

});

