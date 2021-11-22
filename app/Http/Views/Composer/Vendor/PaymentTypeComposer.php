<?php

namespace App\Http\Views\Composer\Vendor;

use Illuminate\View\View;
use App\PaymentType;

class PaymentTypeComposer
{
	public function compose(View $view)
	{
		$payment_types = PaymentType::all();
		$view->with('payment_types', $payment_types);
	}

}
