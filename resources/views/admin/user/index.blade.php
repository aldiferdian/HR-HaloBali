@extends('admin.layouts.app')

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Data User</h3>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Add product-->
                @php
                    $roleAccess = ['manager', 'hr', 'admin'];
                @endphp

                @if (in_array(auth()->user()->role, $roleAccess))
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">Tambah User</a>
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
                        <th class="text-center">Username</th>
                        <th class="d-none d-sm-table-cell text-center">Email</th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 15%">
                            Role
                        </th>
                        <th class="d-none d-sm-table-cell text-center" style="width: 15%">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = 0;
                    @endphp
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">
                                    {{ ++$index }}
                                </td>
                                <td>
                                    <p>{{ $user->username }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <p>{{ $user->email }}</p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <span>
                                        {{ ucfirst($user->role) }}
                                    </span>
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
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}" />
@endsection
@section('script')
    <!-- END Dynamic Table Full -->
    <!-- Dynamic Table Responsive -->
    {{-- <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script> --}}

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endsection
