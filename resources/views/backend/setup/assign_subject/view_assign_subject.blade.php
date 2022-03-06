@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">


            <!-- Main content -->
            <section class="content">
                <div class="row">



                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Assign Subject List</h3>
                                <a href="{{ route('assign.subject.add') }}" style="float: right; "
                                    class="btn btn-round btn-success mb-5">Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>

                                                <th>Class Name</th>

                                                <th width="25%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $year)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $year->class_id }}</td>

                                                    <td>

                                                        <a href="{{ route('assign.subject.edit', $year->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('assign.subject.delete', $year->id) }}"
                                                            class="btn btn-danger delete">Delete</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
