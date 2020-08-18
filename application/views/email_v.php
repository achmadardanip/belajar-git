<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Email</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/e_style.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet'
		type='text/css'>
</head>

<body>
	<div class="main" style="width: auto; margin: 0;
  position: absolute;
  top: 90%;
  left: 50%;
  transform: translate(-50%, -50%);">
		<div id="content" style="margin-top: -350px;">
			<h2 id="form_head">Form Sahabat BoBi</h2>
			<div id="form_input">
				<!-- <div class="msg-error">
					<//?php
                        if($this->session->flashdata('error') !=''){
                            echo $this->session->flashdata('error');
                        }
                    ?>
                </div>
                <div class="msg-success">
                    <//?php
                        if($this->session->flashdata('success') != '') {
                            echo $this->session->flashdata('success');
                        }
                    ?>
                </div> -->
				<?php
                echo form_open('EmailController/index');
                echo form_label('Email');
                echo "<div class='all_input'>";
                $data_email = array(
                    'type' => 'email',
                    'name' => 'email',
                    'id' => 'e_email_id',
                    'class' => 'input_box',
                    'placeholder' => 'Please Enter Email'
                );
                echo form_input($data_email);
                // echo '<small style="color:red;">';
                // echo form_error('user_email');
                // echo '</small>';
                echo "</div>";
                // echo form_label('Password');
                // echo "<div class='all_input'>";
                // $data_password = array(
                //     'name' => 'user_password',
                //     'id' => 'password_id',
                //     'class' => 'input_box',
                //     'placeholder' => 'Please Enter Password'
                // );
                // echo form_password($data_password);
                // echo '<small style="color:red;">';
                // echo form_error('user_password');
                // echo '</small>';
                // echo "</div>";

                echo form_label('Name');
                echo "<div class='all_input'>";
                $data_email = array(
                    'name' => 'name',
                    'class' => 'input_box',
                    'placeholder' => 'Please Enter Name'
                );
                echo form_input($data_email);
                // echo '<small style="color:red;">';
                // echo form_error('name');
                // echo '</small>';
                echo "</div>";

                // echo form_label('To');
                // echo "<div class='all_input'>";
                // $data_email = array(
                //     'type' => 'email',
                //     'name' => 'to_email',
                //     'class' => 'input_box',
                //     'placeholder' => 'Please Enter Email'
                // );
                // echo form_input($data_email);
                // echo '<small style="color:red;">';
                // echo form_error('to_email');
                // echo '</small>';
                // echo "</div>";

                // echo "</div>";
                // echo form_label('Subject');
                // echo "<div class='all_input'>";
                // $data_subject = array(
                //     'name' => 'subject',
                //     'class' => 'input_box',
                //     'placeholder' => 'Please Enter Subject'
                // );
                // echo form_input($data_subject);
                // echo '<small style="color:red;">';
                // echo form_error('subject');
                // echo '</small>';
                // echo "</div>";

                // echo form_label('Message');
                // echo "<div class='all_input'>";
                // $data_message = array(
                //     'name' => 'message',
                //     'rows' => 5,
                //     'cols' => 32,
                //     'placeholder' => 'Please Enter a Message'
                // );
                // echo form_textarea($data_message);
                // echo '<small style="color:red;">';
                // echo form_error('message');
                // echo '</small>';
                // echo "</div>";

                // echo form_label('Attachment');
                // echo "<div class='all_input'>";
                // $data_subject = array(
                //     'type' => 'file',
                //     'name' => 'file',
                //     'class' => 'input_box',
                // );
                // echo form_input($data_subject);
                // echo "</div>";

                ?>

			</div>
			<div id="form_button">
				<?php echo form_submit('submit', 'Send', "class='submit'"); ?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>

</html>
