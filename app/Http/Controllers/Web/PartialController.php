<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class PartialController extends Controller
{
	public function alert(string $alertType) {
    	return view('components.alert', compact('alertType'));
	}
}