<div>
    <button type="button" class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal"
        data-target="#formProduct{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
            Tambah +
        @endif
    </button>
    <div class="modal fade" id="formProduct{{ $id ?? '' }}">
        <form action="{{ route('master-data.product.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $id ? 'Form Edit Product' : 'Form Tambah Product' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="">Nama Product</label>
                            <input type="text" name="nama_product" id="nama_product" class="form-control"
                                value="{{ $id ? $nama_product : old('nama_product') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Kategori Product</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    {{-- <option value="{{ $item->id }}" data-select="{{ $kategori_id }}"
                                        {{ $kategori_id == $item->id ? 'selected' : ' ' }}>
                                        {{ $item->nama_kategori }}
                                    </option> --}}

                                    <option value="{{ $item->id }}"
                                        {{ $kategori_id || old('kategori_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group my-1">
                            <label for="">Harga Jual</label>
                            <input type="number" name="harga_jual" id="" class="form-control"
                                value="{{ $id ? $harga_jual : old('harga_jual') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Harga Beli Pokok</label>
                            <input type="number" name="harga_beli_pokok" id="" class="form-control"
                                value="{{ $id ? $harga_beli_pokok : old('harga_beli_pokok') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stok</label>
                            <input type="number" name="stok" id="" class="form-control"
                                value="{{ $id ? $stok : old('stok') }}">
                        </div>
                        <div class="form-group my-1">
                            <label for="">Stok Minimal</label>
                            <input type="number" name="stok_minimal" id="" class="form-control"
                                value="{{ $id ? $stok_minimal : old('stok_minimal') }}">
                        </div>
                        <div class="form-group my-1 d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <label for="" class="mr-4">Produk aktif?</label>
                                <input type="checkbox" name="is_active" id="is_active"
                                    {{ old('is_active', $id ? $is_active : false) ? 'checked' : '' }}>
                            </div>
                            <small class="text-secondary">Jika aktif, maka produk akan ditampilkan di halaman
                                kasir</small>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </form>
    </div>
    <!-- /.modal -->
</div>
