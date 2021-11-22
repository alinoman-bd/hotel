<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ImageHelper;

use App\ContactInfo;
use App\ContactForm;

class ContactController extends Controller
{

	public function storeContactInfo(Request $request){
		$request->validate([
			'contact_heading' => 'required',
			'contact_text' => 'required',
			'contact_address' => 'required',
			'contact_phone' => 'required',
			'contact_mail' => 'required',
		]);
		$check_info = ContactInfo::orderBy('id', 'desc')->get();
		if ($check_info->count() == 0) {
			ContactInfo::create($request->all());
		}else{
			ContactInfo::orderBy('id','desc')->first()->update([
				'contact_heading' => $request->contact_heading,
				'contact_text' => $request->contact_text,
				'contact_address' => $request->contact_address,
				'contact_phone' => $request->contact_phone,
				'contact_mail' => $request->contact_mail,
			]);
		}
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Contact information was successfully added!');
		return redirect()->back();
	}

	public function submitContactForm(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required',
			'subject' => 'required',
			'message' => 'required',
		]);
		ContactForm::create($request->all());
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Your Query Sent successfully!');
		return redirect()->back();
	}

	public function checkContactInfo(Request $request){
		$check_info = ContactInfo::orderBy('id', 'desc')->limit(1)->first();
		if ($check_info) {
			$data['status'] = 1;
			$data['contact'] = $check_info;
		}else{
			$data['status'] = 0;
		}

		return $data;
	}
}
