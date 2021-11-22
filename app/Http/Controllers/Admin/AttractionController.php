<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\About;
use App\Gallery;
use App\Image;
use App\Room;
use App\Slide;
use App\Attraction;
use ImageHelper;

class AttractionController extends Controller
{
    //


	public function storeAttraction(Request $request)
	{
		

		if ($request->post_id) {
			$attraction = Attraction::where('id',$request->post_id)->with('images')->first();

			$picture = Image::where('id',$attraction->images[0]->id)->first();
			if ($request->session()->has('main_image')) {
				$path = public_path($attraction->images[0]->image_path);
				unlink($path);
				$main_img = $request->session()->get('main_image');
				$main_img_size = $img_i = getimagesize($main_img);
				$main_file_name = time() . '_attraction.jpg';
				$imager = new \Imager($main_img);
				$imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/attractions/' . $main_file_name);
			}
			$picture->title = $request->title;
			if ($request->session()->has('main_image')) {
				$picture->image_path = "images/attractions/" . $main_file_name;
			}
			$picture->save();

			$attraction->title = $request->title;
			$attraction->description = $request->description;
			$attraction->is_active = $request->is_active ?: 0;
			$attraction->save();
			$request->session()->flash('message.level', 'success');
			$request->session()->flash('message.content', 'Attraction was Updated successfully!');
		}else{
			if ($request->session()->has('main_image')) {
				$main_img = $request->session()->get('main_image');
				$main_img_size = $img_i = getimagesize($main_img);
				$main_file_name = time() . '_attraction.jpg';
				$imager = new \Imager($main_img);
				$imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/attractions/' . $main_file_name);
			}


			$attraction = Attraction::create($request->all());
			$main_image = Image::create([
				'title' => $request->title,
				'image_path' => "images/attractions/" . $main_file_name,
				'is_main' => 1
			]);
			$attraction->images()->attach($main_image);
			$request->session()->flash('message.level', 'success');
			$request->session()->flash('message.content', 'Attraction was successfully added!');
		}
		ImageHelper::unlinkTemporaryImage();
		return redirect()->back();
	}
}
