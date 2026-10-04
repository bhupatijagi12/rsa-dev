<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->post('dealer/send-otp', 'DealerAuth::sendOtp');
$routes->get('otp-verification', 'DealerAuth::otpVerification');
$routes->post('dealer/verify-otp', 'DealerAuth::verifyOtp');
$routes->post('dealer/change-password', 'DealerAuth::changePassword');


##for Operations Page
$routes->get('/ops/login', 'OperationsAuth::opsLogin');
$routes->post('/ops/validate-login', 'OperationsAuth::validateLogin');

$routes->group('', ['filter' => 'auth'], function($routes) {
$routes->get('/ops/dashboard', 'OperationsController::dashboard');
$routes->get('/ops/dealers', 'OperationsController::dealers');
$routes->get('/ops/view-documents/(:num)', 'OperationsController::viewDocuments/$1');
$routes->get('/ops/download/(:num)/(:any)', 'OperationsController::download/$1/$2');
$routes->post('/ops/verify-docs', 'OperationsController::verify');

});

## FOr Dealer Page

$routes->group('', ['filter' => 'auth'], function($routes) {

$routes->get('onboarding', 'OnboardingController::index');
$routes->get('session', 'OnboardingController::session');
$routes->post('onboarding/save-onboarding', 'OnboardingController::saveOnboarding');
$routes->get('onboarding/submit-onboarding','OnboardingController::submitOnboarding');
$routes->get('upload-document', 'OnboardingController::upload');
$routes->post('onboarding/upload-documents','OnboardingController::uploadDocuments');
$routes->get('onboarding/download-agreement','OnboardingController::downloadAgreement');
$routes->get('dashboard', 'DashboardController::index');
$routes->get('products', 'DashboardController::products');
$routes->get('coming-soon', 'DashboardController::comingsoon');
$routes->get('bank', 'BankController::bank');
$routes->get('bank-statement', 'BankController::bankstatement');
$routes->get('policy', 'PolicyController::policy');
$routes->get('sold-policies', 'PolicyController::soldpolicy');
$routes->get('cancellation', 'PolicyController::cancellation');
$routes->get('renewal-policies', 'PolicyController::renewalpolicy');
$routes->get('endorsement', 'PolicyController::endorsement');
$routes->get('invoices', 'PolicyController::invoices');
$routes->get('generate-invoice', 'PolicyController::generateinvoice');
$routes->get('gst-transaction', 'PolicyController::gsttransaction');
$routes->post('generate-policy', 'PolicyController::generatePolicy');

});


$routes->get('logout', 'DealerAuth::logout');
