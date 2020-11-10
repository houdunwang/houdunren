@extends('layouts.module.admin')
@section('content')
{{-- <div class="card border-left-warning h-100 p-3 mb-5">
  @if (user()['name'])
  <span class="mr-3">
    <i class="fas fa-user"></i> {{ user()['name'] }}
</span>
@endif
@if (user()['email'])
<span>
  <i class="fas fa-envelope"></i> {{ user()['email'] }}
</span>
@endif

@if (user()['mobile'])
<span>
  <i class="fas fa-phone-square"></i> {{ Str::substr(user()['mobile'], 0, 5).'******' }}
</span>
@endif
</div> --}}

<div class="row">
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              文章数
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-calendar fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              栏目数
            </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
              模型数
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
              </div>
              <div class="col">
                <div class="progress progress-sm mr-2">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                       aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
              Pending Requests</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--
<div class="row">
  <div class="col-12 col-sm-4">
    <div class="bg-white mt-3 shadow-sm ">
      <h6 class="pl-3 pt-3">最新文章</h6>
      <div class="p-3 border-top">
        aaa
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-4">
    <div class="bg-white mt-3 shadow-sm ">
      <h6 class="pl-3 pt-3">最新文章</h6>
      <div class="p-3 border-top">
        aaa
      </div>
    </div>
  </div>
</div> --}}

<div class="row">
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最新文章列表</h6>
      </div>
      <div class="card-body">
        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
          CSS bloat and poor page performance. Custom CSS classes are used to create
          custom components and custom utility classes.</p>
        <p class="mb-0">Before working with this theme, you should become familiar with the
          Bootstrap framework, especially the utility classes.</p>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6">
    <div class="card mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">最新文章列表</h6>
      </div>
      <div class="card-body">
        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
          CSS bloat and poor page performance. Custom CSS classes are used to create
          custom components and custom utility classes.</p>
        <p class="mb-0">Before working with this theme, you should become familiar with the
          Bootstrap framework, especially the utility classes.</p>
      </div>
    </div>
  </div>
</div>


@endsection

@push('styles')
<style>
  #app {
    background-color: transparent !important;
    box-shadow: none !important;
  }
</style>
@endpush
