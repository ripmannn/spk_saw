document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const toggleBtn = document.getElementById("toggle-password");
    const toggleIcon = document.getElementById("toggle-password-icon");
    toggleBtn.addEventListener("click", function () {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("bx-eye-alt");
            toggleIcon.classList.add("bx-eye-slash");
            toggleBtn.classList.add("active");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("bx-eye-slash");
            toggleIcon.classList.add("bx-eye-alt");
            toggleBtn.classList.remove("active");
        }
    });
});
