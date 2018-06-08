<nav class="navbar navbar-default">
      <div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="">Donny</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="<?php echo base_url(); ?>">Home</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<?php if($this->session->userdata('logged_in')) { ?>
			<li><a href="<?php echo base_url(); ?>index.php/user/logout">Logout</a></li>
		<?php } else { ?>
			<li><a href="<?php echo base_url(); ?>index.php/user/register">Register</a></li>
			<li><a href="<?php echo base_url(); ?>index.php/user/login">Login</a></li>
		<?php } ?>
	</ul>
   </div>


</nav>