<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\BukuRekeningController;
use App\Http\Controllers\admin\PaymentTypeController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\admin\AccountCategoryController;
use App\Http\Controllers\admin\BarangController;
use App\Http\Controllers\admin\StatusTypeController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\BloodTypeController;
use App\Http\Controllers\admin\BusinessTypeController;
use App\Http\Controllers\admin\BusinessUnitController;
use App\Http\Controllers\admin\BusinessUnitTypeController;
use App\Http\Controllers\admin\companyOrInstitution;
use App\Http\Controllers\admin\companyOrInstitutionController;
use App\Http\Controllers\admin\CorporateController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\EmployeePersonalController;
use App\Http\Controllers\admin\IdentityTypeController;
use App\Http\Controllers\admin\ItemCategoryController;
use App\Http\Controllers\admin\ItemController;
use App\Http\Controllers\admin\ItemTypeController;
use App\Http\Controllers\admin\ItemUoMController;
use App\Http\Controllers\admin\JenisBarangController;
use App\Http\Controllers\admin\JenisSatuanBarangController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\KategoriBarangController;
use App\Http\Controllers\admin\OccupationController;
use App\Http\Controllers\admin\OfftakerController;
use App\Http\Controllers\admin\PartnerTypesController;
use App\Http\Controllers\admin\PersonTypeController;
use App\Http\Controllers\admin\PositionController;
use App\Http\Controllers\admin\ReligionController;

use App\Http\Controllers\admin\SatuanBarangController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\SupplierController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\UomTypeController;
use Illuminate\Contracts\Queue\Job;
use PHPUnit\Framework\MockObject\Builder\Identity;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route untuk paymentType
Route::get("/tipe-pembayaran", [PaymentTypeController::class, 'index'])->name('paymentTypes.index');
Route::get('/tipe-pembayaran/tambah',[PaymentTypeController::class,'create'])->name('paymentTypes.create');
Route::post('/tipe-pembayaran/store',[PaymentTypeController::class,'store'])->name('paymentTypes.store');
Route::get('/tipe-pembayaran/show/{id}',[PaymentTypeController::class,'show'])->name('paymentTypes.show');
Route::get('/tipe-pembayaran/edit/{id}',[PaymentTypeController::class,'edit'])->name('paymentTypes.edit');
Route::put('/tipe-pembayaran/update/{id}',[PaymentTypeController::class,'update'])->name('paymentTypes.update');
Route::get('/tipe-pembayaran/destroy/{id}',[PaymentTypeController::class,'destroy'])->name('paymentTypes.destroy');

//route untuk Currency
Route::get("/mata-uang", [CurrencyController::class, 'index'])->name('currency.index');
Route::get("/mata-uang/tambah", [CurrencyController::class, 'create'])->name('currency.create');
Route::get('/mata-uang/detail/{id}',[CurrencyController::class,'show'])->name('currency.show');

// Route untuk accountCategory
Route::get("/kategori-rekening", [AccountCategoryController::class, 'index'])->name('accountCategory.index');
Route::get("/kategori-rekening/create", [AccountCategoryController::class, 'create'])->name('accountCategory.create');
Route::post('/kategori-rekening/store', [AccountCategoryController::class, 'store'])->name('accountCategory.store');
Route::get('/kategori-rekening/edit/{id}', [AccountCategoryController::class, 'edit'])->name('accountCategory.edit');
Route::put('/kategori-rekening/update/{id}', [AccountCategoryController::class, 'update'])->name('accountCategory.update');
Route::get('/kategori-rekening/detail/{id}',[AccountCategoryController::class,'show'])->name('accountCategory.show');
Route::get('/kategori-rekening/delete/{id}',[AccountCategoryController::class,'delete'])->name('accountCategory.delete');

// Route untuk statustype
Route::get("/jenis-status", [StatusTypeController::class, 'index'])->name('statusType.index');
Route::get("/jenis-status/tambah", [StatusTypeController::class, 'create'])->name('statusType.create');
Route::post('/jenis-status/store', [StatusTypeController::class, 'store'])->name('statusType.store');
Route::get('/jenis-status/edit/{id}', [StatusTypeController::class, 'edit'])->name('statusType.edit');
Route::put('/jenis-status/update/{id}', [StatusTypeController::class, 'update'])->name('statusType.update');
Route::delete('/jenis-status/hapus/{id}', [StatusTypeController::class, 'hapus'])->name('statusType.hapus');
Route::get('/jenis-status/detail/{id}',[StatusTypeController::class,'detail'])->name('statusType.detail');

