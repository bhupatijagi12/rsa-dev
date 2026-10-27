<?php

namespace App\Models\Misreport;

use CodeIgniter\Model;
use App\Models\GAAProductsModel;
use App\Models\GAAProductPlanModel;
use App\Models\CustomizedDealerPlanModel;
use App\Models\Policy\WalletModel;

class MisModel extends Model
{
    protected $table = 'mis_report';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'login_type',
        'download_by',
        'download_date'
    ];

    

    /*public function exportPoliciesCsv($toDate, $fromDate)
{
    $db = \Config\Database::connect();
   	$misModel = new \App\Models\Misreport\MisModel();
    $policies = $db->table('policy_detail pd')
    ->select('
        pd.*,
        po.*,
        pn.*,
        pv.*,
        vv.variant_name as vehicle_model
    ')
    ->join('policy_owner_details po', 'po.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pn', 'pn.policy_id = pd.id', 'left')
    ->join('policy_vehicle_details pv', 'pv.policy_id = pd.id', 'left')
    ->join('vehicle_variants vv', 'vv.id = pv.variant_id', 'left')
    ->where("DATE(pd.created) BETWEEN '{$fromDate}' AND '{$toDate}'");

    if (session('login_type') == 1)
    {
    	$policies->where('login_id', session('dealer_id'));
    	 $misModel->insert([
	        'login_type'         => 1,
	        'download_by'         => session('dealer_id')
	    ]);
    } else 
    {
    	 $misModel->insert([
	        'login_type'         => 4,
	        'download_by'         => session('user_id')
	    ]);
    }

    $result = $policies->get()->getResultArray();

    $filename = 'mis_reports_' . date('YmdHis') . '.csv';

  
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

     if (!empty($result)) {

        // Remove duplicate columns from joined tables if required
        $headers = array_keys($result[0]);

        fputcsv($output, $headers);

        foreach ($result as $row) {
            fputcsv($output, $row);
        }
    }

    fclose($output);
    exit;
}*/



