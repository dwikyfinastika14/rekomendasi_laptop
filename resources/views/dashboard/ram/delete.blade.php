@foreach ($rams as $ram)
    <!-- Delete RAM Modal -->
    <div class="modal fade" id="deleteRamModal-{{ $ram->id }}" tabindex="-1"
        aria-labelledby="deleteRamModalLabel-{{ $ram->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('rams.destroy', $ram->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteRamModalLabel-{{ $ram->id }}">Delete RAM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete RAM capacity <strong>{{ $ram->capacity }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach
