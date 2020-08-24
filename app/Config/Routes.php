<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/PageController/(:any)', function(){
	return redirect()->back();
});
$routes->get('/UsersController/(:any)', function(){
	return redirect()->back();
});
$routes->get('/', 'PageController::home',['filter' => 'user']);
$routes->get('/input', 'PageController::input',['filter' => 'userbaru']);
$routes->post('/input', 'PageController::inputData',['filter' => 'userbaru']);
$routes->match(['get','post'],'/login', 'UsersController::login',['filter' => 'login']);
$routes->get('/home', 'PageController::home',['filter' => 'user']);
$routes->match(['get','post'],'/edit', 'UsersController::editData',['filter' => 'user']);
$routes->get('/bendahara', 'PageController::Bendahara',['filter' => 'bendahara']);

//crud laporan 
$routes->get('/laporan', 'PageController::tambahLaporan',['filter' => 'user']);
$routes->post('/laporan', 'LaporanController::input',['filter' => 'user']);
$routes->post('/laporan-non', 'LaporanController::inputNon',['filter' => 'user']);
$routes->post('/inputDataSemester', 'LaporanController::inputDataSemester',['filter' => 'user']);
$routes->post('/getDataAkam', 'LaporanController::getData',['filter' => 'user']);
$routes->post('/getDataNon', 'LaporanController::getNon',['filter' => 'user']);
$routes->post('/deleteDataNon', 'LaporanController::delNon',['filter' => 'user']);
$routes->post('/editDataAkam', 'LaporanController::editDataSemester',['filter' => 'user']);
$routes->post('/deletDataKam', 'LaporanController::deleteDataKam',['filter' => 'user']);
$routes->post('/pengajuanLA', 'UploadController::pengajuanLA',['filter' => 'user']);
$routes->post('/pengajuanDB', 'UploadController::pengajuanDB',['filter' => 'user']);
$routes->post('/submitCatatan', 'UploadController::inputCatatan',['filter' => 'bendahara']);
$routes->post('/hapus-ajuan', 'LaporanController::hapusAjuan',['filter' => 'bendahara']);
// ===========================

//bendahara
$routes->post('/download-zip','BendaharaController::zip',['filter' => 'bendahara']);

$routes->get('/logout', 'PageController::logout');
$routes->get('/pengajuan', 'PageController::infoDana',['filter' => 'user']);
$routes->get('/profil', 'PageController::profil',['filter' => 'user']);
$routes->post('/profil', 'PageController::UpdateProfil',['filter' => 'user']);
$routes->post('/uploads', 'UploadController::upload',['filter' => 'user']);
$routes->post('/krs', 'DownloadController::krs',['filter' => 'user']);
$routes->post('/khs', 'DownloadController::khs',['filter' => 'user']);
$routes->post('/sertifikat', 'DownloadController::sertifikat',['filter' => 'user']);
$routes->post('/sertifNon', 'DownloadController::sertifNon',['filter' => 'user']);
$routes->match(['get','post'],'/register', 'UsersController::register',['filter' => 'admin']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
