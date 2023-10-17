@extends('layouts.admin.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Jabatan</h5>
    </div>
    <div class="card-body border-top">
        <div class="col-lg-9 offset-lg-1">
            <form action="{{ route('position.update', ['id' => $positionData['positionId']]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Nama Jabatan:</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Masukkan Jabatan" required
                            name="positionName" value="{{ $positionData['positionName'] }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-lg-3 col-form-label">Keterangan:</label>
                    <div class="col-lg-9">
                        <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Keterangan" required
                            name="description">{{ $positionData['description'] }}</textarea>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan<i class="ph-check-circle ms-2"></i></button>
                    <a href="{{ route('position.index') }}" class="btn btn-danger">Batal<i
                            class="ph-x-circle ms-2"></i></a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
