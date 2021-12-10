@section('title', 'Konfirmasi Bukti Transfer')
<div>
    <div class="col-md-8 offset-md-2">

        @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            <strong>Berhasil</strong>
            <p>{{session('success')}}</p>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Konfirmasi Bukti Transfer</h4>
            </div>
            <div class="card-body">

                <div class="row mb-5">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <th>Jumlah Topup</th>
                                <td>{{$transaction->mtxn_credit}}</td>
                            </tr>
                            <tr>
                                <th>Nama Bank</th>
                                <td>{{$bank->bank_name}}</td>
                            </tr>
                            <tr>
                                <th>Bukti Transfer</th>
                                <td>
                                    <img width="500" src="{{ asset( str_replace('public', 'storage', $imgpath)) }}"
                                        alt="" class="img-fluid">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


                <form wire:submit.prevent="store">
                    <input type="hidden" wire:model="{{$mtxn_id}}">
                    <div class="mb-3">
                        <label for="mtxn_status" class="form-label">Status</label>
                        <select wire:model="mtxn_status" id="mtxn_status"
                            class="form-control @error('mtxn_status') is-invalid @enderror">
                            <option value="">Pilih Status</option>
                            <option value="1">Diterima</option>
                            <option value="2">Ditolak</option>
                        </select>
                        @error('mtxn_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
