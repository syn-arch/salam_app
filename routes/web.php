<?php

use App\Http\Livewire\KonfirmasiBuktiTransfer;
use App\Http\Livewire\ListSaldo;
use App\Http\Livewire\RequestSaldo;
use App\Http\Livewire\UploadBuktiTransfer;
use Illuminate\Support\Facades\Route;

Route::get('/', ListSaldo::class);
Route::get('/list_saldo', ListSaldo::class);
Route::get('/hapus_saldo/{id}', [ListSaldo::class, 'destroy']);
Route::get('/request_saldo', RequestSaldo::class);
Route::get('/upload_bukti_transfer/{id}', UploadBuktiTransfer::class);
Route::get('/konfirmasi_bukti_transfer/{id}', KonfirmasiBuktiTransfer::class);
