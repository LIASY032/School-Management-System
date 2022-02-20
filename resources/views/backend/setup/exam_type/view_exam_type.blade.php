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
                                <h3 class="box-title">Exam Type List</h3>
                                <a href="{{ route('exam.type.add') }}" style="float: right; "
                                    class="btn btn-round btn-success mb-5">Add Exam Type</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>

                                                <th>Name</th>

                                                <th width="25%">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $year)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $year->name }}</td>

                                                    <td>

                                                        <a href="{{ route('exam.type.edit', $year->id) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <a href="{{ route('exam.type.delete', $year->id) }}"
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
