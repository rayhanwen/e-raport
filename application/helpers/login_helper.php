<?php

function is_logged_in()
{
	$ci = get_instance();
	if ($ci->session->userdata('hak_akses') == 'Admin') {
		if (!$ci->session->userdata('username')) {
			$ci->session->set_flashdata('error', 'Anda Belum Login!');
			redirect('administrator/auth');
		}
	} else {
		$ci = get_instance();
		if ($ci->session->userdata('hak_akses') == 'Guru') {
			if (!$ci->session->userdata('username')) {
				$ci->session->set_flashdata('error', 'Anda Belum Login!');
				redirect('administrator/auth');
			}
		} else {
			$ci = get_instance();
			if (!$ci->session->userdata('username')) {
				$ci->session->set_flashdata('error', 'Anda Belum Login!');
				redirect('administrator/auth');
			}
		}
	}
}
