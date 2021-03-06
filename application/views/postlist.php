
<html>
<head>
	<title>My Post List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<?php if($this->session->userdata('logged_in') && $this->session->userdata('type') != "biasa") { ?>
<a href="<?php echo base_url('index.php\blog\create'); ?>" class="btn btn-primary">Create Post</a>
<?php } ?>

<div class="container">
	<?php foreach ($postlist as $row) { ?>
		<h1><?php echo $row['judul']; ?></h1><?php if($this->session->userdata('logged_in') && $this->session->userdata('type') != "biasa") { ?><a href="<?php echo base_url('index.php/blog/update/'.$row['id']); ?>">Edit</a>  <a href="<?php echo base_url('index.php/blog/delete/'.$row['id']); ?>">Delete</a><?php } ?><br><br>
		<p><?php echo $row['konten']; ?></p>
		<br>
		<br>
	<?php } ?>
</div>
</body>
</html>