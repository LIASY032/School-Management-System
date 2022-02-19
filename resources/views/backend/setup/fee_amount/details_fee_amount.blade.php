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
                                <h3 class="box-title">Fee Amount Details</h3>
                                {{-- <a href="{{ route('fee.amount.add') }}" style="float: right; "
                                    class="btn btn-round btn-success mb-5">Add Fee Amount </a> --}}
                            </div> <!-- /.box-header -->
                            <div class="box-body">

                                <h4>

                                    <strong>


                                        Fee Category :
                                    </strong>

                                    {{ $allData[0]['fee_category']['name'] }}
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">SL</th>

                                                <th>Class Name</th>

                                                <th width="25%">Amount</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $detail)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>

                                                    <td>{{ $detail['student_class']['name'] }}</td>

                                                    <td>

                                                        {{ $detail->amount }}
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
