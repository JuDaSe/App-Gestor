const div = document.getElementById("div");
let btnAgregar = document.getElementById("agregarGastos");
btnAgregar.onclick = agregarInput;
/*
let listaDeudas = [];

function nuevaDeuda(monto, empresa){
    let nuevaDeuda = {
        id: Date.now(),
        monto: monto,
        empresa: empresa
    };
    listaDeudas.push(nuevaDeuda);
    console.log("hola");

} */

function agregarInput(){

    // Creamos los input
    textInput = document.createElement("input")
    input = document.createElement("input");
    deleteInput = document.createElement("i");
    

    // Agregamos los atributos de los input
    deleteInput.setAttribute("class", "fa-regular fa-window-minimize");

    input.setAttribute("type", "number");
    input.setAttribute("name", "monto[]");
    input.setAttribute("placeholder", "Monto deuda");
    input.setAttribute("class", "form-input");
    //
    textInput.setAttribute("type", "text");
    textInput.setAttribute("placeholder", "Nombre empresa");
    textInput.setAttribute("class", "form-input");
    textInput.setAttribute("name", "empresa[]");
    

    // Estilo CSS basico

    textInput.style.margin = "1em";

    // Agregamos los input al form padre
    document.getElementById("formInput").appendChild(textInput);
    document.getElementById("formInput").appendChild(input);

}