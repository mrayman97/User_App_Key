<?php

namespace App\Http\Controllers;

use App\ApplicationModel;
use App\Exports\ApplicationsExport;
use App\Imports\ApplicationsImport;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = ApplicationModel::all();
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manager_api = Http::get('https://randomuser.me/api');
        $first_name = $manager_api->json()['results'][0]['name']['first'];
        $last_name= $manager_api->json()['results'][0]['name']['last'];
        $manager = $first_name . ' ' . $last_name;
    //        dd($manager);

        return view('create',compact('manager'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'app_id' => 'required',
            'name' => 'required',
            'logo' => 'image|max:1024',
        ]);

        /**
         * upload logo with the use of storage
         */
        $logo = $request->file('logo')->store('logos');

        $form_data = array(
            'app_id' => $request->app_id,
            'name' => $request->name,
            'logo' => $logo,
            'description' => $request->description,
            'manager' => $request->manager,
        );

        ApplicationModel::create($form_data);

        return redirect('applications')->with('success','Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $app_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($app_id)
    {
        $data = ApplicationModel::findOrFail($app_id);
        return view('list', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.blogs
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($app_id)
    {
        $data = ApplicationModel::findOrFail($app_id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $app_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $app_id)
    {
        $applications = ApplicationModel::find($app_id);

        $applications->app_id = $request->input('app_id');
        $applications->name = $request->input('name');
        $applications->description = $request->input('description');

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' . $extension;
            $file = $request->file('logo')->storeAs('logos',$filename);
            $applications->logo = $file;
        }

        $applications->save();
        return redirect('applications')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $app_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($app_id)
    {
        $data = ApplicationModel::findOrFail($app_id);
        $data->delete();
        return redirect('applications')->with('success','Data is successfully deleted');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportApplication()
    {
        return Excel::download(new ApplicationsExport(), 'applications.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importApplication()
    {
        Excel::import(new ApplicationsImport(),request()->file('file'));

        return back();
    }
}
