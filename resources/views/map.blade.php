<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
 <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

 <style>
 #map { 
height: 600px; 
}
 </style>
 <title>MAP API DISTANCE TEST</title>
</head>
 <body>
 <div id="map"></div>
 <script>
 const mymap = L.map('map').setView([44.305584, -69.976561], 13); 
 const attribution = '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'; 
 const tileUrl = 'https://tile.openstreetmap.org/{z}/{x}/{y}.png';
 const tiles = L.tileLayer(tileUrl, { attribution });
 tiles.addTo(mymap);
 const redIcon = new L.icon({
 iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
 iconSize: [25, 41],
 iconAnchor: [12, 41],
 popupAnchor: [1, -34]
 });
 const blueIcon = new L.icon({
 iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
 iconSize: [25, 41],
 iconAnchor: [12, 41],
 popupAnchor: [1, -34]
 });

 const api_url = 'https://api.npoint.io/f26432e9e880999eeb1b';
 async function getMap() { 
const response = await fetch(api_url); 
const data = await response.json(); 
var MapMarkers = []; 
for (let i = 0; i < data.features.length; i++) 
{
 const location_ltd = data.features[i].properties.LATITUDE;
 const location_long = data.features[i].properties.LONGITUDE;
 
 

 if ( i == 0 ) {
    //do nothing
    const marker = L.marker([location_ltd, location_long], { icon: blueIcon }).addTo(mymap);
 }
 else if (i > 0 && i < data.features.length)
 {
      var t =  --i;
      

        const location_ltd2 = data.features[t].properties.LATITUDE;
        const location_long2 = data.features[t].properties.LONGITUDE;
        const p1 = location_ltd - location_ltd2;
        const p2 = location_long - location_long2;
        var distance = getDistance(p1, p2);
        //console.log(distance);
        i++;
      
        if (distance > 500)
 {
  // const marker = {id: i, lat: location_ltd2, long: location_long2, icon: 'redIcon'};
  // MapMarkers.push(marker);
  const marker = L.marker([location_ltd2, location_long2], { icon: redIcon }).addTo(mymap); 

  // const marker = [Lat: location_ltd2, Long: location_long2, icon: redIcon];
  //       MapMarkers.push(marker);
}
 else
{
  //const marker = {id: i, lat: location_ltd2, long: location_long2, icon: 'blueIcon'};
 const marker = L.marker([location_ltd2, location_long2], { icon: blueIcon }).addTo(mymap); 
        MapMarkers.push(marker);
}
 //L.marker([location_ltd, location_long]).addTo(mymap);
 
         //console.log('this is the distance in meters', distance)
    }

   
    
        //return d;  
}

console.log(MapMarkers); 
function rad(x) {
  return x * Math.PI / 180;
}

function getDistance (p1, p2) {
  var R = 6378137; // Earth’s mean radius in meter
  var dLat = rad(p1);
  var dLong = rad(p2);
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(rad(p1)) * Math.cos(rad(p2)) *
    Math.sin(dLong / 2) * Math.sin(dLong / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
 // console.log('try this, in meters', d);
  return d; // returns the distance in meter
}


 //const marker = L.marker([location_ltd, location_long], { icon: blueIcon }).addTo(mymap); 
}



 
 getMap();
 </script>
</body> 
</html>