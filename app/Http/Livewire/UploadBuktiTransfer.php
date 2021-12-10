<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadBuktiTransfer extends Component
{
    use WithFileUploads;

    public $bukti_transfer;
    public $iteration;
    public $bukti_transfer_path;
    public $mtxn_id;

    protected $rules = [
        'bukti_transfer' => 'image|max:2048'
    ];

    public function mount($id)
    {
        $this->mtxn_id = $id;
        $this->bukti_transfer_path = DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->first()->imgpath;
    }

    public function render()
    {
        return view('livewire.upload-bukti-transfer', [
            'transaction' => DB::table('member_transactions')->where('mtxn_id', $this->mtxn_id)->first(),
            'bank' => json_decode(DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->first()->bank)
        ]);
    }

    public function store()
    {
        $this->validate();

        $imgpath = DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->first()->imgpath;

        Storage::delete($imgpath);

        $this->bukti_transfer_path = $this->bukti_transfer->store('public/bukti_transfer');
        $name = $this->bukti_transfer->getClientOriginalName();

        DB::table('img_transactions')->where('idtransaction', $this->mtxn_id)->update([
            'idtransaction' => $this->mtxn_id,
            'imgname' => $name,
            'imgpath' => $this->bukti_transfer_path,
        ]);

        session()->flash('success', 'Upload Bukti Transfer Berhasil, Tunggu Sampai Admin Mengkonfirmasi Bukti Transfer');

        redirect('list_saldo');

        $this->bukti_transfer = null;
        $this->iteration++;
    }
}
