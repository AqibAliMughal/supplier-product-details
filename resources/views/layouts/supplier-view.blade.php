<!-- @extends("layouts.header") -->
<a href="{{ route('supplier.create') }}" class="btn btn-success view-btn my-2 mx-1">Create</a>
<hr/> 
            
    <div class="container mt-5">
        <h2>Supplier Details</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name of the Supplier</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach($suppliers as $supplier)
                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$supplier->name}}</td>
                    <td>
                        <button type="button" class="btn btn-primary view-btn" data-bs-toggle="modal"
                            data-bs-target="#productModal"  data-id="{{$supplier->id}}" >View</button>
                    </td>
                </tr>
                @endforeach
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub-total</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Display product details here -->
                            <tr>
                                <td>Product 1</td>
                                <td>$10</td>
                                <td>5</td>
                                <td>$50</td>
                                <td>$50</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@extends("layouts.footer")

 
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

        $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


            $(".view-btn").on("click", function(){
              var supplier = $(this).data("id");
               
            $.ajax({
                url: "product",
                method: "get",
                data: { id: supplier},
                success: function(response) {
                    console.log(response);
                },
            })
            })
        })
    </script>
