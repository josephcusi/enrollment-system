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
$routes->setAutoRoute(true);

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
$routes->match(['get', 'post'],'/exceltest', 'Excel::exceltest');

//webpage controller
$routes->match(['get', 'post'],'/landing', 'Webpage::landing');
$routes->match(['get', 'post'],'/contact', 'Webpage::contact');
$routes->match(['get', 'post'],'/about', 'Webpage::about');
$routes->match(['get', 'post'],'/offered', 'Webpage::offered');

//authcontroller/ forgot//
$routes->get('forgot-password', 'AuthController::forgot');
$routes->post('forgot-password', 'AuthController::forgot');
$routes->get('reset_Password', 'AuthController::reset_Password');
$routes->get('login', 'AuthController::login');
$routes->post('reset-password', 'AuthController::resetPassword');
// $routes->get('/generate-pdf', 'PdfGenerator::generatePdf');
// $routes->get('/test123', 'PdfGenerator::test123');

//------------USER PROFILE------------
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
$routes->get('/auth', 'User::auth');

$routes->get('/insert_reg', 'User::insert_reg');
$routes->get('/get_profile', 'Profile::get_profile');
$routes->get('/retrieve_profile', 'Profile::retrieve_profile');
$routes->post('/insertProfile', 'Profile::insertProfile');
$routes->match(['get', 'post'],'/subject', 'Profile::subject');
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
$routes->put('/update', 'Profile::update');
$routes->put('/updateProfile/(:any)', 'Profile::updateProfile/$1');
$routes->get('/strandProspectus/(:any)', 'Prospectus::strandProspectus/$1');
$routes->put('/updatePassword/(:any)', 'Profile::updatePassword/$1');
$routes->put('/updateUserProfile/(:any)', 'Profile::updateUserProfile/$1');
$routes->post('/insert_credeantials', 'User::insert_credeantials');
$routes->get('/credentials', 'User::credentials');
$routes->post('/insert_subject', 'Profile::insert_subject');
$routes->post('/test', 'Profile::test');
});

//------------ADMIN PROFILE------------
$routes->match(['get', 'post'],'/student_approve', 'Credentials::student_approve');
$routes->match(['get', 'post'],'/view_credential', 'Credentials::view_credential');
$routes->match(['get', 'post'],'/student_status', 'Credentials::student_status');
$routes->match(['get', 'post'],'/credentials/(:any)', 'Credentials::credentials/$1');
//------------ADMIN PROFILE------------
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
$routes->get('/admin', 'Admin::admin');
$routes->get('gender-data', 'Admin::admin');
$routes->get('/pre_enrolled', 'Admin::pre_enrolled');
$routes->get('/prospectus', 'Admin::prospectus');
$routes->get('/strand', 'Admin::strand');
$routes->get('/newadmin', 'Admin::newadmin');
$routes->get('/addadmin', 'Admin::addadmin');
$routes->get('/adminlogout', 'Admin::adminlogout');
$routes->post('/insertAdmin', 'Admin::insertAdmin');
$routes->put('/adminUpdate', 'Admin::adminUpdate');
$routes->post('/updateYear', 'Admin::updateYear');

//------------TEACHER ADDING------------
$routes->get('/listofteacher', 'TeacherAccount::listofteacher');
$routes->post('/addNewTeacher', 'TeacherAccount::addNewTeacher');
$routes->match(['get', 'post'],'/addteacher', 'TeacherAccount::addteacher');

//------------ADMIN STRAND------------
$routes->get('/retrieve_strand', 'Strand::retrieve_strand');
$routes->post('/insert_strand', 'Strand::insert_strand');
$routes->get('/edit_strand/(:any)', 'Strand::edit_strand/$1');
$routes->post('/update_strand', 'Strand::update_strand');

