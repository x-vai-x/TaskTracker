<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function redirectRequest(bool $success, string $message, int $statusCode = 0, string $routeName = "") {
		
		if (!$statusCode) {
			$statusCode = $success ? 200 : 500;
		}
		return redirect()
			->route(
				$routeName, 
				[
					"success" => $success,
					"message" => $message
				], 
				$statusCode
			);
	}
}
