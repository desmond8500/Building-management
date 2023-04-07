<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\PdfController;
use App\Http\Livewire\Material\Index as MaterialIndex;
use App\Http\Livewire\Tabler\Index;
use App\Http\Livewire\Tabler\Pages\Appartements;
use App\Http\Livewire\Tabler\Pages\Client;
use App\Http\Livewire\Tabler\Pages\Clients;
use App\Http\Livewire\Tabler\Pages\Compteurs;
use App\Http\Livewire\Tabler\Pages\Contrats;
use App\Http\Livewire\Tabler\Pages\Factures;
use App\Http\Livewire\Tabler\Pages\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', Index::class)->name('index');
Route::get('mat', MaterialIndex::class)->name('material.index');

// Configurations
Route::name('tabler.')->group(function () {
    Route::get('/profile',              Profile::class)->name('profile');
    Route::get('/clients',              Clients::class)->name('clients');
    Route::get('/client/{client_id}',   Client::class)->name('client');
    Route::get('/compteurs',            Compteurs::class)->name('compteurs');
    Route::get('/factures',             Factures::class)->name('factures');
    Route::get('/appartements',         Appartements::class)->name('appartements');
    Route::get('/contrats',             Contrats::class)->name('contrats');

    Route::get('contrat_pdf/{contrat_id}',  [PdfController::class, 'show_contrat'])->name('contrat_pdf');
    Route::get('contrats_pdf',              [PdfController::class, 'show_all_contrat'])->name('all_contrat_pdf');
    Route::get('clients_pdf',               [PdfController::class, 'show_clients'])->name('clients_pdf');
    Route::get('appartements_pdf',          [PdfController::class, 'show_appartements'])->name('appartements_pdf');
    Route::get('appartement_compteurs_pdf', [PdfController::class, 'appartement_compteurs_pdf'])->name('appartement_compteurs_pdf');

    // Route::get('contrat_pdf/{client_id}', function () {
    //     $data = [
    //         $home = [
    //             "address" => "Villa n° 180, Cité HILAL",
    //             "debut_contrat" => '01 janvier 2023'
    //         ],
    //         $client = [

    //         ]
    //     ];

    //     $pdf = Pdf::loadView('contrats.contrat_pdf', $data);

    //     return $pdf->stream();
    //     // return $pdf->download('Contrats.pdf');
    // })->name('contrat_pdf');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');
Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');
Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');
Route::post( 'generator_builder/generate-from-file', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile' )->name('io_generator_builder_generate_from_file');
