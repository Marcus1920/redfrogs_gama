<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\UserRole;
use App\User;
use App\Position;
use App\Province;
use App\District;
use App\Municipality;
use App\Ward;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\Title;
use App\Language;
use App\CaseResponder;
use App\UserStatus;
use App\Poi;
use App\PoiBankDetail;
use App\Bank;
use App\PoiAssociate;

class UserController extends Controller
{

     private $user;


    public function __construct(User $user)
    {

        $this->user = $user;

    }

     public function list_users()
    {

        $userAddUserPermission   = \DB::table('group_permissions')
                            ->join('users_roles','group_permissions.group_id','=','users_roles.id')
                            ->where('group_permissions.permission_id','=',31)
                            ->where('group_permissions.group_id','=',\Auth::user()->role)
                            ->first();

        return view('users.list',compact('userAddUserPermission'));

    }






    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

       $userEditUserPermission   = \DB::table('group_permissions')
                            ->join('users_roles','group_permissions.group_id','=','users_roles.id')
                            ->where('group_permissions.permission_id','=',32)
                            ->where('group_permissions.group_id','=',\Auth::user()->role)
                            ->first();



        $users = \DB::table('users')
                        ->join('users_statuses', 'users.active', '=', 'users_statuses.id')
                        ->join('positions', 'users.position', '=', 'positions.id')
                        ->select(
                                    \DB::raw(
                                        "
                                         users.id,
                                         users.created_at,
                                         users.name,
                                         users.surname,
                                         users.email,
                                         users.cellphone,
                                         users_statuses.name as active,
                                         positions.name as position
                                        "
                                      )
                                );


