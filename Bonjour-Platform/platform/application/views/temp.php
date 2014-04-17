<html>
<head>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1256">
<title>The Colors Concorrenza</title>
<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>/h7-assets/resources/bootstrap/css/bootstrap.css" />
<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>/h7-assets/resources/bootstrap/css/bootstrap-theme.css" />
<link type="text/css" rel="stylesheet"
	href="<?=base_url()?>/h7-assets/resources/css/style.css" />

<link href="http://fonts.googleapis.com/css?family=Raleway:400,700"
	rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css"
	href="<?=base_url()?>/h7-assets/resources/css/demo.css">
<!-- 	Alertify -->
<script
	src="<?=base_url()?>/h7-assets/resources/alertify/lib/alertify.min.js"></script>

<link rel="stylesheet"
	href="<?=base_url()?>/h7-assets/resources/alertify/themes/alertify.core.css" />
<link rel="stylesheet"
	href="<?=base_url()?>/h7-assets/resources/alertify/themes/alertify.default.css" />
<!--     Alertify End -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- 	<script src="<?=base_url()?>/h7-assets/resources/bootstrap/js/bootstrap.min.js"></script> -->
<script
	src="<?=base_url()?>/h7-assets/resources/bootstrap/js/dropdown.js"></script>
<script type="text/javascript"
	src="<?=base_url()?>/h7-assets/resources/js/jquery.js"></script>

<!-- Simple Modal -->
<script type='text/javascript'
	src="<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/jquery.simplemodal.js"></script>
<script type='text/javascript'
	src="<?= $this->config->item('platform_url');?>assets/js/simplemodal/js/basic.js"></script>
<link rel="stylesheet"
	href="<?= $this->config->item('platform_url');?>assets/js/simplemodal/css/basic.css">
<!-- End of Simple Modal -->


<script type="text/javascript">
	function get_email(user_id) {
		ajaxpage = "<?= base_url()?>index.php?/platform/get_email";
		$.post(ajaxpage, {uid : user_id})
		.done(function( data ) {
			if(data){
				$('#div1').html(data);
				$('#div2').hide();
			}	
		});
	}
</script>
</head>
<body>
	<div id = "div2">
		<a href="javascript:void(0);" onclick="get_email('<?= $id?>')"><button>Get
				Email</button> </a>
	</div>
	<div id = "div1">
		
	</div>

</body>
</html>
