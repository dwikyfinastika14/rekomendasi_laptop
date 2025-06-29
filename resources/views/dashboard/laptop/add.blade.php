<!-- Add Laptop Modal -->
<div class="modal fade" id="addLaptopModal" tabindex="-1" aria-labelledby="addLaptopModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('laptops.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addLaptopModalLabel">Tambah Data Laptop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Brand -->
                    <div class="form-group mb-3">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            name="brand" value="{{ old('brand') }}" required>
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Model -->
                    <div class="form-group mb-3">
                        <label for="model">Model</label>
                        <input type="text" class="form-control @error('model') is-invalid @enderror" id="model"
                            name="model" value="{{ old('model') }}" required>
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Processor -->
                    <!-- Processor -->
                    <div class="form-group mb-3">
                        <label for="prosesors_id">Processor</label>
                        <select class="form-control @error('prosesors_id') is-invalid @enderror" id="prosesors_id"
                            name="prosesors_id" required>
                            <option value="">Pilih Processor</option>
                            @foreach ($prosesors as $prosesor)
                                <option value="{{ $prosesor->id }}"
                                    {{ old('prosesors_id') == $prosesor->id ? 'selected' : '' }}>
                                    {{ $prosesor->brand }}
                                </option>
                            @endforeach
                        </select>
                        @error('prosesors_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- RAM -->
                    <div class="form-group mb-3">
                        <label for="rams_id">RAM</label>
                        <select class="form-control @error('rams_id') is-invalid @enderror" id="rams_id"
                            name="rams_id" required>
                            <option value="">Pilih RAM</option>
                            @foreach ($rams as $ram)
                                <option value="{{ $ram->id }}" {{ old('rams_id') == $ram->id ? 'selected' : '' }}>
                                    {{ $ram->capacity }}
                                </option>
                            @endforeach
                        </select>
                        @error('rams_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Storage -->
                    <div class="form-group mb-3">
                        <label for="storage">Storage</label>
                        <input type="text" class="form-control @error('storage') is-invalid @enderror" id="storage"
                            name="storage" value="{{ old('storage') }}" required>
                        @error('storage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="form-group mb-3">
                        <label for="harga">Harga (Rp)</label>
                        <input type="number" step="0.01" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" name="harga" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar Laptop</label>
                        <input type="file" class="form-control-file @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
