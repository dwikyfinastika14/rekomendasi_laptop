@foreach ($laptops as $laptop)
    <!-- Edit Laptop Modal -->
    <div class="modal fade" id="editLaptopModal-{{ $laptop->id }}" tabindex="-1"
        aria-labelledby="editLaptopModalLabel-{{ $laptop->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('laptops.update', $laptop->id) }}" method="POST" enctype="multipart/form-data"
                    novalidate>
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLaptopModalLabel-{{ $laptop->id }}">Edit Data Laptop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            {{-- Bootstrap 5: 
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Brand -->
                        <div class="form-group">
                            <label for="brand-{{ $laptop->id }}">Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                id="brand-{{ $laptop->id }}" name="brand" value="{{ old('brand', $laptop->brand) }}"
                                required autofocus>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

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

                        <!-- RAM Kapasitas -->
                        <div class="form-group mb-3">
                            <label for="rams_id">RAM</label>
                            <select class="form-control @error('rams_id') is-invalid @enderror" id="rams_id"
                                name="rams_id" required>
                                <option value="">Pilih RAM</option>
                                @foreach ($rams as $ram)
                                    <option value="{{ $ram->id }}"
                                        {{ old('rams_id') == $ram->id ? 'selected' : '' }}>
                                        {{ $ram->capacity }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rams_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Harga -->
                        <div class="form-group">
                            <label for="harga-{{ $laptop->id }}">Harga (Rp)</label>
                            <input type="number" step="0.01"
                                class="form-control @error('harga') is-invalid @enderror"
                                id="harga-{{ $laptop->id }}" name="harga"
                                value="{{ old('harga', $laptop->harga) }}" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <!-- Gambar Lama -->
                        @if ($laptop->image)
                            <div class="form-group">
                                <label>Gambar Saat Ini</label><br>
                                <img src="{{ asset('assets/img/laptops/' . $laptop->image) }}" alt="Gambar Laptop"
                                    class="img-thumbnail mb-2" style="max-width: 200px;">
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="image-{{ $laptop->id }}">Ganti Gambar Laptop (Opsional)</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                id="image-{{ $laptop->id }}" name="image"
                                accept="image/png, image/jpeg, image/jpg, image/webp">
                            <small class="form-text text-muted">Format yang diperbolehkan: png, jpeg, jpg, webp.</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-submit">Update Laptop</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
