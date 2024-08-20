<?php

function role_session()
{
	$rs = get_instance();
	if ($rs->session->userdata('hak_akses') == 'admin') {
		if (!$rs->session->userdata('admin')) {
			$rs->session->set_flashdata('error', 'Anda Belum Login!');
			redirect('administrator/auth');
		}
	} else {
		$rs = get_instance();
		if ($rs->session->userdata('hak_akses') == 'guru') {
			if (!$rs->session->userdata('guru')) {
				$rs->session->set_flashdata('error', 'Anda Belum Login!');
				redirect('administrator/auth');
			}
		} else {
			$rs = get_instance();
			if (!$rs->session->userdata('siswa')) {
				$rs->session->set_flashdata('error', 'Anda Belum Login!');
				redirect('administrator/auth');
			}
		}
	}
}
