@section('title', 'Upload Bukti Transfer')
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
                <h4 class="card-title">Upload Bukti Transfer</h4>
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
                        </table>
                    </div>
                </div>

                <form wire:submit.prevent="store">
                    <input type="hidden" wire:model="mtxn_id">
                    <div class="mb-3">
                        <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
                        <input id="{{$iteration}}" wire:model="bukti_transfer" type="file"
                            class="form-control  @error('bukti_transfer') is-invalid @enderror">
                        @error('bukti_transfer') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                @if ($bukti_transfer_path)
                <img src="{{ asset( str_replace('public', 'storage', $bukti_transfer_path)) }}" alt="bukti_transfer"
                    class="img-fluid">
                @endif

            </div>
        </div>

    </div>
</div>
