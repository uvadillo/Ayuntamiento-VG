$( document ).ready(function() {

    var map = L.map('mapid').setView([42.846841, -2.670996], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);



    function onEachFeature(feature, layer) {
        // does this feature have a property named popupContent?
        if (feature.properties && feature.properties.popupContent) {
            layer.bindPopup(feature.properties.popupContent);
        }
    }
    var puntos = $("#cordenadas")[0].outerText;
    var puntosJSON = JSON.parse(puntos);
                for (x=0;x < puntosJSON.length; x++){
                    L.marker([puntosJSON[x].latitude, puntosJSON[x].longitude]).addTo(map)
                        .bindPopup(puntosJSON[x].description)
                        .openPopup();
                }
            });




