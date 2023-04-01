<x-dashboard>
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Title</th>
                                    <th>URL Title(s)</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @if (count($countries) > 0)
                                    @foreach ($countries as $country)
                                        <tr>
                                            <td>{{ $counter++ }}</td>
                                            <td>{{ $country->title }}</td>
                                            <td>{{ $country->url_title }}</td>
                                            <td>{{ date('l, jS, F Y', strtotime($country->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                                <a href="{{ route('countries.destroy', $country->id) }}" class="btn btn-danger btn-xs">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</x-dashboard>
