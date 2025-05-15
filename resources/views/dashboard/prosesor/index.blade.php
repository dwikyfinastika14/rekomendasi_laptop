@extends('dashboard.layouts.app')

@section('container')
    <div>
        <a class="btn btn-link" role="button" id="menu-toggle-L" href="#menu-toggle-L">
            <i class="fa fa-bars icon-sidebar-L"></i>
        </a>
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <h5 class="text-black-50 float-left judul-header">Data Prosesor</h5>
                    <button class="btn btn-sm float-right smsp-button" role="button" data-toggle="modal"
                        data-target="#addProsesorModal">
                        <i class="fa fa-pencil-square-o"></i>&nbsp; Add Data Prosesor
                    </button>
                </div>
            </div>
            <form class="form-clean">
                <div class="form-row">
                    <div class="col">
                        <div class="table-responsive text-black-50 shadow-sm">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                    <tr class="table-secondary text-center text-black-50">
                                        <th class="border rounded-0 border-secondary judul-header">No</th>
                                        <th class="border rounded-0 border-secondary judul-header">Brand</th>
                                        <th class="border rounded-0 border-secondary judul-header">Gambar</th>
                                        <th class="border rounded-0 border-secondary judul-header">Jumlah Core</th>
                                        <th class="border rounded-0 border-secondary judul-header">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-body">
                                    @forelse ($prosesors as $key => $prosesor)
                                        <tr>
                                            <td class="text-center text-body">
                                                {{ $loop->iteration + ($prosesors->currentPage() - 1) * $prosesors->perPage() }}
                                            </td>
                                            <td class="text-center text-body">{{ $prosesor->brand }}</td>
                                            <td class="text-center">
                                                @if ($prosesor->image)
                                                    <img src="{{ asset('assets/img/prosesor/' . $prosesor->image) }}"
                                                        alt="Gambar {{ $prosesor->brand }}" class="img-thumbnail"
                                                        style="width: 50px;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td class="text-center text-body">{{ $prosesor->jumlah_core }}</td>
                                            <td class="text-center">
                                                <a class="smsp-icon-edit" href="#" data-toggle="modal"
                                                    data-target="#editProsesorModal-{{ $prosesor->id }}" title="Edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a class="smsp-icon-delete" href="#" data-toggle="modal"
                                                    data-target="#deleteProsesorModal-{{ $prosesor->id }}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $prosesors->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Include modal add, edit, delete --}}
    @include('dashboard.prosesor.add') {{-- Modal Add Prosesor --}}
    @include('dashboard.prosesor.edit') {{-- Modal Edit Prosesor --}}
    @include('dashboard.prosesor.delete') {{-- Modal Delete Prosesor --}}
@endsection
