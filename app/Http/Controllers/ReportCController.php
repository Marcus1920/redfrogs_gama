<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Report;
//use App\DepartmentCategory;
//use App\Department;
//use App\DepartmentSubCategory;
//use App\DepartmentSubSubCategory;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\User;
use DB;
use App\cases_status_confirs;
use App\CaseReport;
use App\CaseResponder;
use App\CaseOwner;
use App\CasePriority;
use App\CaseStatus;
use App\UserNew;
use App\UserReportdetails;

class ReportCController extends Controller
{


    private $report;


    public function __construct(Report $report)
    {

        $this->report = $report;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $reports  = $this->report->get();

        return $reports;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

// Function for resizing jpg, gif, or png image files
public function ak_img_resize($target, $newcopy, $w, $h, $ext)
{ list($w_orig, $h_orig) = getimagesize($target); $scale_ratio = $w_orig / $h_orig; if (($w / $h) > $scale_ratio) { $w = $h * $scale_ratio; } else { $h = $w / $scale_ratio; } $img = ""; $ext = strtolower($ext); if ($ext == "gif"){ $img = imagecreatefromgif($target); } else if($ext =="png"){ $img = imagecreatefrompng($target); } else { $img = imagecreatefromjpeg($target); } $tci = imagecreatetruecolor($w, $h); // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig); imagejpeg($tci, $newcopy, 80); }


public function  CaseReportjs(){
	$cases =  CaseReport::all()   ;
	//$cases    = CaseReport::select('id','nuberof_person_involve', 'name_person_involve', 'color','surname_person_involve','phone_person_involve' ,'email_person_involve' , 'description' , 'gps_lat','gps_lng' ,'img_url','category','sub_category','sub_sub_category','name_pain','cell_pain','addressHotel_pain','numberOfpeople_pain')->get();

	 return \Response::json($cases,201);

}

public function  CaseReportjss(){


	   $myReports = \DB::table('cases')
                ->leftjoin('departments', 'cases.department', '=', 'departments.id')
                ->join('categories', 'cases.category', '=', 'categories.id')
                ->join('sub_categories', 'cases.sub_category', '=', 'sub_categories.id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                //->join('cases_priorities', 'cases.priority', '=', 'cases_priorities.id')
                ->leftjoin('sub_sub_categories', 'cases.sub_sub_category', '=', 'sub_sub_categories.id')
                ->join('users', 'cases.user', '=', 'users.id')
              //  ->where('cases.user','=',$user->id)
                ->select(\DB::raw("cases.id ,cases.description ,cases.user ,cases.department,
				   cases.province ,cases.district,cases.municipality,cases.ward ,cases_statuses.id as status ,cases_statuses.name as status,
			cases.addressbook,cases.reporter,cases.severity,cases.busy,cases.accepted_at,cases.referred_at  ,
			cases.escalated_at,cases.source,cases.location,cases.gps_lat,cases.gps_lng ,

	cases.resolved_at ,cases.closed_at,cases.active,cases.created_at,cases.updated_at,cases.gps_lng ,cases.gps_lng ,cases.img_url
 ,cases.agent,cases.house_holder_id,cases.case_type,cases.case_sub_type,cases.saps_case_number,
 cases.client_reference_number ,cases.allocated_at  ,cases.email_person_involve ,cases.actiontaken , cases.nuberof_person_involve ,
	cases.name_person_involve,cases.incident_date_time,cases.color,cases.img_url,
categories.name as category, categories.id as category_id,`sub_categories`.name as sub_category,
`sub_categories`.id as sub_category_id, `sub_sub_categories`.name as sub_sub_category,
`sub_sub_categories`.id as sub_sub_category_id ,cases.name_pain,cases.addressHotel_pain,cases.numberOfpeople_pain,cases.incident_date_time,cases.cases_type"))
               ->get();
				 return \Response::json($myReports,201);



}


    public function store(Report $report, Request $request)
    {
		$key     ="57ea53e62d40e";


		\Log::info("cases_type".$request);
         $cases_type         = \Input::get('cases_type');

		\Log::info("name_pain".$request);
         $name_pain         = \Input::get('name_pain');

		 \Log::info("cell_pain".$request);
         $cell_pain         = \Input::get('cell_pain');

		 \Log::info("addressHotel_pain".$request);
         $addressHotel_pain         = \Input::get('addressHotel_pain');

		 \Log::info("numberOfpeople_pain".$request);
         $numberOfpeople_pain         = \Input::get('numberOfpeople_pain');



	\Log::info("nuberof_person_involve".$request);
         $nuberof_person_involve         = \Input::get('nuberof_person_involve');

		 \Log::info("name_person_involve ".$request);
         $name_person_involve         = \Input::get('name_person_involve');

		  \Log::info("surname_person_involve ".$request);
         $surname_person_involve         = \Input::get('surname_person_involve');

		  \Log::info("phone_person_involve ".$request);
         $phone_person_involve         = \Input::get('phone_person_involve');

		  \Log::info("email_person_involve ".$request);
         $email_person_involve         = \Input::get('email_person_involve');

		  \Log::info("color ".$request);
         $color         = \Input::get('color');


         \Log::info("Request ".$request);
         $category         = \Input::get('category');
         \Log::info('GET Category ' .$category);
         $sub_category     = \Input::get('sub_category');
         \Log::info('GET Sub Category ' .$sub_category);
         $sub_sub_category = \Input::get('sub_sub_category');
         \Log::info('GET Sub Sub Category ' .$sub_sub_category);
         $sub_sub_category = (empty($sub_sub_category))? " " : $sub_sub_category;
         $description      = \Input::get('description');
         \Log::info('Get Description :'.$description);
         $description      = (empty($description))? " " : $description;
         $gps_lat          = \Input::get('gps_lat');
         \Log::info('GPS Lat :' .$gps_lat);
         $gps_lng          = \Input::get('gps_lng');
         \Log::info('GPS Lng :' .$gps_lng);
         $user_email       = \Input::get('user_email');
         \Log::info('Email :' .$user_email);
         $priority         = \Input::get('priorities');
         $priority         = (empty($priority))? 1 : $priority;
         \Log::info('Priority :' .$priority);
         $headers          = apache_request_headers();
         $response         = array();

        \Log::info("Request ".$request);
        if (count($_FILES) > 0) {

            $files = $_FILES['img'];
            $name  = uniqid('img-'.date('Ymd').'-');
            $temp  = explode(".",$files['name']);
            $name  = $name . '.'.end($temp);


            if (file_exists("uploads/".$name))
            {
                echo $_FILES["img"]["name"]."already exists. ";
            }
            else
            {

                $img_url      = "uploads/".$name;
                $target_file  = "uploads/$name";
                $resized_file = "uploads/$name";
                $wmax         = 600;
                $hmax         = 480;
                $fileExt      = 'jpg';

                if(move_uploaded_file($_FILES["img"]["tmp_name"],$img_url))
                {

                     $this->ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

                }

            }
        }


       $img_url = isset($img_url)? $img_url : "uploads/noimage.png";


         $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

             if($api_key != null && $api_key != "null")
			 {




             $userNew = UserNew::where('api_key','=',$api_key)->first();

             if(sizeof($userNew) > 0) {


                 $objCat                           = Category::where('name','=',$category)->first();
                 \Log::info('Category Object :'.$objCat);

                 $objSubCat                        = SubCategory::where('name','=',$sub_category)->first();
                 $SubCatName                       = (sizeof($objSubCat) > 0)? $objSubCat->name : "";

                 if(strlen($sub_sub_category) > 1) {

                     $objSubSubCat =SubSubCategory::where('name','=',$sub_sub_category)->first();
                     $objSubSub    = $objSubSubCat->id;

                 }
                 else {

                     $objSubSubCat = 0;
                     $objSubSub    = 0;
                 }

                 $objPriority            = CasePriority::where('name','=',$priority)->first();
                 $priority               = (sizeof($objPriority) == 0)? 1 : $objPriority->id;

                 $case                   = New CaseReport();
                 $case->description      = $description;
                 $case->user             = $userNew->id;
                 $case->reporter         = $userNew->id;
				 $case->cases_type         = $userNew->cases_type;

                 $case->department       = $objCat->department;
                 $case->category         = $objCat->id;
                 $case->sub_category     = $objSubCat->id;
                 $case->sub_sub_category = $objSubSub;
                 $case->province         = $userNew->province;
                 $case->district         = $userNew->district;
                 $case->municipality     = $userNew->municipality;
                 $case->ward             = $userNew->ward;
                 $case->area             = $userNew->area;
                 $case->priority         = $priority;
                 $case->status           = 1; //Pending
                 $case->gps_lat          = $gps_lat;
                 $case->img_url          = $img_url;
                 $case->gps_lng          = $gps_lng;
                 $case->source           = 2; //Mobile

				$case->nuberof_person_involve   =$nuberof_person_involve;
				$case->name_person_involve      =$name_person_involve;
				$case->surname_person_involve   =$surname_person_involve  ;
				$case->phone_person_involve     =$phone_person_involve  ;
				$case->email_person_involve     =$email_person_involve ;
				$case->color                    = $color  ;

				$case->name_pain                =$name_pain  ;
				$case->cell_pain                =$cell_pain  ;
				$case->addressHotel_pain        =$addressHotel_pain  ;
				$case->numberOfpeople_pain      =$numberOfpeople_pain  ;


                 $case->save();

                 $caseOwner              = new CaseOwner();
                 $caseOwner->user        = $userNew->id;
                 $caseOwner->case_id     = $case->id;
                 $caseOwner->type        = 0;
                 $caseOwner->active      = 1;
                 $caseOwner->save();

                 $response["message"]          = "Report created successfully";
                 $response['error']            = FALSE;

                $data = array(

                    'name'      =>$userNew->name,
                    'caseID'    =>$case->id,
                    'caseDesc'  =>$case->description
                );

                \Mail::send('emails.sms',$data, function($message) use ($userNew) {

                    $message->from('info@Ensky.net', 'Ensky');
                    $message->to($userNew->email)->subject("Ensky Notification - New Case Reported:");

                });




                if (is_object($objSubSubCat)) {

                    $firstRespondersObj  = CaseResponder::where("sub_sub_category",'=',$objSubSubCat->id)
                                                ->select('first_responder')->first();

                    if (sizeof($firstRespondersObj) > 0) {


                        $case->status      = 4;
                        $case->referred_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                        $case->save();

                        $firstResponders  = explode(",",$firstRespondersObj->first_responder);

                        if($firstRespondersObj->first_responder > 0) {

                            foreach ($firstResponders as $firstResponder) {


                                $firstResponderUser = UserNew::find($firstResponder);
                                $caseOwner          = new CaseOwner();
                                $caseOwner->user    = $firstResponder ;
                                $caseOwner->case_id = $case->id;
                                $caseOwner->type    = 1;
                                $caseOwner->active  = 1;
                                $caseOwner->save();

                                 $data = array(
                                        'name'   =>$firstResponderUser->name,
                                        'caseID' =>$case->id,
                                        'caseDesc' => $case->description,
                                        'caseReporter' => $case->description,
                                    );

                                \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser) {

                                    $message->from('info@ecin.net', 'Ecin');
                                    $message->to($firstResponderUser->email)->subject("Ecin Notification - New Case Reported:");

                                });

                                $cellphone = $firstResponderUser->email;

                                \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone)
                                {
                                    $message->from('ecin.net', 'Ecin');
                                    $message->to('cooluma@siyaleader.net')->subject("REFER: $cellphone" );

                                });



                            }


                        }
                    }

                }






                if (sizeof($objSubCat) > 0 && $objSubSubCat == "") {



                     $allObjSubCats  = SubCategory::where('name','=',$sub_category)->get();
                     \Log::info(sizeof($allObjSubCats));
                     \Log::info($allObjSubCats);


                     foreach ($allObjSubCats as $value) {


                        $firstRespondersObj  = CaseResponder::where("sub_category",'=',$value->id)
                                                ->select('first_responder')->first();

                        if (sizeof($firstRespondersObj) > 0) {

                            $case->status = 4;
                            $case->referred_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                            $case->save();

                            $firstResponders  = explode(",",$firstRespondersObj->first_responder);

                            if($firstRespondersObj->first_responder > 0) {

                                foreach ($firstResponders as $firstResponder) {


                                        $firstResponderUser = UserNew::find($firstResponder);
                                        $caseOwner          = new CaseOwner();
                                        $caseOwner->user    = $firstResponder ;
                                        $caseOwner->case_id = $case->id;
                                        $caseOwner->type    = 1;
                                        $caseOwner->active  = 1;
                                        $caseOwner->save();

                                         $data = array(
                                                'name'          =>$firstResponderUser->name,
                                                'caseID'        =>$case->id,
                                                'caseDesc'      =>$case->description,
                                                'caseReporter'  =>$case->description,
                                            );

                                        \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser) {
                                            $message->from('info@ecin.net', 'Ecin');
                                            $message->to($firstResponderUser->email)->subject("Ecin Notification - New Case Reported:");

                                        });

                                        $cellphone = $firstResponderUser->cellphone;

                                       \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone)
                                        {
                                            $message->from('info@ecin.net', 'Ecin');
                                            $message->to('cooluma@ecin.net')->subject("REFER: $cellphone" );

                                        });

                                }



                            }
                        }


                    }


                }

