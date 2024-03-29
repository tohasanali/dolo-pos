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
<div class="row" id="saleDetails">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block align-items-center mb-4">
                    <h4 class="card-title">Sale Details List</h4>
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
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Sale Date</th>
                        <th>Sale Amount</th>
                        <th>Commission</th>
                        <th>Unique Code</th>
         
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>S/L</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Sale Date</th>
                        <th>Sale Amount</th>
                        <th>Commission</th>
                        <th>Unique Code</th>
               
                    </tr>
                </tfoot>
                <tbody>
                    <tr v-for="(saleDetail, index) in saleDetails">
                        <td>@{{index+1}}</td>
                        <td>@{{saleDetail.inventory?saleDetail.inventory.product.name:''}}</td>
                        <td>@{{saleDetail.inventory?saleDetail.inventory.quantity:''}}</td>
                        <td>@{{saleDetail.sale?saleDetail.sale.sale_date:''}}</td>
                        <td>@{{saleDetail.sale?saleDetail.sale.amount:''}}</td>
                        <td>@{{saleDetail.sale?saleDetail.sale.commission:''}}</td>
                         <td>@{{saleDetail.inventory?saleDetail.inventory.unique_code:''}}</td>

         
                        <td> 
                            <!-- <button class="btn btn-info btn-icon-split"  data-toggle="modal" data-target="#saleDetail" @click="setData(index)">
                                <span class="icon text-white" >
                                    <i class="fas fa-eye"></i>
                                </span>
                            </button>    
                           <button class="btn btn-warning btn-icon-split"   data-toggle="modal" data-target="#createmodel"  @click="setData(index)">
                                <span class="icon text-white">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                            </button> -->                                 
                        </td>

                    </tr>
                </tbody>
            </table>
<!-- <nav aria-label="..." style="float: right">
<ul class="pagination pagination-sm">
<li class="page-item disabled">
<a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
</li>
<li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
<li class="page-item">
<a class="page-link" href="javascript:void(0)">Next</a>
</li>
</ul>
</nav> -->
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
            el: '#saleDetails',
            data: {
                errors: [],
                saleDetail: {
                    id: '',
                    sale_id: '',
                    inventory_id: '',
                    price: '',
                    warranty_duration: '',
                    warranty_type: '',
                    unique_code: '',
                    sales: {
                        id:'',
                        customer_id: '',
                        sale_date: '',
                        amount: '',
                    },
                    inventory: {
                        id:'',
                        product_id:'',
                        unique_code: '',
                    }

                },
                currentIndex: 0,
                saleDetails: [],                
                sales: [],                
                inventory: [],                
                successMessage:'',
                datatable: '',
            },
            mounted() {
                this.datatable = $(this.$refs.dataTableContent).DataTable();
                var _this = this;
                _this.getAllData();
            },
            watch: {
                sales(val) {
                    this.datatable.destroy();
                    this.$nextTick(() => {
                        this.datatable = $(this.$refs.dataTableContent).DataTable()
                    });
                }
            },
            methods: {
                getAllData() {
                    var _this = this;
                    axios.get('{{ route("salesDetails.all") }}')
                    .then(function (response) {
                        _this.saleDetails = response.data.saleDetails;
                    })
                },
                setData(index) {
                    var _this = this;
                    _this.errors = [];
                    _this.currentIndex = index;
                    _this.saleDetail = _this.saleDetails[index];
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