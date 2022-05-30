var array= ["./images/board-games.png","./images/board-games1.jpeg","./images/board-games2.jpg","./images/board-games3.jfif","./images/board-games4.jpg","images/Oferton.png","./images/comming_soon.png", "https://images.chesscomfiles.com/uploads/v1/images_users/tiny_mce/HasanElias/phpC1p3gn.gif","https://s3.amazonaws.com/theoatmeal-img/ek-app/steal.gif "];
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