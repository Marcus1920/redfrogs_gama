<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Department;
use App\Category;
use App\SubCategory;
use App\SubSubCategory;
use App\User;
use App\UserNew;
use App\Actiontakens;
use  App\CaseType ; 
class DepartController extends Controller
{



    private $categorys;


    public function __construct(Category $categorys)
    {

        $this->category = $categorys;

    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	 
	 public function   castype  (){
		 
		 
		 $key     = \Input::get('api_key');
			
		   $key     ="57ea53e62d40e";
		   $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();
	
             if($api_key != null && $api_key != "null")
			 {
				$data     = CaseType::all();
				 
				 if (sizeof($data) > 0 )
				{ 
				   return \Response::json($data ,200);
				 }
				 else
				{
					echo "no keys";
				}
			}
		    else
		{
			echo "no keyd";
		}
		 
		 
	 }
	 
	 
	 public  function   action (Request $request){
		 
		$key     = \Input::get('api_key');
			
		   $key     ="57ea53e62d40e";
		   $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();
	
             if($api_key != null && $api_key != "null")
			 {
				$data     = Actiontakens::all();
				 
				 if (sizeof($data) > 0 )
				{ 
				   return \Response::json($data ,200);
				 }
				 else
				{
					echo "no keys";
				}
			}
		    else
		{
			echo "no keyd";
		}
	 }
	 
     public function index(Request $request)
    {
$key     = \Input::get('api_key');
$id    = \Input::get('id');
$comments = Category::find($id)->subcategoriess;

	
			
			 $response = array();
		   //$key     ="57ea53e62d40e";
		   $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();
	
             if($api_key != null && $api_key != "null")
			 {
				$data     = $comments;
				 
				 if (sizeof($data) > 0 )
				{ 
				   return \Response::json($data ,201);
				 }
				 else
				{
					return \Response::json($response);
				}
				
			}
		    else
		{
			echo "no key";
		}
}


public  function   subcategories () {
	
 $key     = \Input::get('api_key');
$id    = \Input::get('id');


			 $response = array();
		 //  $key     ="57ea53e62d40e";
		   $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();
	
             if($api_key != null && $api_key != "null")
			 {
				 $comments = SubCategory::find($id)->subsubcategoriess;
				$data     = $comments;
				 
				 if (sizeof($data) > 0 )
				{ 
				   return \Response::json($data ,201);
				 }
				 else
				{
					 
                return \Response::json($response);
				
				}
				
			}
		    else
		{
			echo "no key";
		}
} 


public  function   categories (Request $request) {
	
	$key     = \Input::get('api_key');
			
		  // $key     ="57ea53e62d40e";
		   $api_key      = UserNew::select('api_key')->where('api_key','=',$key)->first();
	
             if($api_key != null && $api_key != "null")
			 {
				$data     = Category::all();
				 
				 if (sizeof($data) > 0 )
				{ 
				   return \Response::json($data ,201);
				 }
				 else
				{
					echo "no key";
				}
			}
		    else
		{
			echo "no key";
		}
	
	
} 

   


}
