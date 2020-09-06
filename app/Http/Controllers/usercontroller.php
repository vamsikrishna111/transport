<?php
namespace App\Http\Controllers;
use Illuminate\Validation\Rule; 
use DB;
use PDF;

use Redirect;
use Validator;
use Response;
use App\lorrydetails;
use Illuminate\Support\Facades\Input;

use App\Employee;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
     protected $rules =
    [
        'vehiclenumber' => 'required',
        'startlocation' => 'required',
        'endlocation' => 'required',
        'tripcost' => 'required',
        'advance' => 'required',
        'totalkm' => 'required',
        'dieselcost' => 'required',
        'existingdiesel' => 'required',
        'fillup' => 'required',
       'totaldiesel'=>'required'
        
    ];



    public function login(Request $r){
        $r->session()->forget('data');
        return view('login');
    }
    public function register(){
       // return view('register');
       return view('sineup');
     
    }
    public function insertregister(Request $r){

       
        
        // $insert=new Employee;
        // $insert->companyname=$r->companyname;
        // $insert->email=$r->email;
        // $insert->password=$r->password;
        // $insert->cpassword=$r->cpassword;
        // $insert->save();
        $companyname=$r->companyname;
        $name=$r->name;
        $email=$r->email;
        $password=$r->password;
        $cpassword=$r->cpassword;
        if($name=="owner"){
        $r->validate([
            'companyname'=>[
                'required',
                'min:4'
            ],
            'name'=>'required',
           'password' => 'required',
           'cpassword' => 'required|same:password',
               
           'email' => [
               'required',
               'email',
               'max:255',
              
               Rule::unique('owner'),


           ],
    

       ]);
        }else{
            $r->validate([
                'companyname'=>[
                    'required',
                    'min:4'
                ],
                'name'=>'required',
               'password' => 'required',
               'cpassword' => 'required|same:password',
                   
               'email' => [
                   'required',
                   'email',
                   'max:255',
                  
                   Rule::unique('supervisor'),
    
    
               ],
        
    
           ]);
        }
        

        $data=array('name'=>$name,'email'=>$email,'password'=>$password,'cpassword'=>$cpassword,'companyname'=>$companyname);
        if($name=='owner'){
             $users=DB::select('select * from owner');
           
      
            // foreach($users as $value)

            //     print_r($value);die();
             
            
            // $myarray = json_decode(json_encode($data), true);
          
            // foreach($myarray[0] as $value)
            // $data= $value;
           // $users=DB::select('select *from owner');
            
               
            
          //  $data= $data->name;
           
         
           // print_r($data);die();
            DB::table('owner')->insert($data);
   return redirect('login')->with('success','register succesfully please login!');
//return view('login',['users'=>$users]);
          
        }
       else{
       // DB::table('owner')->insert($data);
        DB::table('supervisor')->insert($data);
        return redirect('login')->with('success','register succesfully please login!');

       }
    
     
       // return redirect('login')->with('success','register succesfully please login!');

    }
    public function companylogin(Request $r){
           
$r->validate(
    [
   
    'email'=>  'required',
           'password' => 'required',
         'name'=>'required'
    ]);
     $name=$r->name;
     $email=$r->email;
     $password=$r->password;
     if($name=="owner"){

     
    // $data= DB::select('select * from company where email = ? and password=?',[$email,$password]);
    $data= DB::select('select * from owner where email = ? and password=?',[$email,$password]);
   // print_r($data);die();
   

      if(count($data)==1){
          $r->session()->put('data', $data);
          $users= DB::select('select * from owner');
      

          return redirect()->to('/dropdown')->with('users', $users);


        // return view('dropdown',['users'=>$users]);
        // return redirect('dashboard');
      
      }else{
        return back()->with('error','please enter correct cretendials');
      }
    }else{
        $data= DB::select('select * from supervisor where email = ? and password=?',[$email,$password]);
        // print_r($data);die();
        
     
           if(count($data)==1){
               $r->session()->put('data', $data);
               $users= DB::select('select * from supervisor');
              
     
               return redirect()->to('/dropdown')->with('users', $users);
     
     
             // return view('dropdown',['users'=>$users]);
             // return redirect('dashboard');
           
           }else{
             return back()->with('error','please enter correct cretendials');
           }
    }
     
     
   
     
    }
    public function dropdown(){
       $users= session()->get('users');
      
       
    
        return view('dropdown',['users'=>$users]);

       // return view('dropdown');
    }
    public function dashboard(Request $r){
        $companyname=$r->companyname;
        //echo $companyname;die();
       $data= $r->session()->get('data');
      // print_r($data);die();
          $companyname1= $data[0]->companyname;
        if($companyname== $companyname1){
           
            return view('dashboard',['data'=>$data]);
        }else{
            $data= $r->session()->get('data');
       $name=$data[0]->name;
      // echo $name;die();
       if($name=="owner"){
            $users= DB::select('select * from owner');


         //  return redirect()->to('/dropdown')->with('users', $users);
         return redirect()->to('/dropdown')
               ->with('error', 'please select register company name')
               ->with('users', $users);
       }
       else{
        $users= DB::select('select * from supervisor');
        


        //  return redirect()->to('/dropdown')->with('users', $users);
        return redirect()->to('/dropdown')
              ->with('error', 'please select register company name')
              ->with('users', $users);
       }
          //  return back()->with('error','please select register company');

        }
      
    
    }
    
    public function forgetpassword(){
        return view(' forgetpassword');
    }
    public function conformpassword(Request $r){
//  $email=$r->email;
//   $password=$r->password;
//   $cpassword=$r->cpassword;
  
  $r->validate([
    'email' => [
        'required',
        'email',
        'max:255'
        
    ],
    'name'=>'required',
    'password' => 'required',
    'cpassword' => 'required|same:password',
]);

// $update= DB::select('select * from company where email = ?', [$email]);
// $update1=$update[0]->password;
// //echo $update1;

// //echo $password;die();
// if($update1==$password){
//     return back()->with('error','your old password and new password are same please change');

// }else{
    // $data= DB::update('update company set password = ?, cpassword=? where email = ?',[$password,$cpassword,$email]);

    // if($data==1){
    //     return redirect('login')->with('success','your password is set');
    // }
    // else{
    //     return back()->with('error','please enter register email');
        
    // }

//}
    $name=$r->name;
    $email=$r->email;
    $password=$r->password;
    $cpassword=$r->cpassword;
  //  echo $name;die();
    if($name=="owner"){

    
    $data= DB::select('select * from owner where email = ?',[$email]);
    if(count($data)==1){
    $data=$data[0]->password;
    //echo $data;
   // echo $password;die();

    if($data==$password){
          return back()->with('error','your old password and new password are same please change');

    }

else{
   $data1=  DB::update('update owner set password = ?, cpassword=? where email = ?',[$password,$cpassword,$email]);
  

  
    if($data1==1){
       return redirect('login')->with('success','your password is set');

    }else{
         return back()->with('error','your password is not ready please try again');

    }
}
    }else{
        return back()->with('error','please enter register email');

    }
}else{
    $data= DB::select('select * from supervisor where email = ?',[$email]);
    if(count($data)==1){
    $data=$data[0]->password;
    //echo $data;
   // echo $password;die();

    if($data==$password){
          return back()->with('error','your old password and new password are same please change');

    }

else{
  
   $data1=  DB::update('update supervisor set password = ?, cpassword=? where email = ?',[$password,$cpassword,$email]);

  
    if($data1==1){
       return redirect('login')->with('success','your password is set');

    }else{
         return back()->with('error','your password is not ready please try again');

    }
}
    }else{
        return back()->with('error','please enter register email');

    }
}


    }

    public function divide() {
               
        echo "<br>Test Controller.";
     // return view('form');
     }
     public function lorrydetails(Request $r) {
        $data= $r->session()->get('data');
       $companyname= $data[0]->companyname;
       $name=$data[0]->name;
       $users= DB::select('select * from lorrydetails where companyname = ? and name=?',[$companyname,$name]);
      
        return view('tripdetails',['data'=>$data,'users'=>$users]);
      
     }
     public function insertlorrydetails(Request $request){
        
     // print_r($request->all());die();
   // print_r($request->hasFile('finalbill'));die();
    //   if ($request->hasFile('finalbill')) {
       
    //     $image = $request->file('finalbill');

    //      $filename = $image->getClientOriginalName();
        
    //      $destinationPath = public_path('/images');
    //      $image->move($destinationPath, $filename);
    // $validator = Validator::make($request->all(), $this->rules);
    // if ($validator->fails()) {
    //     return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    // } else {
       // print_r($request->all());die();
       $request->validate([
        
            'vehiclenumber' => 'required',
            'startlocation' => 'required',
            'endlocation' => 'required',
            'tripcost' => 'required',
            'advance' => 'required',
            'totalkm' => 'required',
            'dieselcost' => 'required',
            'existingdiesel' => 'required',
            'fillup' => 'required',
           'totaldiesel'=>'required',
           'filename'=>'required'
            
        
       ]);
     
        if ($request->hasFile('filename')) {
              
                $image = $request->file('filename');
              
        
                 $filename = $image->getClientOriginalName();
                
                 $destinationPath = public_path('/images');
                  $image->move($destinationPath, $filename);
            $userImage = new lorrydetails;
            $userImage->vehiclenumber =$request->vehiclenumber;
            $userImage->startlocation =$request->startlocation;
            $userImage->endlocation =$request->endlocation;
            $userImage->tripcost =$request->tripcost;
            $userImage->advance =$request->advance;
            $userImage->totalkm =$request->totalkm;
            $userImage->dieselcost=$request->dieselcost;
            $userImage->existingdiesel=$request->existingdiesel;
            $userImage->fillup=$request->fillup;
   $userImage->startdate=$request->startdate;
   $userImage->enddate=$request->enddate;
            $userImage->totaldiesel = $request->totaldiesel;
            $info=$request->session()->get('data');
            $companyname=$info[0]->companyname;
           // echo $companyname;die();
            $userImage->companyname = $companyname;
            $name=$info[0]->name;
           // echo $name;die();
            $userImage->name = $name;
            
            //$userImage->size =$request->name;
            $userImage->finalbill = $filename;
         //  $userImage->finalbill = "vamsi";
       //  echo  $userImage;die();
          
            $userImage->save();
            return back()->with('success','lorry details insert successfully');
            // return response()->json($userImage);
      //  }
    }
       
     }
     public function lorrydetailsedit(Request $r,$id){
        $data= $r->session()->get('data');
      
        $companyname= $data[0]->companyname;
        $name=$data[0]->name;
       // echo $id;die();
     
      // $users = DB::select('select * from lorrydetails where id = ?',[$id]);
        $users= DB::select('select * from lorrydetails where companyname = ? and name=? and id=?',[$companyname,$name,$id]);
       // print_r( $users);die();

       
       // $users= DB::select('select * from lorrydetails where companyname = ? and name=?',[$companyname,$name]);
      
         return view('lorrydetailsedit',['data'=>$data,'users'=>$users]);
     }
     public function lorrydetailsupdate(Request $request,$id){
        
        // $request->validate([
        //     'vehiclenumber'=>'required',
        //     'startlocation' => 'required',
        //     'endlocation' => 'required',
        //     'tripcost' => 'required',
        //     'advance' => 'required',
        //     'totalkm' => 'required',
        //     'dieselcost' => 'required',
        //     'existingdiesel' => 'required',
        //     'fillup' => 'required',
        //     'totaldiesel' => 'required',



        //  ]);
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
           
            if ($request->hasFile('finalbill')) {
                      
                $image = $request->file('finalbill');
              // echo $image;die();
        
                 $filename = $image->getClientOriginalName();
                
                
                 $destinationPath = public_path('images');
                
                  $image->move($destinationPath, $filename);
        $post = lorrydetails::findOrFail($id);
            $post->vehiclenumber = $request->vehiclenumber;
            $post->startlocation =$request->startlocation;
            $post->endlocation =$request->endlocation;
            $post->tripcost =$request->tripcost;
            $post->advance =$request->advance;
            $post->totalkm =$request->totalkm;
            $post->dieselcost=$request->dieselcost;
            $post->existingdiesel=$request->existingdiesel;
            $post->fillup=$request->fillup;
            $post->totaldiesel = $request->totaldiesel;
            $post->finalbill= $filename;
            $post->save();
            return response()->json($post);
        } 
        else{

         $post = lorrydetails::findOrFail($id);
        $post->vehiclenumber = $request->vehiclenumber;
        $post->startlocation =$request->startlocation;
        $post->endlocation =$request->endlocation;
        $post->tripcost =$request->tripcost;
        $post->advance =$request->advance;
        $post->totalkm =$request->totalkm;
        $post->dieselcost=$request->dieselcost;
        $post->existingdiesel=$request->existingdiesel;
        $post->fillup=$request->fillup;
        $post->totaldiesel = $request->totaldiesel;
        $post->finalbill=
        $post->save();
        return response()->json($post);
    }
        // if ($request->hasFile('filename')) {
        //     $image = $request->file('filename');
        //    // dd($image);
        //     $filename = $image->getClientOriginalName();
        //    // dd($name);
        //   //  $size = $image->getClientSize();
        // //  dd($size);
        //     $destinationPath = public_path('/images');
        //     $image->move($destinationPath, $filename);
           
        // $users=lorrydetails::where('id',[$id])->update(['vehiclenumber'=>$request->vehiclenumber,'startlocation'=>$request->startlocation,'endlocation'=>$request->endlocation,'tripcost'=>$request->tripcost,'advance'=>$request->advance,'totalkm'=>$request->totalkm,'dieselcost'=>$request->dieselcost,'existingdiesel'=>$request->existingdiesel,'fillup'=>$request->fillup,'totaldiesel'=>$request->totaldiesel,'finalbill'=>$filename]);
        //  //dd($users);
        //       return redirect('lorrydetails');
        // }
        // else{
        //     $users=lorrydetails::where('id',[$id])->update(['vehiclenumber'=>$request->vehiclenumber,'startlocation'=>$request->startlocation,'endlocation'=>$request->endlocation,'tripcost'=>$request->tripcost,'advance'=>$request->advance,'totalkm'=>$request->totalkm,'dieselcost'=>$request->dieselcost,'existingdiesel'=>$request->existingdiesel,'fillup'=>$request->fillup,'totaldiesel'=>$request->totaldiesel]);
        //  //dd($users);
        //       return redirect('lorrydetails');
        // }
        }   
     }
     public function delete($id){
        
        $users=lorrydetails::where('id',[$id])->delete();
        return redirect('lorrydetails');
     }
     public function download($file){
       //  die('hii');
        $downlaod= public_path(). "/images/$file";
       // echo $downlaod;die();
        return response()->download($downlaod);
       
     }
public function picklorry(Request $r){
                    $data= $r->session()->get('data');
       $companyname= $data[0]->companyname;
       $name=$data[0]->name;
      // $users= DB::select('select * from lorrydetails where companyname = ? and name=?',[$companyname,$name]);
     
        return view('picklorry',['data'=>$data]);

}
public function selectlorry(Request $r){
    // print_r($request->all());die();
    $r->validate([
        
        'vehiclenumber' => 'required',
       'startdate'=>'required',
       "enddate"=>'required'
        
    
   ]);
$vehiclenumber=$r->vehiclenumber;
$startdate=$r->startdate;
$enddate=$r->enddate;


$users=DB::select('select * from lorrydetails where vehiclenumber = ? AND startdate >= ? AND enddate <=?',[$vehiclenumber,$startdate,$enddate]);
  
$data= $r->session()->get('data');



 $error="no records found";
 return view('picklorry',['users'=>$users,'data'=>$data,'error'=>$error]);
    }




    public function selectdownload($id){
        $data = lorrydetails::where('id', $id)->get();
        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf',['data'=>$data]);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'images');
        // Finally, you can download the file using download function
        return $pdf->download('lorrydetails.pdf');
    }
}


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              