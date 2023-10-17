@extends('layouts.admin.template')

@section('content')
    <!-- Basic layout -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Tambah Tipe Pembayaran</h5>
        </div>
        <div class="card-body border-top">
            <div class="row">
                <div class="col-lg-9 offset-lg-1">
                    <form action="{{ route('paymentTypes.update', ['id' => $paymentTypeData['idPaymentType']]) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Kode Tipe Pembayaran:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="paymentTypeCode"
                                    value="{{ $paymentTypeData['paymentTypeCode'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Tipe Pembayaran:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="paymentTypeName"
                                    value="{{ $paymentTypeData['paymentTypeName'] }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Aging:</label>
                            <div class="col-lg-9">
                                <input type="checkbox" class="form-check-input" id="cc_li_c" name="isAging"
                                    @if ($paymentTypeData['isAging'] == 1) checked @endif>
                                <label class="form-check-label" for="cc_li_c">Checked</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Keterangan:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" name="description">{{ $paymentTypeData['description'] }}</textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan<i
                                    class="ph-check-circle ms-2"></i></button>
                            <a href="{{ route('paymentTypes.index') }}" class="btn btn-danger">Batal<i
                                    class="ph-x-circle ms-2"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /basic layout -->
@endsection
