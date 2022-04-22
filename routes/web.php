<?php

use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Profile;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
Route::get('mat', MaterialIndex::class)->name('material.index');

// Configurations
Route::name('tabler.')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');
