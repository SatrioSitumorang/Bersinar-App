@extends('layouts.admin.template')

@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Pekerjaan</h5>
        </div>
        <div class="card-body border-top">
            <div class="row">
                <div class="col-lg-9 offset-lg-1">
                    <form action="{{ route('occupation.update', ['id' => $occupationData['occupationId']]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Nama Pekerjaan:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" required name="occupationName"
                                    value="{{ $occupationData['occupationName'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Keterangan:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" required name="description">{{ $occupationData['description'] }}</textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan<i
                                    class="ph-check-circle ms-2"></i></button>
                            {{-- <button type="reset" class="btn btn-danger" >Batal<i class="ph-x-circle ms-2"></i></button> --}}
                            <a href="{{ route('occupation.index') }}" class="btn btn-danger">Batal<i
                                    class="ph-x-circle ms-2"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