// Route untuk country
Route::get("/negara", [CountryController::class, 'index'])->name('country.index');
Route::get("/negara/tambah", [CountryController::class, 'create'])->name('country.create');
Route::get('/negara/detail/{id}',[CountryController::class,'show'])->name('country.show');

// Route untuk bloodType
Route::get("/golongan-darah", [BloodTypeController::class, 'index'])->name('bloodType.index');
Route::get("/golongan-darah/tambah", [BloodTypeController::class, 'create'])->name('bloodType.create');
Route::get('/golongan-darah/show/{id}',[BloodTypeController::class,'show'])->name('bloodType.show');
Route::post('/golongan-darah', [BloodTypeController::class,'store'])->name('bloodType.store');
Route::get('/golongan-darah/edit/{id}', [BloodTypeController::class, 'edit'])->name('bloodType.edit');
Route::put('/golongan-darah/update/{id}',[BloodTypeController::class,'update'])->name('bloodType.update');
Route::get('/golongan-darah/delete/{id}', [BloodTypeController::class, 'hapus'])->name('bloodType.delete');



// Route untuk identityType
Route::get('/jenis-identitas', [IdentityTypeController::class, 'index'])->name('identityType.index');
Route::get('/jenis-identitas/tambah', [IdentityTypeController::class, 'create'])->name('identityType.create');
Route::post('/jenis-identitas/store', [IdentityTypeController::class, 'store'])->name('identityType.store');
Route::get('/jenis-identitas/detail/{id}', [IdentityTypeController::class, 'show'])->name('identityType.show');
Route::put('/jenis-identitas/update/{id}', [IdentityTypeController::class, 'update'])->name('identityType.update');
Route::get('/jenis-identitas/edit/{id}', [IdentityTypeController::class, 'edit'])->name('identityType.edit');
Route::get('/jenis-identitas/delete/{id}', [IdentityTypeController::class, 'hapus'])->name('identityType.delete');

// Route untuk position
Route::get("/jabatan", [PositionController::class, 'index'])->name('position.index');
Route::get("/jabatan/tambah", [PositionController::class, 'create'])->name('position.create');
Route::post('/jabatan/store', [PositionController::class, 'store'])->name('position.store');
Route::put('/jabatan/update/{id}', [PositionController::class, 'update'])->name('position.update');
Route::get('/jabatan/edit/{id}', [PositionController::class, 'edit'])->name('position.edit');
Route::delete('/jabatan/hapus/{id}', [PositionController::class, 'hapus'])->name('position.hapus');
Route::get('/jabatan/detail/{id}',[PositionController::class,'detail'])->name('position.detail');

// Route untuk religion
Route::get("/agama", [ReligionController::class, 'index'])->name('religion.index');
Route::get("/agama/tambah", [ReligionController::class, 'create'])->name('religion.create');
Route::post('/agama/store', [ReligionController::class, 'store'])->name('religion.store');
Route::get('/agama/detail/{id}', [ReligionController::class, 'show'])->name('religion.show');
Route::get('/agama/edit/{id}', [ReligionController::class, 'edit'])->name('religion.edit');
Route::put('/agama/update/{id}', [ReligionController::class, 'update'])->name('religion.update');
Route::delete('/agama/hapus/{id}', [ReligionController::class, 'hapus'])->name('religion.hapus');

// Route untuk corporate
Route::get('/perusahaan-institusi', [CorporateController::class, 'index']) -> name('corporate.index');
Route::get('/perusahaan-institusi/tambah', [CorporateController::class, 'create']) -> name('corporate.create');
Route::get('/perusahaan-institusi/detail{id}', [CorporateController::class, 'show']) -> name('corporate.show');

