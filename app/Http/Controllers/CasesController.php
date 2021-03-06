<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CaseRequest;
use App\Http\Requests\CaseRequestH;
use App\Http\Requests\CreateCaseRequest;
use App\Http\Controllers\Controller;
use App\CaseReport;
use App\CaseStatus;
use App\CaseOwner;
use App\User;
use App\UserRole;
use App\addressbook;
use App\CaseEscalator;
use App\CaseActivity;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\CaseResponder;
use App\CriticalTeam;
use App\Language;
use App\Province;
use App\District;
use App\Municipality;
use App\Ward;
use App\CasePriority;
use App\Title;
use App\CaseRelated;
use App\CasePoi;
use App\Poi;
use App\PoiAssociate;
use App\UserNew ; 


class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {

        $myCases    = CaseOwner::where('user','=',\Auth::user()->id)
                             ->get();

        $otherCases = CaseReport::where('user','=',\Auth::user()->id)
                             ->get();
        $caseIds    = array();


        foreach ($myCases as $case) {

            $caseIds[] = $case->case_id;
        }

        foreach ($otherCases as $caseOld) {

            $caseIds[] = $caseOld->id;
        }

        $caseIds     = array_unique($caseIds);
        $userRoleObj = UserRole::find(\Auth::user()->role);


        if ( $userRoleObj->name == 'Admin') {


              $cases = \DB::table('cases')
                ->join('cases_owners', 'cases.id', '=', 'cases_owners.case_id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->join('cases_types', 'cases.case_type', '=', 'cases_types.id')
                ->where('cases_statuses.name','=','Allocated')
                ->orWhere('cases_statuses.name','=','Referred')
                ->select(
                            \DB::raw("
                                        cases.id,
                                        cases.created_at,
                                        cases.description,
                                        cases_statuses.name as CaseStatus,
                                        cases_owners.accept,
                                        cases_sources.name as source,
                                        cases_types.name as case_type,
                                        cases_owners.type"
                                        )
                        )
                ->groupBy('cases.id');

        }
        else {

             if ( $userRoleObj->name == 'Call Centre Agent' ) {


                $cases = \DB::table('cases')
                ->join('cases_owners', 'cases.id', '=', 'cases_owners.case_id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Allocated')
                ->orWhere('cases_statuses.name','=','Referred')
                ->where('cases.user','=',\Auth::user()->id)
                ->select(
                            \DB::raw("
                                        cases.id,
                                        cases.created_at,
                                        cases.description,
                                        cases_statuses.name as CaseStatus,
                                        cases_owners.accept,
                                        cases_sources.name as source,
                                        cases_owners.type"
                                        )
                        )
                ->groupBy('cases.id');

             }
             else {

                $cases = \DB::table('cases')
                ->join('cases_owners', 'cases.id', '=', 'cases_owners.case_id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->whereIn('cases.id',$caseIds)
                ->where('cases_statuses.name','<>','Pending Closure')
                ->where('cases_statuses.name','<>','Resolved')
                ->select(\DB::raw(
                                    "
                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_statuses.name as CaseStatus,
                                    cases_owners.accept,
                                    cases_sources.name as source,
                                    cases_owners.type"
                                )
                        )
                ->groupBy('cases.id');


             }

        }


        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);
    }


