<?php
if($ok == 1) 
$this->load->view('includes/header' , $header);
?>

<div id=content>
	
			<?php 
				echo validation_errors('<div class=error_message>', '</div>');
				
				echo $this->session->flashdata('message');
				
				if (!empty($message)) echo '<div class=message>'.$message.'</div>';
				if (!empty($error_message)) echo '<div class=error_message>'.$error_message.'</div>';
				if (!empty($success_message)) echo '<div class=success_message>'.$success_message.'</div>';
			?>
	
	<?php 
	if($page == 'home_view')
		$this->load->view('pages/'.$page, $home_view);
	else
		$this->load->view('pages/'.$page)
	 ?>

</div>

<?php $this->load->view('includes/footer'); ?>