<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html {
        height: 100%;
        margin: 0;
        padding: 0;
		text-align: center;
      }

      #map {
        height: 500px;
        width: 600px;
      }
    </style>
  </head>
  <body>
  <div id="map"></div>
    <script>
      function initMap() {
			var mapOptions = {
			  center: {lat: 13.847860, lng: 100.604274},
			  zoom: 18,
			}
				
			var maps = new google.maps.Map(document.getElementById("map"),mapOptions);
			
			var marker = new google.maps.Marker({
			   position: new google.maps.LatLng(13.847616, 100.604736),
			   map: maps,
			   title: 'dddddddddddddddddddddfffffffff fdf',
			   icon: 'img/logo_profile.jpg'
			});

      var info = new google.maps.InfoWindow({
        content : '<div style="font-size: 25px;color: red">ThaiCreate.Com Camping</div>'
      });

      google.maps.event.addListener(marker  , 'click', function() {
        info.open(maps, marker );
      });


      var marker2 = new google.maps.Marker({
         position: new google.maps.LatLng(13.847077, 100.606973),
         map: maps,
         title: 'หมู่บ้านอารียา',
         icon: 'img/logo_profile.jpg'
      });

       var info2 = new google.maps.InfoWindow({
        content : "<a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=2&d_check=1&listing=2'  ><img src='$project_img_folder' alt='--' style='width: 100%; height: 130px;'> <br> </a> <br> <b>Project : </b> $project_name_en <br> <b>จำนวนชั้น : </b>  $project_total_floors <br><b>ปีที่สร้าง : </b> $project_completed <br> <b>สถานีรถไฟฟ้า : </b>  $project_train_station <br> <b>โซน : </b>  $project_zone2 <br><a href='../page/listing_deal_buyer.php?code=$code&project=$project_id&check_p=2&d_check=1&listing=2'  >คลิกเข้าชม Listing ในโครงการนี้</a>"
      });

      google.maps.event.addListener(marker2  , 'click', function() {
        info2.open(maps, marker2 );
      });


		}
    </script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCFd7z_EUVLuusR62GaRWlZcAvEn0zR44&callback=initMap" async defer></script>
  </body>
</html>