@extends('system-mgmt.project.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update project</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('project.update', ['id' => $project->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Project Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $project->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!-- <div class="form-group{{ $errors->has('project_code') ? ' has-error' : '' }}">
                            <label for="project_code" class="col-md-4 control-label">project Code</label>

                            <div class="col-md-6">
                                <input id="project_code" type="text" class="form-control" name="project_code" value="{{ $project->project_code }}" required>

                                @if ($errors->has('project_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
