<x-dashboard :title="$title">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-10 offset-1">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action={{route('countries.store')}}>
                        @csrf
                        <div class="card-body">
                            @include('Partials._errors')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}"
                                    placeholder="Enter country name" required="required" autofocus="autofocus">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</x-dashboard>
