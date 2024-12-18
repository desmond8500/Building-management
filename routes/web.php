<?php

use App\Http\Controllers\PdfController;
use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Appartement;
use App\Http\Livewire\Tabler\Pages\Appartements;
use App\Http\Livewire\Tabler\Pages\Batiments;
use App\Http\Livewire\Tabler\Pages\Client;
use App\Http\Livewire\Tabler\Pages\Clients;
use App\Http\Livewire\Tabler\Pages\Compteurs;
use App\Http\Livewire\Tabler\Pages\Configurations;
use App\Http\Livewire\Tabler\Pages\Contrat as PagesContrat;
use App\Http\Livewire\Tabler\Pages\Contrats;
use App\Http\Livewire\Tabler\Pages\Factures;
use App\Http\Livewire\Tabler\Pages\Profile;
use Illuminate\Support\Facades\Route;


Route::get('/', Index::class)->name('index');
Route::get('mat', MaterialIndex::class)->name('material.index');

Route::get('login', function () {

})->name('login');

// Configurations
Route::name('tabler.')->group(function () {
    Route::get('/profile',              Profile::class)->name('profile');
    Route::get('/clients',              Clients::class)->name('clients');
    Route::get('/client/{client_id}',   Client::class)->name('client');
    Route::get('/compteurs',            Compteurs::class)->name('compteurs');
    Route::get('/factures',             Factures::class)->name('factures');
    Route::get('/appartements',         Appartements::class)->name('appartements');
    Route::get('/appartement/{appartement_id}',         Appartement::class)->name('appartement');
    Route::get('/contrats',             Contrats::class)->name('contrats');
    Route::get('/contrat/{contrat_id}', PagesContrat::class)->name('contrat');
    Route::get('/batiments',            Batiments::class)->name('batiments');

    Route::get('contrat_pdf/{contrat_id}',  [PdfController::class, 'show_contrat'])->name('contrat_pdf');
    Route::get('contrats_pdf',  [PdfController::class, 'show_all_contrat'])->name('all_contrat_pdf');

    Route::get('some_contrats_pdf/{batiment_id}', function ($batiment_id) {
        return PdfController::some_contrats_pdf($batiment_id);
    })->name('some_contrats_pdf');

    Route::get('clients_pdf',               [PdfController::class, 'show_clients'])->name('clients_pdf');
    Route::get('appartements_pdf',          [PdfController::class, 'show_appartements'])->name('appartements_pdf');
    Route::get('appartement_compteurs_pdf', [PdfController::class, 'appartement_compteurs_pdf'])->name('appartement_compteurs_pdf');

    Route::get('configurations',  Configurations::class)->name('configurations');

});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');
