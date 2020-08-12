<?php

namespace App\Http\Controllers;

use App\ApplicationModel;
use App\Enums\UserAppKeysType;
use App\Exports\UserAppKeysExport;
use App\Imports\UserAppKeysImport;
use App\User;
use App\UserAppKeyModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class UserAppKeysController extends Controller
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
        $users = UserAppKeyModel::all();
        return view('userappkeys.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enum = UserAppKeysType::getKeys();
        $eloqapplications = ApplicationModel::all();

        return view('userappkeys.create',compact('eloqapplications','enum'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'email' => 'required',
            'type' => 'required',
            'app_id'=> 'required'
        ]);


        $form_data = array(
            'key' => $request->key,
            'email' => $request->email,
            'type' => $request->type,
            'app_id' => $request->app_id
        );

        UserAppKeyModel::create($form_data);

        return redirect('userappkeys')->with('success','Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $key
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($key)
    {
        $users = UserAppKeyModel::findOrFail($key);
        return view('userappkeys.list',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {
        $users = UserAppKeyModel::findOrFail($key);
        $eloqapplications = ApplicationModel::all();
        return view('userappkeys.edit',compact('users','eloqapplications'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        $request->validate([
            'key' => 'required',
            'email' => 'required',
            'type' => 'required',
            'app_id'=> 'required'
        ]);

        $form_data = array(
            'key' => $request->key,
            'email' => $request->email,
            'type' => $request->type,
            'app_id' => $request->app_id
        );

        UserAppKeyModel::find($key)->update($form_data);

        return redirect('userappkeys')->with('success', 'Data is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($key)
    {
        $users = UserAppKeyModel::findOrFail($key);
        $users->delete();
        return redirect('userappkeys')->with('success','Data is successfully deleted');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportUserAppKeys()
    {
        return Excel::download(new UserAppKeysExport(), 'userappkeys.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importUserAppKeys()
    {
        Excel::import(new UserAppKeysImport(),request()->file('file'));

        return back();
    }
}
