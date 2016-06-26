(function() {

    var app = {
        map: null,
        init: function() {
            this.map = new GMaps({
                div: '#map',
                lat: 13.7563,
                lng: 100.5018
            });
        },
        setCenter: function(lat, lng) {
            this.map.setCenter(lat, lng);
        },
        addMarker: function(lat, lng, markerOption) {
            this.map.addMarker({
                lat: lat,
                lng: lng
            });
        }
    };

    app.init();

    $('#find-tweet').submit(function(e){
        e.preventDefault();

        GMaps.geocode({
            address: $('#city').val().trim(),
            callback: function(results, status) {
                if (status!='OK') {
                    return;
                }

                var latlng = results[0].geometry.location;
                app.setCenter(latlng.lat(), latlng.lng());
            }
        });
    });

})();
