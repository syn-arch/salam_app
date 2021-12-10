<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RequestSaldo extends Component
{
    public $mtxn_credit;
    public $bank_id;
    protected $bank;

    protected $rules = [
        'mtxn_credit' => 'required',
        'bank_id' => 'required'
    ];

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.request-saldo', [
            'listBank' => json_decode(DB::table(('theme_settings'))->first()->value)
        ]);
    }

    public function store()
    {
        $this->validate();

        $list_bank = json_decode(DB::table(('theme_settings'))->first()->value);

        foreach ($list_bank as $index => $bank) {
            if ($bank->bank_id == $this->bank_id) {
                $this->bank = $list_bank[$index];
            }
        }

        DB::table('member_transactions')->insert([
            'mtxn_member_id' => 1,
            'mtxn_debit' => 0,
            'mtxn_comments' => 'Topup',
            'mtxn_status' => 0,
            'mtxn_order_id' => '',
            'mtxn_withdrawal_id' => 0,
            'mtxn_type' => 0,
            'mtxn_credit' => $this->mtxn_credit,
        ]);

        $id = DB::getPdo()->lastInsertId();

        DB::table('img_transactions')->insert([
            'idtransaction' => $id,
            'bank' => json_encode($this->bank)
        ]);

        session()->flash('success', 'Request Saldo Berhasil, Silahkan Upload Bukti Transfer');

        redirect('list_saldo');

        $this->mtxn_credit = '';
        $this->bank_id = '';
    }
}
