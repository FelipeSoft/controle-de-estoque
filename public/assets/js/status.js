document.querySelectorAll("#stock_table tbody tr td:nth-child(4)").forEach((element) => {
    if (element.innerHTML === "Crítico") {
        element.style.backgroundColor = "#d00";
        element.style.color = "#fff";
    } else if (element.innerHTML === "Atenção") {
        element.style.backgroundColor = "#ffdd00";
        element.style.color = "#000";
    } else if (element.innerHTML === "Favorável") {
        element.style.backgroundColor = "#0a0";
        element.style.color = "#fff";
    }
});
