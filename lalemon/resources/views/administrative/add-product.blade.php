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
					<button type="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-product"> Add New Product <i class="icon-circle-right2 position-right"></i></button>
				</div>	

				<div class="table-container" style="background-color: white;padding: 25px;">
					<table id="table_id" class="display">
						<thead>
							<tr>
								<th style="text-align: center"> Name </th>
								<th style="text-align: center"> Price </th>
								<th style="text-align: center"> Description </th>
								<th style="text-align: center"> File path </th>
								<th style="text-align: center"> Action </th>
							</tr>
						</thead>
						<tbody>
							@if($product['status'])
								@foreach($product['data'] as $product)
								<tr>
									<td> {{ $product->name }} </td>
									<td> {{ $product->price }} </td>
									<td> {{ $product->description }} </td>
									<td> {{ $product->file_path }} </td>
									<td>
										<button class="btn btn-info btn-edit-product" data-id="{{$product->id}}">
											<i class="icon-pencil4"></i>
										</button>
										<button class="btn btn-danger btn-delete-product" data-id="{{$product->id}}">
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
	<div id="modal-product" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Add new product </h5>
				</div>

				<div class="modal-body">
					<form id="form-add-product" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-lg-2"> Name: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-add-name__product" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Price: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-add-price__product" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> Description: *</label>
							<div class="col-lg-10">
								<textarea rows="5" cols="5" class="form-control" name="txt-add-description__product" placeholder="Default textarea"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Recommended: *</label>
							<div class="col-lg-10">
								<input type="checkbox" name="cb-add-recommended_product"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10">
								<input type="file" class="file-styled" name="cb-add-file__product">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-add-new-product"> Add </button>
				</div>
			</div>
		</div>
	</div>
	<!-- /remote source -->

	<!-- Remote source -->
	<div id="modal-edit-product" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Edit product </h5>
				</div>

				<div class="modal-body">
					<form id="form-add-product" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-lg-2"> Name: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-edit-name__product" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Price: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-edit-price__product" placeholder="Enter your product name...">
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> Description: *</label>
							<div class="col-lg-10">
								<textarea rows="5" cols="5" class="form-control" name="txt-edit-description__product" placeholder="Default textarea"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-3"> Recommended: *</label>
							<div class="col-lg-10">
								<input type="checkbox" name="cb-edit-recommended_product"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10">
								<input type="file" class="file-styled" name="cb-edit-file__product">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-save-edit-product"> Add </button>
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

			$('.btn-edit-product').on('click', function()
			{
				let productID = $(this).data('id');

				let request = $.ajax({
					url: BASE_URL + '/administrative/get-product-detail',
					data: {
						product_id: productID
					},
					type: 'POST',
					dataType: 'JSON'
				});

				request.done((response) => {
					if(response.status)
					{
						$('input[name="txt-edit-name__product"]').val(response.data.name);
						$('textarea[name="txt-edit-description__product"]').val(response.data.description);
						$('input[name="txt-edit-price__product"]').val(response.data.price);
						if(response.data.recommended) $('input[name="cb-edit-recommended_product"]').attr('checked', 'checked');
						$('#modal-edit-product').modal('toggle');
						$('#btn-save-edit-product').removeAttr('data-id');
						$('#btn-save-edit-product').attr('data-id', productID);
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

			$('#btn-add-new-product').on('click', function(){
				let file = $('input[name="cb-add-file__product"]')[0].files[0];
				let data = new FormData();
				data.append('product_name', $('input[name="txt-add-name__product"]').val());
				data.append('product_price', $('input[name="txt-add-price__product"]').val());
				data.append('is_recommended', $('input[name="cb-add-recommended_product"]').is(':checked'));
				data.append('product_description', $('textarea[name="txt-add-description__product"]').val());
				data.append('file', file);

				let request = $.ajax({
					url        : BASE_URL + '/administrative/add-new-product',
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

			$('#btn-save-edit-product').on('click', function(){
				let file = $('input[name="cb-edit-file__product"]')[0].files[0];
				let data = new FormData();
				data.append('product_name', $('input[name="txt-edit-name__product"]').val());
				data.append('product_price', $('input[name="txt-edit-price__product"]').val());
				data.append('is_recommended', $('input[name="cb-edit-recommended_product"]').is(':checked'));
				data.append('product_description', $('textarea[name="txt-edit-description__product"]').val());
				data.append('file', file);
				data.append('product_id', $(this).attr('data-id'));

				let request = $.ajax({
					url        : BASE_URL + '/administrative/save-edit-product',
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

			$('.btn-delete-product').on('click', function(){
				let productID = $(this).data('id');
				swal({
					title: "Delete product?",
					text: "Submit to continue the proces",
					type: "info",
					showCancelButton: true,
					closeOnConfirm: false,
					confirmButtonColor: "#2196F3",
					showLoaderOnConfirm: true
				},
				function() {
					
					let request = $.ajax({
						url : BASE_URL + "/administrative/delete-current-product",
						data: {
							product_id: productID
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
