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
$routes->get('/ops/view-plan/(:num)', 'OperationsController::viewplan/$1');
$routes->post('/ops/update-plan', 'OperationsController::updateplan');

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
$routes->get('policy/(:num)', 'PolicyController::policy/$1');
$routes->get('sold-policies', 'PolicyController::soldpolicy');
$routes->get('cancellation', 'PolicyController::cancellation');
$routes->get('renewal-policies', 'PolicyController::renewalpolicy');
$routes->get('endorsement', 'PolicyController::endorsement');
$routes->get('invoices', 'PolicyController::invoices');
$routes->get('generate-invoice', 'PolicyController::generateinvoice');
$routes->get('gst-transaction', 'PolicyController::gsttransaction');
$routes->post('generate-policy', 'PolicyController::generatepolicy');
$routes->get('wallet-transaction', 'WalletController::wallettransaction');
$routes->get('wallet-transaction/(:num)', 'OperationsController::wallettransaction/$1');
$routes->get('download-policy/(:num)', 'PolicyController::downloadpolicypdf/$1');
$routes->post('update-wallet-transaction', 'WalletController::updatewallettransaction');
$routes->get('download-wallet-file/(:num)', 'WalletController::downloadwalletfile/$1');
$routes->post('update-wallet-status', 'OperationsController::updatewalletstatus');
$routes->get('policy', 'WalletController::downloadwalletfile/$1');


$routes->get('policyold/(:num)', 'PolicyController::policyold/$1');
$routes->get('old', 'DashboardController::indexold');
$routes->get('/ops/dashboardold', 'OperationsController::dashboardold');
$routes->get('/ops/dealersold', 'OperationsController::dealersold');
$routes->get('check-premium', 'PolicyController::checkpremium');


});


$routes->get('logout', 'DealerAuth::logout');
