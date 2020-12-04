
<body>
<div class="content-wrapper">
<section class="content-header">
        <h1>
            Generate QR Code
            <small>Generate & Print Qr Code for Vessels</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('page') ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Print Qr Code</li>
        </ol>
    </section>
<section class="content">
<form role="form" name="frm" action="<?=site_url('Make_qr/save')?>" method="post" id="frm">
<div id="container">
	<h1>Generate Fishing QR</h1>

	<div id="body">
		<table class="table table-striped m-table">
          <tbody>
            <tr>
              <td>Vessel</td>
              <td>
				<select id='id_vessel' name='id_vessel' style="width:250px" >
					<option value="">Pilih</option>
					<?php
					foreach($vessel as $row){
					?>
					  <option value="<?=$row['id_vessel']?>"><?=$row['vessel_name']?> - <?=$row['company']?></option>
					<?php
					}
					?>
				</select>
			  </td>
            </tr>
			
			<tr>
              <td>Port Departure</td>
              <td>
				<select id='id_port' name='id_port' style="width:250px" >
					<option value="">Pilih</option>
					<?php
					foreach($port as $row){
					?>
					  <option value="<?=$row['id_port']?>"><?=$row['port_name']?></option>
					<?php
					}
					?>
				</select>
			  </td>
            </tr>
			
			<tr>
              <td>QR Quantity</td>
              <td>
				<select id='quantity' name='quantity'>
					<option value="">Pilih</option>
					<?php
					for($i=1;$i<=20;$i++){
					?>
					  <option value="<?=$i?>"><?=$i?></option>
					<?php
					}
					?>
				</select>
			  </td>
            </tr>
          </tbody>
        </table>
		<div class="col-lg-3 m--margin-bottom-10-tablet-and-mobile">
			<span id='loading' style="display:none"><img src="<?php echo base_url(); ?>Assets/assets/images/ajax-loader_dark.gif"></span>
			<button type="button" class="btn btn-info" id="save">Generate</button>
		</div>
		<br>
		<div id='qrs'></div>
		
	</div>
</section>
</div>


<script type="text/javascript">

$('#save').click(function() {
		var $btn = $(this); $btn.attr('disabled','disabled');
		$('#loading').show();
		$.ajax({
			type: "POST",
			data: $('#frm').serialize(),
			url: $('#frm').attr('action'),
			dataType: "html",
			success: function(data){
				$btn.removeAttr("disabled");
				$('#loading').hide();
				$('#qrs').html(data);
			}
		});
		
	});	
	
</script>
</body>