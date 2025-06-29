@foreach ($rams as $ram)
    <!-- Edit RAM Modal -->
    <div class="modal fade" id="editRamModal-{{ $ram->id }}" tabindex="-1"
        aria-labelledby="editRamModalLabel-{{ $ram->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('rams.update', $ram->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editRamModalLabel-{{ $ram->id }}">Edit Data RAM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="capacity-{{ $ram->id }}">Kapasitas</label>
                            <input type="text" class="form-control @error('capacity') is-invalid @enderror"
                                id="capacity-{{ $ram->id }}" name="capacity"
                                value="{{ old('capacity', $ram->capacity) }}" required autofocus>
                            @error('capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type-{{ $ram->id }}">Jenis</label>
                            <select class="form-control @error('type') is-invalid @enderror"
                                id="type-{{ $ram->id }}" name="type" required>
                                <option value="DDR3" {{ old('type', $ram->type) == 'DDR3' ? 'selected' : '' }}>DDR3
                                </option>
                                <option value="DDR4" {{ old('type', $ram->type) == 'DDR4' ? 'selected' : '' }}>DDR4
                                </option>
                                <option value="DDR5" {{ old('type', $ram->type) == 'DDR5' ? 'selected' : '' }}>DDR5
                                </option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="speed-{{ $ram->id }}">Kecepatan (MHz)</label>
                            <input type="number" class="form-control @error('speed') is-invalid @enderror"
                                id="speed-{{ $ram->id }}" name="speed" value="{{ old('speed', $ram->speed) }}"
                                required>
                            @error('speed')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @if ($ram->image)
                            <div class="form-group">
                                <label>Gambar Saat Ini</label><br>
                                <img src="{{ asset('assets/img/ram/' . $ram->image) }}" alt="Gambar RAM"
                                    class="img-thumbnail mb-2" style="max-width: 200px;">
                            </div>
                        @endif

                        <!-- Input Gambar Baru -->
                        <div class="form-group">
                            <label for="image-{{ $ram->id }}">Ganti Gambar (Opsional)</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                id="image-{{ $ram->id }}" name="image"
                                accept="image/png, image/jpeg, image/jpg, image/webp">
                            <small class="form-text text-muted">Format yang diperbolehkan: png, jpeg, jpg, webp.</small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description-{{ $ram->id }}">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description-{{ $ram->id }}"
                                name="description" rows="3" required>{{ old('description', $ram->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update RAM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
