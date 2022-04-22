<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menus()
    {
        return [
            (object) array(
                'name' => 'Menu',
                'can' => null,
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> </svg>',
                'route' => 'index',
            ),
            (object) array(
                'name' => 'Menu',
                'can' => null,
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> </svg>',
                'route' => null,
                'submenu' => [
                    (object) array('name' => 'Index',  'route' => 'index')
                ]
            ),
        ];
    }

    public static function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
