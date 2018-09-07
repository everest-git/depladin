    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
    	var base_url = '<?php echo base_url(); ?>';
	</script>

	<?php if($this->uri->segment(1) == 'area') {?>
		<script src="<?php echo base_url(); ?>assets/js/catalogos/area.js"></script>	
	<?php }?>
	

  </body>
</html>