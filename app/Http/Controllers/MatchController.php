<?php

namespace App\Http\Controllers;

use App\Helpers\Theme;
use App\Match;
use App\Models\User;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpClient\HttpClient;
use Yajra\DataTables\Facades\DataTables;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = $request->input('year');
        $league = $request->input('league');
        return view('admin.matches.index', compact('year', 'league'));
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


    public function scrap()
    {

        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', 'https://www.transfermarkt.com.tr/super-lig/gesamtspielplan/wettbewerb/TR2?saison_id=2020');
        $sen = $crawler->filter('.columns')->each(function ($node) {
            $text = $node->text();
            if (is_numeric(substr($text, 0, 1))) {
                return $node->filter('tr')->each(function ($node) {
                    $text = $node->text();
                    if (substr($text, 0, 5) != 'Tarih') {
                        return $node->filter('td')->each(function ($item) {
                            return $item->text();
                        });
                    }
                });
            }
        });

        $cleanArr = array_filter($sen);
        $i = 1;
        $result = [];
        $loop = 0;
        foreach ($cleanArr as $ln) {
            foreach ($ln as $res) {
                if ($res == null || count($res) == 1) {
                    continue;
                }
                $loop++;
                if ($res[0]) {
                    $date = $res[0];
                }
                $text1 = preg_replace('/\s+/u', '', $res[2], 1);
                $text2 = preg_replace('/\s+/u', '', $res[6], 1);
                try {
                    $date = explode(' ', $date)[1];
                } catch (\Exception $exception) {

                }


                $arr = [
                    'date' => $date,
                    'home' => explode(')', $text1)[1],
                    'away' => explode('(', $text2)[0],
                    'homeScore' => preg_replace('/\s+/u', '', explode(':', $res[4])[0]),
                    'awayScore' => preg_replace('/\s+/u', '', explode(':', $res[4])[1]),
                ];

                if ($arr['homeScore'] > $arr['awayScore']) {
                    $winner = $arr['home'];
                } elseif ($arr['homeScore'] < $arr['awayScore']) {
                    $winner = $arr['away'];
                } else {
                    $winner = 'due';
                }

                Match::create([
                    'home' => $arr['home'],
                    'away' => $arr['away'],
                    'home_score' => $arr['homeScore'],
                    'away_score' => $arr['awayScore'],
                    'league' => '2',
                    'is_cl' => false,
                    'is_ul' => false,
                    'year' => '2019',
                    'result_score' => $arr['homeScore'] . '-' . $arr['awayScore'],
                    'result' => $winner,
                    'created_at' => $date
                ]);
                $result[$i][] = $arr;
            }
            $i++;
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Match $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Match $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    public function match(){

        DB::table('matched_referee')->truncate();

       $matches = DB::table('coming_matches')->orderBy('point','DESC')->get();
       $referee = DB::table('referees')->orderBy('average_score','DESC')->get();


        foreach ($matches as $match) {

            DB::table('matched_referee')->insert([
                'match_id' => $match->id
            ]);
            $i = 1;
            foreach ($referee as $ref) {
                if(!$this->checkReferee($match->id,$i,$ref->name)){
                    $this->insertReferee($match->id,$i++,$ref->name);
                }else{
                    $nwsort = $i+1;
                    if ($nwsort == 4){
                        continue;
                    }
                    $this->insertReferee($match->id,$nwsort++,$ref->name);
                }

                if ($i == 4){
                    break;
                }
            }
        }
        return back();
    }

    private function insertReferee($match_id,$sort,$name){
        DB::table('matched_referee')->where('match_id',$match_id)->update([
            'possible_'.$sort => $name
        ]);
    }

    public function parameters(){
        return view('admin.parameters');
    }

    private function checkReferee($match_id,$sort,$name){
       return DB::table('matched_referee')->where([['possible_'.$sort,$name]])->exists();
    }

    public function datatable(Request $request)
    {

        $year = $request->input('year');
        $league = $request->input('league');
        $data = Match::where([['year',$year],['league',$league]]);
        return Datatables::of($data)
            ->addColumn('action', function ($row) {
                return Theme::generateActionsButton(['edit' => 1, 'show' => 1, 'delete' => 1]);
            })
            ->make(true);
    }

    public function point(Request $request)
    {

        $year = $request->input('year') ?: 2020;
        $league = $request->input('league') ?: 1;

        $league2 = Match::where([['year',$year],['league',$league]]);
        $teams = $league2->groupBy('home')->pluck('home');
        $data = [];
        foreach ($teams as $team){
            $year = $request->input('year') ?: 2020;
            $league = $request->input('league') ?: 1;
            if ($year = 2020){
                $win2 = Match::where([['year',2019],['league',2],['result',$team]])->where('result',$team)->count()*3;
            }else{
                $win2 = 0;
            }

            $win = Match::where([['year',$year],['league',$league],['result',$team]])->count()*3;
            $due = Match::where([['year',$year],['league',$league],['result',$team]])->where([['result','due'],['home',$team]])->orWhere([['result','due'],['away',$team]])->count();





            $res = [
              'team' => $team,
              'point' =>  $win+$due,
              'prev_point' => $win2,
              'cl_point' => 0,
              'ul_point' => 0,
            ];

            $data[] = $res;

        }
        return view('admin.matches.point', compact('year', 'league','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Match $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Match $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
