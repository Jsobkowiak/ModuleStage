let lotchange = document.getElementById("lotchange");
let lot = document.getElementById("lot");
let btnprece = document.getElementById("preceetape2");

btnprece.addEventListener("click", PrecedentSwitch, false);
lotchange.addEventListener("change", AddFormulaire, false)

function PrecedentSwitch() {
    document.location.href = "etape1.php";
}

function AddFormulaire() {
    $("#lot").empty();
    let NumLot = 0;
    for (let i = 0; i < this.value; i++) {
        NumLot++;
        let newlot = Createlot("Lot " + NumLot);
        let inputLibelle = CreateInput("text", "form-control", `libelle${NumLot}`, `libelle${NumLot}`, "Exemple : Jeux de société")
        inputLibelle.setAttribute("required", "");
        let labelLibelle = CreateLabel(`libelle${NumLot}`, "Nom du lot (Obligatoire)");
        let FormGroupLibelle = CreateFormGroup(inputLibelle, labelLibelle);

        let inputFile = CreateInput("file", "form-control", `file${NumLot}`, `file${NumLot}`)
        let labelFile = CreateLabel(`file${NumLot}`, "Image du lot (Obligatoire)");
        let FormGroupFile = CreateFormGroup(inputFile, labelFile);
        inputFile.setAttribute("required", "");

        let inputQtity = CreateInput("number", "form-control", `quantity${NumLot}`, `quantity${NumLot}`, "Exemple : 50");
        let labelQtity = CreateLabel(`quantity${NumLot}`, "Quantité de lot (Obligatoire)");
        let FormGroupQtity = CreateFormGroup(inputQtity, labelQtity);
        inputQtity.setAttribute("required", "");


        let span = document.createElement("span");
        span.innerText = "Quel type de bonne réponse voulez-vous pour avoir le lot ?";
        let select = document.createElement("select");
        select.setAttribute("name",`type${NumLot}`);
        select.setAttribute("id", `type${NumLot}`);
        select.classList.add("form-select");
        let Options2 = document.createElement("option");
        Options2.setAttribute("value", "Réponse bonne");
        Options2.innerText = "Réponse bonne";        
        let Options1 = document.createElement("option");
        Options1.setAttribute("value", "Pourcentage")
        Options1.innerText = "Pourcentage";
       
        select.append(Options2); 
        select.append(Options1);

        let FormGroupSelect = document.createElement("div");
        FormGroupSelect.setAttribute("class", "form-group");
        FormGroupSelect.append(span);
        FormGroupSelect.append(select);

        let inputRepMin = CreateInput("number", "form-control", `repmini${NumLot}`, `repmini${NumLot}`, "Exemple : 8");
        let labelRepMin = CreateLabel(`repmini${NumLot}`, "Nombre de bonne réponse minimum (Obligatoire)");
        let FormGroupRepMin = CreateFormGroup(inputRepMin, labelRepMin);
        inputRepMin.setAttribute("required", "");

        let inputRepMax = CreateInput("number", "form-control", `repmax${NumLot}`, `repmax${NumLot}`, "Exemple : 20");
        let labelRepMax = CreateLabel(`repmax${NumLot}`, "Nombre de bonne réponse maximum (Obligatoire)");
        let FormGroupRepMax = CreateFormGroup(inputRepMax, labelRepMax);
        inputRepMax.setAttribute("required", "");

        newlot.appendChild(FormGroupLibelle)
        newlot.appendChild(FormGroupFile);
        newlot.appendChild(FormGroupQtity)
        newlot.appendChild(FormGroupSelect)
        newlot.appendChild(FormGroupRepMin)
        newlot.appendChild(FormGroupRepMax)
        lot.prepend(newlot);

    }



}



function CreateInput(type = "", classStyle = "", name = "", id = "", placeholder = "", required = "") {
    let input = document.createElement("input");
    input.setAttribute("name", name);
    input.setAttribute("type", type);
    input.setAttribute("id", id);
    input.setAttribute("class", classStyle);
    input.setAttribute("placeholder", placeholder)
    return input;
}

function CreateLabel(id = "", text = "") {
    let label = document.createElement("label")
    label.setAttribute("for", id)
    label.innerText = text;
    return label;
}

function CreateFormGroup(input, label) {
    let formgroupe = document.createElement("div");
    formgroupe.setAttribute("class", "form-group");

    formgroupe.appendChild(label);
    formgroupe.appendChild(input);


    return formgroupe;
}

function Createlot(legendText = "") {
    let fieldset = document.createElement("fieldset");
    let legend = document.createElement("legend");
    legend.innerText = legendText;
    fieldset.setAttribute("class", "mt-4")
    fieldset.append(legend);

    return fieldset;
}