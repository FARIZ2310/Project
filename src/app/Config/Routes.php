<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// TODO: Reroutes some of controllers
// TODO: Refactoring OPD to SKPD
// TODO: Refactoring Info KKN to Info Kerja Nyata

// Landing Page Routes 
$routes->get('/', 'Home::index');
$routes->get('/InfoKKN', 'Home::InfoKKN');
$routes->get('/BlogSaran', 'Home::BlogSaran');
$routes->get('/Dokumen', 'Home::Dokumen');
$routes->get('/SOP', 'Home::SOP');
$routes->get('/HAKI', 'Home::HAKI');
$routes->get('/InovasiSKPD', 'Home::InovasiSKPD');
$routes->get('/InovasiSKPD/(:num)', 'Home::InovasiSKPDDetail/$1');
$routes->get('/InovasiMasyarakat', 'Home::InovasiMasyarakat');
$routes->get('/InovasiMasyarakat/(:num)', 'Home::InovasiMasyarakatDetail/$1');
$routes->get('/KebutuhanRiset', 'Home::KebutuhanRiset');
$routes->get('/KebutuhanRiset/(:num)', 'Home::KebutuhanRisetDetail/$1');
$routes->get('/LembagaPenelitian', 'Home::LembagaPenelitian');
$routes->get('/LembagaPenelitian/(:num)', 'Home::LembagaPenelitianDetail/$1');
$routes->get('/Peneliti', 'Home::Peneliti');
$routes->get('/Peneliti/(:num)', 'Home::PenelitiDetail/$1');
$routes->get('/Penelitian', 'Home::Penelitian');
$routes->get('/Penelitian/(:num)', 'Home::PenelitianDetail/$1');
$routes->get('/LihatSKPD', 'Home::SKPD');
$routes->get('/LihatSKPD/(:num)', 'Home::SKPDDetail/$1');
$routes->get('/Profil', 'Home::Profil');

