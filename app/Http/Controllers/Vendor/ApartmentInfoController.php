<?php

namespace App\Http\Controllers\Vendor;


use App\Image;
use Validator;
use App\Resource;
use App\ResourceImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequest;
use App\Http\Services\ResourceService;
use Illuminate\Support\Facades\Session;
use App\Search;
use App\Searchable;
use Str;
class ApartmentInfoController extends Controller
{
	// private $resourceService;
	// public function __constructor(ResourceService $resourceService)
	// {
	// 	$this->resourceService = $resourceService;
	// }

	public function apartmentForm()
	{
		return view('vendor.apartment-form');
	}
	public function getLocations(Request $request)
	{
		$locations = view('vendor.inc.form.apartment-form.location')->render();
		$lakes = view('vendor.inc.form.apartment-form.lakes')->render();
		$rivers = view('vendor.inc.form.apartment-form.rivers')->render();
		return response()->json(['locations' => $locations, 'lakes' => $lakes, 'rivers' => $rivers]);
	}
	public function getLakes(Request $request)
	{
		return view('vendor.inc.form.apartment-form.lakes')->render();
	}
	public function getRivers(Request $request)
	{
		return view('vendor.inc.form.apartment-form.rivers')->render();
	}
	public function checkPhone(Request $request)
	{
		$check = Resource::where('phone', $request->phone)->where('id', '!=', $request->id)->first();
		if ($check) {
			return 'block';
		}
	}
	public function checkEmail(Request $request)
	{
		$check = Resource::where('email', $request->email)->where('id', '!=', $request->id)->first();
		if ($check) {
			return 'block';
		}
	}
	public function SaveApartmentForm(ResourceRequest $request)
	{

		//Resource::create($request->all());
		$this->saveApartment($request);
		return redirect()->back()->with('success', 'Apartment successfully saved!');
	}
	public function saveApartment($data)
	{

		$resource = new Resource;
		$resource->user_id = auth()->user()->id;
		$resource->name = $data->app_resource_name;
		$resource->email = $data->app_email;
		$resource->phone = $data->app_phone;
		$resource->short_title = $data->app_sort_title;
		$resource->nearest_locations = $data->nearest_location;
		$resource->address = $data->app_address;
		$resource->number_of_rooms = $data->app_total_room;
		$resource->number_of_people = $data->app_total_people;
		$resource->description = $data->app_description;
		$resource->city_id = $data->app_city;
		$resource->location_id = $data->app_location;
		$resource->lake_id = $data->app_lake;
		$resource->river_id = $data->app_river;
		$resource->sea_id = $data->app_sea;
		$resource->min_price = $data->app_single_min_price;
		$resource->max_price = $data->app_single_max_price;
		$resource->total_min_price = $data->app_total_min_price;
		$resource->total_max_price = $data->app_total_max_price;
		$resource->price_type_id = $data->app_single_price_type;
		$resource->season_id = $data->app_seasion;
		$resource->payment_type_id = $data->app_payment_type;
		$resource->distance_from_lake = $data->app_d_from_lake;
		$resource->distance_from_river = $data->app_d_from_river;
		$resource->distance_from_sea = $data->app_d_from_sea;
		$resource->contact_person = $data->app_contact_person;
		$resource->note = $data->app_note;
		$resource->package_id = 3;
		

		if (Session::has('main_image')) {
			$main_img = Session::get('main_image');
			$main_img_size = $img_i = getimagesize($main_img);
			$main_file_name = time() . '_rec_main.jpg';
			$imager = new \Imager($main_img);
			$imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/resource/' . $main_file_name);
			$resource->image = "images/resource/" . $main_file_name;
		}
		$resource->save();
		$resource->types()->attach($data->app_type);
		$resource->facilities()->attach($data->facilities);

		$search = new Search;
		$search->title = $data->app_resource_name;
		$search->short_title = $data->app_sort_title;
		$search->save();

		$searchable = new Searchable;
		$searchable->search_id = $search->id;
		$searchable->searchable_id = $resource->id;
		$searchable->searchable_type = get_class($resource);
		$searchable->save();



		// $main_image = Image::create([
		// 	'title' => 'resource title ',
		// 	'image_path' => "images/rooms/" . $main_file_name,
		// 	'is_main' => 1
		// ]);

		// $resource->images()->attach($main_image);
	}

