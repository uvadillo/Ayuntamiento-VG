class FechaActual extends HTMLElement {
    constructor() {
        super();

        let shadowRoot = this.attachShadow({mode: 'open'});
        shadowRoot.innerHTML = `
  <style>
    div#fechaActual {
        margin-top: 25px;
        margin-right: 20px;
    }
  </style>
<div id="fechaActual">${this.conseguirFecha()}</div>`;




    }


    conseguirFecha() {
        var fecha = new Date();
        var dia = String(fecha.getDate());
        var mes = String(fecha.getMonth() + 1);
        var ano = fecha.getFullYear();

        return `${dia}/${mes}/${ano}`;
    }
}
window.customElements.define('fecha-actual', FechaActual);
