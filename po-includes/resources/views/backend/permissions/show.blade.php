@extends('layouts.app')
@section('title', __('permission.show_title'))

@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-20">
		<div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-style1 mg-b-10">
					<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('general.dashboard') }}</a></li>
					<li class="breadcrumb-item"><a href="{{ url('/dashboard/users/table') }}">{{ __('general.user') }}</a></li>
					<li class="breadcrumb-item"><a href="{{ url('/dashboard/permissions/table') }}">{{ __('general.permissions') }}</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{ __('permission.show_title') }}</li>
				</ol>
			</nav>
			<h4 class="mg-b-0 tx-spacing--1">{{ __('permission.show_title') }}</h4>
		</div>
		
		<div><a href="{{ url('dashboard/permissions/table') }}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-t-10"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> {{ __('general.back') }}</a></div>
	</div>
	
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th style="width:180px;">{{ __('permission.name') }}</th><td>{{ $permission->name }}</td>
						</tr>
						<tr>
							<th>{{ __('permission.guard') }}</th><td>{{ $permission->guard_name }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
