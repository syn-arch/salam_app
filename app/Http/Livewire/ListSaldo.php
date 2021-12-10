<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ListSaldo extends Component
{

    public function render()
    {
        return view('livewire.list-saldo', [
            'listSaldo' => DB::table('member_transactions')->get()
        ]);
    }

    public function destroy($id)
    {
        $imgpath = DB::table('img_transactions')->where('idtransaction', $id)->first()->imgpath;

        Storage::delete($imgpath);

        DB::table('member_transactions')->where('mtxn_id', $id)->delete();
        DB::table('img_transactions')->where('idtransaction', $id)->delete();

        session()->flash('success', 'Saldo berhasil dihapus');

        redirect('list_saldo');
    }
}
