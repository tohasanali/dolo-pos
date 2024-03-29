<nav class="sidebar-nav">
    <ul id="sidebarnav">
        {{--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('employees') }}" aria-expanded="false"><i class="fas fa-user-plus"></i><span class="hide-menu">Employee</span></a></li>--}}
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Account Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('accounts')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Account</span></a></li>
                <li class="sidebar-item"><a href="{{route('ledgers')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Ledger</span></a></li>
                <li class="sidebar-item"><a href="{{route('expenses')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Expense</span></a></li>
                <li class="sidebar-item"><a href="{{route('balanceTransfers')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Balance Transfer</span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Sale Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('customers')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Customer</span></a></li>
                <li class="sidebar-item"><a href="{{route('sales')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Sale </span></a></li>
                {{--<li class="sidebar-item"><a href="{{route('salesDetails')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Sale Detail</span></a></li>--}}
                <li class="sidebar-item"><a href="{{route('saleTransaction')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Sale Transaction</span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Damage and Warranty Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('damages')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Damage</span></a></li>
                <li class="sidebar-item"><a href="{{route('warranties')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Warranty </span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Product Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('productCategories')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Product Category</span></a></li>
                <li class="sidebar-item"><a href="{{route('products')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Product</span></a></li>
                <li class="sidebar-item"><a href="{{route('inventories')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Inventory</span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Purchase Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('suppliers')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Supplier</span></a></li>
                <li class="sidebar-item"><a href="{{route('purchases')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Purchase </span></a></li>
                {{--<li class="sidebar-item"><a href="{{route('purchasesDetails')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Purchase Detail</span></a></li>--}}
                <li class="sidebar-item"><a href="{{route('purchaseTransaction')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Purchase Transaction</span></a></li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-compress"></i><span class="hide-menu">Report Module</span></a>
            <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item"><a href="{{route('report.overview')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> Summery</span></a></li>
                <li class="sidebar-item"><a href="{{route('checklists.index')}}" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> To do list</span></a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('report.redeem')}}" aria-expanded="false">
                <i class="mdi mdi-calendar-check"></i>
                <span class="hide-menu">Redeem Calendar </span>
                @if($redeems > 0)
                <span class="badge badge-danger text-white badge-pill ml-auto mr-3 font-medium px-2 py-1">{{$redeems}}</span>
                @endif
            </a>
        </li>
    </ul>
</nav>