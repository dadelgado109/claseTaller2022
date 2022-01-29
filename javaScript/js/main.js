
function funReflejar(){

    document.getElementById("idTdDiez").innerHTML = "Soy el diez";

}

function ponerVerde(){

    document.getElementById("idTdTrece").style.backgroundColor="green";

}

function ponerRojo(){

    document.getElementById("idTdTrece").style.backgroundColor="red";

}

window.onload = function() {
    
    document.getElementById("idTrVacio").innerHTML = " <td class='claseBorde' colspan='4'></td> ";

};


function presionoTecla(evento){

    console.log(evento);
    document.getElementById("idTextoCostado").innerHTML = evento.values;

}