    public function requestCaseClosureList()
    {



        $userRoleObj = UserRole::find(\Auth::user()->role);


        if ( $userRoleObj->name == 'Admin' || $userRoleObj->name == 'Call Centre Agent') {



            $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Pending Closure')
                ->select(
                            \DB::raw("

                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_sources.name as source,
                                    cases_statuses.name as status"
                                    )
                        );




            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);
        }
        else {

            $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Pending Closure')
                ->where('user','=',\Auth::user()->id)

                ->select(
                            \DB::raw("

                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_sources.name as source,
                                    cases_statuses.name as status"
                                    )
                        );



            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);

        }


    }


    public function resolvedCasesList()
    {

        $userRoleObj = UserRole::find(\Auth::user()->role);

        if ( $userRoleObj->name == 'Admin' || $userRoleObj->name == 'Call Centre Agent') {

                $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Resolved')
                ->select(
                            \DB::raw("

                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_sources.name as source,
                                    cases_statuses.name as status"
                                    )
                        );

        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);
        }
        else {


            $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Resolved')
                                ->where('user','=',\Auth::user()->id)

                ->select(
                            \DB::raw("

                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_sources.name as source,
                                    cases_statuses.name as status"
                                    )
                        );




            return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);

        }
    }

    public function pendingReferralCasesList()
    {


        $userRoleObj = UserRole::find(\Auth::user()->role);

        if ($userRoleObj->name == 'Admin') {



            $cases = \DB::table('cases')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                ->where('cases_statuses.name','=','Pending')
                ->select(
                            \DB::raw("

                                    cases.id,
                                    cases.created_at,
                                    cases.description,
                                    cases_sources.name as source,
                                    cases_statuses.name as CaseStatus"
                                    )
                        );


        } else {


            $cases = \DB::table('cases')
                        ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                        ->join('cases_sources', 'cases.source', '=', 'cases_sources.id')
                        ->where('cases_statuses.name','=','Pending')
                        ->where('cases.agent','=',\Auth::user()->id )
                        ->select(
                                    \DB::raw("

                                            cases.id,
                                            cases.created_at,
                                            cases.description,
                                            cases_sources.name as source,
                                            cases_statuses.name as CaseStatus"
                                            )
                                );


        }




        return \Datatables::of($cases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}},1);" data-target=".modalCase">View</a>')
                            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function acceptCase($id)
    {

         $caseOwnerObj = CaseOwner::where("case_id",'=',$id)
                                   ->where("user",'=',\Auth::user()->id)
                                   ->first();

         $numberCases   = CaseReport::where('user','=',\Auth::user()->id)->get();



        if (sizeof($caseOwnerObj) > 0)
        {
            $caseOwnerObj->accept = 1;
            $caseOwnerObj->save();
            $caseActivity              = New CaseActivity();
            $caseActivity->case_id      = $id;
            $caseActivity->user        = \Auth::user()->id;
            $caseActivity->addressbook = 0;
            $caseActivity->note        = "Case Accepted by ".\Auth::user()->name.' '.\Auth::user()->surname;
            $caseActivity->save();

            $case = CaseReport::find($id);
            if($case->status == "Pending") {
                $case->status      = "Actioned";
                $case->accepted_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                $case->save();
            }

            $caseOwners = CaseOwner::where("case_id",'=',$id)
                                     ->where("user","<>",\Auth::user()->id)
                                     ->get();

            foreach ($caseOwners as $owner) {

                if ($owner->addressbook == 1) {

                    $user = AddressBook::find($owner->user);

                }
                else {

                    $user = User::find($owner->user);


                }

                $data = array(
                                    'name'   =>$user->name,
                                    'caseID' =>$id,
                                    'acceptedBy' => \Auth::user()->name.' '.\Auth::user()->surname,
                                );


                \Mail::send('emails.acceptCase',$data, function($message) use ($user)
                {
                    $message->from('info@siyaleader.net', 'Siyaleader');
                    $message->to($user->username)->subject("Siyaleader Notification - New Case Accepted: ");

               });

            }



        }

            return "ok";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function captureCase(Request $request)
    {

     
      $repId       = 0;
      $addressbook = 0;
        
        if(!$request['repID']){


                $user                = new User();
                $user->role          = 5;
                $user->title         = 1;
                $user->language      = 1;
                $user->gender        = 1;
                $user->name          = $request['name'];
                $user->surname       = $request['surname'];
                $user->cellphone     = $request['mobile'];
                $user->email         = $request['name'].$request['surname']."siyaleader.co.za";
                $user->active        = 2;              
                $user->province      = $request['province'];
                $user->district      = $request['district'];
                $user->municipality  = $request['municipality'];
                $user->ward          = $request['ward'];
                $user->position      = 3;
                $password            = rand(1000,99999);
                $user->password      = \Hash::make($password);
                $user->area          = $request['area'];
                $user->api_key       = uniqid();
                $user->created_by    = \Auth::user()->id;
                $user->save();

                $repId = $user->id;



        

        } else {

             $repId  = $request['repID'];

        }

        $description = trim(preg_replace('/\s\s+/', ' ', $request['description']));

     


        $gps                           = explode(",",$request['GPS']);
        $case                          = new CaseReport();
        $case->description             = $description;
        $case->user                    = "";
        $case->province                = $request['province'];
        $case->district                = $request['district'];
        $case->municipality            = $request['municipality'];
        $case->ward                    = $request['ward'];
        $case->area                    = $request["area"];
        $case->status                  = 1;
        $case->gps_lat                 = $gps[0];
        $case->gps_lng                 = $gps[1];
        $case->addressbook             = 0;
        $case->reporter                = $repId;
        $case->source                  = 3;
        $case->active                  = 1;
        $case->house_holder_id         = 1;
        $case->case_type               = $request['case_type'];
        $case->case_sub_type           = $request['case_sub_type'];
        $case->saps_case_number        = "scscs";
        $case->client_reference_number = "test";
        
        $case->save();
        
        
        



/*
        $reporter     = $request['caseReporter'];
        $caseSeverity = $request['caseSeverity'];
        $userObj      = User::where('username','=',$reporter)->first();


        if(sizeof($userObj) <= 0 )
        {
            $userAddressbookObj = addressbook::where('email','=',$reporter)->first();
        }

        $user        = (sizeof($userObj) <= 0)? $userAddressbookObj->id:$userObj->id;
        $addressbook = (sizeof($userObj) <= 0)? 1:0;
        $userName    = (sizeof($userObj) <= 0)? $userAddressbookObj->FirstName:$userObj->name;
        $userSurname = (sizeof($userObj) <= 0)? $userAddressbookObj->Surname:$userObj->surname;
        $userEmail   = (sizeof($userObj) <= 0)? $userAddressbookObj->email:$userObj->username;
        $cell        = (sizeof($userObj) <= 0)? $userAddressbookObj->cellphone:$userObj->email;


        $caseDescription   = $request['caseDescription'];
        $precinctObj       = Municipality::where('slug','=',$request['caseMunicipality'])->first();
        $categoryObj       = Category::where('slug','=',$request['caseCategory'])->first();
        $subCategoryObj    = SubCategory::where('slug','=',$request['caseSubCategory'])->first();

        if($request['caseSubSubCategory'] > 0)
        {
            $subSubCategoryObj = SubSubCategory::where('slug','=',$request['caseSubSubCategory'])->first();
            $subSubCategory    = $subSubCategoryObj->id;
        }
        else{

            $subSubCategory    = 0;
        }


       $gps                       = explode(",",$request['GPS']);
       $caseObj                   = new CaseReport();
       $caseObj->description      = htmlentities($caseDescription);
       $caseObj->user             = \Auth::user()->id;
       $caseObj->reporter         = $user;
       $caseObj->addressbook      = $addressbook;
       $caseObj->precinct         = $precinctObj->id;
       $caseObj->category         = $categoryObj->id;
       $caseObj->sub_category     = $subCategoryObj->id;
       $caseObj->sub_sub_category = $subSubCategory;
       $caseObj->gps_lat          = $gps[0];
       $caseObj->gps_lng          = $gps[1];
       $caseObj->severity         = $caseSeverity;
       $caseObj->status           = "Pending";
       $caseObj->save();

       $data = array(
                'name'      =>$userName,
                'caseID'    =>$caseObj->id,
                'caseDesc'  =>$caseObj->description
        );

        $caseOwner              = new CaseOwner();
        $caseOwner->user        = $user;
        $caseOwner->case_id      = $caseObj->id;
        $caseOwner->type        = 0;
        $caseOwner->active      = 1;
        $caseOwner->save();


        \Mail::send('emails.sms',$data, function($message) use ($userEmail) {
            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($userEmail)->subject("Siyaleader Notification - New Case Reported:");

        });

        if ($caseSeverity <= 4) {

               $severityData = array(
                    'severity'  => $caseObj->severity ,
                    'name'      => $userName .' '.$userSurname,
                    'cell'      => $cell,
                    'category'  => $categoryObj->name,
                    'caseId'    => $caseObj->id
                );

                \Mail::send('emails.severity',$severityData, function($message) {

                    $message->from('info@siyaleader.net', 'Siyaleader');
                    $message->to('gavin@squeakytakkie.co.za')->subject("SEVERE");

                });


                $criticalTeam = CriticalTeam::all();

                foreach ($criticalTeam as $critical) {

                        $caseOwner         = new CaseOwner();
                        $caseOwner->user   = $critical->user;
                        $caseOwner->case_id = $caseObj->id;
                        $caseOwner->type   = 5;//Critical Team
                        $caseOwner->active = 1;
                        $caseOwner->save();

                        \Mail::send('emails.severity',$severityData, function($message) use ($critical) {

                            $userObj = User::find($critical->user);
                            $message->from('info@siyaleader.net', 'Siyaleader');
                            $message->to($userObj->username)->subject("Siyaleader Notification - New Severe Case Reported:");

                        });

                }


        }


            if ($subSubCategory > 0)
            {
                 $subSubCatResponders = CaseResponder::where('sub_sub_category','=',$subSubCategory)->first();


                    if (sizeof($subSubCatResponders) > 0)
                    {

                        if($subSubCatResponders->firstResponder)
                        {
                            $firstResponderUser = User::find($subSubCatResponders->firstResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->firstResponder ;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 1;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                             $data = array(
                                    'name'   =>$firstResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                                );


                            \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($firstResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subSubCatResponders->secondResponder)
                        {
                            $secondResponderUser = User::find($subSubCatResponders->secondResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->secondResponder;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 2;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$secondResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($secondResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($secondResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subSubCatResponders->thirdResponder)
                        {
                            $thirdResponderUser = User::find($subSubCatResponders->thirdResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subSubCatResponders->thirdResponder;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 3;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$thirdResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($thirdResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($thirdResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }
                    }
            }


            if ($subSubCategory == 0)
            {



                  $subCatResponders = CaseResponder::where('sub_category','=',$subCategoryObj->id)->first();


                    if (sizeof($subCatResponders) > 0)
                    {

                        if($subCatResponders->firstResponder)
                        {
                            $firstResponderUser = User::find($subCatResponders->firstResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->firstResponder ;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 1;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                             $data = array(
                                    'name'   =>$firstResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                                );


                            \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($firstResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subCatResponders->secondResponder)
                        {
                            $secondResponderUser = User::find($subCatResponders->secondResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->secondResponder;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 2;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$secondResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($secondResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($secondResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }

                        if($subCatResponders->thirdResponder)
                        {
                            $thirdResponderUser = User::find($subCatResponders->thirdResponder);
                            $caseOwner         = new CaseOwner();
                            $caseOwner->user   = $subCatResponders->thirdResponder;
                            $caseOwner->case_id = $caseObj->id;
                            $caseOwner->type   = 3;
                            $caseOwner->active = 1;
                            $caseOwner->save();

                            $data = array(
                                    'name'   =>$thirdResponderUser->name,
                                    'caseID' =>$caseObj->id,
                                    'caseDesc' => $caseObj->description,
                                    'caseReporter' => $caseObj->description,
                            );


                            \Mail::send('emails.responder',$data, function($message) use ($thirdResponderUser)
                            {
                                $message->from('info@siyaleader.net', 'Siyaleader');
                                $message->to($thirdResponderUser->username)->subject("Siyaleader Notification - New Case Reported:");

                           });
                        }
                }











            }*/

               return redirect()->back();

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function escalate(Request $request)
    {

        $addresses     = explode(',',$request['addresses']);
		
		
        $caseOwners    = CaseOwner::where('case_id','=',$request['caseID'])->get();
		
        $typeMessage   = ($request['modalType'] == 'Allocate')? 'allocated' : 'referred';
		dd($caseOwners);
        $typeStatus    = ($request['modalType'] == 'Allocate')? 'Allocated' : 'Referred';


        foreach ($caseOwners as $caseOwner) {


 



          $user =  UserNew::where('id', '=', 29)->get()->first();

			
            $data = array(

                'name'          => $user->name,
                'caseID'        => $request['caseID'],
                'content'       => $request['message'],
                'executor'      => \Auth::user()->name.' '.\Auth::user()->surname,
            );


            \Mail::send('emails.caseEscalation',$data, function($message) use ($user)
            {
                $message->from('info@Redfros.net', 'Siyaleader');
                $message->to($user->email)->subject("Redfrogs  Notification - Case Referred: " );

            });

        }


        foreach ($addresses as $address) {

            $user = User::where('email','=',$address)->first();

            if(sizeof($user) <= 0 )
            {
                 $userAddressbook = addressbook::where('email','=',$address)->first();
            }

            $name        = (sizeof($user) <= 0)? $userAddressbook->first_name:$user->name;
            $surname     = (sizeof($user) <= 0)? $userAddressbook->surname:$user->surname;
            $to          = (sizeof($user) <= 0)? $userAddressbook->id:$user->id;
            $type        = (sizeof($user) <= 0)? 1:0;
            $addressbook = (sizeof($user) <= 0)? 1:0;
            $cellphone   = (sizeof($user) <= 0)? $userAddressbook->surname:$user->cellphone;

            $data = array(
                'name'       => $name,
                'caseID'     => $request['caseID'],
                'content'    => $request['message'],
                'typeStatus' => $request['typeStatus']
            );


            $caseActivity              = New CaseActivity();
            $caseActivity->case_id     = $request['caseID'];
            $caseActivity->user        = $to;
            $caseActivity->addressbook = $addressbook;
            $caseActivity->note        = "Case ".$typeMessage." to ".$name ." ".$surname." by ".\Auth::user()->name.' '.\Auth::user()->surname;
            $caseActivity->save();

            $caseEscalationObj          = New CaseEscalator();
            $caseEscalationObj->case_id = $request['caseID'];
            $caseEscalationObj->from    = \Auth::user()->id;
            $caseEscalationObj->to      = $to;
            $caseEscalationObj->type    = $type;
            $caseEscalationObj->message = $request['message'];
            $caseEscalationObj->save();

            $caseOwnerObj              = New CaseOwner();
            $caseOwnerObj->case_id     = $request['caseID'];
            $caseOwnerObj->user        = $to;
            $caseOwnerObj->type        = 4 ;
            $caseOwnerObj->addressbook = $addressbook;
            $caseOwnerObj->save();

            if ($typeStatus == 'Allocated') {

                $objCase                   = CaseReport::find($request['caseID']);
                $objCaseStatus             = CaseStatus::where('name','=',$typeStatus)->first();
                $objCase->allocated_at     = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                $objCase->status           = $objCaseStatus->id;
                $objCase->save();

            } else {

                $objCase                   = CaseReport::find($request['caseID']);
                $objCaseStatus             = CaseStatus::where('name','=',$typeStatus)->first();
                $objCase->referred_at      = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                $objCase->status           = $objCaseStatus->id;
                $objCase->save();


            }


            \Mail::send('emails.caseEscalated',$data, function($message) use ($address,$typeStatus)
            {
                $message->from('info@Redfrogs.net', 'Siyaleader');
                $message->to($address)->subject("Redfrogs Notification - Case $typeStatus: " );

            });

            \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone) {
                $message->from('info@Redfros.net', 'Siyaleader');
                $message->to('cooluma@siyaleader.net')->subject("REFER: $cellphone" );

            });




        }

      //  dd(['status' => 'ok', 'typeStatus' => $typeStatus]);
        //return "ok";
		  return response()->json(['status' => 'ok', 'typeStatus' => $typeStatus]);

    }


    public function addCasePoi(Request $request)
    {

        $contacts     = explode(',',$request['pois']);
        foreach ($contacts as $contact) {

            $poi = Poi::where('email','=',$contact)->first();


            $casepoi              = New CasePoi();
            $casepoi->case_id     = $request['caseID'];
            $casepoi->poi_id      = $poi->id;
            $casepoi->save();

        }

        return response()->json(['status' => 'ok']);

    }

     public function addAssociatePoi(Request $request)
    {

        $contacts     = explode(',',$request['pois']);
        foreach ($contacts as $contact) {

            $poi = Poi::where('email','=',$contact)->first();


            $assocatepoi                   = New PoiAssociate();
            $assocatepoi->associate_id     = $poi->id;
            $assocatepoi->poi_id           = $request['poiID'];
            $assocatepoi->save();

        }

        return response()->json(['status' => 'ok']);

    }

    public function list_case_poi($id)
    {

        $casePois = \DB::table('cases_poi')->where('case_id','=',$id)
                        ->join('poi','poi.id','=','cases_poi.poi_id')
                        ->select(array('poi.id','poi.name','poi.surname'));

        return \Datatables::of($casePois)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchCaseModal({{$id}});" data-target=".modalCase">View</a>'
                                       )
                            ->make(true);
    }

    public function allocate(Request $request){

        $responders     = $request['responders'];
        $department     = $request['department'];
        $category       = $request['category'];
        $subCategory    = $request['sub_category'];
        $subSubCategory = $request['sub_sub_category'];

        foreach ($responders as $responder) {

            $caseOwner          = new CaseOwner();
            $caseOwner->case_id = $request['caseID'];
            $caseOwner->user    = $responder;
            $caseOwner->type    = 1;
            $caseOwner->save();

            $user  = User::find($responder);

            $caseActivity              = New CaseActivity();
            $caseActivity->case_id     = $request['caseID'];
            $caseActivity->user        = $user->id;
            $caseActivity->addressbook = 0;
            $caseActivity->note        = "Case Referred to ".$user->name ." ".$user->surname." by ".\Auth::user()->name.' '.\Auth::user()->surname;
            $caseActivity->save();


            $email     = $user->email;
            $cellphone = $user->cellphone;
            $case  = CaseReport::find($request['caseID']);

            $data = array(
                'name'    => $user->name,
                'caseID'  => $request['caseID'],
                'content' => $case->description
            );

            \Mail::send('emails.caseEscalated',$data, function($message) use ($email) {
                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($email)->subject("Siyaleader Notification - Case Referred: " );

            });

            \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone) {
                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to('cooluma@siyaleader.net')->subject("REFER: $cellphone" );

            });


        }

        $objDept      = Department::where('slug','=',$department)->first();
        $objCat       = Category::where('slug','=',$category)->first();
        $objSubCat    = SubCategory::where('slug','=',$subCategory)->first();


         if (strlen($subSubCategory) > 1) {
            $objSubSubCat   = SubSubCategory::where('slug','=',$subSubCategory)->first();
            $objSubSubCatId = $objSubSubCat->id;
         }
         else {
            $objSubSubCatId = 0;
         }

        $objCase                   = CaseReport::find($request['caseID']);
        $objCaseStatus             = CaseStatus::where('name','=','Referred')->first();
        $objCase->status           = $objCaseStatus->id;
        $objCase->department       = $objDept->id;
        $objCase->category         = $objCat->id;
        $objCase->sub_category     = $objSubCat->id;
        $objCase->sub_sub_category = $objSubSubCatId;
        $objCase->referred_at      = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $objCase->updated_by       = \Auth::user()->id;
        $objCase->save();


        return 'ok';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function closeCase($id)
    {

      $case = CaseReport::find($id);
      $case->status      = "Resolved";
      $case->resolved_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
      $case->save();

      $caseActivity              = New CaseActivity();
      $caseActivity->case_id      = $id;
      $caseActivity->user        = \Auth::user()->id;
      $caseActivity->addressbook = 0;
      $caseActivity->note        = \Auth::user()->name.' '.\Auth::user()->surname ." closed case";
      $caseActivity->save();

      $data = array (
                            'name'      => \Auth::user()->name,
                            'caseID'    => $id,
                            'content'   => $case->description,
                            'executor'  => \Auth::user()->name.' '.\Auth::user()->surname,
                    );

      $user   = User::find($case->reporter);

       if(sizeof($user) <= 0 ) {

           $userAddressbook = addressbook::where('id','=',$case->reporter)->first();
       }

       $email  = (sizeof($user) <= 0)? $userAddressbook->email : $user->username;

      \Mail::send('emails.caseClosed',$data, function($message) use ($email) {

            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($email)->subject("Siyaleader Notification - Case Closed: " );

        });

       return "ok";

    }


    public function requestCaseClosure(Request $request)
    {
        $case = CaseReport::find($request['caseID']);
        $case->status = "Pending Closure";
        $case->save();

        $caseActivity              = New CaseActivity();
        $caseActivity->case_id      = $request['caseID'];
        $caseActivity->user        = \Auth::user()->id;
        $caseActivity->addressbook = 0;
        $caseActivity->note        = \Auth::user()->name.' '.\Auth::user()->surname ." requested case closure";
        $caseActivity->save();

        $caseAdministrators    = User::where('role','=',1)
                                    ->orWhere('role','=',3)
                                    ->get();


        foreach ($caseAdministrators as $caseAdmin) {


             $data = array(
                            'name'      => $caseAdmin->name,
                            'caseID'    => $case->id,
                            'content'   => $case->description,
                            'note'      => $request['caseNote'],
                            'requestor' => \Auth::user()->name.' '.\Auth::user()->surname,
                            );


            \Mail::send('emails.requestCaseClosure',$data, function($message) use ($caseAdmin) {

                $message->from('info@siyaleader.net', 'Siyaleader');
                $message->to($caseAdmin->username)->subject("Siyaleader Notification - Request for Case Closure: " );

            });

        }


        return "Case Closed";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $destinationFolder = 'files/case_'.$id;

        if(!\File::exists($destinationFolder)) {
             $createDir         = \File::makeDirectory($destinationFolder,0777,true);
        }

        $caseObj = \DB::table('cases')
                        ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                        ->where('cases.id','=',$id)
                        ->select(\DB::raw( "
                                    cases.id,
                                    cases.case_sub_type,
                                    cases.case_type,
                                    cases.house_holder_id,
                                    cases_statuses.name as status
                                   "
                            ))

                        ->first();

        if ($caseObj->status == 'Pending'  && $caseObj->house_holder_id == 0) {

            $case = \DB::table('cases')
                        ->join('cases_statuses','cases.status','=','cases_statuses.id')
                        ->where('cases.id','=',$id)
                        ->select(\DB::raw( "
                                    cases.id,
                                    cases.description,
                                    cases.created_at,
                                    cases.img_url,
                                    cases.reporter as reporteID,
                                    cases.house_holder_id,
                                    cases.saps_case_number,
                                    cases.client_reference_number,
                                    cases_statuses.name as status,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as household,
                                    (select `created_at` from `cases_activities` where `case_id` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as householdCell
                                   "
                            )
                        )
                        ->get();
        }


    if ($caseObj->status == 'Pending'  && $caseObj->house_holder_id > 0) {


            $case = \DB::table('cases')
                        ->join('cases_statuses','cases.status','=','cases_statuses.id')
                        ->join('cases_types','cases.case_type','=','cases_types.id')
                        ->join('cases_sub_types','cases.case_sub_type','=','cases_sub_types.id')
                        ->where('cases.id','=',$id)
                        ->select(\DB::raw( "
                                    cases.id,
                                    cases.description,
                                    cases.created_at,
                                    cases.img_url,
                                    cases.reporter as reporteID,
                                    cases.house_holder_id,
                                    cases.saps_case_number,
                                    cases.client_reference_number,
                                    cases_statuses.name as status,
                                    cases_types.name as case_type,
                                    cases_sub_types.name as case_sub_type,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as household,
                                    (select `created_at` from `cases_activities` where `case_id` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as householdCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `client_reference_number` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as reference_number
                                   "
                            )
                        )
                        ->get();
        }


    if ($caseObj->status != 'Pending' ) {


            if ($caseObj->case_sub_type > 0) {


                $case = \DB::table('cases')
                        ->join('cases_statuses','cases.status','=','cases_statuses.id')


                        ->join('cases_types', 'cases.case_type', '=', 'cases_types.id')
                        ->join('cases_sub_types', 'cases.case_sub_type', '=', 'cases_sub_types.id')

                        ->where('cases.id','=',$id)
                        ->select(\DB::raw( "
                                    cases.id,
                                    cases.description,
                                    cases.created_at,
                                    cases.img_url,
                                    cases.reporter as reporteID,
                                    cases.house_holder_id,
                                    cases.saps_case_number,
                                    cases.client_reference_number,
                                    cases_statuses.name as status,
                                    cases_types.name as case_type,
                                    cases_sub_types.name as case_sub_type,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as household,
                                    (select `created_at` from `cases_activities` where `case_id` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as householdCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `client_reference_number` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as reference_number
                                   "
                            ))->get();



            } else {


                    $case = \DB::table('cases')
                        ->join('cases_statuses','cases.status','=','cases_statuses.id')


                        ->join('cases_types', 'cases.case_type', '=', 'cases_types.id')


                        ->where('cases.id','=',$id)
                        ->select(\DB::raw( "
                                    cases.id,
                                    cases.description,
                                    cases.created_at,
                                    cases.img_url,
                                    cases.reporter as reporteID,
                                    cases.house_holder_id,
                                    cases.saps_case_number,
                                    cases.client_reference_number,
                                    cases_statuses.name as status,
                                    cases_types.name as case_type,

                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporter,
                                    IF(`cases`.`addressbook` = 1,(SELECT CONCAT(`first_name`, ' ', `surname`) FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT CONCAT(users.`name`, ' ', users.`surname`) FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as household,
                                    (select `created_at` from `cases_activities` where `case_id` = `cases`.`id` order by `created_at` desc limit 1) as last_at,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`reporter`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`reporter`)) as reporterCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `cellphone` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as householdCell,
                                    IF(`cases`.`addressbook` = 1,(SELECT `cellphone` FROM `addressbook` WHERE `addressbook`.`id`= `cases`.`house_holder_id`), (SELECT `client_reference_number` FROM `users` WHERE `users`.`id`= `cases`.`house_holder_id`)) as reference_number
                                   "
                            ))->get();




            }


        }



        return $case;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function captureCaseUpdate(CaseRequest $request)
    {

        $userRole           = UserRole::where('name','=','House Holder')->first();
        $user               = New User();
        $user->role         = $userRole->id;
        $user->name         = $request['name'];
        $user->surname      = $request['surname'];
        $user->cellphone    = $request['cellphone'];
        $user->id_number    = $request['id_number'];
        $user->position     = $request['position'];
        $title              = Title::where('slug','=',$request['title'])->first();
        $user->title        = $title->id;
        $user->gender       = $request['gender'];
        $user->dob          = $request['dob'];
        $user->house_number = $request['house_number'];
        $user->email        = $request['cellphone']."@siyaleader.net";
        $user->created_by   = \Auth::user()->id;
        $language           = Language::where('slug','=',$request['language'])->first();
        $user->language     = $language->id;
        $province           = Province::where('slug','=',$request['province'])->first();
        $user->province     = $province->id;
        $district           = District::where('slug','=',$request['district'])->first();
        $user->district     = $district->id;
        $municipality       = Municipality::where('slug','=',$request['municipality'])->first();
        $user->municipality = $municipality->id;
        $ward               = Ward::where('slug','=',$request['ward'])->first();
        $user->ward         = $ward->id;
        $user->save();
        $casePriority          = CasePriority::where('slug','=',$request['priority'])->first();
        $case                  = CaseReport::find($request['caseID']);
        $case->description     = $request['description'];
        $case->priority        = $casePriority->id;
        $case->province        = $user->province;
        $case->district        = $user->district;
        $case->municipality    = $user->municipality;
        $case->ward            = $user->ward;
        $case->area            = $user->area;
        $case->house_holder_id = $user->id;
        $case->updated_by      = \Auth::user()->id;
        $case->updated_at      = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $case->save();


        return 'ok';

    }

    public function captureCaseUpdateH(CaseRequestH $request) {

        $casePriority          = CasePriority::where('slug','=',$request['priority'])->first();
        $houseHolderObj        = User::find($request['hseHolderId']);
        $case                  = CaseReport::find($request['caseID']);
        $case->province        = $houseHolderObj->province;
        $case->district        = $houseHolderObj->district;
        $case->municipality    = $houseHolderObj->municipality;
        $case->ward            = $houseHolderObj->ward;
        $case->area            = $houseHolderObj->area;
        $case->description     = $request['description'];
        $case->priority        = $casePriority->id;
        $case->updated_by      = \Auth::user()->id;
        $case->house_holder_id = $request['hseHolderId'];
        $case->updated_at      = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $case->save();

        return 'ok';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function create(CreateCaseRequest $request)
    {

            $case = CaseReport::find($request['caseID']);
            $newCase                  = New CaseReport();
            $newCase->created_at      = $case->created_at;
            $newCase->user            = $case->user;
            $newCase->priority        = $case->priority;
            $newCase->status          = 1;
            $newCase->description     = $request['description'];
            $newCase->province        = $case->province;
            $newCase->district        = $case->district;
            $newCase->municipality    = $case->municipality;
            $newCase->ward            = $case->ward;
            $newCase->area            = $case->area;
            $newCase->addressbook     = $case->addressbook;
            $newCase->source          = 3;
            $newCase->active          = 1;
            $newCase->house_holder_id = $case->house_holder_id;
            $newCase->agent           = $case->agent;
            $newCase->save();

            $relatedCase              = New CaseRelated();
            $relatedCase->parent      = $request['caseID'];
            $relatedCase->child       = $newCase->id;
            $relatedCase->created_by  = \Auth::user()->id;
            $relatedCase->created_at  = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
            $relatedCase->save();


            $response["message"]      = "Case created successfully";
            $response["error"]        = FALSE;
            $response["caseID"]       = $request['caseID'];


            return \Response::json($response,201);


    }

    function workflow($id) {



      $case = CaseReport::find($id);
      $workflows = \DB::table('workflows')
                ->where('sub_category_id','=',$case->sub_category)
                ->select(
                            \DB::raw("
                                        workflows.id,
                                        workflows.name,
                                        workflows.sub_category_id,
                                        workflows.order,
                                        workflows.created_by,
                                        workflows.updated_by,
                                        workflows.active
                                    "
                                        )
                        )
                ->groupBy('workflows.id');

        return \Datatables::of($workflows)
                            ->make(true);


    }

    function createCaseAgent(Request $request) {

        $house_holder_id = 0;


        if (empty($request['house_holder_id'] )) {

                $userRole           = UserRole::where('name','=','Client')->first();
                $user               = New User();
                $user->role         = $userRole->id;
                $user->name         = $request['name'];
                $user->surname      = $request['surname'];
                $user->cellphone    = $request['cellphone'];
                $title              = Title::where('slug','=',$request['title'])->first();
                $user->title        = $title->id;
                $user->client_reference_number = $request['client_reference_number'];
                $user->email        = $request['cellphone']."@siyaleader.net";
                $user->created_by   = \Auth::user()->id;
                $language           = Language::where('slug','=',$request['language'])->first();
                $user->language     = $language->id;
                $user->save();

                $house_holder_id    = $user->id;

            }

                $house_holder_id          = ($house_holder_id == 0)? $request['house_holder_id'] : $house_holder_id;

                $case_type                = ($request['case_type'] == 0)? 5 : $request['case_type'];
                $case_sub_type            = ($request['case_sub_type'] == 0)? 7 : $request['case_sub_type'];
                $house_holder_obj         = User::find($house_holder_id);

                $newCase                  = New CaseReport();
                $newCase->created_at      = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                $newCase->user            = \Auth::user()->id;
                $newCase->reporter        = \Auth::user()->id;
                $newCase->house_holder_id = $house_holder_id;
                $newCase->description     = $request['description'];
                $newCase->case_type       = $case_type;
                $newCase->case_sub_type   = $case_sub_type;
                $newCase->saps_case_number = $request['saps_case_number'];
                $newCase->client_reference_number = $request['client_reference_number'];
                $newCase->status          = 1;
                $newCase->addressbook     = 0;
                $newCase->source          = 3;
                $newCase->active          = 1;
                $province                 = Province::where('slug','=',$request['province'])->first();
                $district                 = District::where('slug','=',$request['district'])->first();
                $municipality             = Municipality::where('slug','=',$request['municipality'])->first();
                $ward                     = Ward::where('slug','=',$request['ward'])->first();

                $newCase->province        = $province->id;
                $newCase->district        = $district->id;
                $newCase->municipality    = $municipality->id;
                $newCase->ward            = $ward->id;
                $newCase->area            = $request['area'];
                $newCase->save();


                $caseOwner              = new CaseOwner();
                $caseOwner->user        = \Auth::user()->id;
                $caseOwner->case_id     = $newCase->id;
                $caseOwner->type        = 0;
                $caseOwner->active      = 1;
                $caseOwner->save();



                $response["message"]      = "Case created successfully";
                $response["error"]        = FALSE;
                $response["caseID"]       = $newCase->id;

                return \Response::json($response,201);

    }


    function relatedCases($id) {


            $relatedCases  = \DB::table('related_cases')
                                ->join('cases','related_cases.child','=','cases.id')
                                ->where('related_cases.parent','=',$id)
                                ->select(
                                            array(
                                                    'cases.id as id',
                                                    'cases.description as description',
                                                    'related_cases.created_at as created_at'

                                                )
                                        );

            return \Datatables::of($relatedCases)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateAffiliationModal({{$id}});" data-target=".modalEditAffiliation">Edit</a>')
                            ->make(true);

    }
}
