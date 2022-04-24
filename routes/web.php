<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Appartements;
use App\Http\Livewire\Tabler\Pages\Clients;
use App\Http\Livewire\Tabler\Pages\Compteurs;
use App\Http\Livewire\Tabler\Pages\Factures;
use App\Http\Livewire\Tabler\Pages\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('mat', MaterialIndex::class)->name('material.index');

// Configurations
Route::name('tabler.')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/clients', Clients::class)->name('clients');
    Route::get('/compteurs', Compteurs::class)->name('compteurs');
    Route::get('/factures', Factures::class)->name('factures');
    Route::get('/appartements', Appartements::class)->name('appartements');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');


// Route::resource('clients', App\Http\Controllers\ClientController::class);
// Route::resource('compteurs', App\Http\Controllers\compteurController::class);
// Route::resource('appartements', App\Http\Controllers\appartementController::class);
// Route::resource('factures', App\Http\Controllers\FactureController::class);


