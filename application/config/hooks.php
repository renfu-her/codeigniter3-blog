<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['post_controller_constructor'] = array(
    'class'    => 'ManageAuth',
    'function' => 'auth',
    'filename' =>'ManageAuth.php',
    'filepath' => 'hooks'
);
