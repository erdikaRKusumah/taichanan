@extends('layouts.app')
@section('content_title', 'Data Kategori')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-tittle">Data Kategori</h4>
    </div>
    <div class="card-body">
        <table class="table table-sm table-resposive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $index=>$item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection