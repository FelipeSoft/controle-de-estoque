document.querySelector("button#open_modal").addEventListener("click", () => {
    document.querySelector("main#transaction_modal").classList.remove("hidden");
    setTimeout(() => {
        document.querySelector("main#transaction_modal").style.opacity = 1;
        document.querySelector("main#transaction_modal").classList.add("flex");
    }, 200);
});

document.querySelector("button#close_modal").addEventListener("click", () => {
    document.querySelector("main#transaction_modal").style.opacity = 0;
    setTimeout(() => {
        document.querySelector("main#transaction_modal").classList.add("hidden");
        document.querySelector("main#transaction_modal").classList.remove("flex");
    }, 200);
});