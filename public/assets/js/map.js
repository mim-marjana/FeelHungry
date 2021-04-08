$(function(){
      var myCenter=new google.maps.LatLng(24.895615, 91.874909);
      function initialize()
      {
      var mapProp = {
        center:myCenter,
        zoom:16,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        };

      var map=new google.maps.Map(document.getElementById("map"),mapProp);
      var marker=new google.maps.Marker({
        position:myCenter,
        });

      marker.setMap(map);

      var infowindow = new google.maps.InfoWindow({
        content:"The Place"
        });

      infowindow.open(map,marker);
      }

      google.maps.event.addDomListener(window, 'load', initialize);

  });

$("#openMap").click(function(){
  $("#mapWrapper").animate({"left":"0%"},500,"swing");
});
$("#closeMap").click(function(){
  $("#mapWrapper").animate({"left":"-100%"},300,"swing");
})