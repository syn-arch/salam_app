<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class KonfirmasiBuktiTransfer extends Component
{
    public $mtxn_id;
    public $mtxn_status;

    protected $rules = [
        'mtxn_status' => 'required',
    ];

    public function mount($id)
    {
        $this->mtxn_id = $id;
        $this->mtxn_status = DB::table('member_transactions')->where('mtxn_id', $this->mtxn_id)->first()->mtxn_status;
    }

    public function render()
    {
        return view('livewire.konfirmasi-bukti-transfer', [
            'transaction' => DB::table('member_transactions')->where('mtxn_id', $this->mtxn_id)->first(),
            'imgpath' => DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->first()->imgpath,
            'bank' => json_decode(DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->first()->bank)
        ]);
    }

    public function store()
    {
        $this->validate();

        DB::table('member_transactions')->where('mtxn_id', $this->mtxn_id)->update([
            'mtxn_status' => $this->mtxn_status
        ]);

        session()->flash('success', 'Status Request Saldo Berhasil Diubah');

        redirect('list_saldo');

        $this->mtxn_status = '';
    }
}
