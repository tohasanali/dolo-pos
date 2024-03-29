@extends('layouts.admin')

@section('custom-css')
    <link href="{{asset('/')}}template/assets/libs/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
@endsection

@section('page-title')
Home page
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
@endsection

@section('content')

<div class="row" id="inventory">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-4">
                    <h4 class="card-title">Inventory List</h4>
                    <div class="ml-auto">
                     
                    </div>
                </div>

                <div class="alert alert-success alert-dismissible fade show" role="alert" v-if="successMessage">
                    <strong>Successfull!</strong> @{{successMessage}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click.prevent="successMessage=''">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <table class="table table-bordered table-striped" data-mobile-responsive="true" width="100%" cellspacing="0" ref="dataTableContent">
                <thead>
                    <tr>
                         <th>S/L</th>
                        <th>Product name</th>
                        <th>Unique Code</th>
                        <th>Buying Price</th>   
                        <th>Selling Price</th>
                        <th>status</th>
                     {{--    <th>Supplier Name</th>
                        <th>Purchase Amount</th>
                        <th>Customer Name</th>
                        <th>Sale Amount</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                         <th>S/L</th>
                        <th>Product name</th>
                        <th>Unique Code</th> 
                        <th>Buying Price</th>   
                        <th>Selling Price</th>
                        <th>status</th>
                      {{--   <th>Supplier Name</th>
                        <th>Purchase Amount</th>
                        <th>Customer Name</th>
                        <th>Sale Amount</th> --}}
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="(inventory, index) in inventories">
                        <td>@{{index+1}}</td>
                        <td>@{{inventory.product?inventory.product.name:''}}</td>
                        <td>@{{inventory.unique_code}}</td>
                        <td>@{{inventory.buying_price}}</td>
                        <td>@{{inventory.selling_price}}</td>
                        <td>@{{inventory.status}}</td>

                      {{--   <td>@{{inventory.supplier?inventory.supplier.name:''}}</td>
                        <td>@{{inventory.purchase?inventory.purchase.amount:''}}</td>

                        <td>@{{inventory.customer?inventory.customer.name:''}}</td>

                        <td>@{{inventory.sale?inventory.sale.amount:''}}</td> --}}

                        <td> 
                            <button class="btn btn-info btn-icon-split"  data-toggle="modal" data-target="#supplyDetail" @click="setData(index)">
                                <span class="icon text-white" >
                                    <i class="fas fa-eye"></i>
                                </span>
                            </button>    
                                 
                        </td>

                    </tr>
                </tbody>
            </table>

            </div>
        </div>
    </div>




            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="employeeDetailLabel" aria-modal="true" id="supplyDetail">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="employeeDetailLabel">Inventory details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 col-xlg-12 col-md-12">
                                <div class="card mb-0">
                                    <div class="card-title">Product info</div>
                                    <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Product Name</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.product?inventory.product.name:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Product Category</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.product?inventory.product.category?inventory.product.category.name:'':''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Product Detail</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.product?inventory.product.detail:''}}</p>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xlg-12 col-md-12">
                                <div class="card mb-0">
                                    <div class="card-title">Inventory info</div>
                                    <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>Unique Code</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.unique_code}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Buying Price</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.buying_price}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Selling Price</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.selling_price}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>status</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.status}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xlg-12 col-md-12">
                                <div class="card mb-0">
                                    <div class="card-title">Purchase info</div>
                                    <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Supplier Name</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.supplier?inventory.supplier.name:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong> Contact </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.supplier?inventory.supplier.contact:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Address </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.supplier?inventory.supplier.address:''}}</p>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> <strong> Purchase Date</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.purchase?inventory.purchase.purchase_date:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong> Amount </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.purchase?inventory.purchase.amount:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Commission </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.purchase?inventory.purchase.commission:''}}</p>
                                            </div> 
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Payment </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.purchase?inventory.purchase.payment:''}}</p>
                                            </div>
                                             <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Due </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.purchase?inventory.purchase.due:''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-xlg-12 col-md-12">
                                <div class="card mb-0">
                                    <div class="card-title">Sale info</div>
                                        <div class="card-body">
                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Customer Name</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.customer?inventory.customer.name:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong> Contact </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.customer?inventory.customer.contact:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Address </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.customer?inventory.customer.address:''}}</p>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-3 col-xs-6 b-r"> <strong> Sale Date</strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.sale?inventory.sale.sale_date:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong> Amount </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.sale?inventory.sale.amount:''}}</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Commission </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.sale?inventory.sale.commission:''}}</p>
                                            </div> 
                                            <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Payment </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.sale?inventory.sale.payment:''}}</p>
                                            </div>
                                             <div class="col-md-3 col-xs-6 b-r"> 
                                                <strong>
                                            Due </strong>
                                                <br>
                                                <p class="text-muted">@{{inventory.sale?inventory.sale.due:''}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"  v-on:click="counter += 1" >Close</button>
                    </div>
                </div>
            </div>
        </div>
    


</div>



@endsection

@section('custom-js')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <!-- <script src="{{asset('/')}}/template/assets/libs/bootstrap-table/dist/bootstrap-table.min.js"></script> -->

    <script src="{{asset('/')}}/js/vue.js"></script>
    <script src="{{asset('/')}}/js/axios.min.js"></script>
    <script type="text/javascript">
        const app = new Vue({
            el: '#inventory',
            data: {
                errors: [],
                inventory: {
                    id: '',
                    name: '',
                    contact: '',
                    address: '',
                    product: {
                        id:'',
                        name: ''
                    },
                     supplier: {
                        id:'',
                        name: ''
                    },
                     purchase: {
                        id:'',
                        amount: ''
                    },
                     customer: {
                        id:'',
                        name: ''
                    },
                     sale: {
                        id:'',
                        sale_date:'',
                        amount: ''
                    }
                },
                currentIndex: 0,
                inventories:[],        
                successMessage:'',
                datatable: '',
            },
            mounted() {
                this.datatable = $(this.$refs.dataTableContent).DataTable();
                var _this = this;
                _this.getAllData();
            },
            watch: {
                inventories(val) {
                    this.datatable.destroy();
                    this.$nextTick(() => {
                        this.datatable = $(this.$refs.dataTableContent).DataTable()
                    });
                }
            },
            methods: {
                getAllData() {
                    var _this = this;
                    axios.get('{{ route("inventories.all") }}')
                    .then(function (response) {
                        _this.inventories = response.data.inventories;
                    })
                },
                setData(index) {
                    var _this = this;
                    _this.errors = [];
                    _this.currentIndex = index;
                    _this.inventory = _this.inventories[index];
                },




                wait(ms){
                    var start = new Date().getTime();
                    var end = start;
                    while(end < start + ms) {
                        end = new Date().getTime();
                    }
                },
            }
        });

    </script>
@endsection