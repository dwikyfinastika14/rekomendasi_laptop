@foreach ($laptops as $laptop)
    <!-- Delete Laptop Modal -->
    <div class="modal fade" id="deleteLaptopModal-{{ $laptop->id }}" tabindex="-1"
        aria-labelledby="deleteLaptopModalLabel-{{ $laptop->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('laptops.destroy', $laptop->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLaptopModalLabel-{{ $laptop->id }}">Delete Laptop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            {{-- Bootstrap 5:
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure you want to delete the laptop <strong>{{ $laptop->brand }}
                                {{ $laptop->model }}</strong>?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
