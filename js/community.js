const inputField = document.querySelector("#input");

inputField.addEventListener("click", (e) => {
    document.querySelector(".community__header_container").style.display = "none";
    document.querySelector(".popup__post").style.display = "block";
})