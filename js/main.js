

$(document).ready(function(){
    let BtnSendBd = document.createElement("input");
    BtnSendBd.setAttribute("type", "submit");
    let Container = document.createElement("div");
    $('#formload').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"excel.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data)
            {
                $('#excel_area').html(data);
                $('td').css("padding", "10px");
                let input = null;
                let caseS = null;
                let btnDel =  document.createElement("button")
                btnDel.innerText = "DELETE";
                btnDel.classList.add("btn" , "border-1" , "text-dark", "bg-white", "border-dark");
                btnDel.classList.add("m-4");
                $("tr").append(btnDel)
                let tr = document.querySelectorAll("tr")
                let td = document.querySelectorAll("td");
                let btn = document.querySelectorAll("button");
                let table = document.querySelector("table");
                let caseprece = null;

                for (const btnKey of btn) {
                    btnKey.addEventListener("click", deleteRow, false);
                }
                function deleteRow(){
                    for (const key of tr) {
                        //console.log(key.children)
                        if(key.children[key.children.length - 1] === this){
                            key.remove();
                        }
                    }
                }
                removeTrVide(tr);
                createButtonSend(tr,Container, BtnSendBd);



                $("td").click(function (){
                    caseS = this
                    if(caseS !== caseprece){
                        if(caseprece === null){
                            caseprece = this;
                        } else{
                            switchToInputHidden(caseprece);
                            caseprece = this;
                        }
                        if(this.innerText === "F" || this.innerText === "B" || this.innerText === "img" || this.innerText === "txt" || this.innerText === "mixte"){
                            switchToSelect(this);
                        } else {
                            switchToTextArea(this);
                        }
                    }
                })
            }
        })
    });
});
function createButtonSend(tr, Container, BtnSendBd){
    if(tr[0].children[0].innerText !== ""){
        Container.classList.add("container", "w-25", "m-4");
        $("#formsend").append(Container);
        BtnSendBd.classList.add("btn","form-control", "btn-outline-dark", "mt-4", "send");
        BtnSendBd.innerText = "Envoyer les données dans la bd";
        $(Container).append(BtnSendBd);
        //console.log(BtnSendBd)
    }
}
function removeTrVide(tr){
    for (const key of tr) {
        //console.log(key.children)
        if(key.children[0].innerText === ""){
            key.remove();
        }
    }
}
function switchToSelect(caseTab){
    let inputHidden = null;
    $(caseTab).find("input").each(function() {
        inputHidden = this
        inputval = this.value;
    });
    if(inputval === "F" || inputval === "B"){
        caseTab.innerHTML = "<select>" +
            "<option value='F'>F</option>" +
            "<option value='B'>B</option>" +
            "</select>";
    }else if(inputval === "img" || inputval === "mixte" || inputval === "txt"){
        caseTab.innerHTML = "<select>" +
            "<option value='img'>img</option>" +
            "<option value='mixte'>mixte</option>" +
            "<option value='txt'>txt</option>" +
            "</select>";
    }


}

function switchToTextArea(caseTab){
    let inputHidden = null;
    $(caseTab).find("input").each(function() {
        inputHidden = this
        name = this.getAttribute("name");
    });
    caseTab.innerHTML = `<textArea name='${name}'> ${inputHidden.value}</textArea>`;

}

function  switchToInputHidden(caseTab){
    let value = null;

    $(caseTab).find("textarea").each(function() {
        value = this.value
        name = this.getAttribute("name");
    });
    if(value === null){
        $(caseTab).find("select").each(function() {
            value = this.value
            name = this.getAttribute("name");

        });
    }
    caseTab.innerHTML = `<input type='hidden' name='${name}' value='${value}'>${value}`;


}


