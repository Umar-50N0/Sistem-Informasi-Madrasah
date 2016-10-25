<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
	<div id="outtable">
	  <table>
	  	<thead>
	  		<tr>
	  			<th class="normal" colspan="3">DATA SANTRI</th>
	  			
	  		</tr>
	  		
	  	</thead>
	  	<tbody>
	  		<tr>
	  			<td colspan="3"><img src="
    				<?php echo base_url('assets/upload/image/thumbs/'.$santri->foto) ?>" width="60"/></td>
	  			
	  		  </tr>
	  		  <tr>
	  			<td>No Registrasi</td>
	  			<td>:</td>
	  			<td><?php echo $santri->id_santri; ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Nama Lengkap</td>
	  			<td>:</td>
	  			<td><?php echo $santri->nama_lengkap; ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Tempat, Tanggal Lahir</td>
	  			<td>:</td>
	  			<td><?php echo $santri->tmp_lahir; ?>, <?php echo $santri->tgl_lahir; ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Jenis Kelamin</td>
	  			<td>:</td>
	  			<td><?php echo $santri->jn_kelamin; ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Pendidikan</td>
	  			<td>:</td>
	  			<td><?php echo $santri->pendidikan ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Anak Ke</td>
	  			<td>:</td>
	  			<td><?php echo $santri->anak_ke ?> dari <?php echo $santri->jml_sdr ?> bersaudara</td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Nama Orangtua/Wali</td>
	  			<td>:</td>
	  			<td><?php echo $santri->nama_ow ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Pendidikan Orangtua/Wali</td>
	  			<td>:</td>
	  			<td><?php echo $santri->pend_ow ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Pekerjaan Orangtua/Wali</td>
	  			<td>:</td>
	  			<td><?php echo $santri->pekerjaan ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>Alamat </td>
	  			<td>:</td>
	  			<td><?php echo $santri->alamat ?></td>
	  		  </tr>
	  		  
	  		  <tr>
	  			<td>No Kontak</td>
	  			<td>:</td>
	  			<td><?php echo $santri->no_kontak ?></td>
	  		  </tr>
	  	</tbody>
	  </table>
	 </div>
</body>
</html>

