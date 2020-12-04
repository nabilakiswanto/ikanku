<script type="text/javascript" src="<?=base_url()?>Assets/assets/JsQRScanner-master/docs/js/jsqrscanner.nocache.js"></script>
<style type="text/css">
.scanner_div {
	height:100vh !important;
	width:100% !important;
	z-index:100;
}

</style>
<body>
<input type="text" id="qr" name="qr">
      
      <div class="row-element scanner_div">
        <div class="qrscanner" id="scanner">
        </div>
      </div>
      
	<table class="table table-striped m-table">
		<tbody>
		<?php
		foreach($catches as $row){
		?>
		<tr class="input_catches">
			<td colspan="3">
				<div style="font-weight:bold"><?=date('Y-m-d H:i:s',$row['time_start'])?> - <?=date('Y-m-d H:i:s',$row['time_end'])?>
				<?=number_format((($row['time_end']-$row['time_start'])/60),0)?> Min(s)</div>
				<span>Latitude: <?=$row['lat']?></span> <span>Longitude: <?=$row['lon']?></span>
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
</body>
<script type="text/javascript">

$('#depart_number').val("");
$('#id_catches').val("");
$('.input_catches').click(function() {
	
	
});

$('.qr_catches').click(function() {
	$('.btn_action').hide();
	$.ajax({
		type: "POST",
		data: $('#frm').serialize(),
		url: '<?=base_url("Fisher/stop_hauling")?>',
		dataType: "json",
		success: function(data){
			$('#save_qr').show();
			
		}
	});
	
});

</script>

<script type="text/javascript">
    function onQRCodeScanned(scannedText)
    {
    	var qr = document.getElementById("qr");
    	if(qr)
    	{
    		qr.value = scannedText;
			alert('QR Code OK');

			$.ajax({
				type: "POST",
				data: $('#frm').serialize(),
				url: '<?=base_url("Fisher/save_qr")?>',
				dataType: "json",
				success: function(data){
					location.reload();
				}
			});
			
			
			//return Promise.reject('Scanning Done');
    	}
    	
    }
    
    function provideVideo()
    {
        var n = navigator;
        if (n.mediaDevices && n.mediaDevices.getUserMedia)
        {
          return n.mediaDevices.getUserMedia({
            video: {
              facingMode: "environment"
            },
            audio: false
          });
        } 
        
        return Promise.reject('Your browser does not support getUserMedia');
    }
    function provideVideoQQ()
    {
        return navigator.mediaDevices.enumerateDevices()
        .then(function(devices) {
            var exCameras = [];
            devices.forEach(function(device) {
            if (device.kind === 'videoinput') {
              exCameras.push(device.deviceId)
            }
         });
            
            return Promise.resolve(exCameras);
        }).then(function(ids){
            if(ids.length === 0)
            {
              return Promise.reject('Could not find a webcam');
            }
            
            return navigator.mediaDevices.getUserMedia({
                video: {
                  'optional': [{
                    'sourceId': ids.length === 1 ? ids[0] : ids[1]//this way QQ browser opens the rear camera
                    }]
                }
            });        
        });                
    }
    
    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady()
    {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //var jbScanner = new JsQRScanner(onQRCodeScanned, provideVideo);
        //reduce the size of analyzed image to increase performance on mobile devices
        jbScanner.setSnapImageMaxSize(300);
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
    		jbScanner.appendTo(scannerParentElement);
    	}        
    }
  </script> 