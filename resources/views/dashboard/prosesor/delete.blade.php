@foreach ($prosesors as $prosesor)
    <!-- Modal Delete Prosesor -->
    <div class="modal fade" id="deleteProsesorModal-{{ $prosesor->id }}" tabindex="-1" role="dialog"
        aria-labelledby="deleteProsesorModalLabel-{{ $prosesor->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('prosesors.destroy', $prosesor->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProsesorModalLabel-{{ $prosesor->id }}">
                            Hapus Data Prosesor
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus prosesor <strong>{{ $prosesor->brand }}</strong> dengan
                        <strong>{{ $prosesor->jumlah_core }} core</strong> ini?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
