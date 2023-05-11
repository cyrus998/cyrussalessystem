@section('title', 'Product')

<x-app-layout>

    @push('css')
        <style>
            .table-responsive::-webkit-scrollbar {
                display: none !important;
            }

            .table-responsive {
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
            }
        </style>
    @endpush

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Product</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <div class="row text-center text-sm-start">
                    <div class="col-sm-5 col-12 mb-3 mb-md-0">
                        <p class="text-primary m-0 fw-bold mt-2">Product List</p>
                    </div>
                    <div class="col-sm-7 col-12 mb-2 mb-md-0">
                        <div class="d-sm-flex justify-content-sm-end">
                            <a onclick="addForm('{{ route('product.store') }}')" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add</span>
                            </a>
                            <a onclick="deleteSelected('{{ route('product.delete-selected') }}')"
                                class="btn btn-danger btn-icon-split ms-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table" role="grid" aria-describedby="dataTable_info">
                    <form action="" method="POST" class="selectedForm">
                        @csrf
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="3%">
                                        <input type="checkbox" name="selectAll" id="selectAll">
                                    </th>
                                    <th width="5%">No.</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @includeIf('product.form')
    @includeIf('components.toast')
    @includeIf('components.modal')

    @push('scripts')
        <script>
            let table;

            $(function() {
                table = $('#dataTable').DataTable({
                    responsive: true,
                    autoWidth: false,
                    ajax: {
                        url: "{{ route('product.data') }}",
                    },
                    columns: [{
                            data: 'selectAll',
                            searchable: false,
                            orderable: false
                        },
                        {
                            data: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'code'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'category'
                        },
                        {
                            data: 'price'
                        }, {
                            data: 'action',
                            searchable: false,
                            orderable: false,
                        }
                    ],
                    order: [
                        [1, 'asc']
                    ]
                });

                $('#productModal').on('submit', function(e) {
                    if (!e.preventDefault()) {
                        $.post($('#productModal form').attr('action'), $('#productModal form').serialize())
                            .done((response) => {
                                $('#productModal').modal('hide');
                                table.ajax.reload();

                                $('#toast').addClass('text-bg-success')
                                    .removeClass('text-bg-danger');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Data saved successfully!');
                            })
                            .fail((error) => {
                                $('#toast').addClass('text-bg-danger')
                                    .removeClass('text-bg-success');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Unable to save data!');
                                return;
                            })
                    }
                });

                $('#selectAll').click(function() {
                    $('input[type=checkbox]').prop('checked', this.checked);
                });

            });

            function addForm(url) {
                $('#productModal').modal('show');
                $('#productModalLabel').text('Add Product');

                $('#productModal Form')[0].reset();
                $('#productModal Form').attr('action', url);
                $('#productModal [name=_method]').val('post');
                $('#productModal [name=productName]').focus();
            }

            function editForm(url) {
                $('#productModal').modal('show');
                $('#productModalLabel').text('Update Product');

                $('#productModal Form')[0].reset();
                $('#productModal Form').attr('action', url);
                $('#productModal [name=_method]').val('put');

                $.get(url)
                    .done((response) => {
                        $('#productModal [name=productName]').val(response.name);
                        $('#productModal [name=productCategoryId]').val(response.category_id);
                        $('#productModal [name=productPrice]').val(response.price);
                    })
                    .fail((error) => {
                        $('#toast').addClass('text-bg-danger')
                            .removeClass('text-bg-success');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Unable to save data!');
                        return;
                    });
            }

            function deleteData(url) {
                $('#confirmModal').modal('show');
                $('#confirmModal .modal-body').text('Are you sure you want to delete this data??');

                $('#confirmDelete').click(function() {
                    $.post(url, {
                            '_method': 'delete',
                            '_token': $('[name=csrf-token]').attr('content')
                        })
                        .done((response) => {
                            $('#confirmModal').modal('hide');
                            table.ajax.reload();

                            $('#toast').addClass('text-bg-success')
                                .removeClass('text-bg-danger');
                            $('#toast').toast('show');
                            $('#toast .toast-body').text('Data deleted successfully!');
                        })
                        .fail((error) => {
                            $('#toast').addClass('text-bg-danger')
                                .removeClass('text-bg-success');
                            $('#toast').toast('show');
                            $('#toast .toast-body').text('Unable to delete data!');
                            return;
                        })
                })
            }

            function deleteSelected(url) {
                if ($('input:checked').length >= 1) {
                    $('#confirmModal').modal('show');
                    $('#confirmModal .modal-body').text('Are you sure you want to delete the selected data??');

                    $('#confirmDelete').click(function() {
                        $.post(url, $('.selectedForm').serialize())
                            .done((response) => {
                                $('input:checked').prop('checked', false);
                                $('#confirmModal').modal('hide');
                                table.ajax.reload();

                                $('#toast').addClass('text-bg-success')
                                    .removeClass('text-bg-danger');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Data deleted successfully!');
                            })
                            .fail((errors) => {
                                $('#toast').addClass('text-bg-danger')
                                    .removeClass('text-bg-success');
                                $('#toast').toast('show');
                                $('#toast .toast-body').text('Unable to delete data!');
                                return;
                            })
                    });
                } else {
                    $('#toast').addClass('text-bg-danger')
                        .removeClass('text-bg-success');
                    $('#toast').toast('show');
                    $('#toast .toast-body').text('Choose the data to be deleted!');
                    return;
                }
            }
        </script>
    @endpush
</x-app-layout>