// Route untuk businessunittype
Route::get('/jenis-unit-bisnis', [BusinessUnitTypeController::class, 'index']) -> name('businessUnitTypes.index');
Route::get('/jenis-unit-bisnis/tambah', [BusinessUnitTypeController::class, 'create']) -> name('businessUnitTypes.create');
Route::post('/jenis-unit-bisnis/store', [BusinessUnitTypeController::class, 'store']) -> name('businessUnitTypes.store');
Route::get('/jenis-unit-bisnis/edit/{id}', [BusinessUnitTypeController::class, 'edit']) -> name('businessUnitTypes.edit');
Route::put('/jenis-unit-bisnis/update/{id}', [BusinessUnitTypeController::class, 'update']) -> name('businessUnitTypes.update');
Route::get('/jenis-unit-bisnis/hapus/{id}', [BusinessUnitTypeController::class, 'hapus']) -> name('businessUnitTypes.hapus');
Route::get('/jenis-unit-bisnis/detail/{id}', [BusinessUnitTypeController::class, 'detail']) -> name('businessUnitTypes.detail');

// Route untuk businessUnit
Route::get('/bisnis-unit', [BusinessUnitController::class, 'index']) -> name('businessUnit.index');
Route::get('/bisnis-unit/tambah', [BusinessUnitController::class, 'create']) -> name('businessUnit.create');

// Route untuk department
Route::get('/departemen', [DepartmentController::class, 'index']) -> name('department.index');
Route::get('/departemen/tambah', [DepartmentController::class, 'create']) -> name('department.create');

Route::get('/unit', [UnitController::class, 'index']) -> name('unit.index');
Route::get('/unit/tambah', [UnitController::class, 'create']) -> name('unit.create');

// Route untuk status
Route::get('/status', [StatusController::class, 'index']) -> name('status.index');
Route::get('/status/tambah', [StatusController::class, 'create']) -> name('status.create');

// Route untuk Occupation
Route::get('/pekerjaan', [OccupationController::class, 'index']) -> name('occupation.index');
Route::get('/pekerjaan/tambah', [OccupationController::class, 'create']) -> name('occupation.create');
Route::post('/pekerjaan/store', [OccupationController::class, 'store'])->name('occupation.store');
Route::put('/pekerjaan/update/{id}', [OccupationController::class, 'update'])->name('occupation.update');
Route::get('/pekerjaan/edit/{id}', [OccupationController::class, 'edit'])->name('occupation.edit');
Route::get('/pekerjaan/delete/{id}', [OccupationController::class, 'destroy'])->name('occupation.delete');
Route::get('/pekerjaan/detail/{id}', [OccupationController::class, 'show'])->name('occupation.show');

// Route untuk partnerType
Route::get('/jenis-partner', [PartnerTypesController::class, 'index']) -> name('partnerTypes.index');
Route::get('/jenis-partner/tambah', [PartnerTypesController::class, 'create']) -> name('partnerTypes.create');
Route::post('/jenis-partner/{parentId?}', [PartnerTypesController::class, 'store'])->name('partnerTypes.store');
Route::get('/jenis-partner/detail/{id}', [PartnerTypesController::class, 'show'])->name('partnerTypes.show');
Route::get('/jenis-partner/delete/{id}', [PartnerTypesController::class, 'hapus'])->name('partnerTypes.delete'); // Menambahkan definisi route ini
Route::get('/jenis-partner/edit/{id}', [PartnerTypesController::class, 'edit'])->name('partnerTypes.edit');
Route::put('/jenis-partner/update/{id}', [PartnerTypesController::class, 'update'])->name('partnerTypes.update');

// Route untuk itemType
Route::get('/jenis-barang', [ItemTypeController::class, 'index']) -> name('itemType.index');
Route::get('/jenis-barang/tambah', [ItemTypeController::class, 'create']) -> name('itemType.create');
Route::post('/jenis-barang',[ItemTypeController::class,'store'])->name('itemType.store');
route::get('/jenis-barang/detail/{id}',[ItemTypeController::class,'show'])->name('itemType.show');
route::get('/jenis-barang/edit/{id}',[ItemTypeController::class, 'edit'])->name('itemType.edit');
Route::put('/jenis-barang/update/{id}', [ItemTypeController::class, 'update'])->name('itemType.update');
Route::get('/jenis-barang/delete/{id}',[ItemTypeController::class,'hapus'])->name('itemType.delete');

