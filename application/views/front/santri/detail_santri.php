<div class="container">
 
<div class="row text-center  ">
    	<div class="col-md-12 wow fadeInDown" >
        	<h2> DATA CALON SANTRI BARU</h2><br />
        </div>
        <div class="row ">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                <table width="600" border="0">
                	<tr>
                		<td rowspan="1"" align="left"><img src="
                		<?php echo base_url('assets/upload/image/thumbs/'.$santri->foto) ?>" width="120"/></td>
                		
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>No ID</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->id_santri  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Nama Lengkap</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->nama_lengkap  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Tempat, Tanggal Lahir</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->tmp_lahir  ?>, <?php echo $santri->tgl_lahir  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Jenis Kelamin</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->jn_kelamin  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Pendidikan</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->pendidikan  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Anak Ke</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->anak_ke  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Jumlah Saudara</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->jml_sdr  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Nama Orangtua/Wali</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->nama_ow  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Pendidikan Orangtua/Wali</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->pend_ow  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Pekerjaan</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->pekerjaan  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>Alamat</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->alamat  ?></b></td>
                	</tr>
                	<tr>
                		<td width="40%" align="left"><b>No kontak</b></td>
                		<td width="10%"><b>:</b></td>
                		<td width="50%" align="left"><b> <?php echo $santri->no_kontak  ?></b></td>
                	</tr>
                </table>
                </div>
                <!--<div class="panel-footer">
                	<a href="<?php echo(base_url('daftar_santri/tambah'))?>"  class="btn btn-primary" >Cetak</a>
                </div>-->
            </div>
        </div>
        
        </div>
        
</div> <!-- akhir container --> 
</div>