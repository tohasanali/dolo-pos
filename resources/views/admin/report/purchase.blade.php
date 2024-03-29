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

    
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 everyData">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3>Purchase Reports</h3>
          <button class="btn btn-info btn-lg pull-right actionBtn" style="margin-top:-49px;"><span class="fa fa-print fa-2x"></span></button>
          <button class="btn btn-info btn-lg pull-right pdf_btn" style="margin-top:-49px;"><span class="fa fa-download fa-2x"></span></button>
        </div>


        <div class="panel-body detailsDiv">
          <div class="text-center companyInfo">


            </div>

            <table class="table" id="purchase-report-table">
              <thead>
                <th>Date</th>
                <th>Chalan no</th>
                <th>Product Name</th>
                <th>Quantity</th>
              </thead>
              <tbody>
                @foreach($purchaseReportLists as $purchaseReportList)
                <tr>
                  <td>{{$purchaseReportList->invoice_date}}</td>
                  <td>{{$purchaseReportList->invoice_no}}</td>
                  <td colspan="2">

                  </td>                 
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="printArea"></div>
    </div>
  </div>


@endsection

@section('custom-js')
 <style media="screen">
  .companyInfo{
    display: none;
  }
  .actionBtn,.pdf_btn{
    margin-top: -56px;
  }
  </style>
  <script>
  $(document).ready(function(){
    $('#purchase-report-table').DataTable({
      "order": [[ 0, "desc" ]],
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ]
    });
    $('.pdf_btn').click(function(){
      $(".print").removeClass('hidden-xs');
      var data = $('#purchase-report-table').html();
      var pdfName = "Purchase Report";
      $.ajaxSetup(
        {
          headers:
          {'X-CSRF-Token': $('input[name="_token"]').val()}
        });
        //alert(data);
        $.ajax({
          url:'./expensepdf',
          type:'POST',
          data:{data: data, pdfName: pdfName},
          success:function()
          {   $(".print").addClass('hidden-xs');
          window.location.href="{{url('printpdf')}}";
        }
      });
    });

    $('.actionBtn').click(function(){

      $("#purchase-report-table_length").css('display','none');
      $("#purchase-report-table_filter").css('display','none');
      $("#purchase-report-table_info").css('display','none');
      $("#purchase-report-table_paginate").css('display','none');
      $(".companyInfo").css('display','block');
      $(".companyInfo").css('margin-bottom','35px');
      //if any hidden-xs is in the table
      $(".print").removeClass('hidden-xs');
      $(".printHide").addClass('hidden-xs');
      var action = $('.detailsDiv').html();
      $('.printArea').html(action);
      $(".everyData").css('display','none');
      $(".storeClose").css('display','none');
      $(".footer").css('display','none');
      $(".printArea").append('<style>body{margin: 10mm 15mm 10mm 15mm;} @page{size:auto; margin: 0mm}</style>');
      $(".printArea").css('display','block');

      window.print();

      $("#purchase-report-table_length").css('display','block');
      $("#purchase-report-table_filter").css('display','block');
      $("#purchase-report-table_info").css('display','block');
      $("#purchase-report-table_paginate").css('display','block');
      $(".everyData").css('display','block');
      $(".storeClose").css('display','block');
      $(".footer").css('display','block');
      $(".companyInfo").css('display','none');
      $(".print").addClass('hidden-xs');
      $(".printHide").removeClass('hidden-xs');
      $(".printArea").html('');
    });
  });
  </script>

@endsection

