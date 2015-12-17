$(document).ready(function(){
	$("#nbcloading").hide();
	$("#nbcerror").hide();
	var host = location.protocol + '//' + location.host + '/';
	//predict
	$("#nbcsubmit").click(function(){
		var jenis = $("#nbcjenis").val();
		var daerah = $("#nbcdaerah").val();
		var harga = $("#nbcharga").val();
		var jambuka = $("#nbcjambuka").val();
		if(jenis==null || daerah==null || harga==null || jambuka==null){
			$("#nbcerror").slideDown();
		}else{
			$("#nbcerror").hide();
			$.ajax({
				url:host+'/nbc_prediction/data/nbcPrediction',
				data:{jenis:jenis, daerah:daerah, harga:harga, jambuka:jambuka},
				beforeSend:function(data){
					$("#nbcsubmit").hide();
					$("#nbcloading").show();
				},
				success:function(data){
					$("#nbcloading").hide();
					$("#nbcsubmit").show();
					if(data['hasilKelarisan']==1){
						var hasil = 'Laris';
					}else{
						var hasil = 'Tidak Laris';
					}
					$("#hasilnbc").text(hasil);
					$("#persen_laris").text(data['persenLaris']);
					$("#persen_tidaklaris").text(data['persenTidakLaris']);
				}
			})
		}
	});
});