@extends('home.layouts.app')

@section('container')
    <div class="container my-5">
        <div class="home-container">
            <h3 class="recommendation-header mb-4">Rekomendasi Laptop</h3>

            {{-- Form Filter --}}
            <form method="GET" action="{{ route('home.index') }}">
                @csrf
                <div class="row mb-3">
                    {{-- Merek Laptop --}}
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="laptopBrand" class="form-label">Merek Laptop</label>
                        <select class="form-control" id="laptopBrand" name="laptopBrand">
                            <option value="">Pilih Merek</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand }}"
                                    {{ request('laptopBrand') == $brand ? 'selected' : '' }}>
                                    {{ $brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Prosesor --}}
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="processor" class="form-label">Prosesor</label>
                        <select class="form-control" id="processor" name="processor">
                            <option value="">Pilih Prosesor</option>
                            @foreach ($processors as $processor)
                                <option value="{{ $processor->id }}"
                                    {{ request('processor') == $processor->id ? 'selected' : '' }}>
                                    {{ $processor->brand }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- RAM --}}
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label for="ram" class="form-label">RAM (GB)</label>
                        <select class="form-control" id="ram" name="ram">
                            <option value="">Pilih RAM</option>
                            @foreach ($rams as $ram)
                                <option value="{{ $ram->id }}" {{ request('ram') == $ram->id ? 'selected' : '' }}>
                                    {{ $ram->capacity }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Harga Maksimum --}}
                    <div class="col-md-3">
                        <label for="maxPrice" class="form-label">Harga Maksimum (IDR)</label>
                        <input type="number" class="form-control" id="maxPrice" name="maxPrice"
                            placeholder="Masukkan harga maksimal" value="{{ request('maxPrice') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Cari Laptop</button>
            </form>

            {{-- Hasil Rekomendasi --}}
            <div class="mt-5">
                <h5 class="mb-3">Hasil Pencarian</h5>
                @if ($laptops->isEmpty())
                    <p class="text-muted">Tidak ada laptop yang cocok dengan kriteria pencarian Anda.</p>
                @else
                    <div class="row">
                        @foreach ($laptops as $laptop)
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <img src="{{ $laptop->image ? asset('assets/img/laptops/' . $laptop->image) : asset('assets/img/no-image.png') }}"
                                        class="card-img-top" alt="{{ $laptop->brand }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $laptop->brand }} {{ $laptop->model }}</h5>
                                        <p class="card-text">
                                            <strong>Prosesor:</strong> {{ $laptop->processor->brand ?? '-' }}<br>
                                            <strong>RAM:</strong> {{ $laptop->ram->capacity ?? '-' }} GB<br>
                                            <strong>Harga:</strong> Rp {{ number_format($laptop->harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
