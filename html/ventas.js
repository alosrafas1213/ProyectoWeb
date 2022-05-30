//function onLoad() {    
//    let baseDeDatos = httpGet("http://143.198.128.240/index.php/product/list");
//    let $escolar = document.querySelector('#escolar');
//    renderItems(baseDeDatos);
//}

function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    var params = "curp="+document.getElementById("curp").value;
    xmlHttp.open( "GET", theUrl+"?"+params, false ); // false for synchronous request
    console.log(params);
    xmlHttp.send(params);
    return JSON.parse(xmlHttp.response);   
}

function createTable(baseDeDatos)
{
    var table = document.createElement('table');
    table.className = "ventas";
    var tr = document.createElement('tr');   

    var td1 = document.createElement('td');
    var td2 = document.createElement('td');
    var td3 = document.createElement('td');
    var td4 = document.createElement('td');

    var text1 = document.createTextNode('Numero de Venta');
    var text2 = document.createTextNode('CURP');
    var text3 = document.createTextNode('Cantidad de Productos');
    var text4 = document.createTextNode('Costo total');

    td1.appendChild(text1);
    td2.appendChild(text2);
    td3.appendChild(text3);
    td4.appendChild(text4);
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);

    table.appendChild(tr);


    var col = new Array();
    col[0] = "idVenta";
    col[1] = "curp";
    col[2] = "cantidad";
    col[3] = "costoTotal";

    for (var i = 0; i < baseDeDatos.length; i++){
        let tr2 = document.createElement('tr'); 
        for (var j = 0; j < 4; j++){
            let td = document.createElement('td');
            let text = document.createTextNode(baseDeDatos[i][col[j]]);
            td.appendChild(text);
            tr2.appendChild(td);

        }
        table.appendChild(tr2);
    }

    document.body.appendChild(table);
    var br = document.createElement('br');
    document.body.appendChild(br);
}

class Productos extends HTMLElement {
    constructor() {
      super();
    }
    
    connectedCallback() {
      //const shadowRoot = this.attachShadow({ mode: 'closed' });
      var baseDeDatos = httpGet("http://143.198.128.240/index.php/venta/list");
      console.log(baseDeDatos.length)
      createTable(baseDeDatos);

      //let juegos = renderItems(baseDeDatos);
      //shadowRoot.appendChild(headerTemplate.content);
    }
  
  }
  
customElements.define('footer-component', Productos);

function onLload() {  
    var productos = new Productos();
    productos.connectedCallback();
}