	public function edit($id)
	{
		$resource = Resource::where('id', $id)->with('city', 'location', 'lake', 'river', 'sea', 'priceType', 'season', 'payment', 'types', 'recourceImage','facilities')->first();
		//dd($resource->toArray());
		return view('vendor.apartment-edit', compact('resource'));
	}
	public function update(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'app_type' => 'required',
			'app_city' => 'required',
			'app_location' => 'required',
			'app_lake' => 'required',
			'app_river' => 'required',
			'app_sea' => 'required',
			'app_resource_name' => 'required',
			'app_sort_title' => 'required',
			'app_description' => 'required',
			'app_address' => 'required',
			'nearest_location' => 'required',
			'app_phone' => 'required | unique:resources,phone,' . $id,
			'app_email' => 'required | email | unique:resources,email,' . $id,
			'app_single_min_price' => 'required',
			'app_single_max_price' => 'required',
			'app_single_price_type' => 'required',
			'app_total_min_price' => 'required',
			'app_total_max_price' => 'required',
			'app_total_room' => 'required',
			'app_total_people' => 'required',
			'app_seasion' => 'required',
			'app_payment_type' => 'required',
			'app_note' => 'required',
			'app_contact_person' => 'required',

		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$this->updateResource($request, $id);
		return redirect()->back()->with('success', 'Apartment successfully saved!');
	}
	public function updateResource($data, $id)
	{
		$resource = Resource::find($id);
		$exist_title = $resource->name;
		$resource->name = $data->app_resource_name;
		$resource->email = $data->app_email;
		$resource->phone = $data->app_phone;
		$resource->short_title = $data->app_sort_title;
		$resource->nearest_locations = $data->nearest_location;
		$resource->address = $data->app_address;
		$resource->number_of_rooms = $data->app_total_room;
		$resource->number_of_people = $data->app_total_people;
		$resource->description = $data->app_description;
		$resource->city_id = $data->app_city;
		$resource->location_id = $data->app_location;
		$resource->lake_id = $data->app_lake;
		$resource->river_id = $data->app_river;
		$resource->sea_id = $data->app_sea;
		$resource->min_price = $data->app_single_min_price;
		$resource->max_price = $data->app_single_max_price;
		$resource->total_min_price = $data->app_total_min_price;
		$resource->total_max_price = $data->app_total_max_price;
		$resource->price_type_id = $data->app_single_price_type;
		$resource->season_id = $data->app_seasion;
		$resource->payment_type_id = $data->app_payment_type;
		$resource->distance_from_lake = $data->app_d_from_lake;
		$resource->distance_from_river = $data->app_d_from_river;
		$resource->distance_from_sea = $data->app_d_from_sea;
		$resource->contact_person = $data->app_contact_person;
		$resource->note = $data->app_note;


		if (Session::has('main_image')) {
			$main_img = Session::get('main_image');
			$main_img_size = $img_i = getimagesize($main_img);
			$main_file_name = time() . '_rec_main.jpg';
			$imager = new \Imager($main_img);
			$imager->resize($main_img_size[0], $main_img_size[1])->write('public/images/resource/' . $main_file_name);
			$resource->image = "images/resource/" . $main_file_name;
		}


		$resource->save();
		$resource->types()->detach();
		$resource->types()->attach($data->app_type);
		$resource->facilities()->detach();
		$resource->facilities()->attach($data->facilities);



		$search_delete = Search::where('title',$exist_title)->first();
		$searchable  = Searchable::where('search_id',$search_delete->id)->delete();
		$search_delete->delete();
		$search = new Search;
		$search->title = $data->app_resource_name;
		$search->short_title = $data->app_sort_title;
		$search->save();

		$searchable = new Searchable;
		$searchable->search_id = $search->id;
		$searchable->searchable_id = $resource->id;
		$searchable->searchable_type = get_class($resource);
		$searchable->save();


		// $main_image = Image::create([
		// 	'title' => 'resource title ',
		// 	'image_path' => "images/rooms/" . $main_file_name,
		// 	'is_main' => 1
		// ]);

		// $resource->images()->attach($main_image);
	}
	public function delete(Request $request)
	{
		Resource::where('id', $request->rec_id)->delete();
		$data['resources'] = Resource::where('user_id', $request->user_id)->get();
		return view('vendor.inc.profile.listing-table', compact('data'))->render();
	}
	public function uploadImage(Request $request, $id)
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
		foreach ($images as $key => $image) {
			
			$main_image = $image;
	        $image_name = time() .$id."-resource.jpg";
	        $upload_path = 'images/resource/';
	        $imageUploadPath = 'public/' . $upload_path . $image_name;
	        $compressedImage = $this->compressImage($main_image, $imageUploadPath, 50);

	        $rc = new ResourceImage;
			$rc->resource_id = $id;
			$rc->path = $upload_path . $image_name;
			$rc->save();

		}
		$resource = Resource::where('id', $id)->with('recourceImage')->first();
		$images = view('vendor.inc.form.apartment-form.resource-images', compact('resource'))->render();

		$output = array(
			'success' => 'Image uploaded successfully',
			'image'  => $images
		);
		return response()->json($output);
	}

	public function imageDelete(Request $request)
	{
		$rec_id = $request->rec_id;
		$img_id = $request->img_id;
		ResourceImage::where('id', $img_id)->delete();
		$resource = Resource::where('id', $rec_id)->with('recourceImage')->first();
		return view('vendor.inc.form.apartment-form.resource-images', compact('resource'))->render();
	}

	public function getLocation(Request $request)
	{
		return 0;
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
