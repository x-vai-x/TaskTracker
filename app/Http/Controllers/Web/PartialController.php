<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;

class PartialController extends Controller
{
	public function alert(string $alertType, FormRequest $request) {
		$message = $request->query('message');
    	return view('partials.alert', compact('alertType', 'message'));
	}
}