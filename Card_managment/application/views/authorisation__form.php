<?php

$data_email = array(
    'type' => 'email',
    'name' => 'email',
    'id' => 'email_id',
);

$data_password = array(
    'type' => 'password',
    'name' => 'password',
    'id' => 'password_id',
);

$data_submit = array(
    'class' => 'btn-info',
);


echo form_open('/authorisation/load');
echo form_input($data_email);
echo form_label('Enter your email', 'email_id');
echo '<br>';
echo form_password($data_password);
echo form_label('Enter your password', 'password_id');
echo '<br>';
echo form_submit('insert', 'ВОЙТИ', $data_submit);
echo form_close();
