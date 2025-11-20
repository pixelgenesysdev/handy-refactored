document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("globalLoader");

    // Minimum display time (optional)
    setTimeout(() => {
        loader.classList.add("hide");
    }, 800); 
});
    