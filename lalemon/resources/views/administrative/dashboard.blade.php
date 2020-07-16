<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"/>
</head>

<body class="navbar-bottom login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse bg-indigo">
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle lbl-a-href" data-toggle="dropdown">
						<span style="white-space: nowrap;
								width: 30px;
								overflow: hidden;
								text-overflow: ellipsis;
								/* border: 1px solid #000000; */
								display: inline-block;
								font-size: 12px;
								width: 100px;
								height: 100%;
								text-overflow: ellipsis;
								white-space: nowrap;"> 
							ADMINISTRATIVE
						</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ url('/logout') }}"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			@include('templates.sidebar-admin')

			<!-- Main content -->
			<div class="content-wrapper">
				<div class="chart-container" style="width: 98%;">
					<div class="chart" id="full-mentions-chart"></div>
				</div>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	@include('templates.js')
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script type="text/javascript">
		const BASE_URL = window.location.origin;

		const options = {
			fontName: 'Roboto',
			height: 600,
			curveType: 'function',
			fontSize: 12,
			chartArea: {
				left: '5%',
				width: '90%',
				height: 550
			},
			pointSize: 4,
			tooltip: {
				textStyle: {
					fontName: 'Roboto',
					fontSize: 13
				}
			},
			vAxis: {
				titleTextStyle: {
					fontSize: 13,
					italic: false
				},
				gridlines:{
					color: '#e5e5e5',
					count: 10
				},
				minValue: 0
			},
			legend: {
				position: 'top',
				alignment: 'center',
				textStyle: {
					fontSize: 12
				}
			}
		};

		const customerChart = () => {
			let request = $.post(BASE_URL + '/dashboard/get-customer-detail', 'json');

			request.done((responses) => {
				if(responses.status) {
					let graphData = new google.visualization.DataTable();
					graphData.addColumn('date', 'Day');
					graphData.addColumn('number', 'Total Order');

					$.each(responses.data, (idx, key) => {
						let {year, month, day} = {year: key.date.split('-')[0], month: key.date.split('-')[1] - 1, day: key.date.split('-')[2]}
						graphData.addRow([new Date(year, month, day), parseInt(key.total_order)])
					});

					var line_chart = new google.visualization.LineChart($('#full-mentions-chart')[0]);
					line_chart.draw(graphData, options);
				}
			});

			request.fail((xhr, textStatus, error) => {
				console.log(textStatus);
			});
		}

		$(document).ready( function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}); 

			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(customerChart);
			
		} );
	</script>
</body>
</html>
