<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(5);

        return view('system-mgmt/project/index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/project/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         Project::create([
            'name' => $request['name']
            // 'project_code' => $request['project_code']
        ]);

        return redirect()->intended('system-management/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        // Redirect to project list if updating project wasn't existed
        if ($project === null) {
            return redirect()->intended('/system-management/project');
        }

        return view('system-mgmt/project/edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $input = [
            'name' => $request['name']
            // 'project_code' => $request['project_code']
        ];
        $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        Project::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id', $id)->delete();
         return redirect()->intended('system-management/project');
    }

    /**
     * Search project from database base on some specific constraints
     *
     * @param  \Illuminate\Http\Request  $request
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            // 'project_code' => $request['project_code']
            ];

       $projects = $this->doSearchingQuery($constraints);
       return view('system-mgmt/project/index', ['projects' => $projects, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Project::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:60|unique:project'
        // 'project_code' => 'required|max:3|unique:project'
    ]);
    }
}
