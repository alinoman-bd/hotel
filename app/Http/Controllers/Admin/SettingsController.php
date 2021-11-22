<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\About;
use App\Gallery;
use App\Image;
use App\Room;
use App\Slide;
use App\Attraction;
use App\Social;
use App\Logo;
use ImageHelper;
use App\BedType;
use App\Resource;
use Validator;
use ImageOptimizer;
use Spatie\ImageOptimizer\OptimizerChainFactory;
class SettingsController extends Controller
{
    public function slider()
    {
        return view('admin.settings.slider');
    }
    public function room(Request $request)
    {
        $bedTypes = BedType::all();
        $resources = Resource::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        $selected_resource = $request->r;
        return view('admin.settings.room',compact('bedTypes','resources','selected_resource'));
    }
    public function about()
    {
        return view('admin.settings.about');
    }
    public function contact()
    {
        return view('admin.settings.contactus');
    }
    public function attractions()
    {
        return view('admin.settings.attractions');
    }
    public function gallery()
    {
        return view('admin.settings.gallery');
    }

    public function userList()
    {
        return view('admin.settings.user-list');
    }

    public function bookingList()
    {
        return view('admin.settings.booking-list');
    }
    public function contactQuery()
    {
        return view('admin.settings.contact-query');
    }
    public function socialSetting()
    {
        return view('admin.settings.social');
    }
    public function logoSetting()
    {

        return view('admin.settings.logo');
    }
    public function storeSlider(Request $request)
    {
        if ($request->post_id) {
            $slider = Slide::where('id', $request->post_id)->with('images')->first();

            $picture = Image::where('id', $slider->images[0]->id)->first();
            if ($request->session()->has('main_image')) {
                $path = public_path($slider->images[0]->image_path);
                unlink($path);
                $main_img = $request->session()->get('main_image');
                $main_img_size = $img_i = getimagesize($main_img);
                $main_file_name = time() . '_slider.jpg';
                $imager = new \Imager($main_img);
                $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/slider/' . $main_file_name);
            }
            $picture->title = $request->title;
            if ($request->session()->has('main_image')) {
                $picture->image_path = "images/slider/" . $main_file_name;
            }
            $picture->save();

            $slider->title = $request->title;
            $slider->title_text = $request->title_text;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->is_active = $request->is_active ?: 0;
            $slider->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Slider was Updated successfully!');
        } else {
            if ($request->session()->has('main_image')) {
                $main_img = $request->session()->get('main_image');
                $main_img_size = $img_i = getimagesize($main_img);
                $main_file_name = time() . '_slider.jpg';
                $imager = new \Imager($main_img);
                $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/slider/' . $main_file_name);
            }


            $slider = Slide::create($request->all());
            $main_image = Image::create([
                'title' => $request->title,
                'image_path' => "images/slider/" . $main_file_name,
                'is_main' => 1
            ]);
            $slider->images()->attach($main_image);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Slider was successfully added!');
        }
        ImageHelper::unlinkTemporaryImage();
        return redirect()->back();
    }

    public function storeRoom(Request $request)
    {
        //dd($request->recource_id);
        if ($request->post_id) {
            // dd(33);
            $room = Room::where('id', $request->post_id)->with(['images' => function ($q) {
                $q->where('is_main', 1);
            }])->first();
            // foreach ($room->images as $value) {
            $picture = $room->images[0];
            // dd($picture);

            if ($request->session()->has('main_image')) {
                $main_img = $request->session()->get('main_image');
                $main_img_size = $img_i = getimagesize($main_img);
                $main_file_name = time() . '_room_main.jpg';
                $imager = new \Imager($main_img);
                $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/rooms/' . $main_file_name);
            }
            if ($request->session()->has('alt_image')) {
                $alt_img = $request->session()->get('alt_image');
                $alt_img_size = $img_i = getimagesize($alt_img);
                $alt_file_name = time() . '_room_alt.jpg';
                $imager = new \Imager($alt_img);
                $imager->resize($alt_img_size[0], $alt_img_size[1])->write('public/images/rooms/' . $alt_file_name);
            }
            $picture->title = $request->title;
            if ($request->session()->has('main_image')) {
                if (file_exists(public_path() . '/' . $picture->image_path)) {
                    unlink(public_path() . '/' . $picture->image_path);
                }
                $picture->image_path = "images/rooms/" . $main_file_name;
            }
            if ($request->session()->has('alt_image')) {
                $picture->image_path = "images/rooms/" . $alt_file_name;
            }
            $picture->save();
            // }
            // dd($request->title);
            $room->title = $request->title;
            $room->price = $request->price;
            $room->allowed_person = $request->allowed_person;
            $room->total_rooms = $request->total_rooms;

            $room->bed_type = $request->bed_type;
            $room->total_bed = $request->total_bed;

            $room->resource_id = $request->recource_id;

            $room->description = $request->description;
            $room->is_active = $request->is_active ?: 0;
            $room->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Room was Updated successfully!');
        } else {
            $request->validate([
                'title' => 'required',
                'price' => 'required',
                'allowed_person' => 'required',
                'total_rooms' => 'required',
                'description' => 'required',
            ]);
            if ($request->session()->has('main_image')) {
                $main_img = $request->session()->get('main_image');
                $main_img_size = $img_i = getimagesize($main_img);
                $main_file_name = time() . '_room_main.jpg';
                $imager = new \Imager($main_img);
                $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/rooms/' . $main_file_name);
            }
            $room = Room::create($request->all());
            $main_image = Image::create([
                'title' => $request->title,
                'image_path' => "images/rooms/" . $main_file_name,
                'is_main' => 1
            ]);

            $room->images()->attach($main_image);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Room was successfully added!');
        }
        ImageHelper::unlinkTemporaryImage();
        return redirect()->back();
    }