//-----------ADMIN SECTION---------
$routes->get('/section', 'Section::section');
$routes->post('/newsection11', 'Section::newsection11');
$routes->get('/schedule11/(:any)', 'Section::schedule11/$1');
$routes->get('/schedule12/(:any)', 'Section::schedule12/$1');
$routes->get('/schedule3rd/(:any)', 'Section::schedule3rd/$1');
$routes->get('/schedule4th/(:any)', 'Section::schedule4th/$1');
$routes->put('/section_update11', 'Section::section_update11');
$routes->put('/section_update12', 'Section::section_update12');
$routes->get('/strandSec/(:any)', 'Section::strandSec/$1');
$routes->post('/addsched11/(:any)', 'Section::addsched11/$1');
$routes->post('/addsched12/(:any)', 'Section::addsched12/$1');
$routes->post('/updateSched11/(:any)', 'Section::updateSched11/$1');
$routes->match(['get', 'post'],'/section11/(:any)', 'Section::section11/$1');
$routes->match(['get', 'post'],'/section12', 'Section::section12');
$routes->match(['get', 'post'],'/section3rd', 'Section::section3rd');
$routes->match(['get', 'post'],'/section4th', 'Section::section4th');
$routes->get('/strandSec11/(:any)', 'Section::strandSec11/$1');
$routes->get('/strandSec12/(:any)', 'Section::strandSec12/$1');
$routes->get('/courseThirdyear/(:any)', 'Section::courseThirdyear/$1');
$routes->get('/courseFourthyear/(:any)', 'Section::courseFourthyear/$1');

//-----------ADMIN PROSPECTUS---------
$routes->post('/addprospectus11', 'Prospectus::addprospectus11');
$routes->post('/addprospectus12', 'Prospectus::addprospectus12');
$routes->get('/edit_prospectus/(:any)', 'Prospectus::edit_prospectus/$1');
$routes->put('/updateProspectus11', 'Prospectus::updateProspectus11');
$routes->put('/updateProspectus12', 'Prospectus::updateProspectus12');
$routes->match(['get', 'post'],'/prospectus11/(:any)', 'Prospectus::prospectus11/$1');
$routes->get('/prospectusThirdyear/(:any)', 'Prospectus::prospectusThirdyear/$1');
$routes->get('/prospectusFourthyear/(:any)', 'Prospectus::prospectusFourthyear/$1');
$routes->get('/strandProspectus12/(:any)', 'Prospectus::strandProspectus12/$1');
$routes->get('/strandProspectus11/(:any)', 'Prospectus::strandProspectus11/$1');

//-----------ADMIN PRE ENROLLED---------
$routes->get('/viewPreEnroll', 'PreEnrolled::viewPreEnroll');
$routes->get('/enroll', 'PreEnrolled::enroll');
$routes->get('/pre_enrolled_reg', 'PreEnrolled::pre_enrolled_reg');
$routes->get('/viewPreEnroll/(:any)', 'PreEnrolled::viewPreEnroll/$1');
$routes->get('/enroll/(:any)', 'PreEnrolled::enroll/$1');
$routes->post('/generate', 'PreEnrolled::generate');
$routes->put('/enrolled/(:any)', 'PreEnrolled::enrolled/$1');
$routes->get('/rejected/(:any)', 'PreEnrolled::rejected/$1');


//-----------User Schedule---------
$routes->get('/viewSchedule', 'UserSchedule::viewSchedule');

//teacherr side
$routes->match(['get', 'post'],'/t_dashboard/(:any)', 'Teacher::t_dashboard/$1');
$routes->match(['get', 'post'],'/newteacher', 'Teacher::newteacher');
$routes->get('/grading', 'Teacher::grading');
$routes->post('/gradingStud', 'Teacher::gradingStud');

// $routes->get('/viewGrade', 'Teacher::viewGrade');
// $routes->get('/viewGrades', 'Teacher::viewGrades');
// $routes->post('/viewGrade', 'Teacher::viewGrade');
$routes->get('/viewGrade/(:any)', 'Teacher::viewGrade/$1');
$routes->post('/updateGrade', 'Teacher::updateGrade');
$routes->put('/TeacherUpdate', 'TeacherAccount::TeacherUpdate');
$routes->post('/Teacher_StudentGrading', 'Teacher::Teacher_StudentGrading');
//-----------Grading


$routes->post('/GradeSection', 'Grading::GradeSection');
$routes->get('/StudentGrade/(:any)', 'Grading::StudentGrade/$1');
$routes->get('/StudentGrading/(:any)', 'Grading::StudentGrading/$1');
});

// $routes->post('add_subject_g11', 'Prospectus::add_subject_g11');
// $routes->post('add_subject_g12', 'Prospectus::add_subject_g12');
// $routes->get('/pros11', 'Prospectus::pros11');


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
