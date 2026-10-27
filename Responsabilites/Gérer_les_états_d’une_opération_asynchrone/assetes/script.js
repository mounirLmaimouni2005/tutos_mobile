
const form = document.getElementById("categoryForm");
const input = document.getElementById("categoryName");
const button = document.getElementById("submitButton");
const message = document.getElementById("message");

const originalText = button.textContent;

function setLoadingState(isLoading) {
    button.disabled = isLoading;

    button.textContent = isLoading
        ? "Chargement..."
        : originalText;

    if (isLoading) {
        button.style.backgroundColor = "gray";
        button.style.cursor = "not-allowed";
    } else {
        button.style.backgroundColor = "";
        button.style.cursor = "pointer";
    }
}

form.addEventListener("submit", function (e) {
    e.preventDefault();

    setLoadingState(true);

    message.textContent = "";

    setTimeout(() => {
        console.log("Catégorie :", input.value);

        form.reset();

        setLoadingState(false);
    }, 2000);
});
