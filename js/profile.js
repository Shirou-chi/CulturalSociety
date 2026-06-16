let profilePic = document.getElementById("profile-pic");
let inputImg = document.getElementById("input-image");
let imageLabel = document.getElementById("image-label");

profilePic.onclick = function () {
    inputImg.click();
};

inputImg.onchange = function () {
    profilePic.src = URL.createObjectURL(inputImg.files[0]);
    console.log(inputImg.files[0]);
    this.form.submit();
};

document.addEventListener('DOMContentLoaded', function () {


    const personalForm = document.getElementById('personalForm');

    personalForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Validate the form inputs
        const emailInput = personalForm.querySelector('input[name="emailProfile"]');
        const fNameInput = personalForm.querySelector('input[name="fNameProfile"]');
        const lNameInput = personalForm.querySelector('input[name="lNameProfile"]');
        const phoneInput = personalForm.querySelector('input[name="phoneProfile"]');
        const birthInput = personalForm.querySelector('input[name="birthProfile"]');

        // Basic email validation
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value.trim())) {
            alert('Please enter a valid email address');
            return;
        }

        if (fNameInput.value.trim() === '') {
            alert('Please enter your first name');
            return;
        }

        if (lNameInput.value.trim() === '') {
            alert('Please enter your last name');
            return;
        }

        if (phoneInput.value.trim() === '') {
            alert('Please enter your phone number');
            return;
        }

        const phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phoneInput.value.trim())) {
            alert('Please enter a valid phone number');
            return;
        }


        if (birthInput.value.trim() === '') {
            alert('Please enter your date of birth');
            return;
        }

        // If all validation passes, submit the form
        personalForm.submit();
    });


    const accountForm = document.getElementById('accountForm');

    accountForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Validate the form inputs
        const oldPass = accountForm.querySelector('input[name="oldPass"]');
        const newPass = accountForm.querySelector('input[name="newPass"]');
        const newPass2 = accountForm.querySelector('input[name="newPass2"]');

        // You can add more validation rules as needed
        if (oldPass.value.trim() === '') {
            alert('Please enter your old password');
            return;
        }

        if (newPass.value.trim() === '') {
            alert('Please enter your new password');
            return;
        }

        if (newPass.value.trim().length < 8) {
            alert('Password must be at least 8 characters long');
            return;
        }

        if (newPass2.value.trim() === '') {
            alert('Please confirm your new password');
            return;
        }

        if (newPass2.value.trim() != newPass.value.trim()) {
            alert('Your comfirm password not match to new password');
            return;
        }

        // If all validation passes, submit the form
        accountForm.submit();
    });




    const addressForm = document.getElementById('addressForm');

    addressForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting

        // Validate the form inputs
        const addLine1 = addressForm.querySelector('input[name="addLine1"]');
        const postCode = addressForm.querySelector('input[name="postCode"]');
        const city = addressForm.querySelector('input[name="city"]');
        const state = addressForm.querySelector('input[name="state"]');
        const country = addressForm.querySelector('input[name="country"]');

        if (addLine1.value.trim() === '') {
            alert('Please enter your address line 1');
            return;
        }

        if (postCode.value.trim() === '') {
            alert('Please enter your postcode');
            return;
        }

        const postPattern = /^\d{6}$/;
        if (!postPattern.test(postCode.value.trim())) {
            alert('Please enter a valid postal code');
            return;
        }

        if (city.value.trim() === '') {
            alert('Please enter your city');
            return;
        }

        if (state.value.trim() === '') {
            alert('Please enter your state');
            return;
        }

        if (country.value.trim() === '') {
            alert('Please enter your country');
            return;
        }

        // If all validation passes, submit the form
        addressForm.submit();
    });


});



// Account Deletion PopUp
document.addEventListener("DOMContentLoaded", function () {
    // Get references to the button and the div
    var deleteButton = document.getElementById("removeAcc");
    var popUp = document.getElementById("popUp");
    var cancel = document.getElementById("cancelDeleteDiv");
    var backdrop = document.getElementById("backdrop");

    deleteButton.addEventListener('click', function () {
        backdrop.style.display = 'block';
        popUp.style.display = 'block';
 
    });
    cancel.addEventListener('click', function () {
        window.location.href = '/Assignment/php/profile.php';
    })


});

function SendOTP(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    const email = document.getElementById("emailDeletionProfile");
    const otpverify = document.querySelector(".email-verify");

    let otp_code = Math.floor(Math.random() * 10000);
    let emailbody = `<h1> Your OTP is </h1> ${otp_code}`;
    Email.send({
        SecureToken: "292aff81-968f-4e69-8165-5aa99d00e343",
        To: email.value,
        From: "damienlow7@gmail.com",
        Subject: "Email OTP",
        Body: emailbody,
    }).then(message => {
        if (message === "OK") {
            alert("OTP sent to your email " + email.value);

            let otp_inp = document.getElementById("otpDeletionProfile");
            let otp_btn = document.getElementById("submitDeleteButton");

            otp_btn.addEventListener("click", () => {
                if (otp_inp.value == otp_code) {
                    alert("Your account has been deleted");
                    email.value = "";
                    otp_inp.value = "";
                } else {
                    alert("Invalid OTP");
                }
            })
        }
        else{
            alert("Please enter an email!");
        }
    });

    return false; // Prevent any further processing of the event
}