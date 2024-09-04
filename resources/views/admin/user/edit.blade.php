@extends('admin.layouts.app')

@section('content')
    <div class="block block-rounded">
        <div class="block-header block-header-default" style="border: 0">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div>
                    <h4 class="block-title">Ubah Data User</h4>
                </div>
                <div>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                </div>
            </div>

        </div>
        @include('admin.layouts.errors')
        <div class="block-content block-content-full overflow-x-auto">
            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col-lg-12">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="" class="form-label" for="val-username">User Name</label>
                            <input type="text" required class="form-control" name="username"
                                value="{{ $user->username }}" placeholder="Masukkan User Name">

                        </div>
                        <div class="col-6">
                            <label for="" class="form-label" for="val-email">Email</label>
                            <input type="text" required class="form-control" name="email" placeholder="Masukkan Email"
                                value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label" for="val-password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password">

                            </div>
                            <div class="col-6">
                                <label for="" class="form-label" for="val-password_confirmation">Konfirmasi
                                    Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Konfirmasi Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="" class="form-label">Role</label>
                                <select name="role" id="" class="form-select" required>
                                    <option value="" selected disabled>Pilih Role</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager
                                    <option value="hr" {{ $user->role == 'hr' ? 'selected' : '' }}>HR</option>
                                    </option>
                                    <option value="pegawai" {{ $user->role == 'pegawai' ? 'selected' : '' }}>Pegawai
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="" class="form-label">Foto Profile</label>
                                <input type="file" name="profile" class="form-control" accept="image/*">
                                <div class="mt-3 js-gallery">
                                    <a class="btn btn-sm btn-alt-primary img-thumb img-lightbox"
                                        data-caption="{{ $user->username }}" href="{{ asset($user->profile) }}"><i
                                            class="fa fa-eye"></i> Lihat Profile
                                    </a>
                                    <i>upload kembali jika ingin mengubah foto profile <span class="text-danger">*</span>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script>
        Codebase.helpersOnLoad(['jq-magnific-popup']);
    </script>
@endsection
