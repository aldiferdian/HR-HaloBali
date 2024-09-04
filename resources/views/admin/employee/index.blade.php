@extends('admin.layouts.app')

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data Karywan</h3>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Add product-->
                @php
                    $roleAccess = ['manager', 'hr', 'admin'];
                @endphp

                @if (in_array(auth()->user()->role, $roleAccess))
                    <a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary">Tambah Karywan</a>
                @endif
                <!--end::Add product-->
            </div>
        </div>
        <div class="block-content block-content-full overflow-x-auto">

            <!-- DataTables functionality is initialized with .js-dataTable-     full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5%">No</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama Karywan</th>
                        <th class="text-center">Tempat Tanggal Lahir</th>
                        <th class="d-none d-sm-table-cell text-center">Email</th>
                        <th class="d-none d-sm-table-cell text-center">No. HP</th>
                        <th class="d-none d-sm-table-cell text-center">Alamat</th>
                        <th class="d-none d-sm-table-cell text-center">Role</th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @if (count($employees) > 0)
                        @foreach ($employees as $employee)
                            <tr>
                                <td class="text-center">
                                    <p>{{ ++$index }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->nik }}</p>
                                </td>
                                <td>
                                    <p>{{ $user->namakarywan }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->tempatlahir }},{{ $user->tanggallahir }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->nohandphone }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge bg-success">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->alamat }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <a href="{{ route('user.show', $user->id) }}">
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                            title="View User">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                    @if (in_array(auth()->user()->role, $roleAccess))
                                        <a href="{{ route('user.edit', $user->id) }}">
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                                title="Edit User">
                                                <i class="fa fa-pen-to-square"></i>
                                            </button>
                                        </a>
                                        <a href="#" class="menu-link delete-data"
                                            data-redirect="{{ route('user.destroy', $user->id) }}"
                                            data-id="{{ $user->id }}" data-token="{{ csrf_token() }}">
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                title="Delete User">
                                                <i class="fa fa-trash-can">
                                                </i>
                                            </button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center" colspan="12">Tidak ada data user</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
