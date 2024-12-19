const position = document.getElementById('position');
const divGk = document.getElementById('divGk');
const divPlayer = document.getElementById('divPlayer');

position.addEventListener('change', () => {
    const selectedValue = position.value;

    if (selectedValue === "GK") {
        divGk.style.display = "block";
        divPlayer.style.display = "none";
    } else {
        divGk.style.display = "none";
        divPlayer.style.display = "block";
    }
});

