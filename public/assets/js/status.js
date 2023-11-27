document.querySelectorAll("#products_table tbody tr td:nth-child(10)").forEach((element) => {
    if (element.innerText === "Crítico") {
        element.style.backgroundColor = "#d00";
        element.style.color = "#fff";
    } else if (element.innerText === "Atenção") {
        element.style.backgroundColor = "#ffdd00";
        element.style.color = "#000";
    } else if (element.innerText === "Favorável") {
        element.style.backgroundColor = "#0a0";
        element.style.color = "#fff";
    }
});
