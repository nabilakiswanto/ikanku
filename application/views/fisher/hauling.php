<body>
	<table class="table table-striped m-table">
		<tbody>
		<?php
		foreach($fish as $row){
		?>
		<tr class="input_fish">
			<td colspan="3"><input type='hidden' name='fish_id[]' value="<?=$row['fish_id']?>">
				<div style="font-weight:bold"><?=$row['name_indo']?></div>
				<span class="weight_label">-</span><a class="weight_btn"> Kg</a><input type='hidden' class="weight" name='weight[]'>
				<span class="quantity_label">-</span><a class="quantity_btn"> Unit</a><input type='hidden' class="quantity" name='quantity[]'>
			</td>
			
		</tr>
		<?php
		}
		?>
		</tbody>
	</table>
</body>
<!--pop up for input-->
<script type="text/javascript">
$('#id_catches').val('<?=$id_catches?>');
$('.input_fish').click(function() {
	var val = prompt("Input berat (Kg)", "0");
	if (val != null && val!='') {
		
		$(this).closest('tr').find('.weight').val(val);
		$(this).closest('tr').find('.weight_label').html(val);
		
	}else{
		alert('error');
		return false;
	}

	var val = prompt("Input Jumlah (Unit)", "0");
	if (val != null && val!='') {
		
		$(this).closest('tr').find('.quantity').val(val);
		$(this).closest('tr').find('.quantity_label').html(val);
		
	}else{
		alert('error');
		return false;
	}
	
});

</script>