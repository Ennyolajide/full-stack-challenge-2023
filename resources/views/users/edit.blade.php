@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('errors')
                        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                            {{ csrf_field() }} {{ method_field('PUT') }}}
                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="form-control" placeholder="Name" required />
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address : </label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="form-control" placeholder="Email Address" disabled required />
                            </div>

                            <div class="form-group">
                                <label for="password">Password : </label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required />
                            </div>

                            <div class="form-group">
                                <label for="district">Confirm Password : </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Confirm Password" />
                            </div>

                            <div class="form-group">
                                <label for="city">Role: </label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="" disabled>Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ $user->roles->first()->id == $role->id ? 'selected' : '' }}>{{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
