<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Session;
use Image;
use DB;
use App\Event;
use App\Category;
use App\City;
use App\EventsImage;
use App\Ticket;
use App\Banner;

class EventController extends Controller
{
    public function getAddEvent(){
        $categories = Category::get();
        $cities = City::get();
        //Categories Dropdown
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            $categories_dropdown .= "<option value='".$cat->category_id."'>".$cat->name."</option>";                       
        }
        //Cities Dropdown
        $cities_dropdown = "<option selected disabled>Select</option>";
        foreach ($cities as $city) {
            $cities_dropdown .= "<option value='".$city->city_id."'>".$city->name."</option>";                       
        }
        return \view('admin.events.add_event')->with(\compact('categories_dropdown','cities_dropdown'));
    }

    public function postAddEvent(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $event = new Event;

            if (empty($data['category_id'])) {
                return \redirect()->back()->with('flash_message_error','Event Category is missing');
            }
            $event->category_id = $data['category_id'];
            $event->title = $data['event_title'];

            if (!empty($data['description'])) {
                $event->event_description = $data['description'];
            }else{
                $event->event_description = '';
            }

            if (empty($data['city_id'])) {
                return \redirect()->back()->with('flash_message_error','Event City is missing');
            }
            $event->city_id = $data['city_id'];

            $event->place_name = $data['location_name'];
            $event->place_address = $data['location_address'];

            $event->start_event = $data['starts_at'];
            $event->end_event = $data['ends_at'];

            $event->ticket_price = $data['price'];

            if (!empty($data['web_address'])) {
                $event->www_address = $data['web_address'];
            }else{
                $event->www_address = '';
            }

            $event->id = Auth::user()->id;

            //$event->image = '';
            //echo "<pre>"; print_r($data); die;
            //$event->save();

            //Upload Image
            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                if ($image_tmp->isValid()) {
                    
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/events/large/'.$filename;
                    $medium_image_path = 'images/backend_images/events/medium/'.$filename;
                    $small_image_path = 'images/backend_images/events/small/'.$filename;

                    //Resize Image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //Store image name in products table
                    $event->image = $filename; 
                }
            }

            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }
            $event->is_active = $status;

            if (empty($data['buy_tickets'])) {
                $buy_tickets = 0;
            }else{
                $buy_tickets = 1;
            }
            $event->buy_tickets = $buy_tickets;
            
        }
        $event->save();
        //return \redirect()->back()->with('flash_message_success','Event has been added successfully');
        return \redirect('/admin/view-events')->with('flash_message_success','Event has been added successfully');
    }

    public function getViewEvents(){
        $events = Event::orderBy('event_id','desc')->get();
        //$events = \json_decode(\json_encode($events)); 
        foreach ($events as $key => $event) {
            $category_name = Category::where(['category_id'=>$event->category_id])->first();
            $events[$key]->category_name = $category_name->name;
        }
        foreach ($events as $key => $event) {
            $city_name = City::where(['city_id'=>$event->city_id])->first();
            $events[$key]->city_name = $city_name->name;
        }
        return \view('admin.events.view_events')->with(\compact('events'));
    }

    public function getEditEvent($id=null){
        $eventDetails = Event::where(['event_id'=>$id])->first();

        $categories = Category::get();
        $cities = City::get();
        //Categories Dropdown
        $categories_dropdown = "<option selected disabled>Select</option>";
        foreach ($categories as $cat) {
            if ($cat->category_id==$eventDetails->category_id) {
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdown .= "<option value='".$cat->category_id."' ".$selected.">".$cat->name."</option>";                       
        }
        //Cities Dropdown
        $cities_dropdown = "<option selected disabled>Select</option>";
        foreach ($cities as $city) {
            if ($city->city_id==$eventDetails->city_id) {
                $selected = "selected";
            }else{
                $selected = "";
            }
            $cities_dropdown .= "<option value='".$city->city_id."' ".$selected.">".$city->name."</option>";                       
        }
        return \view('admin.events.edit_event')->with(\compact('eventDetails','categories_dropdown','cities_dropdown'));
    }

    public function postEditEvent(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

             //Upload Image            
            if($request->hasFile('image')) {
                $image_tmp = $request->image;
                if ($image_tmp->isValid()) {
                    
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/events/large/'.$filename;
                    $medium_image_path = 'images/backend_images/events/medium/'.$filename;
                    $small_image_path = 'images/backend_images/events/small/'.$filename;

                    //Resize Image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);                    
                }
            }else{
                $filename = $data['current_image'];
            }

            if (empty($data['description'])) {
                $data['description'] = '';
            }

            if (empty($data['web_address'])) {
                $data['web_address'] = '';
            }

            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }

            if (empty($data['buy_tickets'])) {
                $buy_tickets = 0;
            }else{
                $buy_tickets = 1;
            }
            
            Event::where(['event_id'=>$id])->update(['category_id'=>$data['category_id'],
                                                'city_id'=>$data['city_id'],
                                                'title'=>$data['title'],
                                                'event_description'=>$data['description'],
                                                'place_name'=>$data['location_name'],
                                                'place_address'=>$data['location_address'],
                                                'start_event'=>$data['starts_at'],
                                                'end_event'=>$data['ends_at'],
                                                'ticket_price'=>$data['price'],
                                                'www_address'=>$data['web_address'],                                                
                                                'image'=>$filename,
                                                'is_active'=>$status,
                                                'buy_tickets'=>$buy_tickets]);

            return \redirect('/admin/view-events')->with('flash_message_success','Event has been updated Successfully');
        }
    }

    public function deleteEventImage($id = null){

        // Get Event Image Name
        $eventImage = Event::where(['event_id'=>$id])->first();
        //echo $eventImage->image; die;
        $large_image_path = 'images/backend_images/events/large/';
        $medium_image_path = 'images/backend_images/events/medium/';
        $small_image_path = 'images/backend_images/events/small/';

        // Delete Large Image if exist in Folder
        if (\file_exists($large_image_path.$eventImage->image)) {
            \unlink($large_image_path.$eventImage->image);
        }

        // Delete Midium Image if exist in Folder
        if (\file_exists($medium_image_path.$eventImage->image)) {
            \unlink($medium_image_path.$eventImage->image);
        }

        // Delete Small Image if exist in Folder
        if (\file_exists($small_image_path.$eventImage->image)) {
            \unlink($small_image_path.$eventImage->image);
        }

        // Delete Image from Events Table  
        Event::where(['event_id'=>$id])->update(['image'=>'']);
        
        return \redirect()->back()->with('flash_message_success', 'Event Image has been deleted Successfully');
    }
    
    public function deleteAltImage($id = null){

        // Get Event Image Name
        $eventImage = EventsImage::where(['image_id'=>$id])->first();
        //echo $eventImage->image; die;
        $large_image_path = 'images/backend_images/events/large/';
        $medium_image_path = 'images/backend_images/events/medium/';
        $small_image_path = 'images/backend_images/events/small/';

        // Delete Large Image if exist in Folder
        if (\file_exists($large_image_path.$eventImage->image)) {
            \unlink($large_image_path.$eventImage->image);
        }

        // Delete Midium Image if exist in Folder
        if (\file_exists($medium_image_path.$eventImage->image)) {
            \unlink($medium_image_path.$eventImage->image);
        }

        // Delete Small Image if exist in Folder
        if (\file_exists($small_image_path.$eventImage->image)) {
            \unlink($small_image_path.$eventImage->image);
        }

        // Delete Image from Events Table  
        EventsImage::where(['image_id'=>$id])->delete();
        
        return \redirect()->back()->with('flash_message_success', 'Event Alternate Image(s) has been deleted Successfully');
    } 

    public function deleteEvent($id=null){

        $eventImage = Event::where(['event_id'=>$id])->first();
        //echo $eventImage->image; die;
        $large_image_path = 'images/backend_images/events/large/';
        $medium_image_path = 'images/backend_images/events/medium/';
        $small_image_path = 'images/backend_images/events/small/';

        // Delete Large Image if exist in Folder
        if (\file_exists($large_image_path.$eventImage->image)) {
            \unlink($large_image_path.$eventImage->image);
        }

        // Delete Midium Image if exist in Folder
        if (\file_exists($medium_image_path.$eventImage->image)) {
            \unlink($medium_image_path.$eventImage->image);
        }

        // Delete Small Image if exist in Folder
        if (\file_exists($small_image_path.$eventImage->image)) {
            \unlink($small_image_path.$eventImage->image);
        }

        Event::where(['event_id'=>$id])->delete();
        
        return \redirect()->back()->with('flash_message_success', 'Event has been deleted Successfully');
    }

    public function getEventsByCategory($url=null,$city_id=null){
        //Get all categories
        $categories = Category::get();

        $categoryDetails = Category::where('url',$url)->first();

        $eventDetails = Event::where('category_id',$categoryDetails->category_id)->first();

        $eventsAll = Event::where(['category_id'=>$categoryDetails->category_id])->orderBy('event_id','desc')->paginate(3);
        
        //$city_name = City::where('city_id',$eventDetails->city_id)->first();
        //$eventDetails->city_name = $city_name->name;

        $banners = Banner::where('status','1')->get();

        return \view('events.listing')->with(compact('categoryDetails','eventsAll','eventDetails','categories','banners'));
    }

    public function getEventDetails($id=null){

        // Get Event Details
        $eventDetails = Event::where('event_id',$id)->first();
        //$eventDetails = \json_decode(\json_encode($eventDetails));
        //echo "<pre>"; print_r($eventDetails); die;

        $relatedEvents = Event::where('event_id','!=',$id)->where(['category_id'=>$eventDetails->category_id])->get();

        /*foreach ($relatedEvents->chunk(3) as $chunk) {
            foreach ($chunk as $item) {
                echo $item; echo "<br>";
            }
            echo "<br><br><br>";
        }*/

        $categories = Category::get();

       
            $category_name = Category::where(['category_id'=>$eventDetails->category_id])->first();
            $eventDetails->category_name = $category_name->name;
       
        
            $city_name = City::where(['city_id'=>$eventDetails->city_id])->first();
            $eventDetails->city_name = $city_name->name;
        
        //Get Event Alternate Images
        $eventAltImages = EventsImage::where('event_id',$id)->get();    

        //Get Ticket Details
        $tickets = Ticket::where(['event_id'=>$id])->get();

        //Get Number of Tickets from DB
        $total_stock = Ticket::where('event_id',$id)->sum('stock');

        return \view('events.detail')->with(compact('eventDetails','categories','eventAltImages',
                                                'tickets','total_stock','relatedEvents'));
    }

    public function addImages(Request $request, $id=null){
        $eventDetails = Event::where(['event_id'=>$id])->first();

        $city_name = City::where(['city_id'=>$eventDetails->city_id])->first();
        $eventDetails->city_name = $city_name->name;

        if ($request->isMethod('post')) {
            $data = $request->all();

            if($request->hasFile('image')){
                $files = $request->image;
                foreach ($files as $file) {
                    
                    $image = new EventsImage;
                    $extension = $file->getClientOriginalExtension();
                    $filename = \rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/events/large/'.$filename;
                    $meduim_image_path = 'images/backend_images/events/medium/'.$filename;
                    $small_image_path = 'images/backend_images/events/small/'.$filename;
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600,600)->save($meduim_image_path);
                    Image::make($file)->resize(300,300)->save($small_image_path);
                    $image->image = $filename;
                    $image->event_id = $data['event_id'];
                    $image->save();
                }
            }
            return \redirect('admin/add-images/'.$id)->with('flash_message_success','Event Images has been added');
        }
        $eventsImages = EventsImage::where(['event_id'=>$id])->get();
        $eventsImages = \json_decode(\json_encode($eventsImages));

        return \view('admin.events.add_images')->with(compact('eventDetails','eventsImages'));
    }

    public function loadEventsCalendar(){
        $events = Event::get();

        foreach ($events as $row) {
            $data[] = array(
                'id'=>$row['event_id'],
                'title'=>$row['title'],
                'start'=>$row['start_event'],
                'end'=>$row['end_event']
            );
        }

        echo \json_encode($data);
        
    }

    public function addTickets(Request $request, $id=null){
        $eventDetails = Event::where(['event_id'=>$id])->first();
        //$eventDetails = \json_decode(\json_encode($eventDetails));
        //echo "<pre>"; print_r($eventDetails); die;

        
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            foreach ($data['code'] as $key => $val) {
                if(!empty($val)){
                    //Code Check
                    $ticketCodeCount = Ticket::where('ticket_code',$val)->count();
                    if ($ticketCodeCount>0) {
                        return \redirect('admin/add-tickets/'.$id)->with('flash_message_error','Ticket Code already exists!
                                            Please add another Code.');
                    }
                    
                    //Prevent duplicate Type
                    $ticketTypeCount = Ticket::where(['event_id'=>$id,'ticket_type'=>$data['type'][$key]])->count();
                    if ($ticketTypeCount>0) {
                        return \redirect('admin/add-tickets/'.$id)->with('flash_message_error',
                                '"'.$data['type'][$key].'" Type already exists for this Event! Please add another Ticket Type.');                                            
                    }

                    $ticket = new Ticket;
                    $ticket->event_id = $id;
                    $ticket->ticket_code = $val;
                    $ticket->ticket_type = $data['type'][$key];
                    $ticket->price = $data['price'][$key];
                    $ticket->stock = $data['stock'][$key];
                    $ticket->save();
                }
            }
            return \redirect('/admin/add-tickets/'.$id)->with('flash_message_success',
                            'Ticket has been added Successfully!');
        }
        $tickets = Ticket::where(['event_id'=>$id])->get();

        return \view('admin.events.add_tickets')->with(compact('eventDetails','tickets'));
    } 
    
    public function editTickets(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            foreach ($data['idTicket'] as $key => $tick) {
                Ticket::where(['id'=>$data['idTicket'][$key]])->update(['price'=>$data['price'][$key],
                                                                        'stock'=>$data['stock'][$key]]);
            }
            return \redirect()->back()->with('flash_message_success','Ticket has been updated Successfully!');
        }
    }

    public function getEventPrice(Request $request){    
        $data = $request->all();   

        //echo "<pre>"; print_r($data); die;
        $proArr = explode("*",$data['idType']);
        //echo $proArr[0]; echo $proArr[1]; die;
        $proAttr = Ticket::where(['event_id' => $proArr[0], 'ticket_type' => $proArr[1]])->first();
        echo $proAttr->price;
        echo "#";
        echo $proAttr->stock;
    } 

    public function deleteTicket($id=null){
        Ticket::where(['id'=>$id])->delete();
        return \redirect()->back()->with('flash_message_success','Ticket has been deleted Successfully');
    }

    public function addtocart(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        if (empty($data['user_email'])) {
            $data['user_email'] = '';
        }

        /*if (empty($data['session_id'])) {
            $data['session_id'] = '';
        }*/

        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = Str::random(40);
        Session::put('session_id',$session_id);
        }
        
        $typeArr = explode("*",$data['type']); 
        
        if(empty($typeArr[1])){
            return \redirect()->back()->with('flash_message_error','You need to select ticket type first!');
        }else{
        $countTickets = DB::table('cart')->where(['event_id'=>$data['event_id'],                                   
                                                'ticket_code'=>$typeArr[2],                    
                                                'ticket_type'=>$typeArr[1],                                                    
                                                'session_id'=>$session_id])->count();

                                                //echo $countTickets; die;
        if($countTickets>0){
            return \redirect()->back()->with('flash_message_error','Ticket already exists in Cart!');
        }else{

            $getTicketCode = Ticket::select('ticket_code')->where(['event_id'=>$data['event_id'],'ticket_type'=>$typeArr[1]])->first();
            
            DB::table('cart')->insert(['event_id'=>$data['event_id'],
                                    'title'=>$data['title'],
                                    'ticket_code'=>$getTicketCode->ticket_code,
                                    'place_name'=>$data['place_name'],
                                    'price'=>$data['price'],
                                    'ticket_type'=>$typeArr[1],
                                    'quantity'=>$data['quantity'],
                                    'user_email'=>$data['user_email'],
                                    'session_id'=>$session_id]);
        } 
    }       
 
        return \redirect('cart')->with('flash_message_success','Ticket has been added in Cart!'); 
    }

    public function cart(){
        $session_id = Session::get('session_id'); 
        $userCart = DB::table('cart')->where(['session_id'=>$session_id])->get();
        foreach ($userCart as $key => $event) {
            $eventDetails = Event::where('event_id',$event->event_id)->first();
            $userCart[$key]->image = $eventDetails->image;
        }
        //echo "<pre>"; print_r($userCart); die;
        return \view('events.cart')->with(\compact('userCart'));
    }

    public function deleteCartTicket($id=null){

        //Session::forget('couponAmount');
        //Session::forget('couponCode');

        //echo $id; die;
        DB::table('cart')->where('id',$id)->delete();
        return \redirect('cart')->with('flash_message_success','Ticket has been deleted from Cart!');
    }

    public function updateCartQuantity($id=null,$quantity=null){
        $getCartDetails = DB::table('cart')->where('id',$id)->first();
        $getTicketStock = Ticket::where('ticket_code',$getCartDetails->ticket_code)->first();        
        $updated_quantity = $getCartDetails->quantity+$quantity;
        if($getTicketStock->stock >= $updated_quantity){
            DB::table('cart')->where('id',$id)->increment('quantity',$quantity);
            return \redirect('cart')->with('flash_message_success','Ticket Quantity has been updated Successfully!');
        }else{
            return \redirect('cart')->with('flash_message_error','Required Ticket Quantity is not available!');
        }

        
    }

} 



