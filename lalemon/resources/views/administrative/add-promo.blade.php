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
					<button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-promo"> Add new promo <i class="icon-circle-right2 position-right"></i></button>
				</div>	

				<div class="table-container" style="background-color: white;padding: 25px;">
					<table id="table_id" class="display">
						<thead>
							<tr>
								<th> Name </th>
								<th> End at </th>
								<th> File path </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
							@if($promos['status'])
								@foreach($promos['data'] as $promo)
								<tr>
									<th> {{$promo->name }} </th>
									<th> {{$promo->end_at }} </th>
									<th> {{$promo->file_path }}</th>
									<td>
										<button class="btn btn-info btn-edit-promo" data-id="{{$promo->id}}">
											<i class="icon-pencil4"></i>
										</button>
										<button class="btn btn-danger btn-delete-promo" data-id="{{$promo->id}}">
											<i class="icon-trash-alt"></i>
										</button>
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
	
	<!-- Remote source -->
	<div id="modal-promo" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Add new promo </h5>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<label class="control-label col-lg-2"> Name: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-add-name__promo" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> End at: *</label>
							<div class="col-md-10">
								<input class="form-control" type="date" name="cb-add-end-at__promo">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10">
								<input type="file" class="file-styled" name="cb-add-file__promo">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-submit-add-promo"> ADD PROMO </button>
				</div>
			</div>
		</div>
	</div>
	<!-- /remote source -->

	<!-- Remote source -->
	<div id="modal-edit-promo" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Edit promo </h5>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<label class="control-label col-lg-2"> Name: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-edit-name__promo" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> End at: *</label>
							<div class="col-md-10">
								<input class="form-control" type="date" name="cb-edit-end-at__promo">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10">
								<input type="file" class="file-styled" name="cb-edit-file__promo">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-save-edit-promo">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /remote source -->
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

			$('.btn-edit-promo').on('click', function(){

				console.log('hello');
				let promoID = $(this).data('id');

				let request = $.ajax({
					url: BASE_URL + '/administrative/get-detail-promo',
					data: {
						promo_id: promoID
					},
					type: 'POST',
					dataType: 'JSON'
				});

				request.done((response) => {
					if(response.status)
					{
						$('input[name="txt-edit-name__promo"]').val(response.data.name);
						$('input[name="cb-edit-end-at__promo"]').val(response.data.end_at.split(" ")[0]);

						$('#modal-edit-promo').modal('toggle');

						$('#btn-save-edit-promo').removeAttr('data-id');
						$('#btn-save-edit-promo').attr('data-id', promoID);
					}
				});

				request.fail((xhr, textStatus, error) => {
					console.log(textStatus);
					swal({
						title: "Oops...",
						text: "Something went wrong!",
						confirmButtonColor: "#EF5350",
						type: "error"
					});
				})
			});

			$('#btn-submit-add-promo').on('click', function(){
				let file = $('input[name="cb-add-file__promo"]')[0].files[0];
				let data = new FormData();
				data.append('promo_name', $('input[name="txt-add-name__promo"]').val());
				data.append('promo_end_at', $('input[name="cb-add-end-at__promo"]').val());
				data.append('file', file);

				let request = $.ajax({
					url        : BASE_URL + '/administrative/add-new-promo',
					data       : data,
					contentType: false,
					processData: false,
					type       : 'POST',
					dataType   : 'JSON'
				});

				request.done((response) => {

					if(response.status)
					{
						// Success alert
						swal({
							title: "Good job!",
							text: response.message,
							confirmButtonColor: "#66BB6A",
							type: "success"
						});

						location.reload();
					}
					else
					{
						// Error alert
						swal({
							title: "Oops...",
							text: response.message,
							confirmButtonColor: "#EF5350",
							type: "error"
						});
					}
				});

				request.fail((xhr, textStatus, error) => {
					console.log(textStatus);
					// Error alert
					swal({
						title: "Oops...",
						text: "Something went wrong!",
						confirmButtonColor: "#EF5350",
						type: "error"
					});
				});
			});

			$('#btn-save-edit-promo').on('click', function(){
				let file = $('input[name="cb-edit-file__promo"]')[0].files[0];
				let data = new FormData();
				data.append('promo_name', $('input[name="txt-edit-name__promo"]').val());
				data.append('promo_end_at', $('input[name="cb-edit-end-at__promo"]').val());
				data.append('file', file);
				data.append('promo_id', $(this).attr('data-id'));

				let request = $.ajax({
					url        : BASE_URL + '/administrative/save-edit-promo',
					data       : data,
					contentType: false,
					processData: false,
					type       : 'POST',
					dataType   : 'JSON'
				});

				request.done((response) => {

					if(response.status)
					{
						// Success alert
						swal({
							title: "Good job!",
							text: response.message,
							confirmButtonColor: "#66BB6A",
							type: "success"
						});

						location.reload();
					}
					else
					{
						// Error alert
						swal({
							title: "Oops...",
							text: response.message,
							confirmButtonColor: "#EF5350",
							type: "error"
						});
					}
				});

				request.fail((xhr, textStatus, error) => {
					console.log(textStatus);
					// Error alert
					swal({
						title: "Oops...",
						text: "Something went wrong!",
						confirmButtonColor: "#EF5350",
						type: "error"
					});
				});
			});

			$('.btn-delete-promo').on('click', function(){
				let promoID = $(this).data('id');
				swal({
					title: "Delete promo?",
					text: "Submit to continue the proces",
					type: "info",
					showCancelButton: true,
					closeOnConfirm: false,
					confirmButtonColor: "#2196F3",
					showLoaderOnConfirm: true
				},
				function() {
					
					let request = $.ajax({
						url : BASE_URL + "/administrative/delete-current-promo",
						data: {
							promo_id: promoID
						},
						type    : "POST",
						dataType: "JSON"
					});

					request.done((response) => {
						if(response.status)
						{
							setTimeout(function() {
								swal({
									title: "Good job!",
									text: response.message,
									confirmButtonColor: "#66BB6A",
									type: "success"
								});
								location.reload();
							}, 1000);
						}
						else
						{
							setTimeout(function() {
								swal({
									title: "Oops...",
									text: response.message,
									confirmButtonColor: "#EF5350",
									type: "error"
								});
							}, 1000);
						}
					});

					request.fail((xhr, textStatus, error) => {
						console.log(textStatus);
						// Error alert
						swal({
							title: "Oops...",
							text: "Something went wrong!",
							confirmButtonColor: "#EF5350",
							type: "error"
						});
					});
				});
			});
		} );
	</script>
</body>
</html>
