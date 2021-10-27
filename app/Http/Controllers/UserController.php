<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Arr;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $user = User::paginate(5);
        $cari = $request->get('keyword');
        if($cari)
        {
            $user = User::where('name', 'LIKE', "%$cari%")->paginate(3);
        }
        return view('user.index',compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:32',
            'username' => 'required|max:32',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails())
        {
            return redirect()->route('user.create')->withErrors($validator)->withInput();
        }
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->route('user.index')->with('success','Berhasil');
    }

    public function show($id)
    {
        // 
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $user->update($data);
        return redirect()->route('user.index')->with('success','Berhasil');

    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('user.index')->with('success','berhasil');
    }
}
