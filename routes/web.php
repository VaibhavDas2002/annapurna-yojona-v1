<?php

use App\Http\Controllers\AuthenticationController;

use App\Http\Controllers\BeneficiaryListController;
use App\Http\Controllers\CaptchaController;


use App\Http\Controllers\CreateAssignOtherFormFieldController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\DynamicFormController;

use App\Http\Controllers\DynamicWorkflow\UpdateMarkBeneficiaryDetailsController;
use App\Http\Controllers\ElasticSearchController;
use App\Http\Controllers\Formcontroller;


use App\Http\Controllers\MasterTabCreationController;
use App\Http\Controllers\OfficeMastersController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\RoleOfficeTypeMappingsController;
use App\Http\Controllers\RolePermisssionManagementController;
use App\Http\Controllers\SchemeCapacityController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\TrackBeneficiaryDetailsController;

use App\Http\Controllers\UserDutyManagementController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ValidationManagerController;
use App\Http\Controllers\workflowmanagementController;

use App\Livewire\CsvSplitter;
use App\Livewire\DynamicWorkflow\DynamicProcessPage;
use App\Livewire\DynamicWorkflow\ProcessWorkflow;
use App\Livewire\DynamicWorkflow\RequestUpdateBeneficiary;
use App\Livewire\DynamicWorkflow\WorkflowWizard;

use App\Livewire\MasterTabManager;
use App\Livewire\OfficeMasters\Create as OfficeMasterCreate;
use App\Livewire\ProcessApplication\DraftApplicationView;
use App\Livewire\RoleOfficeTypeMappings\Create;
use App\Livewire\RolerankManagement;
use App\Livewire\SchemeDropdown;
use App\Livewire\SchemeTabFieldManager;
use App\Livewire\UserPermission\AssignPermissionsPage;
use App\Livewire\Users\Create as UsersCreate;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/home.php';

// Guest Routes
Route::get('/session-expired', function () {
    return view('auth.session-expired', ['expired_at' => now()->format('h:i:s A')]);
})->name('session.expired');

