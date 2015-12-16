<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Sistem Prediksi Kelarisan</title>
		<link href="<?php echo base_url('assets/materialize/css/materialize.min.css'); ?>" rel="stylesheet" type="text/css" media="screen,projection">
		<link href="<?php echo base_url('assets/materialize/css/googlefont.css'); ?>" rel="stylesheet" type="text/css" media="screen,projection">
		<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" media="screen,projection">
	</head>
	<body>
		<div style="font-size:18pt;color:#1c1c1c;padding:20px;" align="center">
			SISTEM PREDIKSI KELARISAN USAHA MAKANAN DI DAERAH TEMBALANG
		</div>
		<div class="divider">
		</div>
		<div class="row pad-t">
			<div class="col s12">
				<div class="row">
					<div class="col s6">
						<a href="#nbcModal" class="modal-trigger waves-effect waves-light btn">
						<i class="material-icons left">trending_up</i> Prediksi</a>
					</div>
					<div class="col s6" align="right">
						<a class="add modal-trigger btn-floating btn-small waves-effect waves-light red" href="#addModal"><i class="tiny material-icons">add</i></a>
					</div>
				</div>
				<center><?php echo $halaman; ?></center>
				<table class="highlight centered">
					<thead>
						<tr>
							<th data-field="number">No</th>
							<th data-field="jenis">Jenis Makanan</th>
							<th data-field="daerah">Daerah</th>
							<th data-field="harga">Harga</th>
							<th data-field="jam">Jam Buka</th>
							<th data-field="laris">Laris</th>
							<th data-field="laris">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1;foreach($query as $result){ ?>
						<tr>
							<td><?php echo $no; ?>.</td>
							<td><?php echo htmlspecialchars($result->jenis_makanan); ?></td>
							<td><?php echo htmlspecialchars($result->daerah); ?></td>
							<td><?php if($result->harga==1){
									echo "&lt; Rp.15.000";
								}elseif($result->harga==2){
									echo "Rp.15.000 - Rp.30.000";
								}elseif($result->harga==3){
									echo "&gt; Rp.30.000";
								}  
								?>
							</td>
							<td><?php if($result->jam_buka==1){
									echo "24 jam";
								}elseif($result->jam_buka==2){
									echo "Siang Hari";
								}elseif($result->jam_buka==3){
									echo "Malam Hari";
								}  
								?>
							</td>
							<td><?php if($result->laris=='Ya'){
									echo "<span style=color:green><b>Ya</b></span>";
								}else{
									echo "<span style=color:red><b>Tidak</b></span>";
								}
								?>
							</td>
							<td>
							    <a class="edit modal-trigger btn-floating" href="#editModal" id="<?php echo $result->id_data; ?>"><i class="material-icons">settings</i></a>
							    <a class="del modal-trigger btn-floating red lighten-2" href="#deleteModal" id="<?php echo $result->id_data; ?>">
							    	<i class="material-icons">clear</i></a>
							    </ul>
							</td>
						</tr>
					<?php $no++; } ?>
					</tbody>
				</table>
				<center><?php echo $halaman; ?></center>
			</div>
		</div>

		<!-- Modal Tambah -->
	  	<div id="addModal" class="modal">
	    	<div class="modal-content">
	      		<h4><i class="material-icons">add</i>Tambah Data</h4>
	      		<div align="center" class="error" id="error">
	      			*masih ada kolom yang belum terisi
	      		</div>
	      		<div class="row">
	      			<form class="col s12">
	      				<div class="input-field col s6">
			          		<select id="jenis" name="jenis" class="browser-default">
						      	<option value="" disabled selected>Pilih Jenis Makanan</option>
						      	<option value="Burjo">Burjo</option>
						      	<option value="Bakso">Bakso</option>
						      	<option value="Kebab">Kebab</option>
						      	<option value="Penyetan">Penyetan</option>
						      	<option value="Steak">Steak</option>
						      	<option value="Sushi">Sushi</option>
						      	<option value="Warung Padang">Warung Padang</option>
						      	<option value="Warung Tegal">Warung Tegal</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="daerah" name="daerah" class="browser-default">
						      	<option value="" disabled selected>Pilih Daerah</option>
						      	<option value="Banjarsari">Banjarsari</option>
						      	<option value="Bulusan">Bulusan</option>
						      	<option value="Banyumanik">Banyumanik</option>
						      	<option value="Ngesrep">Ngesrep</option>
						      	<option value="Timoho">Timoho</option>
						      	<option value="Tirto Agung">Tirto Agung</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="harga" name="harga" class="browser-default">
						      	<option value="" disabled selected>Pilih Kisaran Harga</option>
						      	<option value="1">&lt; Rp.15.000</option>
						      	<option value="2">Rp.15.000 - Rp.30.000</option>
						      	<option value="3">&gt; Rp.30.000</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="jambuka" name="jambuka" class="browser-default">
						      	<option value="" disabled selected>Pilih Jam Buka</option>
						      	<option value="1">24 Jam</option>
						      	<option value="2">Siang Hari</option>
						      	<option value="3">Malam Hari</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="laris" name="laris" class="browser-default">
						      	<option value="" disabled selected>Pilih Kelarisan</option>
						      	<option value="Ya">Ya</option>
						      	<option value="Tidak">Tidak</option>
						    </select>
			        	</div>
			        </form>
		        	<button type="button" id="submit" class="waves-effect waves-light btn pad2-t" style="width:100%;">Tambah</button>
		        	<div>&nbsp;</div>
	      			<div class="progress" id="loading">
				      	<div class="indeterminate"></div>
				  	</div>
	      		</div>
	    	</div>
		    <div class="modal-footer">
		      	<a href="#" class="modal-action modal-close waves-effect waves-green btn red">Batal</a>
		    </div>
	  	</div>
	  	<!-- Modal Edit -->
	  	<div id="editModal" class="modal">
	    	<div class="modal-content">
	      		<h4><i class="material-icons">settings</i> Ubah Data</h4>
	      		<div align="center" class="error" id="editerror">
	      			*masih ada kolom yang belum terisi
	      		</div>
	      		<div class="row">
	      			<form class="col s12">
	      				<div class="input-field col s6">
			          		<select id="editjenis" name="jenis" class="browser-default">
						      	<option value="" disabled selected>Pilih Jenis Makanan</option>
						      	<option value="Burjo">Burjo</option>
						      	<option value="Bakso">Bakso</option>
						      	<option value="Kebab">Kebab</option>
						      	<option value="Penyetan">Penyetan</option>
						      	<option value="Steak">Steak</option>
						      	<option value="Sushi">Sushi</option>
						      	<option value="Warung Padang">Warung Padang</option>
						      	<option value="Warung Tegal">Warung Tegal</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="editdaerah" name="daerah" class="browser-default">
						      	<option value="" disabled selected>Pilih Daerah</option>
						      	<option value="Banjarsari">Banjarsari</option>
						      	<option value="Bulusan">Bulusan</option>
						      	<option value="Banyumanik">Banyumanik</option>
						      	<option value="Ngesrep">Ngesrep</option>
						      	<option value="Timoho">Timoho</option>
						      	<option value="Tirto Agung">Tirto Agung</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="editharga" name="harga" class="browser-default">
						      	<option value="" disabled selected>Pilih Kisaran Harga</option>
						      	<option value="1">&lt; Rp.15.000</option>
						      	<option value="2">Rp.15.000 - Rp.30.000</option>
						      	<option value="3">&gt; Rp.30.000</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="editjambuka" name="jambuka" class="browser-default">
						      	<option value="" disabled selected>Pilih Jam Buka</option>
						      	<option value="1">24 Jam</option>
						      	<option value="2">Siang Hari</option>
						      	<option value="3">Malam Hari</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="editlaris" name="laris" class="browser-default">
						      	<option value="" disabled selected>Pilih Kelarisan</option>
						      	<option value="Ya">Ya</option>
						      	<option value="Tidak">Tidak</option>
						    </select>
			        	</div>
			        </form>
		        	<button type="button" id="editsubmit" class="waves-effect waves-light btn pad2-t" style="width:100%;">Simpan</button>
		        	<div>&nbsp;</div>
	      			<div class="progress" id="editloading">
				      	<div class="indeterminate"></div>
				  	</div>
	      		</div>
	    	</div>
		    <div class="modal-footer">
		      	<a href="#" class="modal-action modal-close waves-effect waves-green btn red">Batal</a>
		    </div>
	  	</div>
	  	<!-- delete modal -->
	  	<div id="deleteModal" class="modal" style="height:150px">
	  		<div class="modal-content">
	  			<div align="center">
	  				<div id="confirm-form">
	  					<h4>Hapus Data?</h4>
		  				<a href="#" id="confirm-del" class="waves-effect waves-light btn">Hapus</a>
		  				<a href="#" class="modal-action modal-close waves-effect waves-light btn red">Batal</a>
		  			</div>
		  			<div id="del-success">
		  				<h4><i class="material-icons">done</i> Data berhasil di hapus</h4>
		  			</div>
	  			</div>
	  		</div>
	  	</div>
	  	<!-- Modal nbc -->
	  	<div id="nbcModal" class="modal">
	    	<div class="modal-content">
	      		<h4><i class="material-icons">trending_up</i> Prediksi Kelarisan</h4>
	      		<div align="center" class="error" id="nbcerror">
	      			*masih ada kolom yang belum terisi
	      		</div>
	      		<div class="row">
	      			<form class="col s12">
	      				<div class="input-field col s6">
			          		<select id="nbcjenis" name="jenis" class="browser-default">
						      	<option value="" disabled selected>Pilih Jenis Makanan</option>
						      	<option value="Burjo">Burjo</option>
						      	<option value="Bakso">Bakso</option>
						      	<option value="Kebab">Kebab</option>
						      	<option value="Penyetan">Penyetan</option>
						      	<option value="Steak">Steak</option>
						      	<option value="Sushi">Sushi</option>
						      	<option value="Warung Padang">Warung Padang</option>
						      	<option value="Warung Tegal">Warung Tegal</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="nbcdaerah" name="daerah" class="browser-default">
						      	<option value="" disabled selected>Pilih Daerah</option>
						      	<option value="Banjarsari">Banjarsari</option>
						      	<option value="Bulusan">Bulusan</option>
						      	<option value="Banyumanik">Banyumanik</option>
						      	<option value="Ngesrep">Ngesrep</option>
						      	<option value="Timoho">Timoho</option>
						      	<option value="Tirto Agung">Tirto Agung</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="nbcharga" name="harga" class="browser-default">
						      	<option value="" disabled selected>Pilih Kisaran Harga</option>
						      	<option value="1">&lt; Rp.15.000</option>
						      	<option value="2">Rp.15.000 - Rp.30.000</option>
						      	<option value="3">&gt; Rp.30.000</option>
						    </select>
			        	</div>
			        	<div class="input-field col s6">
			          		<select id="nbcjambuka" name="jambuka" class="browser-default">
						      	<option value="" disabled selected>Pilih Jam Buka</option>
						      	<option value="1">24 Jam</option>
						      	<option value="2">Siang Hari</option>
						      	<option value="3">Malam Hari</option>
						    </select>
			        	</div>
			        </form>
		        	<button type="button" id="nbcsubmit" class="waves-effect waves-light btn pad2-t" style="width:100%;">Prediksikan</button>
		        	<div>&nbsp;</div>
	      			<div class="progress" id="nbcloading">
				      	<div class="indeterminate"></div>
				  	</div>
				  	<div id="nbcresult">
				  	</div>
	      		</div>
	      		<div class="row">
	      			<div class="col s6">
	      				<b>INFORMASI</b><br/>
	      				Nilai data laris : <span id="persen_laris"></span><br/>
	      				Nilai data tidak laris : <span id="persen_tidaklaris"></span><br/>
	      			</div>
	      			<div class="col s6" style="font-size:16pt;" align="right">
		      			Hasil : <span id="hasilnbc"></span>
		      		</div>
	      		</div>
	    	</div>
		    <div class="modal-footer">
		      	<a href="#" class="modal-action modal-close waves-effect waves-green btn red">Batal</a>
		    </div>
	  	</div>

		<!-- javascript -->
		<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/materialize/js/materialize.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/material.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/crud.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/nbc.js'); ?>" type="text/javascript"></script>
	</body>
</html>