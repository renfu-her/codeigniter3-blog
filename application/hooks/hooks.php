<?php
$hook['post_controller_constructor'] = array(
    'class'    => 'ManageAuth',
    'function' => 'auth',
    'filename' =>'ManageAuth.php',
    'filepath' => 'hooks'
);