// Route::get('/', fn() => view('welcome'));
Route::get('refresh-captcha', [CaptchaController::class, 'refreshCaptcha'])->name('refresh-captcha');

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/loginPost', 'loginCheck')->name('loginPost');
    Route::post('/resendOtp', 'resendOtp')->name('resendOtp');
    Route::get('/otp-validate', 'otpVerification')->middleware('2fa')->name('otp-validate');
    Route::post('/otp-validate-post', 'otpValidate')->middleware('2fa')->name('otp-validate-post');
    Route::get('/forget-password', 'forgetPassword')->name('forget-password');
    Route::post('/forgetpasswordPost', 'forgetPasswordPost')->name('forgetpasswordPost');
    Route::get('/reset-password', 'resetPassword')->middleware('2fa')->name('reset-password');
    Route::post('/resetPasswordPost', 'resetPasswordPost')->middleware('2fa')->name('resetPasswordPost');
    Route::post('/logout', 'logout')->name('logout');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('lb-application-list', [SchemeController::class, 'finalSubmitted'])->name('lb-application-list');

    Route::get('/lb-application-list/{scheme_id?}', SchemeDropdown::class)->name('lb-application-list');

    Route::get('/application', DraftApplicationView::class)->name('draft-application.view');

    // User Management
    Route::get('/user-managements', [UsersController::class, 'index'])->middleware('permission.redirect:canViewUser')->name('user-managements');

    Route::get('/users/create', UsersCreate::class)->middleware('permission.redirect:canCreateUsers')->name('users');

    // Role & Office Mappings
    Route::get('role-office-master-mappings', [RoleOfficeTypeMappingsController::class, 'index'])->middleware('permission.redirect:canRoleMapping')->name('role-office-master-mappings');

    Route::get('/role-office-type-mappings-create', Create::class)->middleware('permission.redirect:canRoleMappings')->name('role-office-type-mappings-create');

    // Office Masters
    Route::get('officemasters', [OfficeMastersController::class, 'index'])->middleware('permission.redirect:canViewOffices')->name('officemasters');

    Route::get('/office-masters-create', OfficeMasterCreate::class)->middleware('permission.redirect:canCreateOffices')->name('office-masters-create');

    // Permissions Management
    Route::get('/permission', [PermissionController::class, 'index'])->middleware('permission.redirect:canViewPermission')->name('permission');

    Route::get('/user-permission', [UserPermissionController::class, 'index'])->middleware('permission.redirect:canViewUserPermisson')->name('user-permission');

    Route::get('/assign-users-permissions', AssignPermissionsPage::class)->name('assign-users-permissions');

    Route::get('/role-permission-management', [RolePermisssionManagementController::class, 'index'])->middleware('permission.redirect:canRolePermissionManagement')->name('role-permission-management');

    // Duty Management
    Route::get('/userDutymanagement', [UserDutyManagementController::class, 'index'])->middleware('permission.redirect:manage user duties')->name('userDutymanagement.index');



    // Design Pages (Dev Only – Remove in Prod)
    Route::get('/tableDesign', [DesignController::class, 'tableDesign'])->name('tableDesign');
    Route::get('/selectionDesign', [DesignController::class, 'selectionDesign'])->name('selectionDesign');
    Route::get('/viewpage', [DesignController::class, 'viewPage'])->name('viewpage');
    Route::get('/getelsticsearchIndex', [ElasticSearchController::class, 'index'])->name('getelsticsearchIndex');

    // Track Beneficiary Details
    Route::get('track-beneficiary-details', [TrackBeneficiaryDetailsController::class, 'TrackBeneficiaryDetails'])
        ->name('track-beneficiary-details');


    Route::controller(CreateAssignOtherFormFieldController::class)->group(function () {
        Route::get('/create-dynamicformfield', 'createdynamicformfield')->name('create-dynamicformfield');
    });

    Route::get('/dynamic-form-page', [DynamicFormController::class, 'show'])->name('dynamic-form-page');

    Route::get('/master-tab', MasterTabManager::class)->middleware('permission.redirect:canMasterTab')->name('master-tab');
    Route::get('/tab-field-manager', SchemeTabFieldManager::class)->name('tab-field-manager');

    Route::get('/edit-validation', [ValidationManagerController::class, 'index'])->name('edit-validation');
    Route::get('/master-tab-creation', [MasterTabCreationController::class, 'index'])->name('master-tab-creation');

    Route::get('/schemes-final-submitted', [SchemeController::class, 'finalSubmitted'])->middleware('permission.redirect:canEntry')->name('schemes.final-submitted');

    Route::get('/duplicate-checks', [SchemeController::class, 'finalSubmitted'])->name('duplicate-checks');
    Route::get('/age-management', [SchemeController::class, 'finalSubmitted'])->name('age-management');

    Route::controller(workflowmanagementController::class)->group(function () {
        Route::any('/create-steps', 'createSteps')->name('create-steps');
        Route::any('/assign-workflow', 'assignWorkflow')->name('assign-workflow');
    });

    Route::get('/role-rank-management', RolerankManagement::class)->middleware('permission.redirect:canRoleRankManagement')->name('role-rank-management');

    Route::get('/define-workflow', [SchemeController::class, 'finalSubmitted'])->middleware('permission.redirect:canDefineWorkflow')->name('define-workflow');

    Route::get('/beneficiaries_selection', [BeneficiaryListController::class, 'index'])->name('beneficiaries_selection.index');

    Route::get('/report', [BeneficiaryListController::class, 'show'])->name('report.show');

    Route::any('draftedit', [SchemeController::class, 'draftedit'])->name('draftedit');

    Route::any('/custom_application', [SchemeController::class, 'applicationView'])->name('custom_application.view');



    Route::get('/scheme-capacity', [SchemeCapacityController::class, 'index'])->name('scheme-capacity');

    Route::get('/csv-splitter', CsvSplitter::class)->name('csv-splitter');

    Route::get('/form', [Formcontroller::class, 'index'])->middleware('permission.redirect:canEntry')->name('form');
    Route::get('application-lists', [Formcontroller::class, 'applicationLists'])->name('application-lists');
    Route::get('/define-workflow1', [workflowmanagementController::class, 'index'])->name('define-workflow1');



    // / Global Dynamic Workflow Routes
    Route::get('dynamic-workflow-config', WorkflowWizard::class)->middleware('permission.redirect:canDynamicWorkflowManagement')->name('dynamic-workflow-config');
    // Route::get('dynamic-workflow-request', RequestUpdateBeneficiary::class)->name('dynamic-workflow-request');
    // Route::get('dynamic-workflow-action', ProcessWorkflow::class)->name('dynamic-workflow-action');




    // Route::get('dynamic-workflow-request', RequestUpdateBeneficiary::class)->name('dynamic-workflow-request');
    // Route::get('dynamic-workflow-action', ProcessWorkflow::class)->name('dynamic-workflow-action');
    // Route::get('dynamic-process-workflow', DynamicProcessPage::class)->name('dynamic-process-workflow');

    Route::controller(UpdateMarkBeneficiaryDetailsController::class)->group(function () {
        Route::get('request-update-beneficiary', 'updateRequest')->name('request-update-beneficiary');
        Route::get('update-mark-beneficiary-details', 'index')->name('update-mark-beneficiary-details');
        Route::get('update-beneficiary-list', 'listdetails')->name('update-beneficiary-list');
    });

    // Route::get('caste-management', [CasteManagementController::class, 'index'])->name('caste-management');
    // Route::get('caste-management-request-list', [CasteManagementController::class, 'requestdedlistdetails'])->name('caste-management-request-list');
    // Route::get('/view-beneficiary-details', [CasteModificationController::class, 'viewAppDetails'])
    //     // ->middleware('permission.redirect:canBeneficiaryDetails')
    //     ->name('view-beneficiary-details');



    // Track Beneficiary Details
    Route::controller(TrackBeneficiaryDetailsController::class)->group(function () {
        Route::get('track-beneficiary-details', 'TrackBeneficiaryDetails')->name('track-beneficiary-details');
        Route::post('beneficiary-payment-history-log', 'BeneficiaryPaymentHistory')->name('beneficiary-payment-history-log');
        Route::post('beneficiary-details', 'BeneficiaryDetailslogs')->name('beneficiary-details');
    });

    Route::controller(AnnapurnaYojanaVerificationController::class)->group(function () {
        Route::get('annapurna-yojana-verification', 'verifierIndex')->name('annapurna-yojana-verification');
        Route::get('annapurna-yojana-verification/{family_id}', 'verifierDetails')->name('annapurna-yojana-verification.details');
        Route::get('annapurna-yojana-approval', 'approverIndex')->name('annapurna-yojana-approval');
        Route::get('annapurna-yojana-approval/{family_id}', 'approverDetails')->name('annapurna-yojana-approval.details');
    });
});
