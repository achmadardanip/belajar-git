<section id="login-success">
<?php echo $this->session->flashdata('success'); ?>
<img src="<?php echo base_url() ?>assets/tick.png">
<br>
<h2 align="center"><b>Login successful!</b></h2>
<br>
<p class="hello-user">Welcome, <b><?php echo $this->session->username; ?></b>!</p>
<br>
<p class="hello-user-1">Your password: <?php echo $this->session->password; ?></p>
<br>
<p class="hello-user-2">Login Time: <?php date_default_timezone_set('Asia/Jakarta'); $datestring  = '%m-%d-%Y %H:%i:%s'; $time = time(); echo mdate($datestring, $time); ?></p>

<section>