<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SessionRequest;
use App\Session;
use App\Lord;
use App\Player;

class SessionController extends Controller
{

    //
    public function index()
    {
        $sessions = Session::orderBy('day', 'desc')->orderBy('start_time', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(20);
        return view('sessions.index', [
            'sessions' => $sessions
        ]);
    }

    public function create()
    {
        $lords = Lord::orderBy('display_order', 'asc')->pluck('name', 'id');
        $players = Player::orderBy('chocoa_real_name', 'asc')->pluck('chocoa_real_name', 'id');

        $data = [
            'hourList' => $this->__getHourList(),
            'timeList' => $this->__getTimeList(),
            'lords' => $lords->prepend('--', 0),
            'players' => $players->prepend('--', 0)
        ];
        return view('sessions.create', $data);
    }

    /**
     * 新しいセッションの保存
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function store(SessionRequest $request)
    {
        $Session = new Session();
        $Session->day = $request->day;
        $Session->start_time = $request->start_time;
        $Session->lord_id1 = $request->lord_id1;
        $Session->lord_id2 = $request->lord_id2;
        $Session->lord_id3 = $request->lord_id3;
        $Session->lord_id4 = $request->lord_id4;
        $Session->lord_id5 = $request->lord_id5;
        $Session->lord_id6 = $request->lord_id6;
        $Session->lord_id7 = $request->lord_id7;
        $Session->lord_id8 = $request->lord_id8;
        $Session->player_id1 = $request->player_id1;
        $Session->player_id2 = $request->player_id2;
        $Session->player_id3 = $request->player_id3;
        $Session->player_id4 = $request->player_id4;
        $Session->player_id5 = $request->player_id5;
        $Session->player_id6 = $request->player_id6;
        $Session->player_id7 = $request->player_id7;
        $Session->player_id8 = $request->player_id8;
        $Session->end_year = $request->end_year;
        $Session->result = $request->result;
        $Session->report = $request->report;
        $Session->save();

        return view('sessions.store');
    }

    public function edit(Request $request, $id)
    {
        $session = Session::find($id);
        $lords = Lord::orderBy('display_order', 'asc')->pluck('name', 'id');
        $players = Player::orderBy('chocoa_real_name', 'asc')->pluck('chocoa_real_name', 'id');

        $data = [
            'session' => $session,
            'hourList' => $this->__getHourList(),
            'timeList' => $this->__getTimeList(),
            'lords' => $lords->prepend('--', 0),
            'players' => $players->prepend('--', 0)
        ];
        return view('sessions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        //dd($request->all());
        $session->update($request->all());

        return view('sessions.update');
    }

    public function show(Request $request)
    {
        $session = Session::find($request->id);
        return view('sessions.show', [
            'Session' => $session
        ]);
    }

    public function delete(Request $request)
    {
        Session::destroy($request->id);
        return view('sessions.delete');
    }

    private function __getHourList()
    {
        $result[''] = '--';
        for ($i = 0; $i < 24; $i ++) {
            $result[$i] = $i;
        }
        return $result;
    }

    private function __getTimeList()
    {
        $result[''] = '--';
        for ($i = 0; $i < 60; $i ++) {
            $result[] = $i;
        }
        return $result;
    }
}