        return \Datatables::of($users)
                            ->addColumn('actions',function() use ($userEditUserPermission){
                              if(isset($userEditUserPermission) && $userEditUserPermission->permission_id =="32")
                              {
                                  return '

                                    <a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser" >Edit</a>

                                        ';


                              }


                              }

                                )->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function responder()
    {
        $searchString = \Input::get('q');
        $contacts     = \DB::table('users')
            ->join('positions','users.position','=','positions.id')
            ->join('departments','users.department','=','departments.id')
            ->whereRaw("CONCAT(`users`.`name`, ' ', `users`.`surname`, ' ', `users`.`email`,' ', `positions`.`name`,' ', `departments`.`name`) LIKE '%{$searchString}%'")
            ->select(\DB::raw("
                               `users`.`id`,
                               `users`.`name`,
                               `users`.`surname`,
                               `users`.`email`,
                               `users`.`cellphone`,
                               `positions`.`name` as position,
                               `departments`.`name` as department

                              "))
            ->get();

        $data = array();

        if(count($contacts) > 0)
        {

           foreach ($contacts as $contact) {
            $data[]= array("name"=>"{$contact->name} {$contact->surname}<{$contact->cellphone}<'{$contact->position}'<'{$contact->department}'","id" =>"{$contact->id}");
           }


        }

        return $data;
    }


    public function getResponders(Request $request)
    {

        $subCategory        = $request['sub_category'];
        $subSubCategory     = $request['sub_sub_category'];


        if (sizeof($subSubCategory) > 0 && $subSubCategory != '0') {



          $objSubSubCategory     = SubSubCategory::where('slug','=',$subSubCategory)->first();
          $objSubCategory        = SubCategory::find($objSubSubCategory->id);
          $objCaseResponder      = CaseResponder::where('category','=',$objSubCategory->category)
                                                  ->where('sub_category','=',$objSubSubCategory->sub_category)
                                                  ->where('sub_sub_category','=',$objSubSubCategory->id)
                                                  ->first();


        if ( sizeof($objCaseResponder) > 0) {


          $firstResponders      = explode(",",$objCaseResponder->first_responder);
          $response             = array();


          foreach ($firstResponders as $firstResponder) {


             $user = \DB::table('users')
                        ->join('departments', 'users.department', '=', 'departments.id')
                        ->join('positions','users.position','=','positions.id')
                        ->where('users.id','=',$firstResponder)
                        ->select(\DB::raw(
                                    "
                                    `users`.`id`,
                                    `users`.`email`,
                                    (select CONCAT(`users`.`name`, ' ',`users`.`surname`) ) as names,
                                    `departments`.`name` as department,
                                    `positions`.`name` as position

                                    "
                                      )
                                )->first();

            $response[] = $user;

        }

        return $response;


        }


        }


        if (sizeof($subCategory) > 0 && sizeof($subSubCategory) == 0) {


            $objSubCategory = SubCategory::where('slug','=',$subCategory)->first();


            $allSubsCats    = SubCategory::where('name','=',$objSubCategory->name)->get();


            $response        = array();

            foreach ($allSubsCats as $sub_sub_cat) {


                $objCaseResponder   = CaseResponder::where('category','=',$sub_sub_cat->category)
                                            ->where('sub_category','=',$sub_sub_cat->id)
                                            ->first();



                if ( sizeof($objCaseResponder) > 0 && $objCaseResponder->sub_sub_category == 0) {



                    $firstResponders = explode(",",$objCaseResponder->first_responder);


                     foreach ($firstResponders as $firstResponder) {


                       $user = \DB::table('users')
                                  ->join('departments', 'users.department', '=', 'departments.id')
                                  ->join('positions','users.position','=','positions.id')
                                  ->where('users.id','=',$firstResponder)
                                  ->select(\DB::raw(
                                              "
                                              `users`.`id`,
                                              `users`.`email`,
                                              (select CONCAT(`users`.`name`, ' ',`users`.`surname`) ) as names,
                                              `departments`.`name` as department,
                                              `positions`.`name` as position

                                              "
                                                )
                                          )->first();

                      $response[] = $user;

                      }



              }






            }

            return $response;


        }



    }

     public function getPois(Request $request)
    {

      $objPois      = Poi::all();


        if ( sizeof($objPois) > 0) {


        $response             = array();


          foreach ($objPois as $objPoi) {


             /*$user = \DB::table('users')
                        ->join('departments', 'users.department', '=', 'departments.id')
                        ->join('positions','users.position','=','positions.id')
                        ->where('users.id','=',$firstResponder)
                        ->select(\DB::raw(
                                    "
                                    `users`.`id`,
                                    `users`.`email`,
                                    (select CONCAT(`users`.`name`, ' ',`users`.`surname`) ) as names,
                                    `departments`.`name` as department,
                                    `positions`.`name` as position

                                    "
                                      )
                                )->first();*/

            $response[] = $objPoi;

        }

        return $response;


        }


        //}End IF

    }

    public function getPoisAssociates($id)
    {


      $objPois      = PoiAssociate::where('poi_id','=',$id)->get();


        if ( sizeof($objPois) > 0) {


        $response             = array();


          foreach ($objPois as $objPoi) {


             $user = \DB::table('poi')
                        ->where('poi.id','=',$objPoi->associate_id)
                        ->select(\DB::raw(
                                    "
                                    `poi`.`id`,
                                    `poi`.`name`,
                                    `poi`.`surname`,
                                    `poi`.`contact_number_1`

                                    "
                                      )
                                )->first();

            $response[] = $user;

        }

        return $response;


        }


        //}End IF

    }




     public function searchPOI()
    {

        $searchString = \Input::get('q');
        $contacts     = \DB::table('poi')
                        ->whereRaw("CONCAT(`name`, ' ', `surname`, ' ', `email`) LIKE '%{$searchString}%'")
                        ->select(\DB::raw('*'))
                        ->get();

        $data = array();

        if(count($contacts) > 0)
        {

           foreach ($contacts as $contact) {
           $data[]= array("name"=>"{$contact->name} {$contact->surname} <{$contact->email}","id" =>"{$contact->email}","first_name" =>"{$contact->name}","surname" =>"{$contact->surname}","cellphone" =>"{$contact->contact_number_1}","email" => "{$contact->email}");
           }


        }

         /*$usersContacts   = \DB::table('users')
                            ->join('positions','users.position','=','positions.id')
                            ->whereRaw("CONCAT(`users`.`name`, ' ', `users`.`surname`, ' ', `users`.`email`,`positions`.`name`) LIKE '%{$searchString}%'")
                            ->select(array('users.name as name','users.surname as surname','users.email as username','users.cellphone as cellphone','positions.name as position'))
                            ->get();

*/


        return $data;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request, User $user)
    {

        $role                = UserRole::where('slug','=',$request['role'])->first();
        $user->role          = $role->id;
        $title               = Title::where('slug','=',$request['title'])->first();
        $user->title         = $title->id;
        $language            = Language::where('slug','=',$request['language'])->first();
        $user->language      = $language->id;
        $user->gender        = $request['gender'];
        $user->name          = $request['name'];
        $user->dob           = $request['dob'];
        $user->surname       = $request['surname'];
        $user->cellphone     = $request['cellphone'];
        $user->alt_cellphone = $request['alt_cellphone'];
        $user->id_number     = $request['id_number'];
        $user->email         = (empty($request['email']))? $request['cellphone']."@siyaleader.net":$request['email'];
        $user->active        = 1;
        $user->alt_email     = $request['alt_email'];
        $province            = Province::where('slug','=',$request['province'])->first();
        $user->province      = (sizeof($province) > 0)?$province->id : 0;
        $district            = District::where('slug','=',$request['district'])->first();
        $user->district      = (sizeof($district) > 0)?$district->id:0;
        $municipality        = Municipality::where('slug','=',$request['municipality'])->first();
        $user->municipality  = (sizeof($municipality) > 0)?$municipality->id:0;
        $ward                = Ward::where('slug','=',$request['ward'])->first();
        $user->ward          = (sizeof($ward) > 0)?$ward->id:0;
        $department          = Department::where('slug','=',$request['department'])->first();
        $user->department    = (sizeof($department) > 0)?$department->id:0;
        $position            = Position::where('slug','=',$request['position'])->first();
        $user->position      = (sizeof($position) > 0)?$position->id:0;
        $password            = rand(1000,99999);
        $user->password      = bcrypt($password);
        $user->area          = $request['area'];
        $user->api_key       = uniqid();
		$user->remember_token   = $request['_token'];
		
        $user->created_by    = \Auth::user()->id;

        if ($request['affiliation']) {

            $user->affiliation       = $request['affiliation'];

        }
         else {

            $user->affiliation = 1;

         }

        $user->save();

         \Session::flash('success', $request['name'].' '.$request['surname'].' user has been added successfully!');

        $data = array(
            'name'     =>$user->name,
            'username' =>$user->cellphone,
            'password' =>$password,
        );

        \Mail::send('emails.registrationConfirmation',$data, function($message) use ($user)
        {
            $message->from('info@siyaleader.net', 'Siyaleader');
            $message->to($user->email)->subject("Siyaleader Notification - User Registration Confirmation: " .$user->name);

        });

        return redirect('list-users');

    }


    public function save_poi(Request $request, Poi $poi)
    {


        //dd($request);

        $poi->name              = $request['name'];
        $poi->surname           = $request['surname'];
        $poi->id_number         = $request['id_number'];
        $poi->gender            = $request['gender'];
        $poi->nationality       = $request['nationality'];
        $poi->nickname          = $request['nickname'] ;
        $poi->language          = $request['language'];
        $poi->drivers_licence   = $request['drivers_licence'] ;
        $poi->email             = $request['email'] ;
        $poi->ethnic_group_id   = $request['ethnic_group'] ;
        $poi->weight            = $request['weight'] ;
        $poi->birth_place       = $request['birth_place'] ;
        $poi->scars             = $request['scars'] ;
        $poi->tattoo            = $request['tattoo'] ;
        $poi->tattoo            = $request['tattoo'] ;
        $poi->contact_number_1  = $request['contact_number_1'] ;
        $poi->contact_number_2  = $request['contact_number_2'] ;
        $poi->contact_number_3  = $request['contact_number_3'] ;
        $poi->address_home      = $request['address_home'] ;
        $poi->address_work      = $request['address_work'] ;
        $poi->employment_history = $request['employment_history'] ;
        $poi->travel_movements   = $request['travel_movements'] ;
        $poi->crime_type_1       = $request['crime_type_1'] ;
        $poi->crime_type_2       = $request['crime_type_2'] ;
        $poi->crime_type_3       = $request['crime_type_3'] ;
        $poi->crime_type_4       = $request['crime_type_4'] ;
        $poi->crime_type_5       = $request['crime_type_5'] ;
        $poi->arrest_record_1    = $request['arrest_record_1'] ;
        $poi->arrest_record_2    = $request['arrest_record_2'] ;
        $poi->arrest_record_3    = $request['arrest_record_3'] ;
        $poi->arrest_record_4    = $request['arrest_record_4'] ;
        $poi->arrest_record_5    = $request['arrest_record_5'] ;
        $poi->bank_name          = $request['bank_name'] ;
        $poi->bank_holder_name   = $request['bank_holder_name'] ;
        $poi->bank_branch_code   = $request['bank_branch_code'] ;
        $poi->bank_account_number  = $request['bank_account_number'] ;
        $poi->business_interest   = $request['business_interest'] ;
        $poi->account_1           = $request['account_1'] ;
        $poi->account_2           = $request['account_2'] ;
        $poi->account_3           = $request['account_3'] ;
        $poi->account_4           = $request['account_4'] ;
        $poi->account_5           = $request['account_5'] ;
        $poi->dependants          = $request['dependants'] ;
        $poi->property_owned_1    = $request['property_owned_1'] ;
        $poi->property_owned_2    = $request['property_owned_2'] ;
        $poi->property_owned_3    = $request['property_owned_3'] ;
        $poi->property_rented_1    = $request['property_rented_1'] ;
        $poi->property_rented_2    = $request['property_rented_2'] ;
        $poi->property_rented_3    = $request['property_rented_3'] ;
        $poi->created_by        = \Auth::user()->id;
        $poi->save();

         \Session::flash('success', $request['name'].' '.$request['surname'].' POI has been added successfully!');

        return redirect('list-poi-users');

    }

    public function list_poi()
    {
      $pois = \DB::table('poi')
                        ->select(
                                    \DB::raw(
                                        "
                                         poi.id,
                                         poi.name,
                                         poi.surname,
                                         poi.email,
                                         poi.contact_number_1,
                                         poi.nationality,
                                         poi.gender

                                        "
                                      )
                                );


        return \Datatables::of($pois)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" href="edit-poi-user/{{$id}}" >View / Edit</a>
                                                   <a class="btn btn-xs btn-alt" data-toggle="modal" data-target=".modalPoiAssociate" onClick="launchPersonOfInterestAssocatiatesModal({{$id}});">Associates</a>

                                        '
                                )->make(true);


    }


    public function edit_poi($id) {

       $poi = \DB::table('poi')
                        ->where('poi.id','=',$id)
                        ->select(
                                    \DB::raw(
                                        "
                                         poi.id,
                                         poi.name,
                                         poi.surname,
                                         poi.email,
                                         poi.contact_number_1,
                                         poi.contact_number_2,
                                         poi.contact_number_3,
                                         poi.nationality,
                                         poi.gender,
                                         poi.id_number,
                                         poi.nickname,
                                         poi.language,
                                         poi.drivers_licence,
                                         poi.marital_status_id,
                                         poi.ethnic_group_id,
                                         poi.language,
                                         poi.weight,
                                         poi.birth_place,
                                         poi.scars,
                                         poi.tattoo,
                                         poi.dependants,
                                         poi.address_home,
                                         poi.address_work,
                                         poi.travel_movements,
                                         poi.employment_history,
                                         poi.crime_type_1,
                                         poi.crime_type_2,
                                         poi.crime_type_3,
                                         poi.crime_type_4,
                                         poi.crime_type_5,
                                         poi.arrest_record_1,
                                         poi.arrest_record_2,
                                         poi.arrest_record_3,
                                         poi.arrest_record_4,
                                         poi.arrest_record_5,
                                         poi.property_owned_1,
                                         poi.property_owned_2,
                                         poi.property_owned_3,
                                         poi.property_rented_1,
                                         poi.property_rented_2,
                                         poi.property_rented_3,
                                         poi.credit_record,
                                         poi.bank_name,
                                         poi.bank_holder_name,
                                         poi.bank_branch_code,
                                         poi.bank_account_number,
                                         poi.account_1,
                                         poi.account_2,
                                         poi.account_3,
                                         poi.account_4,
                                         poi.account_5

                                        "
                                      )
                                )->first();


        return view('users.poieditregistration')->with('poi',$poi);

    }


    public function edit_poi_save(Request $request) {

        $poi = Poi::find($request['poiID']);
        $poi->name              = $request['name'];
        $poi->surname           = $request['surname'];
        $poi->id_number         = $request['id_number'];
        $poi->gender            = $request['gender'];
        $poi->nationality       = $request['nationality'];
        $poi->nickname          = $request['nickname'] ;
        $poi->language          = $request['language'];
        $poi->drivers_licence   = $request['drivers_licence'] ;
        $poi->email             = $request['email'] ;
        $poi->ethnic_group_id   = $request['ethnic_group'] ;
        $poi->weight            = $request['weight'] ;
        $poi->birth_place       = $request['birth_place'] ;
        $poi->scars             = $request['scars'] ;
        $poi->tattoo            = $request['tattoo'] ;
        $poi->tattoo            = $request['tattoo'] ;
        $poi->contact_number_1  = $request['contact_number_1'] ;
        $poi->contact_number_2  = $request['contact_number_2'] ;
        $poi->contact_number_3  = $request['contact_number_3'] ;
        $poi->address_home      = $request['address_home'] ;
        $poi->address_work      = $request['address_work'] ;
        $poi->employment_history= $request['employment_history'] ;
        $poi->travel_movements   = $request['travel_movements'] ;
        $poi->crime_type_1       = $request['crime_type_1'] ;
        $poi->crime_type_2       = $request['crime_type_2'] ;
        $poi->crime_type_3       = $request['crime_type_3'] ;
        $poi->crime_type_4       = $request['crime_type_4'] ;
        $poi->crime_type_5       = $request['crime_type_5'] ;
        $poi->arrest_record_1    = $request['arrest_record_1'] ;
        $poi->arrest_record_2    = $request['arrest_record_2'] ;
        $poi->arrest_record_3    = $request['arrest_record_3'] ;
        $poi->arrest_record_4    = $request['arrest_record_4'] ;
        $poi->arrest_record_5    = $request['arrest_record_5'] ;
        $poi->bank_name          = $request['bank_name'] ;
        $poi->bank_holder_name   = $request['bank_holder_name'] ;
        $poi->bank_branch_code   = $request['bank_branch_code'] ;
        $poi->bank_account_number   = $request['bank_account_number'] ;
        $poi->business_interest   = $request['business_interest'] ;
        $poi->account_1           = $request['account_1'] ;
        $poi->account_2           = $request['account_2'] ;
        $poi->account_3           = $request['account_3'] ;
        $poi->account_4           = $request['account_4'] ;
        $poi->account_5           = $request['account_5'] ;

        $poi->save();

        \Session::flash('flash_message','Profile successfully updated.');

        return redirect()->back();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function resendPassword($id)
    {



        return redirect('list-users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id,User $user)
    {


      $userObj = User::find($id);

      if ($userObj->district > 0 ) {

            if ($userObj->municipality > 0) {

                if ($userObj->ward > 0) {

                    if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('districts', 'users.district', '=', 'districts.id')
                                ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                ->join('wards', 'users.ward', '=', 'wards.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.cellphone,
                                                      users.email,
                                                      users.dob,
                                                      users.gender,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      districts.slug as district,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      municipalities.slug as municipality,
                                                      wards.slug as ward,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('wards', 'users.ward', '=', 'wards.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.area,
                                                            users.dob,
                                                            users.gender,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            departments.slug as department,
                                                            municipalities.slug as municipality,
                                                            wards.slug as ward,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('wards', 'users.ward', '=', 'wards.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.dob,
                                                            users.gender,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            municipalities.slug as municipality,
                                                            wards.slug as ward,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department

                } else {

                    if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('districts', 'users.district', '=', 'districts.id')
                                ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.cellphone,
                                                      users.email,
                                                      users.dob,
                                                      users.gender,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      districts.slug as district,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      municipalities.slug as municipality,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.dob,
                                                            users.gender,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            departments.slug as department,
                                                            municipalities.slug as municipality,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.dob,
                                                            users.gender,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            municipalities.slug as municipality,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department


                }//End Ward IF

            } else {

                  if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('districts', 'users.district', '=', 'districts.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.cellphone,
                                                      users.email,
                                                      users.dob,
                                                      users.gender,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      districts.slug as district,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.dob,
                                                            users.gender,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            departments.slug as department,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('districts', 'users.district', '=', 'districts.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.dob,
                                                            users.gender,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            districts.slug as district,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department

            }//End Municipality IF

      } else {

        if ($userObj->municipality > 0) {

                if ($userObj->ward > 0) {

                    if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                ->join('wards', 'users.ward', '=', 'wards.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.cellphone,
                                                      users.email,
                                                      users.dob,
                                                      users.gender,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      municipalities.slug as municipality,
                                                      wards.slug as ward,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('wards', 'users.ward', '=', 'wards.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.dob,
                                                            users.gender,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            departments.slug as department,
                                                            municipalities.slug as municipality,
                                                            wards.slug as ward,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('wards', 'users.ward', '=', 'wards.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.dob,
                                                            users.gender,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            municipalities.slug as municipality,
                                                            wards.slug as ward,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department

                } else {

                    if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.dob,
                                                      users.gender,
                                                      users.cellphone,
                                                      users.email,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      municipalities.slug as municipality,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.email,
                                                            users.dob,
                                                            users.gender,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            departments.slug as department,
                                                            municipalities.slug as municipality,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('municipalities', 'users.municipality', '=', 'municipalities.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.dob,
                                                            users.gender,
                                                            users.cellphone,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            municipalities.slug as municipality,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department


                }//End Ward IF

            } else {

                  if ($userObj->department > 0) {

                          if ($userObj->position > 0) {

                              $user = \DB::table('users')
                                ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                ->join('titles', 'users.title', '=', 'titles.id')
                                ->join('provinces', 'users.province', '=', 'provinces.id')
                                ->join('departments', 'users.department', '=', 'departments.id')
                                ->join('positions', 'users.position', '=', 'positions.id')
                                ->join('languages', 'users.language', '=', 'languages.id')
                                ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                ->where('users.id','=',$id)
                                ->select(
                                          \DB::raw("
                                                      users.id,
                                                      users.name,
                                                      users.active,
                                                      users.surname,
                                                      users.id_number,
                                                      users.cellphone,
                                                      users.email,
                                                      users.dob,
                                                      users.gender,
                                                      users.area,
                                                      users.alt_email,
                                                      users.alt_cellphone,
                                                      users_roles.slug as role,
                                                      titles.slug as title,
                                                      provinces.slug as province,
                                                      departments.slug as department,
                                                      positions.slug as position,
                                                      affiliations.id as affiliation,
                                                      languages.slug as language"
                                          ))
                                ->first();



                          } else {

                                  $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('departments', 'users.department', '=', 'departments.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.dob,
                                                            users.gender,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            departments.slug as department,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();


                          }//End Position

                    } else {

                              $user = \DB::table('users')
                                      ->join('users_roles', 'users.role', '=', 'users_roles.id')
                                      ->join('titles', 'users.title', '=', 'titles.id')
                                      ->join('provinces', 'users.province', '=', 'provinces.id')
                                      ->join('languages', 'users.language', '=', 'languages.id')
                                      ->join('affiliations', 'users.affiliation', '=', 'affiliations.id')
                                      ->where('users.id','=',$id)
                                      ->select(
                                                \DB::raw("
                                                            users.id,
                                                            users.name,
                                                            users.active,
                                                            users.surname,
                                                            users.id_number,
                                                            users.cellphone,
                                                            users.dob,
                                                            users.gender,
                                                            users.email,
                                                            users.area,
                                                            users.alt_email,
                                                            users.alt_cellphone,
                                                            users_roles.slug as role,
                                                            titles.slug as title,
                                                            provinces.slug as province,
                                                            affiliations.id as affiliation,
                                                            languages.slug as language"
                                                ))
                                      ->first();

                    }//End Department

            }//End Municipality IF



      }//End District IF

       return [$user];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateUserRequest $request)
    {
        $user                = User::where('id',$request['userID'])->first();
        $sendSMS             = $user->status;
        $role                = UserRole::where('slug','=',$request['role'])->first();
        $user->role          = $role->id;
        $title               = Title::where('slug','=',$request['title'])->first();
        $user->title         = $title->id;
        $user->name          = $request['name'];
        $user->surname       = $request['surname'];
        $user->id_number     = $request['id_number'];
        $user->alt_cellphone = $request['alt_cellphone'];
        $user->alt_email     = $request['alt_email'];
        $user->active        = $request['status'];
        $user->department    = $request['department'];
        $user->gender        = $request['gender'];
        $user->dob           = $request['dob'];
        $user->position      = $request['position'];
        $department          = Department::where('slug','=',$request['department'])->first();
        $user->department    = $department->id;
        $position            = Position::where('slug','=',$request['position'])->first();
        $user->position      = $position->id;
        $province            = Province::where('slug','=',$request['province'])->first();
        $user->province      = $province->id;
        $district            = District::where('slug','=',$request['district'])->first();
        $user->district      = $district->id;
        $municipality        = Municipality::where('slug','=',$request['municipality'])->first();
        $user->municipality  = $municipality->id;
        $ward                = Ward::where('slug','=',$request['ward'])->first();
        $user->ward          = $ward->id;
        $user->area          = $request['area'];
        $user->affiliation   = $request['affiliation'];
        $user->updated_by    = \Auth::user()->id;
        $user->updated_at    =  \Carbon\Carbon::now('Africa/Johannesburg')->toDateTimeString();
        $userStatusObj       = UserStatus::where('name','=','active')->first();
        $user->active        = $userStatusObj->id;
        $user->save();

         $data = array(
                    'name'      =>  $user->name

          );

         $cellphone = $user->cellphone;
         $language  = Language::find($user->language);


        if ( $sendSMS == 2) {



          switch ($language->name) {
            case 'English':
               \Mail::send('emails.registrationConfirmationSMS',$data, function($message) use ($cellphone)
                  {
                        $message->from('info@siyaleader.net', 'Siyaleader');
                        $message->to('cooluma@siyaleader.net')->subject("ACT: $cellphone" );

                  });
              break;

              case 'IsiZulu':
               \Mail::send('emails.registrationConfirmationSMSZulu',$data, function($message) use ($cellphone)
                  {
                        $message->from('info@siyaleader.net', 'Siyaleader');
                        $message->to('cooluma@siyaleader.net')->subject("ACT: $cellphone" );

                  });
              break;

            default:
              \Mail::send('emails.registrationConfirmationSMS',$data, function($message) use ($cellphone)
                {
                      $message->from('info@siyaleader.net', 'Siyaleader');
                      $message->to('cooluma@siyaleader.net')->subject("ACT: $cellphone" );

                });
              break;
          }


        }


        \Session::flash('success', 'well done! User '.$request['name'].' has been successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function getHouseHolder()
    {
        $searchString   = \Input::get('q');
        $users          = \DB::table('users')
            ->join('languages','users.language','=','languages.id')
            ->join('titles','users.title','=','titles.id')
            ->join('users_roles','users.role','=','users_roles.id')
            ->join('provinces','users.province','=','provinces.id')
            ->join('districts','users.district','=','districts.id')
            ->join('municipalities','users.municipality','=','municipalities.id')
            ->join('wards','users.ward','=','wards.id')
            ->whereRaw(
                            "CONCAT(`users`.`name`, ' ', `users`.`surname`, ' ', `users`.`cellphone`) LIKE '%{$searchString}%'")
            ->select(
                        array

                            (
                                'users.id as id',
                                'users.name as name',
                                'users_roles.name as role',
                                'users.surname as surname',
                                'users.username as username',
                                'users.cellphone as cellphone',
                                'users.area as area',
                                'languages.slug as language',
                                'titles.slug as title',
                                'provinces.slug as province',
                                'districts.slug as district',
                                'municipalities.slug as municipality',
                                'wards.slug as ward',


                            )
                    )

            ->get();

        $data = array();

       foreach ($users as $user) {

            $data[] = array(
                                "name"              => "{$user->name} > {$user->surname} > {$user->cellphone}",
                                "id"                => "{$user->id}",
                                "hseName"           => "{$user->name}",
                                "hseSurname"        => "{$user->surname}",
                                "hseCellphone"      => "{$user->cellphone}",
                                "hseLanguage"       => "{$user->language}",
                                "hseTitle"          => "{$user->title}",
                                "hseProvince"       => "{$user->province}",
                                "hseDistrict"       => "{$user->district}",
                                "hseMunicipality"   => "{$user->municipality}",
                                "hseWard"           => "{$user->ward}",
                                "hseArea"           => "{$user->area}"


                            );
       }

        return $data;
    }


    public function getFieldWorker()
    {
        $searchString   = \Input::get('q');
        $users          = \DB::table('users')
            ->join('languages','users.language','=','languages.id')
            ->join('provinces','users.province','=','provinces.id')
            ->join('districts','users.district','=','districts.id')
            ->join('titles','users.title','=','titles.id')
            ->join('municipalities','users.municipality','=','municipalities.id')
            ->join('wards','users.ward','=','wards.id')
            ->join('users_roles','users.role','=','users_roles.id')
            ->where('users_roles.name','=',"Field Worker")
            ->whereRaw(
                            "CONCAT(`users`.`name`, ' ', `users`.`surname`, ' ', `users`.`cellphone`) LIKE '%{$searchString}%'")
            ->select(
                        array

                            (
                                'users.id as id',
                                'users.id_number as id_number',
                                'users.name as name',
                                'users_roles.name as role',
                                'users.surname as surname',
                                'users.username as username',
                                'users.cellphone as cellphone',
                                'languages.slug as language',
                                'provinces.slug as province',
                                'districts.slug as district',
                                'municipalities.slug as municipality',
                                'wards.slug as ward',
                                'titles.slug as title',
                                'users.area',
                                'users.house_number',
                                'users.gender',
                                'users.dob'
                            )
                    )

            ->get();

        $data = array();

       foreach ($users as $user) {

            $data[] = array(
                                "name"              => "{$user->name} > {$user->surname} > {$user->cellphone}",
                                "id"                => "{$user->id}",
                                "fldName"           => "{$user->name}",
                                "fldSurname"        => "{$user->surname}",
                                "fldIdNumber"       => "{$user->id_number}",
                                "fldCellphone"      => "{$user->cellphone}",
                                "fldLanguage"       => "{$user->language}",
                                "fldProvince"       => "{$user->province}",
                                "fldDistrict"       => "{$user->district}",
                                "fldMunicipality"   => "{$user->municipality}",
                                "fldWard"           => "{$user->ward}",
                                "fldArea"           => "{$user->area}",
                                "fldNumber"         => "{$user->house_number}",
                                "fldTitle"          => "{$user->title}",
                                "fldGender"         => "{$user->gender}",
                                "fldDob"            => "{$user->dob}"
                            );
       }

        return $data;
    }

    public function show(Request $request) {


        $fromDate      = $request['fromDate']." 00:00:00";
        $toDate        = $request['toDate']." 23:59:59";
        $province      = $request['province'];
        $district      = $request['district'];
        $status        = $request['status'];
        $role          = $request['role'];
        $gender        = $request['gender'];
        $created_by    = $request['createdBy'];
        $position      = $request['position'];
        $department    = $request['department'];

        if ($province == "0") {

            $province = "%";
        }

        if ($district == "0") {

            $district = "%";
        }

        if ($status == "0") {

            $status = "%";
        }

        if ($role == "0") {

            $role = "%";
        }

        if ($gender == "0") {

            $gender = "%";
        }


        if ($created_by == "0") {

            $created_by = "%";
        }

        if ($position == "0") {

            $position = "%";
        }

        if ($department == "0") {

            $department = "%";
        }






        $users = \DB::table('users')
            ->join('provinces', 'users.province', '=', 'provinces.id')
            ->join('districts', 'users.district', '=', 'districts.id')
            ->join('users_statuses', 'users.active', '=', 'users_statuses.id')
            ->join('users_roles', 'users.role', '=', 'users_roles.id')
            ->select(
                        \DB::raw(
                                    "
                                        users.id,
                                        users.name,
                                        users.created_at,
                                        users.surname,
                                        users.cellphone,
                                        users.email,
                                        users_statuses.name as active

                                    "
                                )
                        )
            ->whereBetween('users.created_at', array($fromDate,$toDate))
            ->where('provinces.slug','LIKE',$province)
            ->where('districts.slug','LIKE',$district)
            ->where('users_statuses.id','LIKE',$status)
            ->where('users_roles.slug','LIKE',$role)
            ->where('users.gender','LIKE',$gender)
            ->whereRaw("CONCAT(`users`.`name`, ' ', `users`.`surname`) LIKE '$created_by'")
            ->groupBy('users.id');

        return \Datatables::of($users)
                            ->addColumn('actions','<a class="btn btn-xs btn-alt" data-toggle="modal" onClick="launchUpdateUserModal({{$id}});" data-target=".modalEditUser">Edit</a>')
                            ->make(true);



    }
}
