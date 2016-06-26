(function() {

    var app = {
        radius: $('#config-radius').val(),
        count: $('#config-count').val(),
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
        },
        findTweet: function(lat, lng) {
            this.setCenter(lat, lng);
            $.getJSON('/search', {
                geocode: [lat, lng, this.radius].join(','),
                count: this.count
            }, function(response) {
                if (response.status != 'success') {
                    console.error('Fail');
                    return;
                }

                for (var n = response['data'].length, i = 0; i < n; i++) {
                    if (!response['data'][i].geo) {
                        console.log('response[\'data\']['+i+'].geo', response['data'][i].geo);
                        continue;
                    }
                    console.log(response['data'][i]);
                }
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
                app.findTweet(latlng.lat(), latlng.lng());
            }
        });
    });

})();
