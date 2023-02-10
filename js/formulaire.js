
let tirageminimumScreen = document.getElementById("tirageminimum");
let selectTirage = document.getElementById("tirageselect")

console.log(selectTirage);
console.log(selectTirage.value);

    // Example starter JavaScript for disabling form submissions if there are invalid fields
selectTirage.addEventListener("change", AddTirageMini, false);


document.addEventListener("DOMContentLoaded", () => {
    tirageminimumScreen.style.display = "none";
});

function AddTirageMini(){
    if(this.value === "Oui"){
        tirageminimumScreen.style.display = "block";
    } else {
        tirageminimumScreen.style.display = "none";
    }
}
