<?php

namespace App\Http\Livewire\Tabler\Pages;

use App\Models\Settings;
use Livewire\Component;

class Configurations extends Component
{
    public $value, $key;
    public function render()
    {
        return view('livewire.tabler.pages.configurations',[
            'settings' => Settings::all(),
        ])->extends('app.layout')->section('content');
    }

    public $selected;
    public $selected_id;
    function edit_setting($setting_id){
        $this->selected = Settings::find($setting_id);
        $this->selected_id = $this->selected->id;
        $this->key = $this->selected->key;
        $this->value = $this->selected->value;
    }
    function update_setting(){
        $this->selected = Settings::find($this->selected->id);
        $this->selected->key = strtolower($this->key);
        $this->selected->value = $this->value;
        $this->selected->save();
        $this->reset('key', 'value', 'selected', 'selected_id');
    }

    function init(){
        Settings::firstOrCreate([ 'key' => 'date', 'value' => 2025 ]);
        Settings::firstOrCreate([ 'key' => 'name', 'value' => 2025 ]);
    }
}
