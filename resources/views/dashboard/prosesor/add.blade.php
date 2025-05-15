<!-- Add Prosesor Modal -->
<div class="modal fade" id="addProsesorModal" tabindex="-1" aria-labelledby="addProsesorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('prosesors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProsesorModalLabel">Add Data Prosesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Brand -->
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                            name="brand" placeholder="Enter Brand" required autofocus value="{{ old('brand') }}">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah Core -->
                    <div class="form-group">
                        <label for="jumlah_core">Jumlah Core</label>
                        <input type="number" class="form-control @error('jumlah_core') is-invalid @enderror"
                            id="jumlah_core" name="jumlah_core" placeholder="Enter Jumlah Core" min="1" required
                            value="{{ old('jumlah_core') }}">
                        @error('jumlah_core')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="form-group">
                        <label for="image">Gambar Prosesor (jpg, jpeg, png, webp, max 2MB)</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/png, image/jpeg, image/jpg, image/webp"
                            required>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Optional: Deskripsi -->
                    {{-- 
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"
                            placeholder="Enter Description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    --}}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Prosesor</button>
                </div>
            </form>
        </div>
    </div>
</div>
