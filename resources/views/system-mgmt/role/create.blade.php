@extends('system-mgmt.role.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new role</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('role.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role Name</label>

                            <div class="col-md-6">
                                <select id="name" class="form-control" name="name" required autofocus>
                                    <option value="MSA">Master Super Admin</option>
                                    <option value="AC">Account</option>
                                    <option value="Admin">Administrator</option>
                                    <option value="CM">Contract Manager</option>
                                    <option value="PD">Project Director</option>
                                    <option value="PM">Project Manager</option>
                                    <option value="PURC">Purchaser</option>
                                    <option value="QS">Quality Surveyor</option>
                                    <option value="SA">Super Admin</option>
                                    <option value="Site">Site</option>
                                    <option value="SSA">Super Super Admin</option>
                                    <option value="VIEW">Viewing</option>
                                </select>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
