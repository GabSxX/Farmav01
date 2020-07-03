let map = L.map('map').setView([-26.18215395144978, -58.17584216594696], 13);

var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    minZoom: 1,
    maxZoom: 19,
    center: [20,50]
}).addTo(map);

L.control.scale({maxWidth: 150}).addTo(map);

let marker =L.marker([-26.18215395144978, -58.17584216594696]).addTo(map);


marker.bindPopup("<h3>Farmacia Ferreyra</h3>Ciudad: Formosa<br>Abierto: 7:30-0:00 - Lunes a Lunes.<br>Atencion: Online<br>Contacto: +543704430885" ).openPopup();

function onMapClick(e) {
   alert("Por favor haga click en 'Ver Farmacia' ");
   document.getElementById('btn1').disabled=false;
}


marker.on('click', onMapClick);