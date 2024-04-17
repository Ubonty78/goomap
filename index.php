<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDSs4FMWzbHaAcWvX3s4461ofFbZda7vKw" 
          type="text/javascript"></script>
  <script src="javascripts/jquery.js"></script>
  <script type="text/javascript" src="javascripts/jquery.googlemap.js"></script>
</head> 
<style>
 #content{
  width:1200px;
  background:#EEE;
}
/* #content {
  width: 1200px; 
  height: 600px;
} */
#storelocation {
  background:#CCC;
  float:left;
  width : 400px; 
  height: 500px;
}
#map {
  float:right;
  width:800px;
  height:500px;
}
.list{
  padding:10px;
}
</style>
<body>
  <div id="content">
    <div id="storelocation">
      <div class="list">
          <div class="list-label">1</div>
            <div class="list-details">
              <div class="list-content">
                <div class="loc-name">Digital Organic</div>
                <div class="loc-addr">318 Rama IV Rd, Khwaeng Maha Phruttharam, Bang Rak, Bangkok 10500</div>
                  <div class="loc-directions"><a href="" target="_blank">Directions</a></div>
              </div>
            </div>
      </div>
    </div>
    <div id="map"></div>
  </div>

  <script type="text/javascript">
    var Branches = [
      ['Digital Organic', 13.7374648,100.5115243, 4,'318 Rama IV Rd, Khwaeng Maha Phruttharam, Bang Rak, Bangkok 10500'],
      ['Shinning Gold Bullion', 13.7469348,100.4993159, 5,''],
      ['Samyan Mitrtown', 13.7279352,100.542426, 3,'944 Rama IV Rd, Wang Mai, Pathum Wan, Bangkok 10330'],
      ['ICONSIAM', 13.727816,100.522871, 2,'299 Charoen Nakhon Rd, Khlong Ton Sai, Khlong San, Bangkok 10600'],
      ['Central Pinklao', 13.7739256,100.4928486, 1,'7/1 Borommaratchachonnani Rd, Arun Amarin, Bangkok Noi, Bangkok 10700']
    ];

    
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: new google.maps.LatLng(13.7245449,100.4682987),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    
    for (i = 0; i < Branches.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(Branches[i][1], Branches[i][2]),
        map: map
      });
      
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(Branches[i][0]);
          infowindow.open(map, marker);
          google.maps.LatLng(13.7245449,100.4682987);
        }
      })(marker, i));
    }
  </script>
</body>
</html>