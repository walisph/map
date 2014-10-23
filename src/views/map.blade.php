<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//maps.googleapis.com/maps/api/js?key={{ \Config::get('walis-map::config.api_key') }}&amp;sensor=false"></script>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="robots" content="noindex, nofollow"/>

    <meta charset="UTF-8"/>
    <style type="text/css">html,body,#googleMap{height:100%;margin:0;padding:0;width:100%}</style>
    <script type="text/javascript">
    function initialize(){
        var mapProp = {
            center:new google.maps.LatLng({{ \Config::get('walis-map::config.coordinate') }}),
            zoom:{{ \Config::get('walis-map::config.zoom') }},
            mapTypeId:google.maps.MapTypeId.{{ \Config::get('walis-map::config.type') }},
            mapTypeControl: false,
            overviewMapControl: false,
            scaleControl: false,
            zoomControl: false
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        @if( \Config::get('walis-map::config.marker') )
        var marker = new google.maps.Marker({
            position: mapProp.center,
            map: map,
            title: '{{ \Config::get('app.title') }}',
            animation: google.maps.Animation.DROP
        });
        @endif
    }
    google.maps.event.addDomListener(window,'load',initialize);
    </script>
</head>
<body>
    <div id="googleMap"></div>
</body>
</html>