public function exportPoliciesCsv($toDate, $fromDate)
{
    $db = \Config\Database::connect();
    $misModel = new \App\Models\Misreport\MisModel();
    $gAAProductsModel = new \App\Models\GAAProductsModel();
    $gAAProductPlanModel = new \App\Models\GAAProductPlanModel();
    $walletModel = new \App\Models\Policy\WalletModel();
    $customizedDealerPlanModel = new \App\Models\CustomizedDealerPlanModel();


    $policies = $db->table('policy_detail pd')
    ->select('
        pd.*, pd.created as policy_issue_date,
        po.*,
        pn.*,
        pv.*,
        d.*, d.mobile as dealer_mobile, d.email as dealer_email, d.name as dealername, d.id as dealer_id
        ,vv.variant_name, vm.*, vmo.*, cm.*, s.*, cs.*, tds.*
    ')
    ->join('policy_owner_details po', 'po.policy_id = pd.id', 'left')
    ->join('policy_nominee_details pn', 'pn.policy_id = pd.id', 'left')
    ->join('policy_vehicle_details pv', 'pv.policy_id = pd.id', 'left')
    ->join('vehicle_makes vm', 'pv.make_id = vm.id', 'left')
    ->join('vehicle_models vmo', 'pv.model_id = vmo.id', 'left')
    ->join('vehicle_variants vv', 'pv.variant_id=vv.id', 'left')
     ->join('dealers d', 'pd.login_id = d.id', 'left')
     ->join('states s', 'po.state = s.id', 'left')
     ->join('city_master cm', 'po.city = cm.id', 'left')
     ->join('certificate_status cs', 'pd.status = cs.id')
     ->join('tds_calculation tds', 'pd.id = tds.policy_id')
    ->where("DATE(pd.created) BETWEEN '{$fromDate}' AND '{$toDate}'");

 /*  echo $policies->getCompiledSelect();
die;
*/
    if (session('login_type') == 1)
    {
        $policies->where('login_id', session('dealer_id'));
         $misModel->insert([
            'login_type'         => 1,
            'download_by'         => session('dealer_id')
        ]);
    } else 
    {
         $misModel->insert([
            'login_type'         => 4,
            'download_by'         => session('user_id')
        ]);
    }

    $result = $policies->get()->getResultArray();
 
    $filename = 'mis_reports_' . date('YmdHis') . '.csv';

  
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    $output = fopen('php://output', 'w');

     if (!empty($result)) {

        // Remove duplicate columns from joined tables if required
        //$headers = array_keys($result[0]);

       $headers = [
    'LANAccountNo','CertificateNo','PaymentReferenceNo','ChallanNo','EngineNo',
    'ChassisNo','RegistrationNo','Product','VehicleType','Make','Model','Variant',
    'Plan','PlanAmount','GST (18%)','TotalPlanAmount','FirstName','MiddleName',
    'LastName','CertificateIssueDate','CoverStartDate','CoverEndDate',
    'CustomerMobileNo','EmailID','PermanentAddress1','PermanentAddress2',
    'PermanentAddress3','PermanentLandmark','PermanentCity','PermanentState',
    'Pincode','PaymentMode','Bank','Branch','PaymentType','PayoutStatus',
    'LoginID','LoginName','DealerShare','GSTPayment','TDS','NetPaid',
    'DealerContact','PaymentMade_Y_N','PaymentDate','InvoiceReceived_Y_N',
    'IMDCODE','TieUpCompany','TransactionID','TransactionDateTime',
    'SubpaymentMode','PaymentStatus','CertificateStatus','InsuredGender',
    'InsuredDOB','NomineeName','NomineeGender','NomineeDOB',
    'NomineeRelationship','GSTINNumbar','OEMCode','AgentEmail','AgentName',
    'PId','PaymentRemarks','ProposerNameCI','ProposerGenderCI',
    'ProposerDOBCI','ProposerRelationshipCI','SumInsured',
    'InsuredPreExistingDisease','InsuredPreExistingDiseaseName',
    'CommisionPercentage','CommisionAmount','InsuredAge','NomineeAge',
    'APITransactionID','BalanceAmount','PayOutMode','FloatType',
    'Pay-OutStatus','CommissionCreditType','DealerRefNo','EndorsedDate',
    'EndorsedBy','CancelledDate','CancelledBy','EndorsementReason',
    'EndorsementRemark','Customer_Gender','Customer_DOB','Area_Pin_Code',
    'INS_Pre_GST','INS_GST','INS_Value'
        ];

        fputcsv($output, $headers);

        foreach ($result as $row) {
            $walletDetails = $walletModel->getWalletBalance($row['dealer_id']);
            //fputcsv($output, $row);
            if ($row['plan_category'] != 3 )
                {
                    $planDetails = $gAAProductPlanModel->getPlanDetails($row['plan_name']);
                    $planAmount = $planDetails['premium_ex_gst'];
                }
                else 
                {
                    $planDetails = $customizedDealerPlanModel->getPlanDetails($row['plan_name']);
                    $planAmount = $planDetails['plan_amount'];

                }
            fputcsv($output, [ '',
                $row['policy_no'], '', '', $row['engine_no'], $row['chassis_no'], $row['veh_reg_no'], '', $row['vehicle_category'], $row['make_name'], $row['model_name'], $row['variant_name'], $planDetails['product_name'], $planAmount, $row['gst'], $row['premium_ex_gst'], $row['firstname'], $row['middlename'], $row['lastname'], $row['policy_issue_date'], $row['certificate_start_date'], $row['certificate_end_date'], $row['mobile'], $row['email'], $row['address'], '', '', '', $row['city_name'], $row['state_name'], $row['pincode'], 'Wallet', '', '', '', $row['dealer_payment'], $row['dealer_code'], $row['name'], '', '', '', '', $row['dealer_mobile'],'', $row['policy_issue_date'], '', '', 'GAID', '', '', '', 'Wallet-Paid', $row['status_name'], $row['gender'], $row['dob'], $row['nominee_firstname']." ".$row['nominee_middlename']." ".$row['nominee_lastname'], $row['nominee_gender'], $row['nominee_dob'], $row['relationship'], '', '', $row['dealer_email'], $row['dealername'], '', '', '', '', '', '', '', 'NO', '', '', $row['commission_amount'],  $row['dob'], $row['nominee_dob'], '', $walletDetails, '', $row['dealer_payment'], $row['payment_mode'], 'Wallet', $row['dealer_id'], '', '', '', '', '', '', $row['gender'], $row['dob'], $row['pincode'], $row['premium_ex_gst'], $row['gst'], $row['premium_payable']  
,                
            ]);
        }
    }

    fclose($output);
    exit;
}



}