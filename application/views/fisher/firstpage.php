<style id="css" type="text/css" >
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
</style>
<?php
$this->sess = $this->session->userdata('logged_in');
$this->session=$this->fungsi->user_login();
?>
<body>
    <!--data-cache="static" data-path="/site.css-->
<form role="form" name="frm" action="<?=site_url('Fisher/save')?>" method="post" id="frm">
<input type="hidden" id="id_depart" name="id_depart" value="<?=(isset($rec['id_depart']) && $rec['id_depart']!='')?$rec['id_depart']:''?>">
<input type="hidden" id="depart_number" name="depart_number" value="<?=(isset($rec['depart_number']) && $rec['depart_number']!='')?$rec['depart_number']:''?>">
<input type="hidden" id="id_catches" name="id_catches">
<br>
<div class="container w_100">
  <div class="row">
	<div class="col-6">
		<?=(isset($rec['depart_number']) && $rec['depart_number']!='')?'<button type="button" class="btn btn-lg btn-info" id="upload_final">Upload</button>':''?>
        <button><a href="<?=base_url()."Auth/logout"?>" class="btn btn-default btn-flat">Sign out</a></button>
    </div>
   
	<div class="col-6 right" id='id_depart_div'>
		<?=(isset($rec['depart_number']) && $rec['depart_number']!='')?$rec['depart_number']:''?>
	</div>
  </div>
  <div class="row">
	
    <div class="col-12 center">
      <h3><?=$this->sess['vessel_name']?></h3>
    </div>
	
  </div>
  <div class="row">
    <div class="col-sm center">
	  <h4><?=$this->sess['fishing_gear']?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-sm center" id="location_info">
    </div>
  </div>
  <div class="row">
    <div class="col-sm center" id="contentx">
		<?php
if(isset($catches) && count($catches)>0){
?>
	<table class="table table-striped m-table">
		<tbody>
		<?php
		foreach($catches as $row){
		?>
		<tr class="input_cathes">
			<td colspan="3">
				<div style="font-weight:bold"><?=date('Y-m-d H:i:s',$row['time_start'])?> - <?=date('Y-m-d H:i:s',$row['time_end'])?>
				<?=number_format((($row['time_end']-$row['time_start'])/60),0)?> Min(s)</div>
				<span>Lat: <?=$row['lat']?></span> <span>Long: <?=$row['lon']?></span>
			</td>
			<td class="right">
			<button type="button" class="btn btn-default ok_catches">
				<span class="glyphicon glyphicon-ok">ok</span>
			</button>
			<button type="button" class="btn btn-default warning_catches">
				<span class="glyphicon glyphicon-exclamation-sign">warning</span>
			</button>
			<button type="button" class="btn btn-default qr_catches">
				<span class="glyphicon glyphicon-qrcode">qr</span>
            </button>

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
	

    </div>
  </div>
  <!--buttons-->
  <div class="row fixed-bottom footer_button">
	<div class="col-sm center">
		<button style="display:none" type="button" class="btn btn-lg btn-lg btn-info w_100 btn_action" id="save_qr">SAVE QR</button>
		<button style="display:none" type="button" class="btn btn-lg btn-lg btn-success w_100 btn_action" id="save">SAVE</button>
		<button <?=(isset($catches) && count($catches)>0)?'':' style="display:none"'?> type="button" class="btn btn-lg btn-lg btn-success w_100 btn_action" id="hauling">START HAULING</button>
		<button style="display:none" type="button" class="btn btn-lg btn-danger w_100 btn_action" id="stop_hauling">STOP HAULING</button>
		<button type="button" <?=(isset($catches) && count($catches)>0)?' style="display:none"':''?> class="btn btn-lg btn-info w_100 btn_action" id="departure">DEPARTURE</button>
	</div>
  </div>
</div>
</form>
<script type="text/javascript">
//geolocation api
function showPosition(position) {
	
	var lat = position.coords.latitude;
	var lon = position.coords.longitude;
	$.ajax({
		type: "POST",
		data: $('#frm').serialize()+'&lat='+lat+'&lon='+lon,
		url: '<?=base_url("Fisher/hauling")?>',
		dataType: "html",
		beforeSend:function(data){
			
			$('#lat').val(lat);
			$('#lon').val(lon);
			$('#location_info').html('<h4>Lat: '+lat+'<br>Long: '+lon+'</h4>');
		},
		success: function(data){
			$('#stop_hauling').show();
			$('#contentx').html(data);
		}
	});
}
//JQuery ajax function
$('#departure').click(function() {
	
	var person = prompt("Input nama Nakhoda", "Nama Anda");
	if (person != null && person!='') {
		$(this).hide();
		
		var fishing_master = person;
		
		$.ajax({
			type: "POST",
			data: {fishing_master:fishing_master},
			url: '<?=base_url("Fisher/departure")?>',
			dataType: "json",
			success: function(data){
				$('#hauling').show();
				$('#id_depart_div').html('<h6>TRIP ID : '+data.depart_number+'</h6>');
				$('#id_depart').val(data.id_depart);
				$('#depart_number').val(data.depart_number);
			}
		});
		
	}else{
		alert('error');
		return false;
	}
	
});	

$('#save').click(function() {

});

$('#hauling').click(function() {

	if (navigator.geolocation) {
		
		
		
				navigator.geolocation.getCurrentPosition(showPosition);
				$(this).hide();
			

		
	} else { 
		x.innerHTML = "Geolocation is not supported by this browser.";
	}


});	


$('#stop_hauling').click(function() {
	

	$(this).hide();		
	$.ajax({
		type: "POST",
		data: $('#frm').serialize(),
		url: '<?=base_url("Fisher/stop_hauling")?>',
		dataType: "json",
		success: function(data){
			var r = confirm("Scan QR Code?");

			if (r == true) {
				$.ajax({
					type: "POST",
					data: $('#frm').serialize(),
					url: '<?=base_url("Fisher/qr_scan")?>',
					dataType: "html",
					success: function(data){
						$('#hauling').show();
						$('#contentx').html(data);
					}
				});
			} else {
				window.location.href = '<?=base_url("Fisher/index/")?>'+$('#id_depart').val();
			}

			
			
		}
	});

	
});	

$('#upload_final').click(function() {
	

	$.ajax({
		type: "POST",
		data: $('#frm').serialize(),
		url: '<?=base_url("Fisher/upload_final")?>',
		dataType: "json",
		success: function(data){
			window.location.href = '<?=base_url()?>';			
			
		}
	});

	
});	

</script>
<!--cache internal css
<script>
if( "caches" in window ){
  function cacheFile( file ){
    caches.open( file.filecache ).then(function( cache ) {
      cache.put( file.filepath, new Response( file.filetext,
        {headers: {'Content-Type': file.filetype }}
      ));
    });
  }

  var toCache = document.querySelectorAll( "[data-cache]" );
  for( var i = 0; i < toCache.length; i++ ){
    var elem = toCache[ i ];
    cacheFile({
      filepath: elem.getAttribute( "data-path" ),
      filetype: elem.getAttribute( "data-type" ),
      filecache: elem.getAttribute( "data-cache" ),
      filetext: elem.innerHTML
    });
  }
}
</script>-->
<!--register sw-->
<script>
// Check that service workers are supported
if ('serviceWorker' in navigator) {
  // Use the window load event to keep the page load performant
  window.addEventListener('load', () => {
    navigator.serviceWorker.register('/pwabuilder-sw.js');
  });
}
</script>