// Route untuk itemCategory
Route::get('/kategori-barang', [ItemCategoryController::class, 'index']) -> name('itemCategory.index');
Route::get('/kategori-barang/tambah', [ItemCategoryController::class, 'create']) -> name('itemCategory.create');
route::post('/kategori-barang',[ItemCategoryController::class,'store'])->name('itemCategory.store');
route::get('/kategori-barang/detail/{id}',[ItemCategoryController::class,'show'])->name('itemCategory.show');
route::get('/kategori-barang/edit/{id}',[ItemCategoryController::class, 'edit'])->name('itemCategory.edit');
Route::put('/kategori-barang/update/{id}', [ItemCategoryController::class, 'update'])->name('itemCategory.update');
Route::get('/kategori-barang/delete/{id}',[ItemCategoryController::class,'hapus'])->name('itemCategory.delete');

// Route untuk uomtype
Route::get('/jenis-satuan-barang', [UomTypeController::class, 'index']) -> name('uomType.index');
Route::get('/jenis-satuan-barang/tambah', [UomTypeController::class, 'create']) -> name('uomType.create');
Route::post('/jenis-satuan-barang/store', [UomTypeController::class, 'store']) -> name('uomType.store');
Route::get('/jenis-satuan-barang/edit/{id}', [UomTypeController::class, 'edit']) -> name('uomType.edit');
Route::put('/jenis-satuan-barang/update/{id}', [UomTypeController::class, 'update']) -> name('uomType.update');
Route::get('/jenis-satuan-barang/hapus/{id}', [UomTypeController::class, 'hapus']) -> name('uomType.hapus');
Route::get('/jenis-satuan-barang/detail/{id}', [UomTypeController::class, 'show']) -> name('uomType.show');

// Route untuk itemuom
Route::get('/satuan-barang', [ItemUoMController::class, 'index']) -> name('itemUoM.index');
Route::get('/satuan-barang/tambah', [ItemUoMController::class, 'create'])->name('itemUoM.create');
Route::post('/satuan-barang/store', [ItemUoMController::class, 'store'])->name('itemUoM.store');
Route::get('/satuan-barang/edit/{id}',[ItemUoMController::class,'edit'])->name('itemUoM.edit');
Route::put('/satuan-barang/update/{id}', [ItemUoMController::class, 'update']) -> name('itemUoM.update');
Route::get('/satuan-barang/detail/{id}', [ItemUoMController::class, 'show']) -> name('itemUoM.show');
Route::get('/satuan-barang/delete/{id}',[ItemUoMController::class,'hapus'])->name('itemUoM.delete');

// Route untuk item
Route::get('/barang', [ItemController::class, 'index']) -> name('item.index');
Route::get('/barang/tambah', [ItemController::class, 'create']) -> name('item.create');

// Route untuk personType
Route::get('/jenis-orang', [PersonTypeController::class, 'index'])->name('personType.index');
Route::post('/jenis-orang/store', [PersonTypeController::class, 'store'])->name('personType.store');
Route::get('/jenis-orang/edit/{id}', [PersonTypeController::class, 'edit'])->name('personType.edit');
Route::put('/jenis-orang/update/{id}', [PersonTypeController::class, 'update'])->name('personType.update');
Route::get('/jenis-orang/detail/{id}', [PersonTypeController::class, 'show'])->name('personType.show');
Route::delete('/jenis-orang/hapus/{id}', [PersonTypeController::class, 'delete'])->name('personType.delete');

// Route untuk Supplier
Route::get('/nasabah', [SupplierController::class, 'index'])-> name('supplier.index');
Route::get('/nasabah/tambah', [SupplierController::class, 'create'])-> name('supplier.create');

// Route untuk Offtaker
Route::get('/offtaker', [OfftakerController::class, 'index']) -> name('offtaker.index');
Route::get('/offtaker/tambah', [OfftakerController::class, 'create']) -> name('offtaker.create');

// Route untuk EmployeePersonal
Route::get('/pegawai', [EmployeePersonalController::class, 'index']) -> name('employeePersonal.index');
Route::get('/pegawai/tambah', [EmployeePersonalController::class, 'create']) -> name('employeePersonal.create');
