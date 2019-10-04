@extends('layouts.app')
@section('content')
    <section class="content-header m-5">
        <h1>
            EDIT EMPLOYEE DETAIL
            <small></small>                    
        </h1>
      
    </section>

 
   

    <section class="content m-5">
        <div class="box box-primary">
                @foreach($employees  as $d)
            <form role="form" action="{{ route('employees_update',$d->id) }}"  method="post">
                <div class="box-body"> 
                      
                       
                                
                    <div class="form-group">
                        <label for="name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{$d->first_name}}" >
                        @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control"  value="{{$d->last_name}}">
                            @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                        </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"  value="{{$d->email}}">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="number">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control"  maxlength="10" value="{{$d->phone}}" >
                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select company</label>
                            <select class="form-control" id="company" name="company"  value="{{$d->name}}">
                                @foreach($company  as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('company'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- <input type="hidden" name="del_flag" id="del_flag" class="form-control" value="{{$d->del_flag }}"  > --}}
                {{ csrf_field() }}
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('employees') }}" class="btn btn-danger">Cancel</a>
                    
                </div>
            </form>
            @endforeach  
        </div>
    </section>
@endsection
