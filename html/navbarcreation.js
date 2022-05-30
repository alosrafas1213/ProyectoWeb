const headerTemplate = document.createElement('template');

headerTemplate.innerHTML = `
<link rel="stylesheet" href="navbar.css">
<header id="navbar">
    <nav class="navbar-container container">
      <a href="/" class="home-link">
        <img src="images/JuegosDinamita.png" style="height: 3.5rem;">
        <div class="navbar-logo"></div>
        Juegos Dinamita
      </a>
      <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div id="navbar-menu" aria-labelledby="navbar-toggle">
        <ul class="navbar-links">
          <li class="navbar-item"><a class="navbar-link" href="/conocenos.html">Conocenos</a></li>
          <li class="navbar-item"><a class="navbar-link" href="/productos.html">Productos</a></li>
          <li class="navbar-item"><a class="navbar-link" href="/registro.html">Registro</a></li>
          <li class="navbar-item"><a class="navbar-link" href="/cuenta.html">Cuenta</a></li>
        </ul>
      </div>
    </nav>
    <script type="text/javascript" src="navbar.js"></script>
  </header>
`;

class Header extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    const shadowRoot = this.attachShadow({ mode: 'closed' });

    shadowRoot.appendChild(headerTemplate.content);
  }

}

customElements.define('header-component', Header);