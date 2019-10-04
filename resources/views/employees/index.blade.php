@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
           Employees  
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        
@php  $data=$data['data'] @endphp
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <div class="box m-5 col-xs-12">
                    <div class="box-header">
                        <a href="{{ route('employees_create') }}" class="btn btn-success"  title="create">Create</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="employee-table" class="table table-striped table-bordered">
                            <thead>
                                <th>SN</th>
                                <th >First Name</th>
                                <th >Last Name</th>
                                <th >Email</th>
                                <th >Company</th>
                                <th >Phone</th>
                                <th>Action</th>
                                
                            </thead>
                            <tbody>
                           @foreach($data as $values)
                         
                           <tr><td>{{ $values->id }}</td>
                                <td>{{$values->first_name}}</td>
                                <td>{{$values->last_name }}</td>
                                <td>{{$values->email }}</td>
                                <td>{{$values->company }}</td>
                                <td>{{$values->phone }}</td>
                                @php  $values->delflag @endphp
                           <td> <a href="{{ route('employees_edit',$values->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('employees_delete',$values->id) }}" class="btn btn-danger">Delete</a></td>
                            
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
