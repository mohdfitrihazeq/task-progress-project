@extends('system-mgmt.company.base')
@section('action-content')
    <!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
          <div class="col-sm-8">
            <h3 class="box-title">List of companies</h3>
          </div>
          <div class="col-sm-4">
            <a class="btn btn-primary" href="{{ route('company.create') }}">Add new company</a>
          </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead>
                <tr role="row">
                  <th >No.</th>
                  <th >Company Name</th>
                  <th >Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($companies as $key => $company)
                  <tr role="row" class="odd">
                    <td style="width: 5px;">{{ $key + 1 }}</td>
                    <td>{{ $company->name }}</td>
                    <td>
                      <form class="row" method="POST" action="{{ route('company.destroy', ['id' => $company->id]) }}" onsubmit = "return confirm('Are you sure?')">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                          Update
                          </a>
                          <button type="submit" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                            Delete
                          </button>
                      </form>
                    </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
</section>
    <!-- /.content -->
  </div>

<script>
    $(document).ready(function () {
        $('#example2').DataTable({
            dom: 'Bfrtip', // Add the export buttons to the DOM
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1] // Include only the first column in the export
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0,1] // Include only the first column in the export
                    }
                }
            ]
        });
    });
</script>

@endsection