$routes->get('/login', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login', 'Auth::loginUser');
// Dashboard Routes
$routes->get('/Dashboard', 'Dashboard/Home::index');
// [->] Dashboard / Penelitian

// [-->] Penelitian / Lembaga
$routes->get('/Penelitian/Lembaga', 'Dashboard/Penelitian/Lembaga::index');
$routes->post('/Penelitian/Lembaga/get', 'Dashboard/Penelitian/Lembaga::getLembaga');
$routes->get('/Penelitian/Lembaga/getAll', 'Dashboard/Penelitian/Lembaga::getAllLembaga');
$routes->post('/Penelitian/Lembaga/add', 'Dashboard/Penelitian/Lembaga::addLembaga');
$routes->post('/Penelitian/Lembaga/update', 'Dashboard/Penelitian/Lembaga::updateLembaga');
$routes->post('/Penelitian/Lembaga/delete', 'Dashboard/Penelitian/Lembaga::deleteLembaga');
$routes->post('/Penelitian/Lembaga/table', 'Dashboard/Penelitian/Lembaga::datatableLembaga');

// [-->] Penelitian / Peneliti
$routes->get('/Penelitian/Peneliti', 'Dashboard/Penelitian/Peneliti::index');
$routes->post('/Penelitian/Peneliti/get', 'Dashboard/Penelitian/Peneliti::getPeneliti');
$routes->post('/Penelitian/Peneliti/add', 'Dashboard/Penelitian/Peneliti::addPeneliti');
$routes->post('/Penelitian/Peneliti/update', 'Dashboard/Penelitian/Peneliti::updatePeneliti');
$routes->post('/Penelitian/Peneliti/delete', 'Dashboard/Penelitian/Peneliti::deletePeneliti');
$routes->post('/Penelitian/Peneliti/table', 'Dashboard/Penelitian/Peneliti::datatablePeneliti');

// [-->] Penelitian / Penelitian
$routes->get('/Penelitian/Penelitian', 'Dashboard/Penelitian/Penelitian::index');
$routes->post('/Penelitian/Penelitian/get', 'Dashboard/Penelitian/Penelitian::getPenelitian');
$routes->post('/Penelitian/Penelitian/add', 'Dashboard/Penelitian/Penelitian::addPenelitian');
$routes->post('/Penelitian/Penelitian/update', 'Dashboard/Penelitian/Penelitian::updatePenelitian');
$routes->post('/Penelitian/Penelitian/delete', 'Dashboard/Penelitian/Penelitian::deletePenelitian');
$routes->post('/Penelitian/Penelitian/table', 'Dashboard/Penelitian/Penelitian::datatablePenelitian');

// [-->] Pengembangan / HAKI
$routes->get('/Pengembangan/HAKI', 'Dashboard/Pengembangan/HAKI::index');
$routes->post('/Pengembangan/HAKI/get', 'Dashboard/Pengembangan/HAKI::getHaki');
$routes->post('/Pengembangan/HAKI/add', 'Dashboard/Pengembangan/HAKI::addHaki');
$routes->post('/Pengembangan/HAKI/update', 'Dashboard/Pengembangan/HAKI::updateHaki');
$routes->post('/Pengembangan/HAKI/delete', 'Dashboard/Pengembangan/HAKI::deleteHaki');
$routes->post('/Pengembangan/HAKI/table', 'Dashboard/Pengembangan/HAKI::datatableHaki');

// [-->] Pengembangan / Inovasi SKPD
$routes->get('/Pengembangan/InovasiSKPD', 'Dashboard/Pengembangan/InovasiSKPD::index');
$routes->post('/Pengembangan/InovasiSKPD/get', 'Dashboard/Pengembangan/InovasiSKPD::getInovasiSKPD');
$routes->post('/Pengembangan/InovasiSKPD/add', 'Dashboard/Pengembangan/InovasiSKPD::addInovasiSKPD');
$routes->post('/Pengembangan/InovasiSKPD/update', 'Dashboard/Pengembangan/InovasiSKPD::updateInovasiSKPD');
$routes->post('/Pengembangan/InovasiSKPD/delete', 'Dashboard/Pengembangan/InovasiSKPD::deleteInovasiSKPD');
$routes->post('/Pengembangan/InovasiSKPD/table', 'Dashboard/Pengembangan/InovasiSKPD::datatableInovasiSKPD');

// [-->] Pengembangan / Kreativitas Masyarakat
$routes->get('/Pengembangan/KreativitasMasyarakat', 'Dashboard/Pengembangan/KreativitasMasyarakat::index');
$routes->post('/Pengembangan/KreativitasMasyarakat/get', 'Dashboard/Pengembangan/KreativitasMasyarakat::getKreativitasMasyarakat');
$routes->post('/Pengembangan/KreativitasMasyarakat/add', 'Dashboard/Pengembangan/KreativitasMasyarakat::addKreativitasMasyarakat');
$routes->post('/Pengembangan/KreativitasMasyarakat/update', 'Dashboard/Pengembangan/KreativitasMasyarakat::updateKreativitasMasyarakat');
$routes->post('/Pengembangan/KreativitasMasyarakat/delete', 'Dashboard/Pengembangan/KreativitasMasyarakat::deleteKreativitasMasyarakat');
$routes->post('/Pengembangan/KreativitasMasyarakat/table', 'Dashboard/Pengembangan/KreativitasMasyarakat::datatableKreativitasMasyarakat');

// [-->] Pengembangan / Kebutuhan Riset
$routes->get('/Pengembangan/KebutuhanRiset', 'Dashboard/Pengembangan/KebutuhanRiset::index');
$routes->post('/Pengembangan/KebutuhanRiset/get', 'Dashboard/Pengembangan/KebutuhanRiset::getKebutuhanRiset');
$routes->post('/Pengembangan/KebutuhanRiset/add', 'Dashboard/Pengembangan/KebutuhanRiset::addKebutuhanRiset');
$routes->post('/Pengembangan/KebutuhanRiset/update', 'Dashboard/Pengembangan/KebutuhanRiset::updateKebutuhanRiset');
$routes->post('/Pengembangan/KebutuhanRiset/delete', 'Dashboard/Pengembangan/KebutuhanRiset::deleteKebutuhanRiset');
$routes->post('/Pengembangan/KebutuhanRiset/table', 'Dashboard/Pengembangan/KebutuhanRiset::datatableKebutuhanRiset');

// [-->] Layanan / Info Kerja Nyata
$routes->get('/Layanan/InfoKerjaNyata', 'Dashboard/Layanan/InfoKerjaNyata::index');
$routes->post('/Layanan/InfoKerjaNyata/get', 'Dashboard/Layanan/InfoKerjaNyata::getInfoKerjaNyata');
$routes->post('/Layanan/InfoKerjaNyata/add', 'Dashboard/Layanan/InfoKerjaNyata::addInfoKerjaNyata');
$routes->post('/Layanan/InfoKerjaNyata/update', 'Dashboard/Layanan/InfoKerjaNyata::updateInfoKerjaNyata');
$routes->post('/Layanan/InfoKerjaNyata/delete', 'Dashboard/Layanan/InfoKerjaNyata::deleteInfoKerjaNyata');
$routes->post('/Layanan/InfoKerjaNyata/table', 'Dashboard/Layanan/InfoKerjaNyata::datatableInfoKerjaNyata');

// [-->] Layanan / Blog Saran
$routes->get('/Layanan/BlogSaran', 'Dashboard/Layanan/BlogSaran::index');
$routes->post('/Layanan/BlogSaran/get', 'Dashboard/Layanan/BlogSaran::getBlogSaran');
$routes->post('/Layanan/BlogSaran/add', 'Dashboard/Layanan/BlogSaran::addBlogSaran');
$routes->post('/Layanan/BlogSaran/update', 'Dashboard/Layanan/BlogSaran::updateBlogSaran');
$routes->post('/Layanan/BlogSaran/delete', 'Dashboard/Layanan/BlogSaran::deleteBlogSaran');
$routes->post('/Layanan/BlogSaran/table', 'Dashboard/Layanan/BlogSaran::datatableBlogSaran');
$routes->post('/Layanan/BlogSaran/tables', 'Dashboard/Layanan/BlogSaran::datatableBlogSaranDitanggapi');

$routes->get('/SKPD', 'Dashboard/SKPD::index');
$routes->post('/SKPD/get', 'Dashboard/SKPD::getSKPD');
$routes->post('/SKPD/add', 'Dashboard/SKPD::addSKPD');
$routes->post('/SKPD/update', 'Dashboard/SKPD::updateSKPD');
$routes->post('/SKPD/delete', 'Dashboard/SKPD::deleteSKPD');
$routes->post('/SKPD/table', 'Dashboard/SKPD::datatableSKPD');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override num defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
