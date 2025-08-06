<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = User::select(['id','name','email','created_at']);

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/users/'.$row->id.'/edit" class="btn btn-sm btn-primary">Edit</a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('users.index');
    }
}