    public function storeAbout(Request $request)
    {
        if ($request->post_id) {
            $about = About::where('id', $request->post_id)->with('images')->first();
            $image = Image::where('id', $about->images[0]->id)->first();
            if ($request->session()->has('main_image')) {
             $path = public_path($about->images[0]->image_path);
             unlink($path);
             $main_img = $request->session()->get('main_image');
             $main_img_size = $img_i = getimagesize($main_img);
             $main_file_name = time() . '_about.jpg';
             $imager = new \Imager($main_img);
             $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/about/' . $main_file_name);
         }
         $image->title = $request->title;
         if ($request->session()->has('main_image')) {
            $image->image_path = "images/about/" . $main_file_name;
        }
        $image->save();

        $about->title = $request->title;
        $about->description = $request->description;
        $about->is_active = $request->is_active ?: 0;
        $about->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'About Was Update Successfully');
    } else {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($request->session()->has('main_image')) {
            $main_img = $request->session()->get('main_image');
            $main_img_size = $img_i = getimagesize($main_img);
            $main_file_name = time() . '_about.jpg';
            $imager = new \Imager($main_img);
            $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/about/' . $main_file_name);
        }

        $about = About::create($request->all());

        $main_image = Image::create([
            'title' => $request->title,
            'image_path' => "images/about/" . $main_file_name,
            'is_main' => 1
        ]);

        $about->images()->attach($main_image);
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'About was successfully added!');
    }
    ImageHelper::unlinkTemporaryImage();
    return redirect()->back();
}
public function storeGallery(Request $request)
{
    if ($request->post_id) {
        $image = Image::where('id', $request->post_id)->first();
        $request->validate([
            'image_title' => 'required',
        ]);
        if ($request->session()->has('main_image')) {
            $main_img = $request->session()->get('main_image');
            $path = public_path($image->image_path);
            unlink($path);
            $main_img_size = $img_i = getimagesize($main_img);
            $main_file_name = time() . 'gallery.jpg';
            $imager = new \Imager($main_img);
            $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/gallery/' . $main_file_name);
        }

        $image->title = $request->image_title;
        if ($request->session()->has('main_image')) {
            $image->image_path = "images/gallery/" . $main_file_name;
        }
        $image->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Gallery was Updated Successfully');
    } else {
        $request->validate([
            'image_title' => 'required',
        ]);

        if ($request->session()->has('main_image')) {
            $main_img = $request->session()->get('main_image');
            $main_img_size = $img_i = getimagesize($main_img);
            $main_file_name = time() . 'gallery.jpg';
            $imager = new \Imager($main_img);
            $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/gallery/' . $main_file_name);
        }

        if ($request->gallery_name) {
            $gallery = Gallery::create(['title' => $request->image_title]);
        } else {
            $gallery =  Gallery::where('id', $request->g_name_val)->first();
        }

        $main_image = Image::create([
            'title' => $request->image_title,
            'image_path' => "images/gallery/" . $main_file_name,
            'is_main' => 1
        ]);

        $gallery->images()->attach($main_image);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Gallery was successfully added!');
    }
    ImageHelper::unlinkTemporaryImage();
    return redirect()->back();
}

public function getPostInfo(Request $request)
{
    if ($request->cat == 'room') {
        $data = Room::where('id', $request->post_id)->with('images')->first();
    } elseif ($request->cat == 'about') {
        $data = About::where('id', $request->post_id)->with('images')->first();
    } elseif ($request->cat == 'gallery') {
        $data = Image::where('id', $request->post_id)->first();
    } elseif ($request->cat == 'slider') {
        $data = Slide::where('id', $request->post_id)->with('images')->first();
    } elseif ($request->cat == 'attraction') {
        $data = Attraction::where('id', $request->post_id)->with('images')->first();
    }
    return $data;
}

