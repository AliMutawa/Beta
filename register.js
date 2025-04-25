document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("register-form");
    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const loader = document.getElementById("register-loader");

    // Validation
    emailInput.addEventListener("input", () => {
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        emailInput.style.borderColor = pattern.test(emailInput.value) ? "green" : "red";
    });

    usernameInput.addEventListener("input", () => {
        usernameInput.style.borderColor = usernameInput.value.length >= 3 ? "green" : "red";
    });

    passwordInput.addEventListener("input", () => {
        passwordInput.style.borderColor = passwordInput.value.length >= 6 ? "green" : "red";
    });

    // On Submit
    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();
        loader.style.display = "block";

        setTimeout(() => {
            loader.style.display = "none";
            alert("تم إنشاء الحساب بنجاح!");
            registerForm.reset();
        }, 2000);
    });
});
