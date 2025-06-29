@extends('dashboard.layouts.app')

@section('container')
    <div>
        <a class="btn btn-link" role="button" id="menu-toggle-L" href="#menu-toggle-L">
            <i class="fa fa-bars icon-sidebar-L"></i>
        </a>
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col">
                    <h5 class="text-black-50 float-left judul-header">Data RAM</h5>
                    <button class="btn btn-sm float-right smsp-button" role="button" data-toggle="modal"
                        data-target="#addRamModal">
                        <i class="fa fa-pencil-square-o"></i>&nbsp; Add Data RAM
                    </button>
                </div>
            </div>
            <form class="form-clean">
                <div class="form-row">
                    <div class="col">
                        <div class="table-responsive-sm text-black-50 shadow-sm">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                    <tr class="table-secondary text-center text-black-50">
                                        <th style="color: black;">No</th>
                                        <th style="color: black;">Kapasitas</th>
                                        <th style="color: black;">Jenis</th>
                                        <th style="color: black;">Kecepatan</th>
                                        <th style="color: black;">Gambar</th>
                                        <th style="color: black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-body">
                                    @forelse ($rams as $key => $ram)
                                        <tr>
                                            <td class="text-center text-body">
                                                {{ $loop->iteration + ($rams->currentPage() - 1) * $rams->perPage() }}
                                            </td>
                                            <td class="text-center text-body">{{ $ram->capacity }}</td>
                                            <td class="text-center text-body">{{ $ram->type }}</td>
                                            <td class="text-center text-body">{{ $ram->speed }} MHz</td>
                                            <td class="text-center">
                                                @if ($ram->image)
                                                    <img src="{{ asset('assets/img/ram/' . $ram->image) }}" alt="RAM Image"
                                                        class="img-thumbnail" style="width: 100px; height: auto;">
                                                @else
                                                    <span>No Image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="smsp-icon-edit" href="#" data-toggle="modal"
                                                    data-target="#editRamModal-{{ $ram->id }}">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a class="smsp-icon-delete" href="#" data-toggle="modal"
                                                    data-target="#deleteRamModal-{{ $ram->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $rams->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('dashboard.ram.add') {{-- Modal Add RAM --}}
    @include('dashboard.ram.edit') {{-- Modal Edit RAM --}}
    @include('dashboard.ram.delete') {{-- Modal Delete RAM --}}
@endsection
