@extends('admin.layouts.app')

@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default" style="border: 0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <h4 class="block-title">Tambah Data User</h4>
                </div>
                <div>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
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
                            <label for="" class="form-label" for="val-username">User Name<span
                                    class="text-danger">*</span></label>
                            <input type="text" required class="form-control" name="username"
                                value="{{ old('username') }}" placeholder="Masukkan User Name">

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
                                <label for="" class="form-label" for="val-password">Password<span
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
                                    <option value="employee" @if (old('role') == 'employee') selected @endif>Karywan
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Foto Profile</label>
                                <input type="file" name="profile" class="form-control" accept="image/*">
                            </div>
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
