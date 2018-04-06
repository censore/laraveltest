<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>

<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/companies') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('test.companies_crud') }}</span></a></li>
<li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/employees') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('test.employees_crud') }}</span></a></li>