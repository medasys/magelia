var MapsGoogle = function () {

    var mapMarker = function () {
        var map = new GMaps({
            div: '#gmap_marker',
           lat: -51.38739,
                lng: -6.187181,
        });
        map.addMarker({
           lat: -51.38739,
                lng: -6.187181,
            title: 'Medacloud',
            infoWindow: {
                content: '<span style="color:#000">MEDACLOUD</span>'
            }
        });
        map.addMarker({
            lat: -12.042,
            lng: -77.028333,
            title: 'Marker with InfoWindow',
            infoWindow: {
                content: '<span style="color:#000">HTML Content!</span>'
            }
        });
        map.setZoom(5);
    }

return {
        //main function to initiate map samples
        init: function () {
            mapMarker();
        }

    };

}();