public function storeSocialUrl(Request $request)
{
    $check_info = Social::orderBy('id', 'desc')->get();
    if ($check_info->count() == 0) {
        Social::create($request->all());
    } else {
        $data = Social::orderBy('id', 'desc')->limit(1)->first();
        if ($request->fb_url) {
            $data->fb_url = $request->fb_url;
        }
        if ($request->p_url) {
            $data->p_url = $request->p_url;
        }
        if ($request->twit_ulr) {
            $data->twit_ulr = $request->twit_ulr;
        }
        if ($request->google_url) {
            $data->google_url = $request->google_url;
        }
        if ($request->instra_url) {
            $data->instra_url = $request->instra_url;
        }
        $data->save();
    }
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Social information was successfully added!');
    return redirect()->back();
}


public function storeLogo(Request $request)
{


    $check_info = Logo::orderBy('id', 'desc')->get();
    if ($check_info->count() == 0) {
        if ($request->session()->has('main_image')) {
            $main_img = $request->session()->get('main_image');
            $main_img_size = $img_i = getimagesize($main_img);
            $main_file_name = time() . '_logo.jpg';
            $imager = new \Imager($main_img);
            $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/logo/' . $main_file_name);
        }

        $main_image = Logo::create([
            'logo_path' => "images/logo/" . $main_file_name,
        ]);
    } else {
        if ($request->session()->has('main_image')) {
            $main_img = $request->session()->get('main_image');
            $main_img_size = $img_i = getimagesize($main_img);
            $main_file_name = time() . '_logo.jpg';
            $imager = new \Imager($main_img);
            $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/logo/' . $main_file_name);
        }
        $data = Logo::limit(1)->first();
        if ($request->session()->has('main_image')) {
            $data->logo_path = "images/logo/" . $main_file_name;
        }
        $data->save();
    }

    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Logo was successfully added!');
    return redirect()->back();
}

public function addimage(Request $request)
{

    if ($request->session()->has('alt_image')) {
        $main_img = $request->session()->get('alt_image');
        $main_img_size = $img_i = getimagesize($main_img);
        $main_file_name = time() . '_room_alt.jpg';
        $imager = new \Imager($main_img);
        $imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/rooms/' . $main_file_name);
    }

    $room = Room::where('id', $request->room_id)->first();
    $main_image = Image::create([
        'title' => $room->title,
        'image_path' => "images/rooms/" . $main_file_name,
        'is_main' => 0
    ]);
    $room->images()->attach($main_image);
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'New Image Added Successfully!');
    ImageHelper::unlinkTemporaryImage();
    return redirect()->back();
}

public function deleteItem(Request $request){
    if ($request->type == 'slider') {
        $data = Slide::where('id', $request->post_id)->with('images')->first();
        $path = public_path($data->images[0]->image_path);
        unlink($path);
        $data->delete();
    }else if ($request->type == 'room') {
        $data = Room::where('id', $request->post_id)->with('images')->first();
        foreach ($data->images as $img) {
            $path = public_path($img->image_path);
            unlink($path);
        }
        $data->delete();
    }else if ($request->type == 'about') {
        $data = About::where('id', $request->post_id)->with('images')->first();
        $path = public_path($data->images[0]->image_path);
        unlink($path);
        $data->delete();
    }else if ($request->type == 'gallery') {
        $data = Image::where('id', $request->post_id)->first();
        $path = public_path($data->image_path);
        unlink($path);
        $data->delete();
    }else if ($request->type == 'attraction') {
        $data = Attraction::where('id', $request->post_id)->with('images')->first();
        $path = public_path($data->images[0]->image_path);
        unlink($path);
        $data->delete();
    }
    return 1;
}



    public function uploadRoomImage($room_id)
    {
        $room = Room::where('id',$room_id)->with('images')->first();
        return view('admin.settings.room-image',compact('room'));
    }
    public function roomImageUpload(Request $request)
    {

        $rules = array(
            'file' => 'required',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $images = $request->file('file');
        $room = Room::where('id', $request->room_id)->first();
        foreach ($images as $key => $image) {
            $main_image = $image;
            $image_name = time() .$request->room_id."-room.jpg";
            $upload_path = 'images/rooms/';
            $imageUploadPath = 'public/' . $upload_path . $image_name;
            $compressedImage = $this->compressImage($main_image, $imageUploadPath, 50);

            $main_image = Image::create([
                'title' => $room->title,
                'image_path' => "images/rooms/" . $image_name,
                'is_main' => 0
            ]);
            $room->images()->attach($main_image); 


        }
        $room = Room::where('id', $request->room_id)->with('images')->first();
        $images = view('admin.settings.room-images', compact('room'))->render();

        $output = array(
            'success' => 'Image uploaded successfully',
            'image' => $images
        );
        return response()->json($output);
    }

    public function deleteImg(Request $request)
    {
        $img = Image::where('id',$request->img_id)->first();
        $path = public_path($img->image_path);
        unlink($path);
        $img->delete();
        $room = Room::where('id', $request->room_id)->with('images')->first();
        return view('admin.settings.room-images', compact('room'))->render();

    }

    public function compressImage($source, $destination, $quality)
    {
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                $image = imagecreatefromjpeg($source);
        }
        imagejpeg($image, $destination, $quality);
        return $destination;
    }
}
