<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;

class PartialController extends Controller
{
	public function alert(FormRequest $request) {
		$alertType = $request->input('alertType');
    	return view('components.alert', compact('alertType'));
	}
}