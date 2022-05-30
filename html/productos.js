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
        var col = [];
        for (var i = 0; i < baseDeDatos.length; i++) {
            for (var key in baseDeDatos[i]) {
                if (col.indexOf(key) === -1) {
                    col.push(key);
                }
            }
        }

        var table = document.createElement("table");
        table.classList.add('table');



        // ADD JSON DATA TO THE TABLE AS ROWS.
        for (var i = 0; i < baseDeDatos.length; i++) {

            tr = table.insertRow(-1);

            for (var j = 0; j < col.length; j++) {
                var tabCell = tr.insertCell(-1);
                    let cell = "<div class='wrappler'> <div class='inner'>" + baseDeDatos[i][col[j]];
                    console.log(cell);
                    tabCell.innerHTML = cell;
                    j++;
                if (j<4)
                    tabCell.innerHTML = "<div class='wrappler'> <div class='inner'>" + baseDeDatos[i][col[j]];
                else{
                    let image = "<img class='img-fluid' src='" + baseDeDatos[i][col[4]] + "'>";
                    tabCell.innerHTML = image;
                    console.log(image)
                }
            }
            var tabCell = tr.insertCell(-1);
            let cell1 = '<p><label><input type="checkbox" name='+baseDeDatos[i][col[0]]+'> Agregar</label></p>';
            tabCell.innerHTML = cell1;
            var tabCell = tr.insertCell(-1);
            let cell2 = '<p></p><label><input name=c'+baseDeDatos[i][col[0]]+' type="number" min="1" max="99" step="1" value="1">Numero de productos</label></p>';
            tabCell.innerHTML = cell2;
        
        }

        // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
        var divContainer = document.getElementById("juegos");
        divContainer.innerHTML = "";
        divContainer.appendChild(table);
    
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