@extends('layouts.layout')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            Change password
                        </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.setting') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            old password:
                                        </label>
                                        <input type="password" name="old_password" class="form-control" value="" required>
                                        <div class="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            new password:
                                        </label>
                                        <input type="password" name="new_password" class="form-control" value="" required>
                                        <div class="error">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">
                                            confirm new password:
                                        </label>
                                        <input type="password" name="confirm_password" class="form-control" value="" required>
                                        <div class="error">

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-flat">
                                            Confirm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
