@foreach ($prosesors as $prosesor)
    <!-- Edit Prosesor Modal -->
    <div class="modal fade" id="editProsesorModal-{{ $prosesor->id }}" tabindex="-1"
        aria-labelledby="editProsesorModalLabel-{{ $prosesor->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('prosesors.update', $prosesor->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProsesorModalLabel-{{ $prosesor->id }}">Edit Data Prosesor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Brand -->
                        <div class="form-group">
                            <label for="brand-{{ $prosesor->id }}">Brand</label>
                            <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                id="brand-{{ $prosesor->id }}" name="brand"
                                value="{{ old('brand', $prosesor->brand) }}" required autofocus>
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Jumlah Core -->
                        <div class="form-group">
                            <label for="jumlah_core-{{ $prosesor->id }}">Jumlah Core</label>
                            <input type="number" class="form-control @error('jumlah_core') is-invalid @enderror"
                                id="jumlah_core-{{ $prosesor->id }}" name="jumlah_core"
                                value="{{ old('jumlah_core', $prosesor->jumlah_core) }}" required min="1">
                            @error('jumlah_core')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Gambar Lama -->
                        @if ($prosesor->image)
                            <div class="form-group">
                                <label>Gambar Saat Ini</label><br>
                                <img src="{{ asset('assets/img/prosesor/' . $prosesor->image) }}" alt="Gambar Prosesor"
                                    class="img-thumbnail mb-2" style="max-width: 200px;">
                            </div>
                        @endif

                        <!-- Input Gambar Baru -->
                        <div class="form-group">
                            <label for="image-{{ $prosesor->id }}">Ganti Gambar (Opsional)</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                id="image-{{ $prosesor->id }}" name="image"
                                accept="image/png, image/jpeg, image/jpg, image/webp">
                            <small class="form-text text-muted">Format yang diperbolehkan: png, jpeg, jpg, webp.</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Optional Deskripsi jika diperlukan -->
                        {{--
                        <div class="form-group">
                            <label for="description-{{ $prosesor->id }}">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description-{{ $prosesor->id }}" name="description" rows="3">{{ old('description', $prosesor->description ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        --}}
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Prosesor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
