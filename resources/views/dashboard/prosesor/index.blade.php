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
                    <button class="btn btn-sm float-right smsp-button" type="button" data-toggle="modal"
                        data-target="#addProsesorModal">
                        <i class="fa fa-pencil-square-o"></i>&nbsp; Add Data Prosesor
                    </button>
                </div>
            </div>
            <form class="form-clean">
                <div class="form-row">
                    <div class="col">
                        <div class="table-responsive-sm text-black-50 shadow-sm">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                    <tr class="table-secondary text-center">
                                        <th style="color: black;">No</th>
                                        <th style="color: black;">Brand</th>
                                        <th style="color: black;">Jumlah Core</th>
                                        <th style="color: black;">Gambar</th>
                                        <th style="color: black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-body">
                                    @forelse ($prosesors as $prosesor)
                                        <tr>
                                            <td class="text-center" style="color: black">
                                                {{ $loop->iteration + ($prosesors->currentPage() - 1) * $prosesors->perPage() }}
                                            </td>
                                            <td class="text-center" style="color: black">{{ $prosesor->brand }}</td>

                                            <td class="text-center" style="color: black">{{ $prosesor->jumlah_core }}</td>
                                            <td class="text-center">
                                                @if ($prosesor->image)
                                                    <img src="{{ asset('assets/img/prosesor/' . $prosesor->image) }}"
                                                        alt="Gambar {{ $prosesor->brand }}" class="img-thumbnail"
                                                        style="width: 100px; height: auto;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="smsp-icon-edit" data-toggle="modal"
                                                    data-target="#editProsesorModal-{{ $prosesor->id }}" title="Edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                                <a href="#" class="smsp-icon-delete" data-toggle="modal"
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

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $prosesors->links() }}
                        </div>
                    </div>
                </div>

            </form>
        </div>

        {{-- Include modals --}}
        @include('dashboard.prosesor.add') {{-- Add Prosesor Modal --}}
        @include('dashboard.prosesor.edit') {{-- Edit Prosesor Modal --}}
        @include('dashboard.prosesor.delete') {{-- Delete Prosesor Modal --}}
    @endsection
