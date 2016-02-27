<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'kursus';
$route['harga'] = 'kursus/harga';
$route['home'] = 'kursus';
$route['login'] = 'login';
$route['pross_login'] = 'login/pross_login';
$route['register'] = 'login/register';
$route['daftar'] = 'login/pross_register';
$route['logout'] = 'login/logout';
$route['pendaftaran'] = 'kursus/pendaftaran';
$route['about'] = 'kursus/about';
$route['lihat'] = 'kursus/coba';
$route['video'] = 'kursus/video';
$route['source'] = 'kursus/source';
$route['kontak'] = 'kursus/kontak';
$route['admin'] = 'administrator';
$route['insert_data'] = 'kursus/insert';
$route['ambil_video'] = 'administrator/ambilvideo';
$route['insert_video'] = 'administrator/insertvideo';
$route['edit_video'] = 'administrator/ubahvideo';
$route['hapus_video'] = 'administrator/hapus';
$route['view_code'] = 'administrator/lihatcode';
$route['insert_code'] = 'administrator/insertcode';
$route['hapus_code'] = 'administrator/hapuscode';
$route['ubah_code'] = 'administrator/ubahcode';
$route['view_ebook'] = 'administrator/lihatebook';
$route['insert_ebook'] = 'administrator/simpanebook';
$route['ubah_ebook'] = 'administrator/actionedit';
$route['hapus_ebook'] = 'administrator/hapusebook';
$route['lihat_murid'] = 'administrator/lihatmurid';
$route['hapus_murid'] = 'administrator/hapusdata';
$route['ubah_data'] = 'administrator/ubahdata';
$route['ambil_download'] = 'administrator/ambildownload';
$route['pengguna'] = 'administrator/pengguna';
$route['ambil_pengguna'] = 'administrator/select_pengguna';
$route['hapus_user'] = 'administrator/hapususer';
$route['ambil_user_login'] = 'administrator/ambil_user';
$route['notif'] = 'administrator/notif';
$route['tampil_semua_notifikasi'] = 'administrator/tampil_semua_notif';
$route['ubah_notif'] = 'administrator/ubahnotif';
$route['download'] = 'administrator/download';
$route['download_code'] = 'administrator/download_code';
$route['download_ebook'] = 'administrator/download_ebook';
$route['forgot_pass'] = 'login/forgotpass';
$route['pross_forgot'] = 'login/pross_forgot';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
