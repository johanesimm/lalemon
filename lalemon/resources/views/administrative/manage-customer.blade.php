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

				<div class="form-group" style="width: 50%;">
					<button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-artikel"> Add new artikel <i class="icon-circle-right2 position-right"></i></button>
				</div>	

				<div class="table-container" style="background-color: white;padding: 25px;">
					<table id="table_id" class="display">
						<thead>
							<tr>
								<th> Tanggal pemesanan </th>
								<th> Nama </th>
								<th> Email </th>
								<th> Alamat </th>
								<th> Nomor Telepon </th>
								<th> Jenis pesanan </th>
								<th> Total </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
							@if($list_customer['status'])
								@foreach($list_customer['data'] as $customer)
								<tr>
									<td> {{$customer->order_date }} </td>
									<td> {{$customer->name }} </td>
									<td> {{$customer->email }} </td>
									<td> {{$customer->alamat }} </td>
									<td> {{$customer->phone_number }} </td>
									<td> {{$customer->order_detail }} </td>
									<td> IDR. {{ number_format($customer->total_price, 0,'','.') }},-  </td>
									<td> {{$customer->status_order }} </td>
									<td>
										<a href="https://api.whatsapp.com/send?phone={{$customer->phone_number}}" class="btn-send-message" data-id="{{$customer->order_id}}" target="_blank">
											Send Message
										</a>
									</td>
								</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	@include('templates.js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		const BASE_URL = window.location.origin;

		$(document).ready( function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}); 

			$('#table_id').DataTable();

			$('a.btn-send-message').on('click', function() {
				let order_id = $(this).data('id');

				let ajaxData = {
					order_id: order_id
				}

				let request = $.post(BASE_URL + '/manage-customer/update-order-status', ajaxData, 'json');

				request.done((responses) => {
					console.log(responses);
				});

				request.fail((xhr, textStatus, error) => {
					console.log(textStatus);
				});
			});
		});
	</script>
</body>
</html>
