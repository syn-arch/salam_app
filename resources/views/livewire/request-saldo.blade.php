@section('title', 'Request Saldo')
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
                <h4 class="card-title">Request Saldo</h4>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="mtxn_credit" class="form-label">Jumlah Top Up</label>
                        <input wire:model="mtxn_credit" type="text" class="form-control @error('mtxn_credit')
                            is-invalid
                        @enderror" placeholder="Jumlah Top Up">
                        @error('mtxn_credit')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bank_id" class="form-label">Bank</label>
                        <select wire:model="bank_id" id="bank_id" class="form-control @error('bank_id')
                        is-invalid
                    @enderror">
                            <option>Pilih Bank</option>
                            @foreach ($listBank as $bank)
                            <option value="{{$bank->bank_id}}">{{$bank->bank_name}}</option>
                            @endforeach
                        </select>
                        @error('bank_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
