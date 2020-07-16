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
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
								<th> Category </th>
								<th> Title </th>
								<th> Sub title </th>
								<th> Description </th>
								<th> File path </th>
								<th> Aciton </th>
							</tr>
						</thead>
						<tbody>
							@if($articles['status'])
								@foreach($articles['data']['article'] as $article)
								<tr>
									<td> {{$article->category->name}} </td>
									<td> {{$article->title }} </td>
									<td> {{$article->subtitle }}</td>
									<td> {{$article->description }}</td>
									<td> {{$article->file_path }}</td>
									<td>
										<button class="btn btn-info btn-edit-article" data-id="{{$article->id}}">
											<i class="icon-pencil4"></i>
										</button>
										<button class="btn btn-danger btn-delete-article" data-id="{{$article->id}}">
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
	<div id="modal-artikel" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Add new artikel </h5>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<label class="control-label col-lg-2"> Category article: *</label>
							<div class="col-lg-10" style="margin-bottom: 20px;">
								<select name="cb-add-category__article" class="form-control">
									<option value="">==Choose category==</option>
									@if($categoryArticles['status'])
										@foreach($categoryArticles['data'] as $category)
										<option value="{{$category->id}}"> {{$category->name}} </option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Title: *</label>
							<div class="col-lg-10" style="margin-bottom: 20px;">
								<input type="text" class="form-control" name="txt-add-title__article" placeholder="Enter your artikle title...">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Sub-title: *</label>
							<div class="col-lg-10" style="margin-bottom: 20px;">
								<input type="text" class="form-control" name="txt-add-sub-title__article" placeholder="Enter your artikel sub-title...">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Description: *</label>
							<div class="col-lg-10" style="margin-bottom: 20px;">
								<div id="editor-container-create">
								</div>
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10" style="margin-bottom: 20px;">
								<input type="file" class="file-styled" name="cb-add-file__article">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-submit-add-article">Save </button>
				</div>
			</div>
		</div>
	</div>
	<!-- /remote source -->
	<!-- Remote source -->
	<div id="modal-edit-artikel" class="modal">
		<div class="modal-dialog modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title"> Add new artikel </h5>
				</div>

				<div class="modal-body">
					<form>
						<div class="form-group">
							<label class="control-label col-lg-2"> Category article: *</label>
							<div class="col-lg-10">
								<select name="cb-edit-category__article" class="form-control">
									<option value="">==Choose category==</option>
									@if($categoryArticles['status'])
										@foreach($categoryArticles['data'] as $category)
										<option value="{{$category->id}}"> {{$category->name}} </option>
										@endforeach
									@endif
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Title: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-edit-title__article" placeholder="Enter your artikle title...">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Sub-title: *</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="txt-edit-sub-title__article" placeholder="Enter your artikel sub-title...">
							</div>
						</div>
						<div class="form-group" >
							<label class="control-label col-lg-2"> Description: *</label>
							<div class="col-lg-10">
								<div id="editor-container-edit">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-2"> Image: * </label>
							<div class="col-lg-10">
								<input type="file" class="file-styled" name="cb-edit-file__article">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn-save-edit-article">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /remote source -->
	@include('templates.js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	{{-- Quill --}}
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<script type="text/javascript">
		const BASE_URL = window.location.origin;

		$(document).ready( function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}); 

			$('#table_id').DataTable();

			var quill = new Quill('#editor-container-create', {
				modules: {
					toolbar: [
						[{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
						[{ 'header': 1 }, { 'header': 2 }],     
						['bold', 'italic','underline', 'strike'],
						[ 'link',],
						// [ 'image', 'video', 'formula' ],
						[{ list: 'ordered' }, { list: 'bullet' }], 
						// [{ 'color': [] }, { 'background': [] }],          
						// [{ 'font': [] }],      
					]
				},
				placeholder: 'Compose an epic...',
				theme: 'snow'
			});

			var quill1 = new Quill('#editor-container-edit', {
				modules: {
					toolbar: [
						[{ align: '' }, { align: 'center' }, { align: 'right' }, { align: 'justify' }],
						[{ 'header': 1 }, { 'header': 2 }],     
						['bold', 'italic','underline', 'strike'],
						[ 'link',],
						// [ 'image', 'video', 'formula' ],
						[{ list: 'ordered' }, { list: 'bullet' }], 
						// [{ 'color': [] }, { 'background': [] }],          
						// [{ 'font': [] }],      
					]
				},
				placeholder: 'Compose an epic...',
				theme: 'snow'
			});

			$('button.btn-edit-article').on('click', function(){
				let articleID = $(this).data('id');

				let request = $.ajax({
					url: BASE_URL + '/administrative/get-detail-article',
					data: {
						article_id: articleID
					},
					type: 'POST',
					dataType: 'JSON'
				});

				request.done((response) => {
					console.log(response.data);
					if(response.status)
					{
						$('select[name="cb-edit-category__article"]').val(response.data.m_article_id);
						$('input[name="txt-edit-title__article"]').val(response.data.title);
						$('input[name="txt-edit-sub-title__article"]').val(response.data.subtitle);
						// $('textarea[name="txt-edit-description__article"]').val(response.data.description);
						//cb-edit-file__article
						quill1.root.innerHTML = response.data.description_html;
						$('#btn-save-edit-article').removeAttr('data-id');
						$('#btn-save-edit-article').attr('data-id', articleID);
						$('#modal-edit-artikel').modal('toggle');
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
			})

			$('#btn-submit-add-article').on('click', function(){
				let file = $('input[name="cb-add-file__article"]')[0].files[0];
				let data = new FormData();
				data.append('article_category', $('select[name="cb-add-category__article"]').val());
				data.append('article_title', $('input[name="txt-add-title__article"]').val());
				data.append('article_sub_title', $('input[name="txt-add-sub-title__article"]').val());
				data.append('article_description', quill.getText());
				data.append('article_description_html', quill.root.innerHTML);
				data.append('file', file);

				let request = $.ajax({
					url        : BASE_URL + '/administrative/add-new-article',
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

			$('#btn-save-edit-article').on('click', function(){
				let file = $('input[name="cb-edit-file__article"]')[0].files[0];
				let data = new FormData();
				data.append('article_category', $('select[name="cb-edit-category__article"]').val());
				data.append('article_title', $('input[name="txt-edit-title__article"]').val());
				data.append('article_sub_title', $('input[name="txt-edit-sub-title__article"]').val());
				data.append('article_description', quill1.getText());
				data.append('article_description_html', quill1.root.innerHTML);
				data.append('file', file);
				data.append('article_id', $(this).attr('data-id'));

				let request = $.ajax({
					url        : BASE_URL + '/administrative/edit-existing-article',
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

			$('button.btn-delete-article').on('click', function(){
				let articleID = $(this).data('id');
				swal({
					title: "Delete article?",
					text: "Submit to continue the proces",
					type: "info",
					showCancelButton: true,
					closeOnConfirm: false,
					confirmButtonColor: "#2196F3",
					showLoaderOnConfirm: true
				},
				function() {
					
					let request = $.ajax({
						url : BASE_URL + "/administrative/delete-current-article",
						data: {
							article_id: articleID
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
