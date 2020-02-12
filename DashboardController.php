<?php
namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\VendorData;
use App\Models\DepartmentDataModel;
use App\Models\BasicDataModel;
use App\Models\StateDataModel;
use App\Models\OfficeDataModel;

use App\Models\BusinessDataModel;
use App\Models\SubscriptionModel;
use App\Models\CommentDataModel;

use Carbon\Carbon;
use Config;
class DashboardController extends FrontController
{
	public function Dashboard(Request $request)
	{
        $basic = array();
        $vendor_id = $request->session()->get('vendor_id');   
        $application_no = $request->session()->get('application_no');
        
        $where = array('application_no'=>$application_no);
        
        $instance = new VendorData();
        $vendor = $instance->getVendor(array('id'=>$vendor_id));
        $department_instance = new DepartmentDataModel(); 
        $departments = $department_instance->get(array('status'=>1));
        $basic_instance = new BasicDataModel();
        $basic = $basic_instance->get(array('bm.application_no'=>$application_no));
        $basicid = isset($basic->id)?$basic->id:0;
        $moreFactoryAddress = $basic_instance->getMoreData(array('bm.application_no'=>$application_no));
        $office_instance = new OfficeDataModel();
        $office = $office_instance->getData(array('oa.basic_id'=>$basicid));
        $state_instance = new StateDataModel();
        $states = $state_instance->get(array('status'=>1));
        
        if(isset($office[0])){
            $office = $office[0];
        }
        
        /* notifications */
        $instance = new BusinessDataModel();
        $business = $instance->getData($where);
        if(isset($business[0]->cspo_expire_date)){
            $end = Carbon::parse($business[0]->cspo_expire_date);
    
            $current_date = Carbon::parse(Config::get('constants.CURRENT_DATE'));
            $expireDays = $end->diffInDays($current_date);
            if($end<$current_date){
                $expireDays = '-'.$expireDays;
            }
            else{
                $expireDays++;
            }
        }
        else{
            $expireDays = null;
        }
        
        $instance = new SubscriptionModel();
        $subscriptions = $instance->getSubscription($vendor_id);
        $isExpired = 0;
        foreach($subscriptions as $key=>$val){
            if($val->application_no==$request->session()->get('application_no')&&$val->to_date<date('Y-m-d')){
                $isExpired = 1;
            }
        }
        
        $end = Carbon::now();
        $datetime1 = Carbon::parse($vendor->approve_reject_date);
        $days = $end->diffInDays($datetime1);
        if($vendor->is_approved==2){
            $rejection_alert = REJECTION_PERIOD-$days;
        }
        else{
            $rejection_alert = 0;
        }
        /* end notifications */
        
        /* comments */
        $comments_instance = new CommentDataModel();
        $comments = $comments_instance->getData(array('application_no'=>$application_no));
        
        //echo '<pre>';print_r($comments);exit;
        return view('Dashboard',['vendor'=>$vendor,'basic'=>$basic,'moreFactoryAddress'=>$moreFactoryAddress,'office'=>$office,'departments'=>$departments,'basic'=>$basic,'states'=>$states  ,'expireDays'=>$expireDays,'isExpired'=>$isExpired,'rejection_alert'=>$rejection_alert  ,'comments'=>$comments]);
	}
    
    public function addMoreFacotryAddress(Request $request){
        $state_instance = new StateDataModel();
        $states = $state_instance->get(array('status'=>1));
        return view('ajax.moreFactoryAddress',['states'=>$states,'count'=>$request->count]);
    }
    
}