@extends('layouts.app')
@section('content')
    <section class="content-header m-5">
        <h1>
            ADD COMPANIES
            <small></small>                    
        </h1>
      
    </section>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="content m-5">
        <div class="box box-primary">
            <form role="form" action="{{ route('companies_store') }}"  method="post" enctype="multipart/form-data">
                <div class="box-body">                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" >
                         @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif 
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif 
                    </div>
                     <div class="form-group">
                        <label for="logo">Logo </label><br>
                        <label id="upload_logo_name" style="display:none"></label>
                        <input type="text" name="logo" id="logo" class="form-control" style="display:none" />
                        <div id="logo-status"></div>
                        <input type="file" id="upload_logo" name="upload_logo" style="display:block" width="300" height="300"/>
                        <a href="javascript:void(0)" id="change-logo" title="Delete" style="display:none"><img src="{{('/images/logo/cancel.png')}}" border="0" width="300" height="300"/></a>

                    </div>
    
                    <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" id="website" class="form-control" >
                            @if ($errors->has('website'))
                            <span class="help-block">
                                <strong>{{ $errors->first('website') }}</strong>
                            </span>
                        @endif 
                        </div>
                </div>
                {{ csrf_field() }}
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('companies') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
