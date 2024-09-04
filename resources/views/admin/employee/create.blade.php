@extends('admin.layouts.app')

@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default" style="border: 0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <h4 class="block-title">Tambah Data Karyawan</h4>
                </div>
                <div>
                    <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>

        </div>
        @include('admin.layouts.errors')
        <div class="block-content block-content-full overflow-x-auto">
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="" class="form-label" for="val-nik">NIK<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="nik" value="{{ old('nik') }}"
                                placeholder="Masukkan NIK">

                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label" for="val-email">Nama Karywan<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="email" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label" for="val-email">Tempat Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="email" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label" for="val-tanggal-lahir">Tanggal Lahir<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="js-flatpickr form-control" name="tanggal-lahir"
                                placeholder="Pilih Tanggal Lahir" value="{{ old('tanggal-lahir') }}">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label" for="val-email">No. HP<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="email" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label" for="val-email">Email<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="email" placeholder="Masukkan Email"
                                value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label" for="val-password">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                                    required>

                            </div>
                            <div class="col-6">
                                <label for="" class="form-label" for="val-password_confirmation">Konfirmasi Password
                                    <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label">Role <span class="text-danger">*</span></label>
                                <select name="role" id="" class="form-select" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    <option value="hr" @if (old('role') == 'hr') selected @endif>HR</option>
                                    <option value="manager" @if (old('role') == 'manager') selected @endif>Manager
                                    </option>
                                    <option value="admin" @if (old('role') == 'admin') selected @endif>Admin</option>
                                    <option value="pegawai" @if (old('role') == 'pegawai') selected @endif>Pegawai
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Foto Profile</label>
                                <input type="file" name="profile" class="form-control" accept="image/*">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="" class="form-label" for="val-alamat">Alamat<span
                                        class="text-danger">*</span></label>
                                <textarea type="text" required class="form-control" name="alamat" placeholder="Masukkan Email"
                                    value="{{ old('alamat') }}">
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-end">
                                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>
        Codebase.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-rangeslider',
            'jq-masked-inputs', 'jq-pw-strength'
        ]);
    </script>
@endsection
