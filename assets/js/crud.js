$(document).ready(function(){
	$("#loading").hide();$("#editloading").hide();$("#error").hide();$("#editerror").hide();$("#del-success").hide();
	var idData; //id_data for editing
	var host = location.protocol + '//' + location.host + '/';
	//default add form
	$(".add").click(function(){
		$("#jenis").val("");
		$("#daerah").val("");
		$("#harga").val("");
		$("#jambuka").val("");
		$("#laris").val("");
	});
	//insert data
	$("#submit").click(function(){
		var jenis = $("#jenis").val();
		var daerah = $("#daerah").val();
		var harga = $("#harga").val();
		var jambuka = $("#jambuka").val();
		var laris = $("#laris").val();
		if(jenis==null || daerah==null || harga==null || jambuka==null || laris==null){
			$("#error").slideDown();
		}else{
			$("#error").hide();
			$.ajax({
				url:host+'nbc_prediction/data/insert',
				data:{jenis:jenis, daerah:daerah, harga:harga, jambuka:jambuka, laris:laris},
				beforeSend:function(data){
					$("#submit").hide();
					$("#loading").show();
				},
				success:function(data){
					$("#addModal").closeModal();
					location.reload();
				}
			})
		}
	});
	//display data to edit form
	$(".edit").click(function(){
		idData = $(this).attr('id');
		$.ajax({
			url:host+'nbc_prediction/data/display/'+idData,
			data:{send:true},
			success:function(data){
				$("#editjenis").val(data.jenis_makanan);
				$("#editdaerah").val(data.daerah);
				$("#editharga").val(data.harga);
				$("#editjambuka").val(data.jam_buka);
				$("#editlaris").val(data.laris);
			}
		})
	});
	//edit data
	$("#editsubmit").click(function(){
		var jenis = $("#editjenis").val();
		var daerah = $("#editdaerah").val();
		var harga = $("#editharga").val();
		var jambuka = $("#editjambuka").val();
		var laris = $("#editlaris").val();
		if(jenis==null || daerah==null || harga==null || jambuka==null || laris==null){
			$("#editerror").slideDown();
		}else{
			$.ajax({
				url:host+'nbc_prediction/data/edit/'+idData,
				data:{jenis:jenis, daerah:daerah, harga:harga, jambuka:jambuka, laris:laris},
				beforeSend:function(data){
					$("#editsubmit").hide();
					$("#editloading").show();
				},
				success:function(data){
					$("#editModal").closeModal();
					location.reload();
				}
			})
		}
	});
	//delete data
	$(".del").click(function(){
		idData = $(this).attr('id');
	});
	$("#confirm-del").click(function(){
		$.ajax({
			url:'data/remove/'+idData,
			data:{send:true},
			success:function(data){
				$("#confirm-form").hide();
				$("#del-success").show();
				location.reload();
			}
		})
	});
});