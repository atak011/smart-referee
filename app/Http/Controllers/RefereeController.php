<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use App\Match;
use App\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RefereeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.referee.index');
    }

    public function currentMatches()
    {
        $matches = DB::table('coming_matches')->orderBy('point','DESC')->get();
        return view('admin.referee.currentMatches',compact('matches'));


    }


    public function datatable(Request $request)
    {

        $data = Referee::query();
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                return Theme::generateActionsButton(['show' => 1]);
            })
            ->addColumn('class', function ($row) {
               if ($row->type == 1){
                   return 'UEFA';
               }else{
                   return  'Üst Klasman';
               }
            })
            ->addColumn('point', function ($row) {
                if ($row->type == 1){
                    return $row->average_score * 1.3;
                }else{
                    return $row->average_score * 1.2;
                }
            })
            ->make(true);

    }
}
