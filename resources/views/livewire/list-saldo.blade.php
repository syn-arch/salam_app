@section('title', 'List Saldo')
<div>
    <div class="col-md-12">

        @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            <strong>Berhasil</strong>
            <p>{{session('success')}}</p>
        </div>
        @endif

        <a href="/request_saldo" class="btn btn-warning float-end">Request Saldo</a>
        <div class="clearfix"></div>

        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Kredit</th>
                        <th>Debit</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listSaldo as $index => $saldo)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$saldo->created_date}}</td>
                        <td>{{$saldo->mtxn_credit}}</td>
                        <td>{{$saldo->mtxn_debit}}</td>
                        <td>{{$saldo->mtxn_comments}}</td>
                        <td>@php
                            if ($saldo->mtxn_status == 0) {
                            echo 'Transaksi Tertunda';
                            }else if ($saldo->mtxn_status == 1) {
                            echo 'Transaksi Berhasil';
                            }else{
                            echo 'Transaksi Gagal';
                            }
                            @endphp
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="/upload_bukti_transfer/{{$saldo->mtxn_id}}" class="btn btn-success">Upload
                                    Bukti Transfer</a>
                                <a href="/konfirmasi_bukti_transfer/{{$saldo->mtxn_id}}"
                                    class="btn btn-primary">Konfirmasi Bukti Transfer</a>
                                <button wire:click="destroy({{$saldo->mtxn_id}})" class="btn btn-danger">Hapus</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
