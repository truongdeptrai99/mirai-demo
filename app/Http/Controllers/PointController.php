<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Point;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = collect($request->except('_token'));
        $user1 = collect();
        $user2 = collect();
        $user3 = collect();
        foreach ($datas as $key => $data) {
            $user1[$key] = $datas[$key][0];
            $user2[$key] = $datas[$key][1];
            $user3[$key] = $datas[$key][2];
        }
        $user1['total'] = $user1['language'] + $user1['awareness'] + $user1['healthy'] + $user1['logic'] + $user1['diligence'];
        $user2['total'] = $user2['language'] + $user2['awareness'] + $user2['healthy'] + $user2['logic'] + $user2['diligence'];
        $user3['total'] = $user3['language'] + $user3['awareness'] + $user3['healthy'] + $user3['logic'] + $user3['diligence'];
        return view('chart', compact('user1', 'user2', 'user3'));
    }

    public function export(Request $request)
    {
        $datas = $request->except('_token');
        foreach ($datas as $key => $data) {
            $user1[$key] = $datas[$key][0];
            $user2[$key] = $datas[$key][1];
            $user3[$key] = $datas[$key][2];
        }
        unset($user1['type']);
        unset($user2['type']);
        unset($user3['type']);

        return Excel::download(new UserExport($user1, $user2, $user3), 'users.' . $request->type);
    }
}
