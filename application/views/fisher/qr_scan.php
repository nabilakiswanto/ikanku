<script type="text/javascript" src="<?=base_url()?>Assets/assets/JsQRScanner-master/docs/js/jsqrscanner.nocache.js"></script>
<style type="text/css" >
.scanner_div {
	height:100vh !important;
	width:100% !important;
	z-index:100;
}

</style>
<body>
  <!--menampilkan qr scode scanner-->
<input type="hidden" id="qr" name="qr">
      
      <div class="row-element scanner_div">
        <div class="qrscanner" id="scanner">
        </div>
      </div>
      
</body>

<script type="text/javascript">
    //scan qr
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
					//location.reload();
					window.location.href = '<?=base_url("Fisher/index/")?>'+$('#id_depart').val();
				}
			});
			
			
			//return Promise.reject('Scanning Done');
    	}
    	
    }
    //bawaan scanner lib
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
  

}