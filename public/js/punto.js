
                        $( document ).ready(function() {
                            var lat = $("#lat")[0].outerText;
                 
                            var lng = $("#lng")[0].outerText;
                            var desc = $("#desc")[0].outerText;
                            
                            
                            var map = L.map('mapid').setView([lat, lng], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);
                        
                        
                        
                            function onEachFeature(feature, layer) {
                                // does this feature have a property named popupContent?
                                if (feature.properties && feature.properties.popupContent) {
                                    layer.bindPopup(feature.properties.popupContent);
                                }
                            }
                            L.marker([lat,lng]).addTo(map)
                            
                                                    .bindPopup(desc)
                                                    .openPopup();
                        
                         
                        
                        });
                        
                        
                        