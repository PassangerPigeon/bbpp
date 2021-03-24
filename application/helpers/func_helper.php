<?php

function check_session_login()
{
    $CI =& get_instance();
    $userSession = $CI->session->userdata('jabatan');

    if ($userSession == 'admin' || $userSession == 'kepala kandang') {
        redirect('dist/blank', 'refresh');
    }
}

function check_session_not_login()
{
    $CI =& get_instance();
    $userSession = $CI->session->userdata('jabatan');

    if (!$userSession) {
        redirect('c_user/logout', 'refresh');
    }
}
