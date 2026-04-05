<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view(
			'index', 
			[
				'menuOptions' => [
					[
						'webRouteName' => 'tasks.index',
						'label' => 'View and manage tasks' 
					],
					[
						'webRouteName' => 'tasks.new',
						'label' => 'New task'
					]
				]
			]
		);
    }
}