@extends('layouts.admin.template')

@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Detail jenis Partner</h5>
        </div>

        <div class="card-body border-top">
            <div class="row">
                <div class="card-body">
                    <form action="#">
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label fw-semibold">Parent :</label>
                            <div class="col-lg-9">
                                @if ($parentType)
                                    <label class="col-lg-9 col-form-label">{{ $parentType->partnerType }}</label>
                                @else
                                    <label class="col-lg-9 col-form-label">Tidak Ada</label>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label fw-semibold">Jenis Partner:</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 col-form-label">{{ $partnerType->partnerType }}</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label fw-semibold">Keterangan:</label>
                            <div class="col-lg-9">
                                <label class="col-lg-9 col-form-label">{{ $partnerType->description }}</label>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('partnerTypes.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /basic layout -->
@endsection
