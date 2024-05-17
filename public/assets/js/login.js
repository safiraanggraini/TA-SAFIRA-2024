const togglePasswordButton = document.querySelector("#togglePassword");
const passwordInput = document.querySelector("#password");

togglePassword.addEventListener("click", () => {
    const type =
        passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    const iconElement = togglePasswordButton.querySelector("i");
    if (type === "password") {
        iconElement.classList.remove("bi-eye");
        iconElement.classList.add("bi-eye-slash");
    } else {
        iconElement.classList.remove("bi-eye-slash");
        iconElement.classList.add("bi-eye");
    }
});