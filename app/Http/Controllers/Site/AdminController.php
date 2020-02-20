<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * 站点管理员
 * Class AdminController
 * @package App\Http\Controllers\Site
 */
class AdminController extends Controller
{
  public function __construct()
  {
    $this->middleware('siteAuth');
  }

  public function index()
  {
  }

  public function store(Request $request)
  {
  }

  public function show(User $user)
  {
  }

  public function edit(User $user)
  {
  }

  public function update(Request $request, User $user)
  {
  }

  public function destroy(User $user)
  {
  }
}