                return \Response::json($response,201);
             }

             else
             {

                $response['message'] = 'Access Denied. Ensure that all fields are correctly filled in';
                $response['error']   = TRUE;
                return \Response::json($response,401);

             }

        }
        else
        {
             $response['message'] = 'Access Denied. Invalid Api key';
             $response['error']   = TRUE;
             return \Response::json($response,401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
	 public  function  myreportpancke (Request $request){



       $response = array();



		  \Log::info("api_key".$request);
         $api_key         = \Input::get('api_key');
		   //$api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

        //$api_key     ="5631bf4b3d7b1";
        if ($api_key) {

             $user  = UserNew::where('api_key','=',$api_key)->first();

			// $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

             if(sizeof($user) > 0)
             {


                 $myReports = \DB::table('cases')
                ->leftjoin('departments', 'cases.department', '=', 'departments.id')
                ->join('categories', 'cases.category', '=', 'categories.id')
                ->join('sub_categories', 'cases.sub_category', '=', 'sub_categories.id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
               // ->join('cases_priorities', 'cases.priority', '=', 'cases_priorities.id')
                ->leftjoin('sub_sub_categories', 'cases.sub_sub_category', '=', 'sub_sub_categories.id')
                ->join('users', 'cases.user', '=', 'users.id')
                ->where('cases.user','=',$user->id)
                ->select(\DB::raw("cases.id,cases_statuses.name as status,cases.location,cases.name_person_involve,cases.incident_date_time,cases.cell_pain,cases.numberOfpeople_pain"))
                ->get();

                $response["error"]   = FALSE;
                $response["reports"] = $myReports;
                return \Response::json($response,201);
             }
             else {

                $response['message'] = 'Access Denied. Invalid Api key';;
                $response['error']   = TRUE;
                return \Response::json($response,401);
             }
        }
        else
        {
            $response['message'] = 'Access Denied. Invalid Api keyss';;
            $response['error']   = TRUE;
            return \Response::json($response,401);
        }


	 }

    public function myReport(Report $report , Request $request)
    {

         $response = array();

     //  $key     = \Input::get('api_key');

		  \Log::info("api_key".$request);
         $api_key         = \Input::get('api_key');
		   //$api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

        //$api_key     ="5631bf4b3d7b1";
        if ($api_key) {

             $user  = UserNew::where('api_key','=',$api_key)->first();
			// $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

             if(sizeof($user) > 0)
             {


                 $myReports = \DB::table('cases')
                ->leftjoin('departments', 'cases.department', '=', 'departments.id')
                ->join('categories', 'cases.category', '=', 'categories.id')
                ->join('sub_categories', 'cases.sub_category', '=', 'sub_categories.id')
                ->join('cases_statuses', 'cases.status', '=', 'cases_statuses.id')
                //->join('cases_priorities', 'cases.priority', '=', 'cases_priorities.id')
                ->leftjoin('sub_sub_categories', 'cases.sub_sub_category', '=', 'sub_sub_categories.id')
                ->join('users', 'cases.user', '=', 'users.id')
                ->where('cases.user','=',$user->id)
                ->select(\DB::raw("cases.id ,cases_statuses.name as status,cases.description,cases.location,cases.gps_lat ,cases.gps_lng ,cases.actiontaken , cases.nuberof_person_involve ,cases.name_person_involve,cases.surname_person_involve ,cases.phone_person_involve,cases.email_person_involve,cases.incident_date_time,cases.img_url,categories.name as category, categories.id as category_id,`sub_categories`.name as sub_category,  `sub_categories`.id as sub_category_id, `sub_sub_categories`.name as sub_sub_category,`sub_sub_categories`.id as sub_sub_category_id"))
                ->get();

                $response["error"]   = FALSE;
                $response["reports"] = $myReports;
                return \Response::json($response,200);
             }
             else {

                $response['message'] = 'Access Denied. Invalid Api key';;
                $response['error']   = TRUE;
                return \Response::json($response,401);
             }
        }
        else
        {
            $response['message'] = 'Access Denied. Invalid Api keyss';;
            $response['error']   = TRUE;
            return \Response::json($response,401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveReportImage(Report $report)
    {
		  $key     ="57ea53e62d40e";
		  $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();

         $category         = \Input::get('category');
         $sub_category     = \Input::get('sub_category');
         $sub_sub_category = \Input::get('sub_sub_category');
         $description      = \Input::get('description');
         $gps_lat          = \Input::get('gps_lat');
         $gps_lng          = \Input::get('gps_lng');
         $user_email       = \Input::get('user_email');
         $headers          = apache_request_headers();
         $response         = array();
        // $files            = $_FILES['img'];



         if ($key) {

             $user  = User::where('api_key','=',$key)->first();

             if(sizeof($user) > 0) {

                 $newReport = New Report();
                 $newReport->prob_category    = $category;
                 $newReport->prob_dis         = 'Durban';
                 $newReport->prob_mun         = 'Maydon Wharf';
                 $newReport->Province         = 'KZN';
                 $newReport->status           = 'Pending';
                 $newReport->prob_exp         = $description;
              //   $newReport->img_url          = $img_url;
                 $newReport->ccg_nam          = $user->Fname;
                 $newReport->ccg_sur          = $user->Sname;
                 $newReport->ccg_pos          = $user->Position;
                 $newReport->prob_subcategory = $sub_sub_category['name'];
                 $newReport->GPS              = $gps_lat .', '.$gps_lng;
                 $newReport->gps_lat          = $gps_lat;
                 $newReport->gps_lng          = $gps_lng;
                 $newReport->submit_date      =  \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                 $newReport->user             = $user->ID;
                 $newReport->source           = 'M';
                 $newReport->save();
                 $response["message"]         = "Report created successfully";
                 $response['error']           = FALSE;
                 return \Response::json($response,201);
             }

             else
             {

                $response['message'] = 'Access Denied. Invalid Api keys';;
                $response['error']   = TRUE;
                return \Response::json($response,401);

             }

        }
        else
        {
             $response['message'] = 'Access Denied. Invalid Api keyss';;
             $response['error']   = TRUE;
             return \Response::json($response,401);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

	  public function creatReport(Request $request)
    {


           $key         = \Input::get('api_key');
		   $ref_number        = \Input::get('ref_no');
		   $ID_id    = \Input::get('ID_id');
		   $case    =  CaseReport::select('ref_no')->where('ref_no','=',$ref_number)->first();
		   if ($case){
			    $cassupdate = CaseReport::where('ref_no','=',$ref_number)->first();
		 //  dd($cassupdate->description);
		 ///  $cassupdate->description= "second  test";
		   //$cassupdate->save();
		 /// dd($cassupdate->description);
			  \Log::info("cases_type".$request);
         $cases_type         = \Input::get('cases_type');

		\Log::info("incident_date_time".$request);
         $incident_date_time         = \Input::get('incident_date_time');



		\Log::info("actiontaken".$request);
         $actiontaken         = \Input::get('actiontaken');


		 \Log::info("location".$request);
         $location         = \Input::get('location');

       \Log::info("name_pain".$request);


         $name_pain         = \Input::get('name_pain');

		 \Log::info("cell_pain".$request);
         $cell_pain         = \Input::get('cell_pain');

		 \Log::info("addressHotel_pain".$request);
         $addressHotel_pain         = \Input::get('addressHotel_pain');

		 \Log::info("numberOfpeople_pain".$request);
         $numberOfpeople_pain         = \Input::get('numberOfpeople_pain');



	\Log::info("nuberof_person_involve".$request);
         $nuberof_person_involve         = \Input::get('nuberof_person_involve');

		 \Log::info("name_person_involve ".$request);
         $name_person_involve         = \Input::get('name_person_involve');

		  \Log::info("surname_person_involve ".$request);
         $surname_person_involve         = \Input::get('surname_person_involve');

		  \Log::info("phone_person_involve ".$request);
         $phone_person_involve         = \Input::get('phone_person_involve');

		  \Log::info("email_person_involve ".$request);
         $email_person_involve         = \Input::get('email_person_involve');

		  \Log::info("color ".$request);
         $color         = \Input::get('color');


         \Log::info("Request ".$request);
         $category         = \Input::get('category');
         \Log::info('GET Category ' .$category);
         $sub_category     = \Input::get('sub_category');
         \Log::info('GET Sub Category ' .$sub_category);
         $sub_sub_category = \Input::get('sub_sub_category');
         \Log::info('GET Sub Sub Category ' .$sub_sub_category);
         $sub_sub_category = (empty($sub_sub_category))? " " : $sub_sub_category;
         $description      = \Input::get('description');
         \Log::info('Get Description :'.$description);
         $description      = (empty($description))? " " : $description;
         $gps_lat          = \Input::get('gps_lat');
         \Log::info('GPS Lat :' .$gps_lat);
         $gps_lng          = \Input::get('gps_lng');
         \Log::info('GPS Lng :' .$gps_lng);
         $user_email       = \Input::get('user_email');
         \Log::info('Email :' .$user_email);
         $priority         = \Input::get('priorities');
         $priority         = (empty($priority))? 1 : $priority;
         \Log::info('Priority :' .$priority);
         $headers          = apache_request_headers();
         $response         = array();

        \Log::info("Request ".$request);
        if (count($_FILES) > 0) {

            $files = $_FILES['img'];
            $name  = uniqid('img-'.date('Ymd').'-');
            $temp  = explode(".",$files['name']);
            $name  = $name . '.'.end($temp);


            if (file_exists("uploads/".$name))
            {
                echo $_FILES["img"]["name"]."already exists. ";
            }
            else
            {

                $img_url      = "uploads/".$name;
                $target_file  = "uploads/$name";
                $resized_file = "uploads/$name";
                $wmax         = 600;
                $hmax         = 480;
                $fileExt      = 'jpg';

                if(move_uploaded_file($_FILES["img"]["tmp_name"],$img_url))
                {

                     $this->ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

                }

            }
        }

 if ($case) {

             $userNew  = CaseReport::where('ref_no','=',$ref_number)->first();
			//  $cassupdate = CaseReport::where('ref_no','=',$ref_number)->first();

             if(sizeof($userNew) > 0) {


				        $objCat                           = Category::where('name','=',$category)->first();


                 \Log::info('Category Object :'.$objCat);

                $objSubCat                          = SubCategory::where('name','=',$sub_category)->first();
		//	$objSubCat 	= DB::table('sub_categories')->where('name','=','Relationship-Issues')->first();

                 $SubCatName                       = (sizeof($objSubCat) > 0)? $objSubCat->name : "";

                 if(strlen($sub_sub_category) > 1) {

                     $objSubSubCat =SubSubCategory::where('name','=',$sub_sub_category)->first();

                     $objSubSub    = $objSubSubCat->id;

                 }
                 else {

                     $objSubSubCat = 0;
                     $objSubSub    = 0;
                 }

                 $objPriority            = CasePriority::where('name','=',$priority)->first();
                 $priority               = (sizeof($objPriority) == 0)? 1 : $objPriority->id;

				 $case                   =  CaseReport::where('ref_no','=',$ref_number)->first();
                 $case->description      = $description;
				 $case->cases_type      = $cases_type;
				 $case->actiontaken      = $actiontaken;

				 $case->location         = $location;
                 $case->user             = $userNew->id;
                 $case->reporter         = $userNew->id;


                 $case->category         = $objCat->id;
                 $case->sub_category     = $objSubCat->id;
                 $case->sub_sub_category = $objSubSub;
                // $case->category         = $category;
                 ////$case->sub_category     = $sub_category;
                // $case->sub_sub_category = "3";

                 $case->status           = 1; //Pending
                 $case->gps_lat          = $gps_lat;
             //    $case->img_url          = $img_url;
                 $case->gps_lng          = $gps_lng;
                 $case->source           = 2; //Mobile

				$case->nuberof_person_involve   =$nuberof_person_involve;
				$case->name_person_involve      =$name_person_involve;
				$case->surname_person_involve   =$surname_person_involve  ;
				$case->phone_person_involve     =$phone_person_involve  ;
				$case->email_person_involve     =$email_person_involve ;
				$case->color                    = $color  ;
				$case->incident_date_time       = $incident_date_time  ;


				$case->name_pain                =$name_pain;
				$case->cell_pain                =$cell_pain;
				$case->addressHotel_pain        =$addressHotel_pain;
				$case->numberOfpeople_pain      =$numberOfpeople_pain  ;


                 $case->save();

                 $caseOwner              = new CaseOwner();
                 $caseOwner->user        = $userNew->id;
                 $caseOwner->case_id     = $case->id;
                 $caseOwner->type        = 0;
                 $caseOwner->active      = 1;
                 $caseOwner->save();
				 $UserReportdetails  =  new  UserReportdetails  () ;
				 $UserReportdetails-> user_new_id   = $userNew->user;
				 $UserReportdetails->ID_id   = $ID_id;
				 $UserReportdetails->ref_no  = $ref_number;
				 $UserReportdetails->save();

				$response['message'] = 'your incident has been   succsefuly update';
                $response['error']   = TRUE;
                return \Response::json($response,200);
			 }
 }
//else continue  for  the  update
		   }
		   else{





		//$key     ="57ea53e62d40e";
		  $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();





		\Log::info("cases_type".$request);
         $cases_type         = \Input::get('cases_type');

		\Log::info("incident_date_time".$request);
         $incident_date_time         = \Input::get('incident_date_time');



		\Log::info("actiontaken".$request);
         $actiontaken         = \Input::get('actiontaken');


		 \Log::info("location".$request);
         $location         = \Input::get('location');

       \Log::info("name_pain".$request);


         $name_pain         = \Input::get('name_pain');

		 \Log::info("cell_pain".$request);
         $cell_pain         = \Input::get('cell_pain');

		 \Log::info("addressHotel_pain".$request);
         $addressHotel_pain         = \Input::get('addressHotel_pain');

		 \Log::info("numberOfpeople_pain".$request);
         $numberOfpeople_pain         = \Input::get('numberOfpeople_pain');



	\Log::info("nuberof_person_involve".$request);
         $nuberof_person_involve         = \Input::get('nuberof_person_involve');

		 \Log::info("name_person_involve ".$request);
         $name_person_involve         = \Input::get('name_person_involve');

		  \Log::info("surname_person_involve ".$request);
         $surname_person_involve         = \Input::get('surname_person_involve');

		  \Log::info("phone_person_involve ".$request);
         $phone_person_involve         = \Input::get('phone_person_involve');

		  \Log::info("email_person_involve ".$request);
         $email_person_involve         = \Input::get('email_person_involve');

		  \Log::info("color ".$request);
         $color         = \Input::get('color');


         \Log::info("Request ".$request);
         $category         = \Input::get('category');
         \Log::info('GET Category ' .$category);
         $sub_category     = \Input::get('sub_category');
         \Log::info('GET Sub Category ' .$sub_category);
         $sub_sub_category = \Input::get('sub_sub_category');
         \Log::info('GET Sub Sub Category ' .$sub_sub_category);
         $sub_sub_category = (empty($sub_sub_category))? " " : $sub_sub_category;
         $description      = \Input::get('description');
         \Log::info('Get Description :'.$description);
         $description      = (empty($description))? " " : $description;
         $gps_lat          = \Input::get('gps_lat');
         \Log::info('GPS Lat :' .$gps_lat);
         $gps_lng          = \Input::get('gps_lng');
         \Log::info('GPS Lng :' .$gps_lng);
         $user_email       = \Input::get('user_email');
         \Log::info('Email :' .$user_email);
         $priority         = \Input::get('priorities');
         $priority         = (empty($priority))? 1 : $priority;
         \Log::info('Priority :' .$priority);
         $headers          = apache_request_headers();
         $response         = array();

        \Log::info("Request ".$request);
        if (count($_FILES) > 0) {

            $files = $_FILES['img'];
            $name  = uniqid('img-'.date('Ymd').'-');
            $temp  = explode(".",$files['name']);
            $name  = $name . '.'.end($temp);


            if (file_exists("uploads/".$name))
            {
                echo $_FILES["img"]["name"]."already exists. ";
            }
            else
            {

                $img_url      = "uploads/".$name;
                $target_file  = "uploads/$name";
                $resized_file = "uploads/$name";
                $wmax         = 600;
                $hmax         = 480;
                $fileExt      = 'jpg';

                if(move_uploaded_file($_FILES["img"]["tmp_name"],$img_url))
                {

                     $this->ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);

                }

            }
        }


	 if ($key) {

             $userNew  = User::where('api_key','=',$key)->first();

             if(sizeof($userNew) > 0) {


				  $objCat                           = Category::where('name','=',$category)->first();


                 \Log::info('Category Object :'.$objCat);

                $objSubCat                          = SubCategory::where('name','=',$sub_category)->first();
		//	$objSubCat 	= DB::table('sub_categories')->where('name','=','Relationship-Issues')->first();

                 $SubCatName                       = (sizeof($objSubCat) > 0)? $objSubCat->name : "";

                 if(strlen($sub_sub_category) > 1) {

                     $objSubSubCat =SubSubCategory::where('name','=',$sub_sub_category)->first();

                     $objSubSub    = $objSubSubCat->id;

                 }
                 else {

                     $objSubSubCat = 0;
                     $objSubSub    = 0;
                 }

                 $objPriority            = CasePriority::where('name','=',$priority)->first();
                 $priority               = (sizeof($objPriority) == 0)? 1 : $objPriority->id;

				 $case                   = New CaseReport();
                 $case->description      = $description;
				 $case->cases_type      = $cases_type;
				 $case->actiontaken      = $actiontaken;

				 $case->location         = $location;
                 $case->user             = $userNew->id;
                 $case->reporter         = $userNew->id;
				 $case->ref_no           = rand(1000, 9999);


                 $case->category         = $objCat->id;
                 $case->sub_category     = $objSubCat->id;
                 $case->sub_sub_category = $objSubSub;
                // $case->category         = $category;
                 ////$case->sub_category     = $sub_category;
                // $case->sub_sub_category = "3";

                 $case->status           = 1; //Pending
                 $case->gps_lat          = $gps_lat;
             //    $case->img_url          = $img_url;
                 $case->gps_lng          = $gps_lng;
                 $case->source           = 2; //Mobile

				$case->nuberof_person_involve   =$nuberof_person_involve;
				$case->name_person_involve      =$name_person_involve;
				$case->surname_person_involve   =$surname_person_involve  ;
				$case->phone_person_involve     =$phone_person_involve  ;
				$case->email_person_involve     =$email_person_involve ;
				$case->color                    = $color  ;
				$case->incident_date_time       = $incident_date_time  ;


				$case->name_pain                =$name_pain  ;
				$case->cell_pain                =$cell_pain  ;
				$case->addressHotel_pain        =$addressHotel_pain  ;
				$case->numberOfpeople_pain      =$numberOfpeople_pain  ;


                 $case->save();

                 $caseOwner              = new CaseOwner();
                 $caseOwner->user        = $userNew->id;
                 $caseOwner->case_id     = $case->id;
                 $caseOwner->type        = 0;
                 $caseOwner->active      = 1;
                 $caseOwner->save();

				$response['message'] = 'Incident   succsefuly create   ';
                $response['error']   = TRUE;
                return \Response::json($response,200);



			$data = array(

                    'name'      =>$userNew->name,
                    'caseID'    =>$case->id,
                    'caseDesc'  =>$case->description
                );

                \Mail::send('emails.sms',$data, function($message) use ($userNew) {

                    $message->from('info@Ensky.net', 'Ensky');
                    $message->to($userNew->email)->subject("Ensky Notification - New Case Reported:");

                });




                if (is_object($objSubSubCat)) {

                    $firstRespondersObj  = CaseResponder::where("sub_sub_category",'=',$objSubSubCat->id)
                                                ->select('first_responder')->first();

                    if (sizeof($firstRespondersObj) > 0) {


                        $case->status      = 4;
                        $case->referred_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                        $case->save();

                        $firstResponders  = explode(",",$firstRespondersObj->first_responder);

                        if($firstRespondersObj->first_responder > 0) {

                            foreach ($firstResponders as $firstResponder) {


                                $firstResponderUser = UserNew::find($firstResponder);
                                $caseOwner          = new CaseOwner();
                                $caseOwner->user    = $firstResponder ;
                                $caseOwner->case_id = $case->id;
                                $caseOwner->type    = 1;
                                $caseOwner->active  = 1;
                                $caseOwner->save();

                                 $data = array(
                                        'name'   =>$firstResponderUser->name,
                                        'caseID' =>$case->id,
                                        'caseDesc' => $case->description,
                                        'caseReporter' => $case->description,
                                    );

                                \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser) {

                                    $message->from('redfrogs.net', 'Redfrohs');
                                    $message->to($firstResponderUser->email)->subject("Redfrogs Notification - New Case Reported:");

                                });

                                $cellphone = $firstResponderUser->email;

                                \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone)
                                {
                                    $message->from('redfrogs.net', 'Ecin');
                                    $message->to('cooluma@siyaleader.net')->subject("REFER: $cellphone" );

                                });



                            }


                        }
                    }

                }






                if (sizeof($objSubCat) > 0 && $objSubSubCat == "") {



                     $allObjSubCats  = SubCategory::where('name','=',$sub_category)->get();
                     \Log::info(sizeof($allObjSubCats));
                     \Log::info($allObjSubCats);


                     foreach ($allObjSubCats as $value) {


                        $firstRespondersObj  = CaseResponder::where("sub_category",'=',$value->id)
                                                ->select('first_responder')->first();

                        if (sizeof($firstRespondersObj) > 0) {

                            $case->status = 4;
                            $case->referred_at = \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
                            $case->save();

                            $firstResponders  = explode(",",$firstRespondersObj->first_responder);

                            if($firstRespondersObj->first_responder > 0) {

                                foreach ($firstResponders as $firstResponder) {


                                        $firstResponderUser = UserNew::find($firstResponder);
                                        $caseOwner          = new CaseOwner();
                                        $caseOwner->user    = $firstResponder ;
                                        $caseOwner->case_id = $case->id;
                                        $caseOwner->type    = 1;
                                        $caseOwner->active  = 1;
                                        $caseOwner->save();

                                         $data = array(
                                                'name'          =>$firstResponderUser->name,
                                                'caseID'        =>$case->id,
                                                'caseDesc'      =>$case->description,
                                                'caseReporter'  =>$case->description,
                                            );

                                        \Mail::send('emails.responder',$data, function($message) use ($firstResponderUser) {
                                            $message->from('info@ecin.net', 'Ecin');
                                            $message->to($firstResponderUser->email)->subject("Red frogs Notification - New Case Reported:");

                                        });

                                        $cellphone = $firstResponderUser->cellphone;

                                       \Mail::send('emails.caseEscalatedSMS',$data, function($message) use ($cellphone)
                                        {
                                            $message->from('redfrogs.net', 'Ecin');
                                            $message->to('cooluma@redfros.net')->subject("REFER: $cellphone" );

                                        });

                                }



                            }
                        }


                    }


                }

                return \Response::json($response,200);
             }

             else
             {

                $response['message'] = 'Access Denied. Ensure that all fields are correctly filled in';
                $response['error']   = TRUE;
                return \Response::json($response,401);

             }

        }
        else
        {
             $response['message'] = 'Access Denied. Invalid Api key';
             $response['error']   = TRUE;
             return \Response::json($response,401);
        }

    }
	}


}
