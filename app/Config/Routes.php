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
$routes->setDefaultController('Webpage');
$routes->setDefaultMethod('landing');
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


$routes->get('/generatePdf', 'PdfGenerator::generatePdf');

//--------------USER-----------------
$routes->get('/', 'Webpage::landing');
$routes->get('/login', 'User::login');
$routes->get('/forgot', 'User::forgot');
$routes->get('/emailVerification', 'User::emailVerification');
$routes->post('/my_profile', 'User::retrieve_profile');
$routes->get('/logout', 'User::logout');
$routes->get('/mail', 'AccountController::mail');
// $routes->get('/register', 'AccountController::register');
$routes->match(['get', 'post'],'/store', 'AccountController::store');
$routes->match(['get', 'post'],'/login', 'AccountController::login');
$routes->match(['get', 'post'],'/account_registration', 'AccountController::register');
$routes->match(['get', 'post'],'/verify/(:any)', 'AccountController::verify/$1');

//webpage controller
$routes->match(['get', 'post'],'/landing', 'Webpage::landing');
$routes->match(['get', 'post'],'/sendmail', 'Webpage::sendmail');
$routes->match(['get', 'post'],'/contact', 'Webpage::contact');
$routes->match(['get', 'post'],'/about', 'Webpage::about');
$routes->match(['get', 'post'],'/offered', 'Webpage::offered');
$routes->get('/offered/(:any)', 'Webpage::offered/($1)');

//authcontroller/ forgot//
$routes->get('forgot-password', 'AuthController::forgot');
$routes->post('forgot-password', 'AuthController::forgot');
$routes->get('reset_Password', 'AuthController::reset_Password');
$routes->get('login', 'AuthController::login');
$routes->post('reset-password', 'AuthController::resetPassword');
$routes->post('/download_form', 'PreEnrolled::download_form');

//------------USER PROFILE------------
$routes->group('', ['filter' => 'AuthStudent'], function ($routes) {
$routes->get('/auth', 'User::auth');
$routes->get('/insert_reg', 'User::insert_reg');
$routes->match(['get', 'post'],'/curriculum-subject', 'Profile::curriculumSubject');
$routes->get('/get_profile', 'Profile::get_profile');
$routes->get('/my_profile', 'Profile::my_profile');
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
$routes->put('/updateProfile', 'Profile::updateProfile');
$routes->get('/strandProspectus/(:any)', 'Prospectus::strandProspectus/$1');
$routes->put('/updatePassword', 'Profile::updatePassword');
$routes->put('/updateUserProfile', 'Profile::updateUserProfile');
$routes->post('/insert_credeantials', 'User::insert_credeantials');
$routes->get('/credentials', 'User::credentials');
$routes->post('/insert_subject', 'Profile::insert_subject');
$routes->post('/test', 'Profile::test');
$routes->get('/cred_skip', 'User::cred_skip');

//-----------User Schedule---------
$routes->get('/viewSchedule', 'UserSchedule::viewSchedule');

//------------CREDENTIALS------------
$routes->match(['get', 'post'],'/student-request', 'Credentials::req');
$routes->match(['get', 'post'],'/makereq', 'Credentials::makereq');
$routes->match(['get', 'post'],'/request_form', 'Credentials::request_form');

});



