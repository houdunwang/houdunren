<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Subscribe;

class SubscribeController extends Controller
{
  public function index()
  {
    return Subscribe::get();
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    return view('edu::create');
  }

  /**
   * Store a newly created resource in storage.
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    return view('edu::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    return view('edu::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
