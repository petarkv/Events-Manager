<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Country;
use Session;
use Auth;
use Image;

class UsersController extends Controller
{
    public function getLoginRegister(){
        return \view('users.login_register');
    }

    public function postUserLogin(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('frontSession',$data['email']); //Prevent Routes with Middleware
                return \redirect('/');
            }else{
                return \redirect()->back()->with('flash_message_error','Invalid Email or Password');
            }
        }
    }

    public function postUserRegister(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $usersCount = User::where('username',$data['username'])->count();
            if ($usersCount>0) {
                return \redirect()->back()->with('flash_message_error','Username already exists!');
            }else{
                $usersCount = User::where('email',$data['email'])->count();
                if ($usersCount>0) {
                    return \redirect()->back()->with('flash_message_error','Email already exists!');
                }
            }
            $user = new User;
                $user->first_name = $data['name'];
                $user->last_name = $data['surname'];          
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->password = \bcrypt($data['password']);

                //$user->user_avatar = '';
                //Upload Avatar Image
            if($request->hasFile('avatar')) {
                $image_tmp = $request->avatar;
                if ($image_tmp->isValid()) {
                    
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $original_avatar_path = 'images/backend_images/avatars/original/'.$filename;                    
                    $small_avatar_path = 'images/backend_images/avatars/small/'.$filename;

                    //Resize Image
                    Image::make($image_tmp)->save($original_avatar_path);                    
                    Image::make($image_tmp)->resize(200,200)->save($small_avatar_path);

                    //Store image name in users table
                    $user->user_avatar = $filename;
                }
            }else{
                $user->user_avatar = 'user.jpg';
            }               

        }
        $user->save();
                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
                    Session::put('frontSession',$data['email']);  //Prevent Routes with Middleware
                    return \redirect('/'); 
                }
       
    }

    public function checkEmail(Request $request){
        //Check if User already exists  
        $data = $request->all();    
        $usersCount = User::where('email',$data['email'])->count();
        if ($usersCount>0) {
            echo "false";
        }else{
            echo "true"; die;
        }        
    }
    
    public function checkUsername(Request $request){
        //Check if User already exists  
        $data = $request->all();    
        $usersCount = User::where('username',$data['username'])->count();
        if ($usersCount>0) {
            echo "false";
        }else{
            echo "true"; die;
        }        
    }
    
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');  //Prevent Routes with Middleware
        return \redirect('/login-register');
    }
    
    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = User::find($user_id);
        //echo "<pre>"; print_r($userDetails); die;
        $countries = Country::get();

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            if (empty($data['name'])) {
                return \redirect()->back()->with('flash_message_error','Please enter Name to update Your account details!');
            }

            if (empty($data['surname'])) {
                return \redirect()->back()->with('flash_message_error','Please enter Surname to update Your account details!');
            }
            
            if (empty($data['address'])) {
                $data['address'] = '';
            }

            if (empty($data['city'])) {
                $data['city'] = '';
            }            

            if (empty($data['country'])) {
                $data['country'] = '';
            }

            if (empty($data['postalcode'])) {
                $data['postalcode'] = '';
            }
            if (empty($data['mobile'])) {
                $data['mobile'] = '';
            }

            if (empty($data['avatar'])) {
                $data['avatar'] = 'user.jpg';
            }

            $user = User::find($user_id);
            $user->first_name = $data['name'];
            $user->last_name = $data['surname'];
            $user->address = $data['address'];
            $user->city = $data['city'];            
            $user->country = $data['country'];
            $user->postal_code = $data['postalcode'];
            $user->mobile = $data['mobile'];
            $user->user_avatar = $data['avatar'];
            $user->save();
            return \redirect()->back()->with('flash_message_success','Your account details has been successfully updated!');
        }
        return \view('users.account')->with(\compact('countries','userDetails'));        
    }

    public function checkUserPassword(Request $request){
        //Check if Password is correct  
        $data = $request->all();
        //echo "<pre>"; \print_r($data); die;    
        $current_password = $data['current_password'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }        
    }

    public function updateUserPassword(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; \print_r($data); die;
            $old_password = User::where('id',Auth::User()->id)->first();
            $current_password = $data['current_password'];
            if(Hash::check($current_password,$old_password->password)){
                $new_password = \bcrypt($data['new_password']);
                User::where('id',Auth::User()->id)->update(['password'=>$new_password]);
                return \redirect()->back()->with('flash_message_success','Password is updated successfully!');
            }else{
                return \redirect()->back()->with('flash_message_error','Current Password is incorrect!');
            }
        }
    }
    
}
