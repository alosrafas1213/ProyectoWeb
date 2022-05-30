//function onLoad() {    
//    let baseDeDatos = httpGet("http://143.198.128.240/index.php/product/list");
//    let $escolar = document.querySelector('#escolar');
//    renderItems(baseDeDatos);
//}

function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
    xmlHttp.send( null );
    return JSON.parse(xmlHttp.response);   
}

function renderItems(baseDeDatos) {
    let $juegos = document.querySelector('#juegos');
    for (let info of baseDeDatos) {
        // Estructura
        let miNodo = document.createElement('div');
        miNodo.classList.add('card', 'col-sm-4');
        // Body
        let miNodoCardBody = document.createElement('div');
        miNodoCardBody.classList.add('card-body');
        // Titulo
        let miNodoTitle = document.createElement('h5');
        miNodoTitle.classList.add('card-title');
        miNodoTitle.textContent = info['nombre'];
        // Imagen
        let miNodoImagen = document.createElement('img');
        miNodoImagen.classList.add('img-fluid');
        miNodoImagen.setAttribute('src', info['foto']);
        // Precio
        let miNodoPrecio = document.createElement('p');
        miNodoPrecio.classList.add('card-text');
        miNodoPrecio.textContent = '$' + info['precio'] + ' pesos mexicanos';
        //descripcion
        let miNodoDescripcion = document.createElement('p');
        miNodoDescripcion.classList.add('card-text');
        miNodoDescripcion.textContent = info['descripcionJuego'] ;

        console.log(info['descripcionJuego']);
        console.log("hola prro");
        // Boton 
        //let miNodoBoton = document.createElement('button');
        //miNodoBoton.classList.add('btn', 'btn-primary','display-4');
        //miNodoBoton.textContent = 'Añadir a carrito';
        //miNodoBoton.setAttribute('marcador', info['id']);
        //miNodoBoton.addEventListener('click', anyadirCarrito);
        // Insertamos
        miNodoCardBody.appendChild(miNodoImagen);
        miNodoCardBody.appendChild(miNodoTitle);
        miNodoCardBody.appendChild(miNodoDescripcion);

        miNodoCardBody.appendChild(miNodoPrecio);
        //miNodoCardBody.appendChild(miNodoBoton);
        miNodo.appendChild(miNodoCardBody);
        miNodoCardBody.classList.add('card-wrapper');
        $juegos.appendChild(miNodo);
    }
    return $juegos;
}

class Productos extends HTMLElement {
    constructor() {
      super();
    }
    
    connectedCallback() {
      //const shadowRoot = this.attachShadow({ mode: 'closed' });
      let baseDeDatos = httpGet("http://143.198.128.240/index.php/product/list");
      let juegos = renderItems(baseDeDatos);
      //shadowRoot.appendChild(headerTemplate.content);
    }
  
  }
  
  customElements.define('header-component', Productos);

function onLoad() {  
    var productos = new Productos();
}