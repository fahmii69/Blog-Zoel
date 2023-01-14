@extends('back.layout.master')
@section('sub-judul','Post')
@section('content')

    {{-- @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif --}}

<div class="card shadow mb-4">
	<x-create-button route="{{route('post.create')}}" title=Post />
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="post-dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Post Title</th>
						<th>User</th>
						<th>Category</th>
						<th>Tags</th>
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        var table = $('#post-dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('back.list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'post_title',
                    name: 'post_title',
                },
                {
                    data: 'user_id',
                    name: 'user_id',
                },
                {
                    data: 'category_id',
                    name: 'category.category_id',
                },
                {
                    data: 'tag_id',
                    name: 'tag_id',
                },
                {
                    data: 'post_image',
                    name: 'post_image',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ]
        });

        $(document).on('click','.btn-delete', function(){
            id = $(this).attr('data-id');

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });
            Swal.fire({
                // title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete this!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                    let url = '{{ route('post.destroy', ':id') }}';
                        url = url.replace(':id', id);

                    $.ajax({
                        url : url,
                        type : 'delete',
                        data : {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response){
                            if(response.status){
                                Toast.fire({
                                    // icon: 'success',
                                    title: response.message
                                });
                            }else{
                                Toast.fire({
                                    // icon: 'error',
                                    title: response.message
                                });
                            }

                            table.ajax.reload();
                        },
                        error: function(e){
                            Toast.fire({
                                // icon: 'error',
                                title: e.responseJSON.message
                            });
                        }
                    });
                }
            })
        })
    });

</script>
@endpush