@extends('dashboard.layouts.app')

@section('container')
    <div>
        <a class="btn btn-link" role="button" id="menu-toggle-L" href="#menu-toggle-L">
            <i class="fa fa-bars icon-sidebar-L"></i>
        </a>

        <div class="container-fluid">
            {{-- Header Section --}}
            <div class="row mb-3">
                <div class="col">
                    <h5 class="text-black-50 float-left judul-header">Data Laptop</h5>
                    <button class="btn btn-sm float-right smsp-button" role="button" data-toggle="modal"
                        data-target="#addLaptopModal">
                        <i class="fa fa-pencil-square-o"></i>&nbsp; Add Data Laptop
                    </button>
                </div>
            </div>

            {{-- Table Section --}}
            <form class="form-clean">
                <div class="form-row">
                    <div class="col">
                        <div class="table-responsive-sm text-black-50 shadow-sm">
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                    <tr class="table-secondary text-center">
                                        <th style="color: black;">No</th>
                                        <th style="color: black;">Brand</th>
                                        <th style="color: black;">Processor</th>
                                        <th style="color: black;">RAM</th>
                                        <th style="color: black;">Harga</th>
                                        <th style="color: black;">Gambar</th>
                                        <th style="color: black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laptops as $laptop)
                                        <tr>
                                            <td class="text-center" style="color: black;">
                                                {{ $loop->iteration + ($laptops->currentPage() - 1) * $laptops->perPage() }}
                                            </td>
                                            <td class="text-center" style="color: black;">{{ $laptop->brand }}</td>
                                            <td class="text-center" style="color: black;">
                                                {{ $laptop->processor->brand ?? '-' }}</td>
                                            <td class="text-center" style="color: black;">
                                                {{ $laptop->ram->capacity ?? '-' }}</td>
                                            <td class="text-center" style="color: black;">Rp
                                                {{ number_format($laptop->harga, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                @if ($laptop->image)
                                                    <img src="{{ asset('assets/img/laptops/' . $laptop->image) }}"
                                                        alt="Gambar {{ $laptop->brand }}" class="img-thumbnail"
                                                        style="width: 100px; height: auto;">
                                                @else
                                                    <span style="color: black;">No Image</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{-- Edit Button --}}
                                                <a href="#" class="smsp-icon-edit" data-toggle="modal"
                                                    data-target="#editLaptopModal-{{ $laptop->id }}" title="Edit">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>

                                                {{-- Delete Button --}}
                                                <a href="#" class="smsp-icon-delete ml-2" data-toggle="modal"
                                                    data-target="#deleteLaptopModal-{{ $laptop->id }}" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center" style="color: black;">No Data Available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-3">
                            {{ $laptops->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Include Modal Components --}}
    @include('dashboard.laptop.add')
    @include('dashboard.laptop.edit')
    @include('dashboard.laptop.delete')
@endsection
