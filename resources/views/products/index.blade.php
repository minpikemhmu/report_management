@extends('template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2>Product Management</h2>
            </div>
        </div>
        <div class="row">
            <div>
                <form action="{{ route('productImport') }}" method="POST" enctype="multipart/form-data" class="d-flex gap-0">
                    @csrf
                    <div class="form-group flex-grow-1">
                        <label for="file">Excel File</label>
                        <input type="file" name="file" id="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-4 flex-grow-1">Import</button>
                </form>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="mt-2 font-weight-bold float-left ut-title">Product Table</h6>
                        @if (session('successMsg') != null)
                            <div class="alert alert-success alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ SUCCESS!</strong>
                                {{ session('successMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('failedMsg') != null)
                            <div class="alert alert-danger alert-dismissible fade show myalert mt-2" role="alert">
                                <strong> ✅ Fail!</strong>
                                {{ session('failedMsg') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div><a href="{{ route('products.create') }}" type="button" class="btn"
                                style="background-color: #72F573">
                                <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new
                                    Product</span></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product BNR Code</th>
                                        <th>Product Brand</th>
                                        <th>Product Category</th>
                                        <th>Product Key Category</th>
                                        <th>Product Sub Category</th>
                                        <th>Product Size</th>
                                        <th>Product Price</th>
                                        <th>Editor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->brn_code }}</td>
                                            <td>{{ $product->productbrand->name ?? "N/A" }}</td>
                                            <td>{{ $product->productcategory->name?? "N/A" }}</td>
                                            <td>{{ $product->productKeyCategory->name ?? "N/A" }}</td>
                                            <td>{{ $product->productsubcategory->name?? "N/A" }}</td>
                                            <td>{{ $product->size ?? "N/A"}}</td>
                                            <td>{{ $product->price ?? "N/A" }}</td>
                                            <td>
                                                <div class="t-flex-center">
                                                    <a class="btn" href="{{ route('products.edit', $product) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ $('.myalert').hide(); showDiv2() },3000);
    })
</script>
@endsection