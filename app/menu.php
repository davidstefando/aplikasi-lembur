<?php

if (isset(Auth::user()->jabatan)) {
	$jabatan = Auth::user()->jabatan;
} else {
	$jabatan = "karyawan";
}

Menu::addPrimaryMenu(array('name' => 'pengajuan', 'url' => 'pengajuan', 'text' => 'PENGAJUAN', 'icon' => 'fa fa-chevron-circle-right'));
Menu::addSecondaryMenu(array('url' => 'pengajuan', 'text' => 'PENGAJUAN LEMBUR', 'icon' => 'fa fa-file-o', 'parent' => 'pengajuan'));
Menu::addSecondaryMenu(array('url' => 'status', 'text' => 'STATUS PENGAJUAN', 'icon' => 'fa fa-eye', 'parent' => 'pengajuan'));
Menu::addSecondaryMenu(array('url' => 'changepassword', 'text' => 'GANTI PASSWORD', 'icon' => 'fa fa-gear', 'parent' => 'pengajuan'));	
//Menu::addSecondaryMenu(array('url' => 'history', 'text' => 'HISTORY LEMBUR', 'icon' => 'fa fa-calendar', 'parent' => 'pengajuan'));
	

$allowed = array('pimpinan', 'hr');
if (in_array($jabatan , $allowed)) {
	Menu::addPrimaryMenu(array('name' => 'konfirmasi', 'url' => 'konfirmasi', 'text' => 'KONFIRMASI', 'icon' => 'fa fa-check'));
	Menu::addSecondaryMenu(array('url' => 'konfirmasi', 'text' => 'KONFIRMASI PENGAJUAN', 'icon' => 'fa fa-check', 'parent' => 'konfirmasi'));
}
	
$allowed = array('admin');
if (in_array($jabatan , $allowed)) {
	Menu::addPrimaryMenu(array('name' => 'kelola', 'url' => 'karyawan', 'text' => 'KELOLA', 'icon' => 'fa fa-book'));
	Menu::addSecondaryMenu(array('url' => 'karyawan', 'text' => 'KARYAWAN', 'icon' => 'fa fa-users', 'parent' => 'kelola'));
	Menu::addSecondaryMenu(array('url' => 'bagian', 'text' => 'BAGIAN', 'icon' => 'fa fa-parent', 'parent' => 'kelola'));
	Menu::addSecondaryMenu(array('url' => 'pimpinan', 'text' => 'PIMPINAN BAGIAN', 'icon' => 'fa fa-user', 'parent' => 'kelola'));
	Menu::addSecondaryMenu(array('url' => 'hr', 'text' => 'HR', 'icon' => 'fa fa-user', 'parent' => 'kelola'));
	Menu::addSecondaryMenu(array('url' => 'laporan', 'text' => 'LAPORAN ', 'icon' => 'fa fa-book', 'parent' => 'kelola'));
}