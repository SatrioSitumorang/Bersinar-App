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
                    <form action="{{ route('paymentTypes.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Kode Tipe Pembayaran:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Kode Tipe Pembayaran"
                                    required name="paymentTypeCode">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Tipe Pembayaran:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Masukkan Tipe Pembayaran" required
                                    name="paymentTypeName">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Aging:</label>
                            <div class="col-lg-9" style="padding-top: 9px">
                                <input type="checkbox" class="form-check-input" id="cc_li_c" name="isAging">
                                <label class="form-check-label" for="cc_li_c" >Checked</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-lg-3 col-form-label">Keterangan:</label>
                            <div class="col-lg-9">
                                <textarea rows="3" cols="3" class="form-control" placeholder="Masukkan Keterangan" required
                                    name="description"></textarea>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Simpan<i
                                    class="ph-check-circle ms-2"></i></button>
                            <button type="reset" class="btn btn-danger">Batal<i class="ph-x-circle ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /basic layout -->
@endsection
