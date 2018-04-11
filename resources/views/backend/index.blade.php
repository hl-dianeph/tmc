@extends('backend.layouts.master')



@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title pull-left">Количество каналов</h4>
				<small class="pull-right text-muted">{{ $today }}</small>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body clearfix">
				<div class="pull-left">
					<h3 class="text-color m-t-xs m-b-md fw-600 fz-lg">
						<i class="zmdi zmdi-layers"></i> 
						<span data-plugin="counterUp">{{ $stats['total'] }}</span>
					</h3>
					<div class="text-primary">
						<!-- <i class="fa fa-long-arrow-up m-r-xs"></i> -->
						<span>&nbsp;</span>
					</div>
				</div>
				<div class="pull-right">
					<!-- <div class="m-t-md" data-plugin="sparkline" data-options="[8,12,4,12,10,13,16], { type: 'bar', chartRangeMin:0, height: 45, barColor: '#188ae2', barWidth: 8, barSpacing: 5 }"><canvas width="86" height="45" style="display: inline-block; width: 86px; height: 45px; vertical-align: top;"></canvas></div> -->
				</div>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div><!-- END cloumn -->
	<div class="col-md-4">
		<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title pull-left">За сегодня</h4>
				<small class="pull-right text-muted">{{ $today }}</small>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body clearfix">
				<div class="pull-left">
					<h3 class="text-color m-t-xs m-b-md fw-600 fz-lg">
						<i class="zmdi zmdi-layers"></i> 
						<span data-plugin="counterUp">{{ $stats['today'] }}</span>
					</h3>
					<div class="text-danger">
						@if ($stats['todayDiff'] > 0)
							<i class="fa fa-long-arrow-up m-r-xs"></i>
						@else
							<i class="fa fa-long-arrow-down m-r-xs"></i>
						@endif
						<span>на {{ $stats['todayDiff'] }} чем вчера</span>
					</div>
				</div>
				<div class="pull-right">
					<!-- <div class="m-t-md" data-plugin="sparkline" data-options="[3,8,10,12,4,12,8], { type: 'bar', chartRangeMin:0, height: 45, barColor: '#188ae2', barWidth: 8, barSpacing: 5 }"><canvas width="86" height="45" style="display: inline-block; width: 86px; height: 45px; vertical-align: top;"></canvas></div> -->
				</div>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div><!-- END cloumn -->
	<div class="col-md-4">
		<div class="widget">
			<header class="widget-header">
				<h4 class="widget-title pull-left">За неделю</h4>
				<small class="pull-right text-muted">{{ $today }}</small>
			</header><!-- .widget-header -->
			<hr class="widget-separator">
			<div class="widget-body clearfix">
				<div class="pull-left">
					<h3 class="text-color m-t-xs m-b-md fw-600 fz-lg">
						<i class="zmdi zmdi-layers"></i> 
						<span data-plugin="counterUp">{{ $stats['weekAgo'] }}</span>
					</h3>
					<div class="text-primary">
						<!-- <i class="fa fa-long-arrow-up m-r-xs"></i> -->
						<span>&nbsp;</span>
					</div>
				</div>
				<div class="pull-right">
					<!-- <div class="m-t-md" data-plugin="sparkline" data-options="[8,6,3,11,10,9,7], { type: 'bar', chartRangeMin:0, height: 45, barColor: '#188ae2', barWidth: 8, barSpacing: 5 }"><canvas width="86" height="45" style="display: inline-block; width: 86px; height: 45px; vertical-align: top;"></canvas></div> -->
				</div>
			</div><!-- .widget-body -->
		</div><!-- .widget -->
	</div><!-- END cloumn -->
</div>

<div class="row">
	<div class="col-md-12">
		<div class="widget" style="height: 500px;">
			<!-- <header class="widget-header">
				<h4 class="widget-title">WIDGET TITLE</h4>
			</header> -->
			<!-- <hr class="widget-separator"> -->
			<div class="widget-body">
				
			</div>
		</div><!-- .widget -->
	</div><!-- END column -->
</div>
@endsection