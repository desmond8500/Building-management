<?php

namespace App\Http\Livewire\Tabler;

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.tabler.sidebar',[
            'menus' => new MenuController(),
            'user' => Auth::user() ?? null,
            'index' => (object) array('name' => 'Dash API', 'route' => 'index'),
        ]);
    }


}
