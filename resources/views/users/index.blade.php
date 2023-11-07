<!-- resources/views/users/index.blade.php -->

@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
        }

        .dataTables_wrapper .dataTables_paginate {
            float: right;
        }

        tbody tr {
            cursor: pointer;
        }

        tbody tr:hover {
            background-color: #78abd2;
        }

        .highlighted-row {
            background-color: #83b9dd;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="pull-left">Users</h1>
                        <div class="pull-right">
                            <br>
                            <a href="{{ route('users.create') }}">Create New User</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @include('errors')


                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th>S/n</th>
                                    <th>Email</th>
                                    <th>name</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="clickable-row">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->getRoleNames()->first() }} </td>
                                        <td>{{ $user->created_at }} </td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                                class="d-none block-user">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                            </form>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                                class="d-none delete-user">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                            </form>
                                            <a href="{{ route('users.edit', $user->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>

                                            <button type="button" class="btn btn-sm btn-warning block-user-btn disabled"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Block</button>


                                            <button type="button" class="btn btn-sm btn-danger delete-user-btn">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });

        $('.clickable-row').on('mouseover', function() {
            $(this).addClass('highlighted-row');
        });

        $('.clickable-row').on('mouseout', function() {
            $(this).removeClass('highlighted-row');
        });

        $('.block-user-btn').click(function(e) {
            e.preventDefault();
            $(this).parent().find('.block-user').submit();
        });

        $('.delete-user-btn').click(function(e) {
            e.preventDefault();
            $(this).parent().find('.delete-user').submit();
        });
    </script>
@endsection
