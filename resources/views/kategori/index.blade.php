@extends('layouts.app')
@section('content_title', 'Data Kategori')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-tittle">Data Kategori</h4>
        </div>
        <div class="card-body">
            {{-- @if ($errors->any())
                <div class="alert alert-danger d-flex flex-column">
                    @foreach ($errors->all() as $error)
                        <small class="text-white my-2">{{ $error }}</small>
                    @endforeach

                </div>
            @endif --}}
            <div class="d-flex justify-content-end mb-2">
                <x-kategori.form-kategori />
            </div>
            <x-alert :errors="$errors" />
            <table class="table table-sm table-resposive" id="table2">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-kategori.form-kategori :id="$item->id" />
                                    <a href="{{ route('master-data.kategori.destroy', $item->id) }}"
                                        data-confirm-delete="true" class="btn btn-danger mx-1">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
