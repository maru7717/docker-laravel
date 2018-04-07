<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;

class MemosController extends Controller
{
    //
    public function index()
    {
      $memos = Memo::tagFilter(request('tag'))
        ->searchFilter(request('word'))
        ->get();
      return view('memos.index', compact('memos'));
    }
}
