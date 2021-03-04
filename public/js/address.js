(function() {
    var placesAutocomplete = places({
        appId: 'plPUIUV501P5',
        apiKey: 'bbd770a0fe2bccfa28dd0ad5d64acc85',
        container: document.querySelector('#address-input')
    });

    placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#street_name').value = e.suggestion.name || '';
        document.querySelector('#postal_code').value = e.suggestion.postcode || '';
        document.querySelector('#province').value = e.suggestion.administrative || '';
        document.querySelector('#city').value = e.suggestion.city || '';
        document.querySelector('#latitude').value = e.suggestion.latlng.lat || '';
        document.querySelector('#longitude').value = e.suggestion.latlng.lng || '';


    });
    placesAutocomplete.on('clear', function() {
        $address.textContent = 'none';
    });

})();