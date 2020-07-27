<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('login');
    } else {
        user_check();
    }
}

function user_check()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    $menu = $ci->uri->segment(1);
    if ($role_id == 1) {
        if ($menu == '') {
            redirect('auth/blocked');
        }
    } else if ($role_id == 2) {
        switch ($menu) {
            case 'admin':
            case 'product':
                redirect('auth/blocked');
                break;

            default:
                # code...
                break;
        }
    }
}
