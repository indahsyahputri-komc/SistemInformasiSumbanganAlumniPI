<script src="<?php echo base_url('assets');?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/iCheck/icheck.min.js"></script>
<script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<script>
	window.onload = function() {
		<?php if ($this->session->flashdata('msg') != '') {
    echo "effect_msg();";
}?>
	}

	function effect_msg_form() {
		$('.form-msg').slideDown(1000),
			setTimeout(function() {
				$('.form-msg').slideUp(1000);
			}, 3000)
	}

	function effect_msg() {
		$('.msg').show(1000),
			setTimeout(function() {
				$('.msg').fadeOut(1000);
			}, 3000)
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
	
</script>
