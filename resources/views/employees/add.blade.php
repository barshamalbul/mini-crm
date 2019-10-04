@extends('layouts.app')
@section('content')
    <section class="content-header m-5">
        <h1>
            ADD EMPLOYEES 
            <small></small>                    
        </h1>
      
    </section>

 @php 
  $data=$data['data'];
@endphp

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
    <section class="content m-5">
        <div class="box box-primary">
            <form role="form" action="{{ route('employees_store') }}"  method="post">
                <div class="box-body">                
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" >
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                        
                    </div>
                    <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" >
                            @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                        </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" >
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="number">Phone</label>
                        <input type="text" name="phone" id="phone" maxlength="10" class="form-control" >
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select company</label>
                            <select class="form-control" id="company" name="company">
                                @foreach($data as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('company'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
                    </div>
                {{ csrf_field() }}
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('employees') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection
