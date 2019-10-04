@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Companies       
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
           

        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <div class="box m-5 col-xs-12">
                    <div class="box-header">
                        <a href="{{ route('companies_create') }}" class="btn btn-success"  title="create">Create</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="role-datatable" class="table table-striped table-bordered">
                            <thead>
                                <th>SN</th>
                                <th >Name</th>
                                <th >Email</th>
                                <th >Logo</th>
                                <th >Website</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                       
                            @foreach($data as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }} </td>
                                    <td>{{ $company->email }} </td>
                                <td>
                                        <img src="{{ Storage::url('logos/'.$company->id.'.jpg')}}" alt="No logo added"/>
                                    
                                </td>
                                    <td>{{ $company->website }} </td>
                                    <td>
                                        <a href="{{ route('company_edit',$company) }}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                            <form action="{{ route('company_delete', $company->id)}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                                 </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <?php echo $data->links(); ?>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
   
@endsection
