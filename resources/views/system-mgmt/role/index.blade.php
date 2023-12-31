@extends('system-mgmt.role.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">List of roles</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('role.create') }}">Add new role</a>
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
                <th >Role Name</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($roles as $key => $role)
                <tr role="row" class="odd">
                  <td style="width:1px;">{{ $key + 1 }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('role.destroy', ['id' => $role->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
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
            <tfoot>
              <tr>
                <th width="20%" rowspan="1" colspan="1">Role Name</th>
                <th rowspan="1" colspan="2">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($roles)}} of {{count($roles)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $roles->links() }}
          </div>
        </div>
      </div> -->
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
                        columns: [0] // Include only the first column in the export
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0] // Include only the first column in the export
                    }
                }
            ]
        });
    });
</script>
@endsection