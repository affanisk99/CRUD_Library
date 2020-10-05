@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Buatkan daftar buku yang di pinjam oleh user yang bersangkutan, buat lisnya di bawah ini pakai tabel-->
                    <table>
                        <tr>
                            <td>#</td>
                            <td>Nama Buku</td>
                            <td>Tanggal Pinjam</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