$routes->group('', ['filter' => 'AuthAdmin'], function ($routes) {
    //--------------ANNOUNCEMENT-----------------


$routes->get('/school_updates/(:any)', 'Announcement::school_updates/($1)');
$routes->post('/addAnnouncement', 'Announcement::addAnnouncement');
$routes->post('school_updates/announcement', 'Announcement::announcement');
$routes->post('school_updates/UpdateAnnouncement', 'Announcement::UpdateAnnouncement');

//------------ADMIN PROFILE------------
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
$routes->post('/enrollment_status', 'Admin::enrollment_status');
$routes->post('/download_records', 'Admin::download_records');
$routes->post('/test', 'Admin::test');


//-----------------ADMIN CREDENTIALS--------------
$routes->match(['get', 'post'],'/student_approve', 'Credentials::student_approve');
$routes->match(['get', 'post'],'/student_status/(:any)', 'Credentials::student_status/$1');
$routes->match(['get', 'post'],'/view_credential/(:any)', 'Credentials::view_credential/$1');
$routes->match(['get', 'post'],'/student-request/(:any)', 'Credentials::studreq/$1');
$routes->match(['get', 'post'],'/cred_schedule', 'Credentials::cred_schedule');
$routes->match(['get', 'post'],'/req_cred', 'Credentials::req_cred');

//------------TEACHER ADDING------------
$routes->get('/listofteacher', 'TeacherAccount::listofteacher');
$routes->post('/addNewTeacher', 'TeacherAccount::addNewTeacher');
$routes->match(['get', 'post'],'/addteacher', 'TeacherAccount::addteacher');
$routes->post('/TeacherUpdate', 'TeacherAccount::TeacherUpdate');

//------------ADMIN STRAND------------
$routes->get('/retrieve_strand', 'Strand::retrieve_strand');
$routes->post('/insert_strand', 'Strand::insert_strand');
$routes->get('/edit_strand/(:any)', 'Strand::edit_strand/$1');
$routes->post('/update_strand', 'Strand::update_strand');
$routes->post('/update_program_status', 'Strand::update_program_status');

//-----------ADMIN SECTION---------
$routes->get('/section', 'Section::section');
$routes->post('/newsection11', 'Section::newsection11');
$routes->match(['get', 'post'],'/schedule11/(:any)', 'Section::schedule11/$1');
$routes->put('/section_update11', 'Section::section_update11');
$routes->put('/section_update12', 'Section::section_update12');
$routes->get('/strandSec/(:any)', 'Section::strandSec/$1');
$routes->post('/addsched11/(:any)', 'Section::addsched11/$1');
$routes->post('/updateSched11', 'Section::updateSched11');
$routes->match(['get', 'post'],'/section/(:any)', 'Section::section11/$1');
$routes->get('/strandSec11/(:any)', 'Section::strandSec11/$1');
$routes->post('/add_room', 'Section::add_room');
$routes->post('/pdf_subject_schedule', 'Section::pdf_subject_schedule');
$routes->post('/addedscheduling', 'Section::addedscheduling');
$routes->post('/all_year', 'Section::all_year');

//-----------ADMIN PROSPECTUS---------
$routes->post('/addprospectus11', 'Prospectus::addprospectus11');
$routes->post('/addprospectus12', 'Prospectus::addprospectus12');
$routes->get('/edit_prospectus/(:any)', 'Prospectus::edit_prospectus/$1');
$routes->put('/updateProspectus11', 'Prospectus::updateProspectus11');
$routes->put('/updateProspectus12', 'Prospectus::updateProspectus12');
$routes->match(['get', 'post'],'/prospectus/(:any)', 'Prospectus::prospectus11/$1');
$routes->get('/prospectusThirdyear/(:any)', 'Prospectus::prospectusThirdyear/$1');
$routes->get('/prospectusFourthyear/(:any)', 'Prospectus::prospectusFourthyear/$1');
$routes->get('/strandProspectus12/(:any)', 'Prospectus::strandProspectus12/$1');
$routes->get('/strandProspectus11/(:any)', 'Prospectus::strandProspectus11/$1');

//-----------ADMIN PRE ENROLLED---------
$routes->get('/viewPreEnroll', 'PreEnrolled::viewPreEnroll');
$routes->get('/enroll', 'PreEnrolled::enroll');
$routes->get('/pre-enrolled-registration/(:any)', 'PreEnrolled::pre_enrolled_reg/$1');
$routes->match(['get', 'post'],'/viewPreEnroll/(:any)', 'PreEnrolled::viewPreEnroll/$1');
$routes->get('/enroll/(:any)', 'PreEnrolled::enroll/$1');
$routes->post('/generate', 'PreEnrolled::generate');
$routes->post('/enrolled', 'PreEnrolled::enrolled');
$routes->get('/rejected/(:any)', 'PreEnrolled::rejected/$1');
$routes->post('/enroll_all', 'PreEnrolled::enroll_all');
$routes->post('/stud_cor_form', 'PreEnrolled::stud_cor_form');

//-----------ADMIN PRE ENROLLED---------

$routes->match(['get', 'post'],'/student-list/(:any)', 'User_Controller::old_student/$1');
$routes->post('/update_student_info', 'User_Controller::update_student_info');

//-----------Grading
$routes->post('delete_all_data', 'DeadlineController::deleteAllData');
$routes->get('/deadline_form', 'DeadlineController::deadline_form');
$routes->post('/save_deadline', 'DeadlineController::saveDeadline');
$routes->match(['get', 'post'],'/studentGrade/(:any)', 'Grading::StudentGrade/$1');
$routes->get('/student-grading/(:any)', 'Grading::StudentGrading/$1');
$routes->post('/evaluate_grade', 'Grading::evaluate_grade');
});

$routes->group('', ['filter' => 'AuthTeacher'], function ($routes) {
//teacherr side
$routes->match(['get', 'post'],'/student_grading/(:any)', 'Teacher::t_dashboard/$1');
$routes->match(['get', 'post'],'/teacher_profile', 'Teacher::newteacher');
$routes->match(['get', 'post'],'/updatePasswordTeacher', 'TeacherAccount::updatePasswordTeacher');
$routes->get('/grading', 'Teacher::grading');
$routes->post('/gradingStud', 'Teacher::gradingStud');
$routes->post('/update_student_grade', 'Teacher::update_student_grade');

$routes->get('/viewGrade/(:any)', 'Teacher::viewGrade/$1');
$routes->post('/updateGrade', 'Teacher::updateGrade');
$routes->get('/Teacher_StudentGrading/(:any)', 'Teacher::Teacher_StudentGrading/$1');

    //--------------Excel

$routes->match(['get', 'post'],'/exceltest', 'Excel::exceltest');
$routes->match(['get', 'post'],'/upload', 'Excel::upload');
$routes->match(['get', 'post'],'/convertExcelToHtml', 'Excel::convertExcelToHtml');
$routes->match(['get', 'post'],'/update_student_grade_excel', 'Excel::update_student_grade_excel');
$routes->match(['get', 'post'],'/teacher_side', 'User::teacher_side');
$routes->match(['get', 'post'],'/teacher_side_option', 'User::teacher_side_option');
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
