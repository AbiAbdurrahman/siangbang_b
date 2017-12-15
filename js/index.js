$(document).ready(function(){
	var digit = 1;
	$("#addKategori").click(function () {
		digit = digit + 1;
	 	$("#moreKategori").append(
			'<div class="form-group"><div class="input-group"><label>Subkategori ' + digit + ':</label></div></div><div class="form-group"><div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span><input type="text" name="subKategori[]" class="form-control" placeholder="Kode Subkategori" required/></div></div><div class="form-group"><div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span><input type="text" name="namaSubKategori[]" class="form-control" placeholder="Nama Subkategori" required/></div>'
	  	);
	});
});
