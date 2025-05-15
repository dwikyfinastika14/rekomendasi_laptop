<!-- Add RAM Modal -->
<div class="modal fade" id="addRamModal" tabindex="-1" aria-labelledby="addRamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('rams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addRamModalLabel">Add Data RAM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="capacity">Kapasitas</label>
                        <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                            id="capacity" name="capacity" placeholder="Enter Capacity" required autofocus
                            value="{{ old('capacity') }}">
                        @error('capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="type">Jenis</label>
                        <select class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                            required>
                            <option value="">-- Select Type --</option>
                            <option value="DDR3" {{ old('type') == 'DDR3' ? 'selected' : '' }}>DDR3</option>
                            <option value="DDR4" {{ old('type') == 'DDR4' ? 'selected' : '' }}>DDR4</option>
                            <option value="DDR5" {{ old('type') == 'DDR5' ? 'selected' : '' }}>DDR5</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="speed">Kecepatan (MHz)</label>
                        <input type="number" class="form-control @error('speed') is-invalid @enderror" id="speed"
                            name="speed" placeholder="Enter Speed" required value="{{ old('speed') }}">
                        @error('speed')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/png, image/jpeg, image/jpg, image/webp"
                            required>
                        @error('image')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="3" placeholder="Enter Description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save RAM</button>
                </div>
            </form>
        </div>
    </div>
</div>
