<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('User');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/user/profile', 'UserController::profile');

//--------------USER-----------------
$routes->get('/', 'User::login');
$routes->get('/login', 'User::login');
$routes->get('/forgot', 'User::forgot');
$routes->get('/register', 'User::register');
$routes->get('/emailVerification', 'User::emailVerification');
$routes->post('/retrieve_profile', 'User::retrieve_profile');
$routes->post('/insert_reg', 'User::insert_reg');
$routes->get('/logout', 'User::logout');
$routes->get('/mail', 'AccountController::mail');
// $routes->get('/register', 'AccountController::register');
$routes->match(['get', 'post'],'/store', 'AccountController::store');
$routes->match(['get', 'post'],'/login', 'AccountController::login');
$routes->match(['get', 'post'],'/register', 'AccountController::register');
$routes->match(['get', 'post'],'/verify/(:any)', 'AccountController::verify/$1');

//authcontroller/ forgot//
$routes->get('forgot-password', 'AuthController::forgot');
$routes->post('forgot-password', 'AuthController::forgot');
$routes->get('reset_Password', 'AuthController::reset_Password');
$routes->get('login', 'AuthController::login');
$routes->post('reset-password', 'AuthController::resetPassword');


//------------USER PROFILE------------
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
$routes->get('/auth', 'User::auth');
$routes->get('/insert_reg', 'User::insert_reg');
$routes->get('/get_profile', 'Profile::get_profile');
$routes->get('/retrieve_profile', 'Profile::retrieve_profile');
$routes->post('/insertProfile', 'Profile::insertProfile');
$routes->get('/try', 'Profile::try');
$routes->get('/registration', 'Profile::registration');
$routes->get('/registrationz', 'Profile::registrationz');
$routes->get('/registration/(:any)', 'Profile::registration/$1');
$routes->get('/userProspectus', 'Profile::userProspectus');
$routes->get('/userSchedule', 'Profile::userSchedule');
$routes->get('/registration', 'Profile::registration');
$routes->get('/newRegistration', 'Profile::newRegistration');
$routes->get('/retrieve_yearUser', 'Profile::retrieve_yearUser');
$routes->get('/retrieve_User', 'Profile::retrieve_User');
$routes->get('/myprofile', 'Profile::myprofile');
$routes->post('/insert_registration', 'Profile::insert_registration');
$routes->get('/updateReg', 'Profile::updateReg');
$routes->get('/edit_reg/(:any)', 'Profile::edit_reg/$1');
$routes->put('/update/(:any)', 'Profile::update/$1');
$routes->put('/updateProfile/(:any)', 'Profile::updateProfile/$1');
$routes->get('/strandProspectus/(:any)', 'Prospectus::strandProspectus/$1');
$routes->put('/updatePassword/(:any)', 'Profile::updatePassword/$1');
$routes->put('/updateUserProfile/(:any)', 'Profile::updateUserProfile/$1');



});


//------------ADMIN PROFILE------------
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
$routes->get('/admin', 'Admin::admin');
$routes->get('/pre_enrolled', 'Admin::pre_enrolled');
$routes->get('/prospectus', 'Admin::prospectus');
$routes->get('/grading', 'Admin::grading');
$routes->get('/strand', 'Admin::strand');
$routes->get('/newadmin', 'Admin::newadmin');
$routes->get('/addadmin', 'Admin::addadmin');
$routes->get('/adminlogout', 'Admin::adminlogout');
$routes->post('/insertAdmin', 'Admin::insertAdmin');
$routes->put('/adminUpdate/(:any)', 'Admin::adminUpdate/$1');

//------------ADMIN STRAND------------
$routes->get('/retrieve_strand', 'Strand::retrieve_strand');
$routes->post('/insert_strand', 'Strand::insert_strand');
$routes->get('/edit_strand/(:any)', 'Strand::edit_strand/$1');
$routes->put('/update_strand/(:any)', 'Strand::update_strand/$1');

//-----------ADMIN SECTION---------
$routes->get('/section', 'Section::section');
$routes->post('/newsection', 'Section::newsection');
$routes->get('/schedule', 'Section::schedule');
$routes->get('/addSchedule', 'Section::addSchedule');
$routes->get('/delete/(:any)', 'Section::delete/$1');
$routes->get('/edit/(:any)', 'Section::edit/$1');
$routes->put('/section_update/(:any)', 'Section::section_update/$1');
$routes->get('/strandSec/(:any)', 'Section::strandSec/$1');

//-----------ADMIN PROSPECTUS---------
$routes->get('/r_prospectus', 'Prospectus::r_prospectus');
$routes->post('/newprospectus', 'Prospectus::newprospectus');
$routes->get('/edit_prospectus/(:any)', 'Prospectus::edit_prospectus/$1');
$routes->put('/updateProspectus/(:any)', 'Prospectus::updateProspectus/$1');

//-----------ADMIN PRE ENROLLED---------
$routes->get('/viewPreEnroll', 'PreEnrolled::viewPreEnroll');
$routes->get('/enroll', 'PreEnrolled::enroll');
$routes->get('/pre_enrolled_reg', 'PreEnrolled::pre_enrolled_reg');


//-----------User Schedule---------
$routes->get('/viewSchedule', 'UserSchedule::viewSchedule');

//-----------Grading
$routes->get('/grade', 'Grade::grade');
});




/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
