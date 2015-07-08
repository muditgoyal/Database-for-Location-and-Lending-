  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="../js/geo.js"></script>
  <script>
    jQuery(window).ready(function(){
        jQuery("#btnInit").click(initiate_geolocation);
    })
 
    function initiate_geolocation() {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(handle_geolocation_query, handle_errors);
        }
        else
        {
            yqlgeo.get('visitor', normalize_yql_response);
        }
    }
 
    function handle_errors(error)
    {
        switch(error.code)
        {
            case error.PERMISSION_DENIED: alert("user did not share geolocation data");
            break;
 
            case error.POSITION_UNAVAILABLE: alert("could not detect current position");
            break;
 
            case error.TIMEOUT: alert("retrieving position timedout");
            break;
 
            default: alert("unknown error");
            break;
        }
    }
 
    function normalize_yql_response(response)
    {
        if (response.error)
        {
            var error = { code : 0 };
            handle_error(error);
            return;
        }
 
        var position = {
            coords :
            {
                latitude: response.place.centroid.latitude,
                longitude: response.place.centroid.longitude
            },
            address :
            {
                city: response.place.locality2.content,
                region: response.place.admin1.content,
                country: response.place.country.content
            }
        };
 
        handle_geolocation_query(position);
    }
 
    function handle_geolocation_query(position){
        alert('Lat: ' + position.coords.latitude + ' ' +
              'Lon: ' + position.coords.longitude);
        }
function handle_geolocation_query(position)
{
    var image_url = "http://maps.google.com/maps/api/staticmap?sensor=false&center=" + position.coords.latitude + "," +
                    position.coords.longitude + "&zoom=14&size=300x400&markers=color:blue|label:S|" +
                    position.coords.latitude + ',' + position.coords.longitude;

    jQuery("#map").remove();
	jQuery("#hdn").attr("value",image_url);
    jQuery("#map1").append(
        jQuery(document.createElement("img")).attr("src", image_url).attr('id','map')
    );
}

    </script>