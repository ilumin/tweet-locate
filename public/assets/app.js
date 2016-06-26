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
        addMarker: function(lat, lng, avatar, tweetText) {
            console.log('add market at (', lat, ',', lng, ')');
            this.map.addMarker({
                lat: lat,
                lng: lng,
                icon: avatar,
                infoWindow: {
                    content: tweetText
                }
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
                    var tweet = response['data'][i];
                    if (!tweet.geo) {
                        console.log('response[\'data\']['+i+'].geo', response['data'][i].geo);
                        continue;
                    }
                    console.log(response['data'][i]);
                    app.addMarker(
                        tweet.geo.coordinates[0],
                        tweet.geo.coordinates[1],
                        tweet.user.profile_image_url,
                        tweet.text
                    )
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
