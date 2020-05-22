<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
                return \redirect('/');
            }else{
                return \redirect()->back()->with('flass_message_error','Invalid Email or Password');
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
        return \redirect('/login-register');
    }    
}
