<!DOCTYPE html>
<html>
<head>
	<?php echo $this->load->view('head'); ?>

</head>
<body>

<?php echo $this->load->view('header'); ?>

<div class="container">
    <div class="row">
        <div class="span12">

            <!-- Main hero unit for a primary marketing message or call to action -->
            <div class="hero-unit" style="position: relative;">
                <div class="ribbon-wrapper-green">
                    <div class="ribbon-green">v1.0.1</div>
                </div>

                <h1>Welcome to <?php echo lang('website_title'); ?></h1>
                <p>Message: <?php print_r($this->session->all_userdata()); ?></p>
                <?php if ($this->authentication->is_signed_in()) : ?>
                		<p>Friends: <?php echo $friends; ?></p>
					<?php else : ?>
						<p>Login to see your data ...</p>
                <?php endif; ?>
                
                <p>
					This is the homepage for your web-app. You can use this as a starting point for creating with A3M and building the rest of your site.
                    If you like this project, please help contribute with <b>bug fixes &amp; enhancements</b> on <a href="https://github.com/donjakobo/A3M">GitHub</a>.
                </p>

                <p class="pull-right clearfix">
					<a class="btn btn-info" href="https://github.com/donjakobo/A3M/wiki"><i class="icon-info-sign icon-white"></i> Wiki</a>&nbsp;
					<a class="btn btn-primary" href="http://stackoverflow.com/questions/tagged/codeigniter-a3m"><i class="icon-comment icon-white"></i> Have questions?</a>&nbsp;
					<a class="btn btn-danger" href="https://github.com/donjakobo/A3M"><i class="icon-wrench icon-white"></i> Fork it &raquo;</a>
				</p>
            </div>

        </div>

        <div class="offset1 span5">


            <script src="<?php echo RES_DIR?>/bootstrap/js/holder.js"></script>
            <!-- Used for 64x64 placeholder boxes -->

        </div>

        <div class="offset1 span5">
            

        </div>

    </div>
    <!-- /end row -->
</div>

<?php echo $this->load->view('footer'); ?>

</body>
</html>
