@extends('layouts.dashboard')

@section('title', 'Blog | '.env('APP_NAME'))

@section('content')
<div class="row">
	<h3 class="my-16">Blog</h3>
	<div class="col">
		<div class="card card-body">
			<div class="col">
				<div class="row justify-content-between my-10 gap-10 px-0">
					<div class="row mx-md-0 col-auto mx-auto gap-10">
						@can('blog-store')
						<button class="btn btn-primary col col-sm-auto add-blog"><i class="ri-add-line remix-icon"></i><span>Tambah Blog</span></button>
						@endcan
					</div>
					<div class="mx-md-0 col-auto mx-auto">
						<div class="input-group align-items-center">
							<span class="input-group-text hp-bg-dark-100 border-end-0 pe-0 bg-white">
								<i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
							</span>
							<input class="form-control border-start-0 ps-8" id="search_blog" name="search_blog" type="text" value="" placeholder="Search Blog">
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table-hover table-borderless table align-middle">
						<thead id="thead_blog">
							<tr>
								<th>No</th>
								<th>Judul</th>
								<th>Kategori</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody id="tbody_blog">
						</tbody>
					</table>
				</div>
				<div class="text-center">
					<nav class="col-12 col-sm-auto text-center pagination_blog" aria-label="Page navigation example">
					</nav>
					<br>
					<p class="blog_entry"></p>
				</div>
			</div>
		</div>
	</div>
	@section('modal')
	<div class="modal fade" id="modalBlog" aria-labelledby="modalBlog" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
			<div class="modal-content">
				<form id="formBlog">
					<div class="modal-header">
						<h5 class="modal-title" id="modalBlogLabel">Tambah Blog</h5>
						<button class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" type="button" aria-label="Close">
							<i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
						</button>
					</div>
					<div class="modal-body body-blog">
						<input class="blog_id" id="blog_id" name="id" type="text" hidden>
						<div class="form-group mb-12">
							<label for="judul">Judul</label>
							<input class="form-control judul" id="judul" name="judul" type="text" placeholder="Judul" required>
						</div>

						<div class="form-group mb-12">
							<label for="blog_category_id">Kategori</label>
							<select class="form-control select2 blog_category_id" id="blog_category_id" name="blog_category_id">
								<option value="" disabled selected>Pilih Kategori</option>
								@foreach($kategori as $k)
								<option value="{{$k->id}}">{{$k->nama}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group mb-12">
							<label for="keyword">Keyword</label>
							<input class="form-control keyword" id="keyword" name="keyword" type="text" placeholder="Keyword" readonly required>
						</div>

						<div class="form-group mb-12">
							<label for="slug">Slug</label>
							<input class="form-control slug" id="slug" name="slug" type="text" placeholder="Keyword" readonly required>
						</div>			

						<div class="form-group mb-12">
							<label for="konten">Konten</label>
							<textarea name="konten" class="form-control konten" id="konten"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						@can('blog-store')
						<button class="btn btn-primary btn-save-blog" type="submit"><i class="icofont icofont-plus"></i> Tambah</button>
						@endcan
						@can('blog-update')
						<button class="btn btn-primary btn-edit-blog" type="submit"><i class="icofont icofont-pencil"></i> Edit</button>
						@endcan
						@can('blog-destroy')
						<button class="btn btn-danger btn-delete-blog" type="button" data-id="0"><i class="icofont icofont-trash"></i> Hapus</button>
						@endcan
					</div>
				</div>
			</form>
		</div>
	</div>
	@endsection
</div>
@endsection

@section('js')
<script src="{{asset('app-assets/js/pagination/pagination.js')}}"></script>
<script type="text/javascript">
	@canany(['blog-store', 'blog-update'])
	$('#formBlog').unbind('submit');
	@endcanany
	$(function() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		$('.blog_category_id').select2({
			theme: 'bootstrap4',
			dropdownParent: '#modalBlog'
		})
		$('#modalBlog').modal({backdrop: 'static', keyboard: false})  
		loadBlog(1)
	})

	function pageBlog(totalPages, visiblePages){
		$(".pagination_blog").twbsPagination({
			totalPages: totalPages,
			visiblePages: visiblePages,
			paginationClass: 'pagination justify-content-center mr-6',
			pageClass: 'blogPageLink',
			onPageClick: function (event, p) {
				loadBlog(p)
			}
		})
	}

	function loadBlog(page, search){
		search = $('#search_blog').val()
		$.ajax({
			type: "get",
			url: "{{ route('dashboard.blog.data') }}",
			data: {
				'search': search,
				'page': page
			},
			success: function(res) {
				var entry = `
				Menampilkan ${res.data.from} sampai ${res.data.to} dari ${res.data.total} entri
				`
				$('.blog_entry').text(entry)

				if(res.total > 50){
					pageBlog(res.last_page, 5)
				} else {
					pageBlog(res.last_page, res.last_page)
				}
				let data = ''
				if(res.data.data.length > 0){
					var urutan = (res.data.current_page - 1) * 10
					$.each(res.data.data, (k, v) => {
						action = `<button class="btn btn-sm btn-primary detail-blog" title="Detail" data-id="${v.id}"><i class="icofont icofont-gear"></i></button>`
						data += `<tr>
						<td scope="row">${urutan+(++k)}</td>
						<td>${v.judul}</td>
						<td>${v.blog_category.nama}</td>
						<td class="text-center">
						${action}
						</td>
						</tr>`
					})
					$('#tbody_blog').html(data)
				} else {
					data = `
					<tr>
					<td class="text-center" colspan="${$('#thead_blog th').length}">Data Kosong</td>
					</tr>
					`
					$('#tbody_blog').html(data)
					$('.blog_entry').empty()
				}
			},
			error: function(request, status, error) {
				let errorData = JSON.parse(request.responseText)
			}
		})
	}

	$('#search_blog').keyup(delay(function (e) {
		let search_blog = $(this).val()
		$(".pagination_blog").twbsPagination('destroy')
		loadBlog(1, search_blog)
	}, 250))

	$('.judul').on('input', function() {
		$('.keyword').val(convertKeyword($(this).val()))
		$('.slug').val(convertSlug($(this).val()))
	})

	$('.add-blog').on('click', function() {
		$('#modalBlogLabel').html('Tambah Blog')
		$('.btn-save-blog').show()
		$('.btn-edit-blog').hide()
		$('.btn-delete-blog').attr('data-id', 0)
		$('.btn-delete-blog').hide()
		$('.blog_id').val('')
		$('.judul').val('')
		$('.keyword').val('')
		$('.slug').val('')
		$('.deskripsi').val('')
		$('.blog_category_id').val('').trigger('change')
		tinymce.get('konten').setContent('')
		$('#modalBlog').modal('show')
	})

	$('body').on('click', '.detail-blog', function () {
		var id = $(this).data('id')
		$.get("{{ route('dashboard.blog.show', ':id') }}".replace(':id', id), function (data) {
			$('#modalBlogLabel').html('Atur Blog')
			$('.blog_id').val(data.data.id)
			$('.blog_category_id').val(data.data.blog_category_id).trigger('change')
			$('.judul').val(data.data.judul)
			$('.deskripsi').val(data.data.deskripsi)
			$('.keyword').val(data.data.keyword)
			$('.slug').val(data.data.slug)
			tinymce.get('konten').setContent(data.data.konten)
			$('.btn-save-blog').hide()
			$('.btn-delete-blog').attr('data-id', data.data.id)
			$('.btn-edit-blog').show()
			$('.btn-delete-blog').show()
			$('#modalBlog').modal('show')
		})
	})

	$('#formBlog').on('submit', function(e){
		e.preventDefault()
		$.ajax({
			data: {
				id: $('.blog_id').val(),
				judul: $('.judul').val(),
				blog_category_id: $('.blog_category_id').val(),
				slug: $('.slug').val(),
				keyword: $('.keyword').val(),
				deskripsi: $('.deskripsi').val(),
				konten: tinymce.get('konten').getContent(),
			},
			url: "{{ route('dashboard.blog.store') }}",
			type: "POST",
			dataType: 'json',
			success: function (data) {
				$(this).trigger("reset")
				$('#modalBlog').modal('hide')
				swal("Success...", data.message, "success")
				loadBlog(1)
			},
			error: function (data) {
				swal("Error...", data.message, "error")
			}
		})
	})

	$('.btn-delete-blog').on('click', function(){
		var id = $(this).data('id')
		$.ajax({
			type: "DELETE",
			url: "{{ route('dashboard.blog.destroy', ':id') }}".replace(':id', id),
			success: function (data) {
				$(this).trigger("reset")
				$('#modalBlog').modal('hide')
				swal("Success...", data.message, "success")
				loadBlog(1)
			},
			error: function (data) {
				swal("Error...", data.message, "error")
			}
		});
	})
</script>
<script>
	var editor_config = {
		path_absolute : "/dashboard/",
		selector: '.konten',
		relative_urls: false,
		min_height: 500,
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table directionality",
			"emoticons template paste textpattern autoresize"
			],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen",
		file_picker_callback : function(callback, value, meta) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

			var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
			if (meta.filetype == 'image') {
				cmsURL = cmsURL + "&type=Images";
			} else {
				cmsURL = cmsURL + "&type=Files";
			}

			tinyMCE.activeEditor.windowManager.openUrl({
				url : cmsURL,
				title : 'Pilih Gambar',
				width : x * 0.8,
				height : y * 0.8,
				resizable : "yes",
				close_previous : "no",
				onMessage: (api, message) => {
					callback(message.content);
				}
			});
		}
	};

	tinymce.init(editor_config);
</script>
@endsection