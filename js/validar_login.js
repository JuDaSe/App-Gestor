let textAlert = document.createElement("p");

document.getElementById('loginForm').addEventListener('submit', function(e){
    let user = document.getElementById('user').value;
    e.preventDefault();

    let verificacion = new FormData(this);
    fetch('controller/ingreso.php',{
        method: 'POST',
        body: verificacion
    })
    .then(response => response.json())
    .then(data=>{
        console.log(data);
          if(data.exito === true){
        window.location.href = "view/main.html";
        } else {
            alert("Error: " + data.mensaje);
            alertTemp();
        }
    })
    .catch(error => console.error('Error:', error));
});

function alertTemp(){
     setTimeout(function(){
            textAlert.textContent = "";
        }, 3500);     
        textAlert.textContent = "Ocurrio un error, revisa nuevamente!";
        textAlert.style.color = "red";
        textAlert.style.fontWeight = "bold";
        document.getElementById("alerta").appendChild(textAlert);
};