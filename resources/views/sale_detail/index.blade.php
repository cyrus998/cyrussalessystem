@section('title', 'Transaction')

<x-app-layout>

    @push('css')
        <style>
            #dataTable tbody tr:last-child {
                display: none;
            }
        </style>
    @endpush

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Transaction</h3>

        <div class="row g-3">
            <div class="col-12 col-lg-8 col-xl-9">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <div class="row text-center text-sm-start">
                            <div class="col-sm-5 col-12 mb-3 mb-md-0">
                                <p class="text-primary m-0 fw-bold mt-2">Product List</p>
                            </div>
                            <div class="col-sm-7 col-12 mb-2 mb-md-0">
                                <div class="d-sm-flex justify-content-sm-end">
                                    <form class="productForm">
                                        @csrf
                                        <input type="hidden" name="saleId" id="saleId" value="{{ $sale_id }}">
                                        <input type="hidden" name="productId" id="productId">
                                        <input type="hidden" name="productCode" id="productCode">
                                        <a onclick="showProduct()" class="btn btn-primary btn-icon-split"><span
                                                class="icon text-white-50"><i class="fas fa-plus"></i></span>
                                            <span class="text">Add</span></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Code</th>
                                        <th>Name</th>
                                        <th width="20%">Price</th>
                                        <th width="15%">Amount</th>
                                        <th width="20%">Subtotal</th>
                                        <th width="10%"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 col-xl-3">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <div class="text-center text-sm-start">
                            <p class="text-primary m-0 fw-bold">Detail Transaction</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaction.save') }}" class="saleForm" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $sale_id }}">
                            <input type="hidden" name="total_items" id="total_items">
                            <input type="hidden" name="total_price" id="total_price">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputTotal" placeholder="Total" readonly>
                                <label for="inputTotal">Total</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="inputPay" placeholder="To Pay" readonly>
                                <label for="inputPay">To Pay</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="inputReceive" placeholder="Payment Received"
                                    name="received" value="0">
                                <label for="inputReceive">Payment Received</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="inputChange" placeholder="Change"
                                    name="change" readonly>
                                <label for="inputChange">Change</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50"><i class="fas fa-save"></i></span>
                                    <span class="text text-white">Save</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @includeIf('sale_detail.product')
    @includeIf('components.toast')
    @includeIf('components.modal')

    @push('scripts')
        <script>
            let productTable, table;

            productTable = $('#productDataTable').DataTable({
                columns: [{
                    searchable: false
                }, {
                    searchable: true,
                    orderable: true
                }, {
                    searchable: true,
                    orderable: true
                }, {
                    searchable: true,
                    orderable: true
                }, {
                    orderable: false,
                    searchable: false
                }]
            })

            table = $('#dataTable').DataTable({
                responsive: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('transaction.data', $sale_id) }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'code'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: 'quantity'
                    },
                    {
                        data: 'subtotal'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    },
                ],
                dom: 'Brt',
                bSort: false,
                paginate: false
            }).on('draw.dt', function() {
                loadForm($('#inputReceive').val());
                setTimeout(() => {
                    $('#inputReceive').trigger('input');
                }, 300);
            });

            $('#inputReceive').on('input', function() {
                if ($(this).val() == "") {
                    $(this).val(0).select();
                }

                loadForm($(this).val());
            }).focus(function() {
                $(this).select();
            });

            $(document).on('input', '.quantity', function() {
                let id = $(this).data('id');
                let quantity = parseInt($(this).val());

                if (quantity < 1) {
                    $(this).val(1);

                    $('#toast').addClass('text-bg-danger')
                        .removeClass('text-bg-success');
                    $('#toast').toast('show');
                    $('#toast .toast-body').text('Number cannot be less than 1!');
                    return;
                } else if (quantity > 10000) {
                    $(this).val(10000);

                    $('#toast').addClass('text-bg-danger')
                        .removeClass('text-bg-success');
                    $('#toast').toast('show');
                    $('#toast .toast-body').text('Number cannot be more than 10000!');
                    return;
                }

                $(this).on('change', function() {
                    $.post(`{{ url('/transaction') }}/${id}`, {
                        '_token': $('[name=csrf-token]').attr('content'),
                        '_method': 'put',
                        'quantity': quantity
                    }).done(response => {
                        table.ajax.reload(() => loadForm($('#inputReceive').val()));
                    }).fail(errors => {
                        $('#toast').addClass('text-bg-danger')
                            .removeClass('text-bg-success');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Cannot add quantity!');
                        return;
                    });
                });
            });

            function showProduct() {
                $('#productModal').modal('show');
            }

            function hideProduct() {
                $('#productModal').modal('hide');
            }

            function chooseProduct(id, code) {
                $('#productId').val(id);
                $('#productCode').val(code);
                hideProduct();
                addProduct();
            }

            function addProduct() {
                $.post('{{ route('transaction.store') }}', $('.productForm').serialize())
                    .done(response => {
                        table.ajax.reload(() => loadForm($('#inputReceive').val()));

                        $('#toast').addClass('text-bg-success')
                            .removeClass('text-bg-danger');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Successfully added product!');
                    })
                    .fail(errors => {
                        $('#toast').addClass('text-bg-danger')
                            .removeClass('text-bg-success');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Tidak dapat menambahkan produk!');
                        return;
                    });
            }

            function deleteData(url) {
                $('#confirmModal').modal('show');
                $('#confirmModal .modal-body').text('Are you sure you want to delete the selected product??');

                $('#confirmDelete').click(function() {
                    $.post(url, {
                            '_token': $('[name=csrf-token]').attr('content'),
                            '_method': 'delete'
                        })
                        .done((response) => {
                            $('#confirmModal').modal('hide');

                            table.ajax.reload(() => loadForm($('#inputReceive').val()));
                        })
                        .fail((errors) => {
                            $('#toast').addClass('text-bg-danger')
                                .removeClass('text-bg-success');
                            $('#toast').toast('show');
                            $('#toast .toast-body').text('Unable to delete data!');
                            return;
                        });
                })
            }

            function loadForm(received = 0) {
                $('#total_items').val($('.total_items').text());
                $('#total_price').val($('.total').text());

                $.get(`{{ url('/transaction/loadform') }}/${$('.total').text()}/${received}`)
                    .done(response => {
                        $('#inputTotal').val('Php ' + response.total);
                        $('#inputPay').val('Php ' + response.pay);
                        $('#inputChange').val('Php ' + response.change);
                    })
                    .fail(errors => {
                        $('#toast').addClass('text-bg-danger')
                            .removeClass('text-bg-success');
                        $('#toast').toast('show');
                        $('#toast .toast-body').text('Unable to display transaction details!');
                        return;
                    })
            }
        </script>
    @endpush
</x-app-layout>
