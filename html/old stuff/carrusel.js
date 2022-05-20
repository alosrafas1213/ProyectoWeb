var array= ["./images/FC.jpg","./images/FCA.jpg","./images/FMed.jpg","./images/fi.jpg"];
var cont=0;

function siguiente()
{
    cont+=1;
    if (cont==array.length)
        cont=0;
    document.getElementById("image").src=array[cont];
    console.log('Numero: ' + cont);
}

function anterior(){
    cont-=1;
    if (cont<0)
        cont=array.length-1;
    document.getElementById("image").src=array[cont];
    console.log('Numero: ' + cont);
}

function loadd(){
    document.getElementById("image").src=array[0];
}