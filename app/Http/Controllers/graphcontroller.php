<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\owner;

class graphcontroller extends Controller
{
    public function index(Request $r)
    {
       
               $data=owner::all();
               return $data;
    }

    public function basic(Request $r)
    {
       
              echo "hello";
    }
   
    public function insert(Request $r){

       
        
     // print_r($r->input('name'));die();
      $data=new owner;
      $data->name=$r->name;
      $data->companyname=$r->companyname;
      $data->email=$r->email;
      $data->password=$r->password;
       $data->cpassword=$r->cpassword;
      $data->save();
      
    }

}
