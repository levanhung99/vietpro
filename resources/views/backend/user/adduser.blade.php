@extends('backend.master.master')
@section('title','Thêm thành viên')
@section('user')
	class="active"
@endsection
@section('content')
    <!--main-->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm Thành viên</h1>
            </div>
        </div>
        <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form action="" method="POST">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">

                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                
								
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                    {!! showError($errors, 'email') !!}
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" class="form-control">
                                    {!! showError($errors, 'password') !!}
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="full" name="full" class="form-control">
                                    {!! showError($errors, 'full') !!}
                                    </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="address" name="address" class="form-control">
                                    {!! showError($errors, 'address') !!}
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="phone" name="phone" class="form-control">
                                    {!! showError($errors, 'phone') !!}
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="1">admin</option>
                                        <option selected value="2">user</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                           

                        </div>
                    
                        <div class="clearfix"></div>
                    </div>
                </div>
                </form>
        </div>
    </div>

        <!--/.row-->
    </div>

    @endsection