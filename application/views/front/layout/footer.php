<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 Skripsi</a> <br />Uki Marsono
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo base_url()?>">Beranda</a></li>
                        <li><a href="<?php echo base_url('home/profil')?>"">Profil</a></li>
                        <li><a href="<?php echo base_url('daftar')?>"">Pendaftaran</a></li>
                        <!--<li><a href="<?php echo base_url('home/galeri')?>"">Galeri</a></li>
                        <li><a href="<?php echo base_url('home/kegiatan')?>"">Kegiatan</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
         </footer><!--/#footer-->

    <script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/main.js"></script>
    <script src="<?php echo base_url()?>/assets/js/wow.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery-1.8.0.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/core.js"></script>
    <script src="<?php echo base_url()?>/assets/js/ui.datepicker.js"></script>
    <script src="<?php echo base_url()?>/assets/js/ui.datepicker-id.js"></script>
    
	    <script type="text/javascript">
    	$(document).ready(function(){
			$("#tgl_lahir").datepicker({
				dateFormat	: "yy/dd/mm",
				changeMonth	:true,
				changeYear	: true
				});
		});
	</script>
	
	<!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js');?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.js');?>"></script>
    <!--<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>-->
 
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
<script type="text/javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
</head>
</body>
</html>