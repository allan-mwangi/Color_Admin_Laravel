<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'menu' => [[
		'icon' => 'fa fa-sitemap',
		'title' => 'Home',
		'url' => '/color_admin_laravel/public/index.php/home',
		'route-name' => 'home'
	],
	[
				'icon' => 'fas fa-fw fa-user-graduate',
				'title' => 'Students',
				'url' => 'javascript:;',
				'caret' => true,
				'sub_menu' => [
					[
					'url' => '/color_admin_laravel/public/index.php/students/create',
					'title' => 'Add a New Student',
					'permission'=>'save_student'
					],
					[
					'url' => '/color_admin_laravel/public/index.php/students',
					'title' => 'Student Report',
					'permission'=>'view_students'
					]
				]
	],					
										
	[
				'icon' => 'fas fa-fw fa-user',
				'title' => 'Users',
				'url' => 'javascript:;',
				'caret' => true,
				'sub_menu' => [
					[
					'url' => '/color_admin_laravel/public/index.php/users/create',
					'title' => 'Add a New User',
					'permission'=>'save_user'
					],
					[
					'url' => '/color_admin_laravel/public/index.php/users',
					'title' => 'User Report',
					'permission'=>'view_users'
					]
				]
					],					
					[
						'icon' => 'fas fa-fw fa-user',
						'title' => 'Audit Trail',
						'url' => 'javascript:;',
						'caret' => true,
						'sub_menu' => [
							[
							'url' => '/color_admin_laravel/public/index.php/audits',
							'title' => 'Audit Trail Report',
							'permission'=>'view_audit_trail',
							]
						]
					]						
]

];
