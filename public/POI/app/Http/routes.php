<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\Task;
use App\Note;


Route::get('welcome', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('hometest', function(){return View::make('hometest');}) ;

Route::get('poi_case_detail', function(){return View::make('poi_case_detail');}) ;

Route::get('poi_edit_case', function(){return View::make('poi_edit_case');}) ;

Route::get('/', function(){
	$tasks = Task::orderBy('FIRST_NAME', 'asc')->get();
	return View::make('poi_listing', ['tasks' => $tasks]);
	});
	
/* Route::get('/', function(){
	
	return View::make('test');
	}); */


Route::get('poi_search_list', function(Request $request){
	
	$surname = $request->searchcase;
	$tasks = Task::where('SURNAME','like','%'.$surname.'%')->orWhere('FIRST_NAME','like','%'.$surname.'%')->get();
	return View::make('poi_search_list', ['tasks' => $tasks]);
	
	}) ;

Route::post('/poi_listing', function (Request $request) {
	
	$validator = Validator::make($request->all(), [
            /* 'firstname' => 'required',
            'surname' => 'required',
			'idnumber' => 'required',
			'sextype' => 'required',
			'nationality' => 'required', */
			'emailaddress' => 'email',
			'contactnumber' => 'numeric|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
    
    $task = new Task;
    $task->FIRST_NAME = $request->firstname;
	$task->SURNAME = $request->surname;
	$task->ID_NUMBER = $request->idnumber;
	$task->SEX_TYPE = $request->sextype;
	$task->NATIONALITY = $request->nationality;
	$task->NICKNAME = $request->nickname;
	$task->LANGUAGE_SPOKEN = $request->languagespoken;
	$task->DRIVER_LICENSE = $request->driverlicense;
	$task->MARITAL_STATUS = $request->maritalstatus;
	$task->ADDRESS_HOME = $request->addresshome;
	$task->ADDRESS_WORK = $request->addresswork;
	$task->CONTACT_NUMBER_1 = $request->contactnumber1;
	$task->CONTACT_NUMBER_2 = $request->contactnumber2;
	$task->CONTACT_NUMBER_3 = $request->contactnumber3;
	$task->EMAIL_ADDRESS = $request->emailaddress;
	
	$task->ETHNIC_GROUP = $request->ethnicgroup;
	$task->BIRTH_PLACE = $request->birthplace;
	$task->WEIGHT = $request->weight;
	$task->HEIGHT = $request->height;
	$task->SCARS = $request->scars;
	$task->TATTOO = $request->tattoo;
	$task->NUMBER_DEPENDENT = $request->numberdependent;
	$task->TRAVEL_MOVEMENT = $request->travelmovement;
	$task->EMPLOYMENT_HISTORY = $request->employmenthistory;
	
	$task->CRIME_TYPE_1 = $request->crimetype1;
	$task->CRIME_TYPE_2 = $request->crimetype2;
	$task->CRIME_TYPE_3 = $request->crimetype3;
	$task->CRIME_TYPE_4 = $request->crimetype4;
	$task->CRIME_TYPE_5 = $request->crimetype5;
	
	$task->ARREST_RECORD_1 = $request->arrestrecord1;
	$task->ARREST_RECORD_2 = $request->arrestrecord2;
	$task->ARREST_RECORD_3 = $request->arrestrecord3;
	$task->ARREST_RECORD_4 = $request->arrestrecord4;
	$task->ARREST_RECORD_5 = $request->arrestrecord5;
	
	$task->BANK_NAME = $request->bankname;
	$task->BANK_ACCOUNT_NAME = $request->bankaccountname;
	$task->BANK_BRANCH_CODE = $request->bankbranchcode;
	$task->BANK_ACCOUNT_NUMBER = $request->bankaccountnumber;
	$task->ACCOUNT_1 = $request->account1;
	$task->ACCOUNT_2 = $request->account2;
	$task->ACCOUNT_3 = $request->account3;
	$task->ACCOUNT_4 = $request->account4;
	$task->ACCOUNT_5 = $request->account5;
	$task->CREDIT_RECORD = $request->creditrecord;
	$task->BUSINESS_INTEREST = $request->businessinterest;
	$task->KNOWN_ASSOCIATE = $request->knownassociate;
	$task->PROPERTY_OWNED_1 = $request->propertyowned1;
	$task->PROPERTY_OWNED_2 = $request->propertyowned2;
	$task->PROPERTY_OWNED_3 = $request->propertyowned3;
	$task->PROPERTY_RENTED_1 = $request->propertyrented1;
	$task->PROPERTY_RENTED_2 = $request->propertyrented2;
	$task->PROPERTY_RENTED_3 = $request->propertyrented3;
	
	
	$task->save();
	
	if(Input::hasFile('imagename'))
	{
		$imageName = $task->id . '.' . 
        $request->file('imagename')->getClientOriginalExtension();

		$request->file('imagename')->move(
        base_path() . '/public/images/', $imageName);
		$task->PICTURE = $imageName;
	}
	
	
	
	
    $task->save();
    
	$request->session()->flash('alert-success', 'Person was successful added!');
	return redirect('/');
	});


Route::post('casedetail/{id}', function($id, Request $request ){
	try{
		$note = new Note;
		$note->CASE_ID = $id;
		$note->CASE_NOTE = $request->casenote;
		$note->USERNAME = 'Roland';
		$note->save();
		
		$tasks = Task::where('id', $id)->get();
		$notes = Note::where('CASE_ID', $id)->orderBy('created_at', 'desc')->get();
		
		return View::make('casedetail', ['tasks' => $tasks], ['notes' => $notes]); 
		
	}catch(ValidationException $e){
		return Redirect::to('casedetail/{id}')
        ->withErrors( $e->getErrors() )
        ->withInput();
	}
	});
	
	
Route::get('poi_case_detail/{id}', function($id){
	
	$tasks = Task::where('id', $id)->get();
	$notes = Note::where('CASE_ID', $id)->orderBy('created_at', 'desc')->get();
	
	return View::make('poi_case_detail', ['tasks' => $tasks], ['notes' => $notes]);
	});
	
Route::get('poi_edit_case/{id}', function($id){
	
	$tasks = Task::where('id', $id)->get();
	$associates = Task::orderBy('FIRST_NAME', 'asc')->get();
	
	return View::make('poi_edit_case', ['tasks' => $tasks], ['associates' => $associates]);
	});
	
Route::post('poi_case_detail/{id}', function ($id) {
	
	$tasks = Task::findOrFail($id);
    $tasks->FIRST_NAME = Input::get('firstname');
    $tasks->SURNAME = Input::get('surname');
    $tasks->ID_NUMBER = Input::get('idnumber');
    $tasks->NATIONALITY = Input::get('nationality');
	$tasks->SEX_TYPE = Input::get('sextype');
	$tasks->NICKNAME = Input::get('nickname');
	$tasks->LANGUAGE_SPOKEN = Input::get('languagespoken');
	$tasks->DRIVER_LICENSE = Input::get('driverlicense');
	$tasks->MARITAL_STATUS = Input::get('maritalstatus');
	$tasks->ADDRESS_HOME = Input::get('addresshome');
	$tasks->ADDRESS_WORK = Input::get('addresswork');
	$tasks->CONTACT_NUMBER_1 = Input::get('contactnumber1');
	$tasks->CONTACT_NUMBER_2 = Input::get('contactnumber2');
	$tasks->CONTACT_NUMBER_3 = Input::get('contactnumber3');
	$tasks->EMAIL_ADDRESS = Input::get('emailaddress');
	
	$tasks->ETHNIC_GROUP = Input::get('ethnicgroup');
	$tasks->BIRTH_PLACE = Input::get('birthplace');
	$tasks->WEIGHT = Input::get('weight');
	$tasks->HEIGHT = Input::get('height');
	$tasks->SCARS = Input::get('scars');
	$tasks->TATTOO = Input::get('tattoo');
	
	$tasks->NUMBER_DEPENDENT = Input::get('numberdependent');
	$tasks->TRAVEL_MOVEMENT = Input::get('travelmovement');
	$tasks->EMPLOYMENT_HISTORY = Input::get('employmenthistory');
	
	$tasks->CRIME_TYPE_1 = Input::get('crimetype1');
	$tasks->CRIME_TYPE_2 = Input::get('crimetype2');
	$tasks->CRIME_TYPE_3 = Input::get('crimetype3');
	$tasks->CRIME_TYPE_4 = Input::get('crimetype4');
	$tasks->CRIME_TYPE_5 = Input::get('crimetype5');
	
	$tasks->ARREST_RECORD_1 = Input::get('arrestrecord1');
	$tasks->ARREST_RECORD_2 = Input::get('arrestrecord2');
	$tasks->ARREST_RECORD_3 = Input::get('arrestrecord3');
	$tasks->ARREST_RECORD_4 = Input::get('arrestrecord4');
	$tasks->ARREST_RECORD_5 = Input::get('arrestrecord5');
	
	$tasks->BANK_NAME = Input::get('bankname');
	$tasks->BANK_ACCOUNT_NAME = Input::get('bankaccountname');
	$tasks->BANK_BRANCH_CODE = Input::get('bankbranchcode');
	$tasks->BANK_ACCOUNT_NUMBER = Input::get('bankaccountnumber');
	$tasks->ACCOUNT_1 = Input::get('account1');
	$tasks->ACCOUNT_2 = Input::get('account2');
	$tasks->ACCOUNT_3 = Input::get('account3');
	$tasks->ACCOUNT_4 = Input::get('account4');
	$tasks->ACCOUNT_5 = Input::get('account5');
	$tasks->CREDIT_RECORD = Input::get('creditrecord');
	$tasks->BUSINESS_INTEREST = Input::get('businessinterest');
	$tasks->KNOWN_ASSOCIATE = Input::get('knownassociate');
	$tasks->PROPERTY_OWNED_1 = Input::get('propertyowned1');
	$tasks->PROPERTY_OWNED_2 = Input::get('propertyowned2');
	$tasks->PROPERTY_OWNED_3 = Input::get('propertyowned3');
	$tasks->PROPERTY_RENTED_1 = Input::get('propertyrented1');
	$tasks->PROPERTY_RENTED_2 = Input::get('propertyrented2');
	$tasks->PROPERTY_RENTED_3 = Input::get('propertyrented3');
	
	
    $tasks->save();
	 
	return redirect('poi_all_case');
    //return View::make('poi_all_case', ['tasks' => $tasks]);
	});

/* Route::get('poi_casedetail/{id}', function($id){
	
	$tasks = Task::where('id', $id)->get();
	
	return View::make('poi_casedetail', ['tasks' => $tasks]);}) ; */
	
/* Route::get('personaldetail', function(){
	$tasks = Task::orderBy('created_at', 'asc')->get();

	return View::make('personaldetail', ['tasks' => $tasks]);
	}); */
	
Route::get('poi_all_case', function(){
	$tasks = Task::orderBy('created_at', 'asc')->get();

	return View::make('poi_all_case', ['tasks' => $tasks]);
	});
	
Route::post('poi_all_case/{id}', function ($id, Request $request) {
	
	
	DB::table('tasks')->where('id', '=', $id)->delete();
	DB::table('notes')->where('CASE_ID', '=', $id)->delete();
    
	$request->session()->flash('alert-success', 'Person has been deleted!');
    return redirect('poi_all_case');
	});

/* Route::post('/hometest', function (Request $request) {
    
    $task = new Task;
    $task->FIRST_NAME = $request->firstname;
	$task->SURNAME = $request->surname;
	$task->ID_NUMBER = $request->idnumber;
	$task->NATIONALITY = $request->nationality;
	$task->CRIME_TYPE = $request->crimetype;
	$task->ARREST_RECORD = $request->arrestrecord;
	$task->ADD_NOTE = $request->addnote;
	$task->save();
	
	$imageName = $task->id . '.' . 
        $request->file('imagename')->getClientOriginalExtension();

    $request->file('imagename')->move(
        base_path() . '/public/images/', $imageName
    );
	
	$task->PICTURE = $imageName;
    $task->save();
    
	return redirect('/');
	}); */

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);
