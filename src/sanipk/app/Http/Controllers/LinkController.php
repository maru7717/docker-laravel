<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#LinkRequest
use App\Http\Requests\LinkRequest;

class LinkController extends Controller
{
    //
    public function submit(LinkRequest $request) {
      $link = new \App\Link;
      $link->title = $request->title;
      $link->url = $request->url;
      $link->description = $request->description;
      $link->save();
      return redirect('/');
    }
}
