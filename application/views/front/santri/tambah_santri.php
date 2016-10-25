<div class="container">
	<div class="row text-center  ">
    	<div class="col-md-12 wow fadeInDown" >
        	<h2> FORM PENDAFTARAN CALON SANTRI</h2><br />
        </div>
    </div>
    <!-- tempat form -->
<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
    		<?php
			// Validasi inputan
			echo validation_errors('<div class="alert alert-warning">','</div>');
			//open form
			echo form_open(base_url('daftar_santri/tambah'));
			?>
			<div class="col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <strong> Biodata Calon Santri</strong>
                    </div>
                    
                    <!-- field pendaftaran -->
                    <div class="panel-body">
                    <!-- field nama -->
                        <div class="form-group form-group-lg">
							<label>* Nama Lengkap </label>
							<input type="text" name="nama_lengkap" class="form-control" 
							placeholder="Nama lengkap sesuaikan dengan akta kelahiran" value="<?php 
								echo set_value('nama_lengkap');?>"/>
						</div><!-- ./ field nama -->
						
					<!-- field tempat lahir -->
						<div class="form-group form-group-lg">
							<label>* Tempat Lahir </label>
							<input type="text" name="tmp_lahir" class="form-control" 
							placeholder="Kota tempat kelahiran" value="<?php 
								echo set_value('tmp_lahir');?>"/>
						</div><!--./ field tempat lahir -->
						
						<!-- field tanggal lahir -->
                        <div class="form-group form-group-lg">
							<label>* Tanggal Lahir</label>
							<input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control" 
							placeholder="Tanggal kelahiran" value="<?php 
								echo set_value('tgl_lahir');?>"/>
						</div><!-- ./ field tanggal lahir -->
						
					<!-- field Jenis kelamin -->
						<div class="form-group form-group-lg">
							<label>Jenis Kelamin</label></br>
							<input type="radio" name="jn_kelamin" value="Laki-laki" checked />Laki laki</br>
							<input type="radio" name="jn_kelamin" value="Perempuan"/>Perempuan
						</div><!--./ field jenis kelamin -->
					
					<!-- field Pendidikan -->
						<div class="form-group form-group-lg">
							<label>Pendidikan yang dijalani</label><br/>
							<input  type="radio" name="pendidikan" value="TK" id="optionradio1" checked/>TK<br />
							<input type="radio" name="pendidikan" value="SD" id="optionradio2"/>SD<br/>
							<input type="radio" name="pendidikan" value="SMP" id="optionradio3"/>SMP 
						</div><!--./ field pendidikan -->
						
					<!-- field anak ke- -->
                        <div class="form-group form-group-lg">
							<label>* Anak ke: <sup>(gunakan angka)</sup></label>
							<input type="text" name="anak_ke" id="tgl_lahir" class="form-control" 
							placeholder="Anak ke ... dari jumlah saudara kandung" 
							value="<?php echo set_value('anak_ke');?>" onKeyPress="return goodchars(event,'0123456789',this)"/>
						</div><!-- ./ field anak ke- -->
						
					<!-- field Jumlah Saudara- -->
                        <div class="form-group form-group-lg">
						<label>* Jumlah Saudara <sup>(gunakan angka)</sup></label>
						<input type="text" name="jml_sdr" class="form-control" placeholder="Jumlah saudara kandung"
						value="<?php echo set_value('jml_sdr');?>" onKeyPress="return goodchars(event,'0123456789',this)"/>
						</div><!-- ./ field anak ke- -->
					
                    </div><!-- akhir field pendaftaran -->
                    
                    <div class="panel-footer">
                    Keterangan:</br>
                    * Harus diisi 
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                            <strong> Biodata Orangtua/Wali Calon Santri</strong>
                    </div>
                    
                    <!-- field pendaftaran -->
                    <div class="panel-body">
                    <!-- field nama -->
                        <div class="form-group form-group-lg">
							<label>* Nama Orangtua/Wali </label>
							<input type="text" name="nama_ow" class="form-control" 
							placeholder="Nama Orangtua/Wali yang bertanggungjawab" value="<?php 
								echo set_value('nama_ow');?>"/>
						</div><!-- ./ field nama -->
					
					<!-- field Pendidikan -->
						<div class="form-group form-group-lg">
							<label>Pendidikan terakhir</label><br/>
							<input  type="radio" name="pend_ow" value="SD" id="optionradio1" checked/>SD<br />
							<input type="radio" name="pend_ow" value="SMP" id="optionradio2"/>SMP<br/>
							<input type="radio" name="pend_ow" value="SMA" id="optionradio3"/>SMA<br />
							<input type="radio" name="pend_ow" value="Diploma" id="optionradio4"/>Diploma<br />
							<input type="radio" name="pend_ow" value="Sarjana" id="optionradio4"/>Sarjana (S1)
						</div><!--./ field pendidikan -->
						
					<!-- field pekerjaan -->
                        <div class="form-group form-group-lg">
							<label>* Pekerjaan Orangtua/Wali </label>
							<input type="text" name="pekerjaan" class="form-control" 
							placeholder="Pekerjaan/profesi Orangtua/Wali" value="<?php 
								echo set_value('pekerjaan');?>"/>
						</div><!-- ./ field pekerjaan -->
						
					<!-- field alamat -->
                        <div class="form-group form-group-lg">
							<label>* Alamat </label>
							<input type="text" name="alamat" class="form-control" 
							placeholder="Tempat tinggal/domisili" value="<?php 
								echo set_value('alamat');?>"/>
						</div><!-- ./ field alamat -->
						
					<!-- field no kontak -->
                        <div class="form-group form-group-lg">
							<label>No kontak <sup>(gunakan angka)</sup></label>
							<input type="text" name="no_kontak" class="form-control" 
							placeholder="No yang bisa dihubungi" value="<?php 
								echo set_value('no_kontak');?>" onKeyPress="return goodchars(event,'0123456789',this)"/>
						</div><!-- ./ field nama -->				
                    </div><!-- akhir field pendaftaran -->
                    
                    <div class="panel-footer">
                    <input type="submit" name="submit" class="btn btn-default btn-lg" 
		value="Daftarkan"/>
		<input type="reset" name="reset" class="btn btn-default btn-lg" 
		value="Batal"/> 
                    </div>
                </div>
            </div>
    <?
	// Close form
	echo form_close();
	?>  
</div> 
</div>
</div>
</div>              
