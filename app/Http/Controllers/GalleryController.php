<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\EventsImage;
use App\Event;
use App\Albums;
use Auth;
use Image;

class GalleryController extends Controller
{
    public function getAddGallery(){
        return \view('admin.galleries.add_gallery');
    }

    public function postAddGallery(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
        }

            $gallery = new Gallery;
            $gallery->gallery_name = $data['gallery_name'];
            $gallery->city = $data['city'];            
            $gallery->location = $data['location'];  
            $gallery->date = $data['event_date'];
            $gallery->id = Auth::user()->id;          
            #$category->status = $status;
            $gallery->save();

            return \redirect()->back()->with('flash_message_success', 'Gallery added Successfully!');                
    }

    public function getViewGalleries(){
        $galleries = Gallery::orderBy('gallery_id','desc')->get();

        return \view('admin.galleries.view_galleries')->with(compact('galleries'));
    }

    public function deleteGallery($id=null){
        Gallery::where(['gallery_id'=>$id])->delete();

        return \redirect()->back()->with('flash_message_success', 'Gallery has been deleted Successfully');
    }

    public function getEditGallery($id=null){
        $galleryDetails = Gallery::where(['gallery_id'=>$id])->first();

        return \view('admin.galleries.edit_gallery')->with(\compact('galleryDetails'));
    }

    public function postEditGallery(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();

            Gallery::where(['gallery_id'=>$id])->update(['gallery_name'=>$data['gallery_name'],
                                                         'city'=>$data['city'],
                                                         'location'=>$data['location'],
                                                         'date'=>$data['event_date']]);
            return \redirect('/admin/view-galleries')->with('flash_message_success','Gallery updated Successfully');
        }
    }

    public function getViewAlbum($id=null){
        $albumDetails = Albums::where(['gallery_id'=>$id])->get();
        $galleryDetails = Gallery::where(['gallery_id'=>$id])->first();

        return \view('admin.galleries.event_album')->with(compact('albumDetails','galleryDetails'));
    }

    public function addImagesAlbum(Request $request, $id=null){
        $galleryDetails = Gallery::where(['gallery_id'=>$id])->first();        

        if ($request->isMethod('post')) {
            $data = $request->all();

            if($request->hasFile('image')){
            $files = $request->image;
                foreach ($files as $file) {
                
                $image = new Albums;
                $extension = $file->getClientOriginalExtension();
                $filename = \rand(111,99999).'.'.$extension;
                $large_image_path = 'images/backend_images/albums/large/'.$filename;
                $meduim_image_path = 'images/backend_images/albums/medium/'.$filename;
                $small_image_path = 'images/backend_images/albums/small/'.$filename;
                Image::make($file)->save($large_image_path);
                Image::make($file)->resize(600,600)->save($meduim_image_path);
                Image::make($file)->resize(300,300)->save($small_image_path);
                $image->image = $filename;
                $image->gallery_id = $data['gallery_id'];
                $image->save();
                }
            }
            return \redirect('admin/add-images-album/'.$id)->with('flash_message_success','Album Image(s) has been added');
        }
        $albumImages = Albums::where(['gallery_id'=>$id])->get();
        $albumImages = \json_decode(\json_encode($albumImages));

        return \view('admin.galleries.add_images_album')->with(compact('galleryDetails','albumImages'));
    }

    public function deleteAlbumImage($id = null){

        // Get Event Image Name
        $albumImage = Albums::where(['img_id'=>$id])->first();
        //echo $eventImage->image; die;
        $large_image_path = 'images/backend_images/albums/large/';
        $medium_image_path = 'images/backend_images/albums/medium/';
        $small_image_path = 'images/backend_images/albums/small/';

        // Delete Large Image if exist in Folder
        if (\file_exists($large_image_path.$albumImage->image)) {
            \unlink($large_image_path.$albumImage->image);
        }

        // Delete Midium Image if exist in Folder
        if (\file_exists($medium_image_path.$albumImage->image)) {
            \unlink($medium_image_path.$albumImage->image);
        }

        // Delete Small Image if exist in Folder
        if (\file_exists($small_image_path.$albumImage->image)) {
            \unlink($small_image_path.$albumImage->image);
        }

        // Delete Image from Events Table  
        Albums::where(['img_id'=>$id])->delete();
        
        return \redirect()->back()->with('flash_message_success', 'Album Image(s) has been deleted Successfully');
    }
    
}
