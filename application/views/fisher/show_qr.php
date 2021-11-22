<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCbXBUByksOg07qVNz19q_sraAmye8xaBQ&language=id&region=ID"></script>

<!--mengimplemtasi library jsqrscan-->
<script type="text/javascript">
var map;      // global variable
var markers = [];

var infowindow;
function createMarker(map,latlng, vessel,pos,nama_kapal){
 
var zindex = 9998;
//var img = "<? //=base_url()?>assets/images/mapmarker/mapmarker-red-small.png";

 //var image = new google.maps.MarkerImage(img);
 var marker= new google.maps.Marker({
		  position: latlng, 
		  map: map,
		  title: nama_kapal,
		  //icon:image,
		  zIndex: zindex
	});

	//infowindow
	var contentString = '<font color="black"><b>'+nama_kapal+'</b></font>';
	
	infowindow = new google.maps.InfoWindow();
	infowindow.setContent(contentString);
 	infowindow.open(map,marker);
	
	google.maps.event.addListener(marker, "click", function() {
			if (infowindow) infowindow.close();
			 infowindow = new google.maps.InfoWindow();
			 infowindow.setContent(contentString);
			 infowindow.open(map,marker);
	});
	
}

function initializeMap() {
    var options = {
        center: new google.maps.LatLng(-6.1787019,106.8335099),
        zoom:7,
		mapTypeControl:true,
		scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_LEFT
		},
		zoomControl: true,
		zoomControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		scaleControl: true,
		streetViewControl: false,
		streetViewControlOptions: {
			position: google.maps.ControlPosition.RIGHT_CENTER
		}
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), options);
		GoToMarker();
};

function moveToLocation(lat, lng){
    var center = new google.maps.LatLng(lat, lng);
    map.panTo(center);
}

function addMarker(location) {
	markers.push(new google.maps.Marker({
		position: location,
		map: map
	}));
}

function setMapOnAll() {
  for (var i = 0; i < markers.length; i++) {
	markers[i].setMap(null);
  }
}

function GoToMarker(lat, lng) {
	 CentralPark = new google.maps.LatLng(lat, lng);
	 addMarker(CentralPark);
}




$(document).ready(function () {

});
</script>

<style type="text/css">
.center {
	text-align: center;
}
.right {
	text-align: right;
}
#contentx{
	height: 60vh;
	overflow-y: auto;
}
.footer_button{
	padding-bottom:1px;
}
.w_100{
	width:100%;
}
#map_canvas{
    height: 450px;
    width: 100%;
}
</style>
<?php
if(isset($catches) && count($catches)>0){
?>
	<table class="table table-striped m-table">
		<tbody>
		
		<tr>
			<td class="center">
				<h5><?=$catches[0]['vessel_name']?> - <?=$catches[0]['company']?></h5>
			</td>
		</tr>
		
		</tbody>
	</table>
	<?php
		foreach($catches as $row){
			$catches_fish = $this->db->query('select a.*, b.name_indo from catches_fish a
		left join fish b on a.fish_id=b.id
		where a.id_catches="'.$row['id_catches'].'"')->result_array();
		?>
	<table class="table table-striped m-table">
		<tbody>
		
		<tr>
			<td colspan="3">
				<div style="font-weight:bold"><?=date('Y-m-d H:i:s',$row['time_start'])?> - <?=date('Y-m-d H:i:s',$row['time_end'])?>
				<?=number_format((($row['time_end']-$row['time_start'])/60),0)?> Min(s)</div>
				<span>Lat: <?=$row['lat']?></span> <span>Long: <?=$row['lon']?></span>
			</td>
			<!--<td class="right">
			<button type="button" class="btn btn-default ok_catches">
				<span class="glyphicon glyphicon-ok">ok</span>
			</button>
			<button type="button" class="btn btn-default warning_catches">
				<span class="glyphicon glyphicon-exclamation-sign">warning</span>
			</button>
			</td>-->
		</tr>
		
		</tbody>
	</table>
<!--tampilan form input data ikan-->
	<table class="table table-striped m-table">
		<tbody>
		<?php
		foreach($catches_fish as $rowx){
		?>
		<tr class="input_cathes">
			<td>
				<?=$rowx['name_indo']?>
			</td>
			<td class="right">
				<?=$rowx['weight']?>  Kg
			</td>
			<td class="right">
				<?=$rowx['quantity']?>  Unit
			</td>
		</tr>
		<?php
		}
		?>
		</tbody>
	</table>

	<?php
		}
		?>
	

	<div id='map_canvas'></div>
<?php
}else{
	die('Data not found');
}
		?>
<script>
initializeMap();
setMapOnAll();
</script>
<?php
		foreach($catches as $row){
		?>
<!--menampilkan lat lon-->
<script>
					if('<?=$row['lat']?>'!=""){
var myLatlng = new google.maps.LatLng(<?=$row['lat']?>,<?=$row['lon']?>);
createMarker(map,myLatlng,' ','',"<?=$row['lat']?>, <?=$row['lon']?><br><?=date('Y-m-d H:i:s',$row['time_start'])?> - <?=date('Y-m-d H:i:s',$row['time_end'])?>");
}
				</script>
<?php
		}
?>
