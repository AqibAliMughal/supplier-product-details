@extends("layouts.header")
    <div class="container">

    <a href="{{ route('supplier.index') }}" class="btn btn-success view-btn my-2 mx-1">Back</a>
   <script>
    var quantity;
    var price;
    var subTotal;
     function  test(obj, param){
        
        
        // console.log($(obj).next())
        // var inputType = (param == 'quantity') ? 'quantity' : 'price';
        // console.log({inputType})
        // console.log($(obj).attr("id"))
        if(param == 'quantity') { quantity = $(obj).val(); }
        else if(param == 'price') { price = $(obj).val(); }
        
        if(quantity >= 1 && price >= 1  ){
            subTotal = quantity * price;
            $("#subtotal, #total").val(subTotal);
            // $("#total").val(subTotal);
        }else{
            $("#subtotal , #total").val("");
            // $("#total").val("");
        }

        
        

        }
   </script>
        <form action="{{route("supplier.store")}}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="supplier" class="form-label">Supplier:</label>
                    <input type="text" class="form-control" id="supplier" name="supplier" value="{{old("supplier")}}">
                    @if($errors->has('supplier'))
                        <div class="error danger">{{ $errors->first('supplier') }}</div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" >
                    @if($errors->has('date'))
                        <div class="error danger">{{ $errors->first('date') }}</div>
                    @endif
                </div>
            </div>
            
            <div class="row mb-3 clone" >
                <div class="col-md-4">
                    <label for="product" class="form-label">Product:</label>
                    <select class="form-control form-select" id="product" name="product" value="{{old("product")}}>
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                        @endforeach
                    </select>
                        @if($errors->has('product'))
                            <div class="error danger">{{ $errors->first('product') }}</div>
                        @endif
                </div>
                <div class="col-md-2">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" class="form-control quantity" onkeyup="test(this, 'quantity')" value="" id="quantity" name="quantity">
                    @if($errors->has('quantity'))
                        <div class="error danger">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control price" onkeyup="test(this,'price')"  id="price" name="price">
                    @if($errors->has('price'))
                        <div class="error danger">{{ $errors->first('price') }}</div>
                    @endif
                </div>
                <div class="col-md-2">
                    <label for="subtotal" class="form-label">Sub-total:</label>
                    <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
                   
                </div>
                <div class="col-md-2">
                    <label class="form-label">Actions:</label>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success me-1 addProduct" id="addProduct"   >+</button>
                        <button type="button" class="btn btn-danger d-none" id="removeProduct">-</button>
                    </div>
                </div>
            </div>
            
            <div class="product-section"></div>


            <div class="row mb-3">
                <div class="col-md-6 offset-md-6">
                    <label for="total" class="form-label">Total:</label>
                    <input type="text" class="form-control" id="total" name="total" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

@extends("layouts.footer")
        
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>

    $(document).ready(function(){

        // $(".price").on("keyup", function(){
        //     console.log($(this));
        //     // if($(".quantity").val() >=1 && $(".price").val() != 0 ){
        //     //     // $("#subtotal").attr("disabled");
         

        //     //     var subTotal = $("#quantity").val() * $("#price").val();
        //     //     $("#subtotal").val(subTotal);
        //     //     $("#total").val(subTotal);
        //     // }
        //     // else{
        //     //     // alert("Quantity/Price should be greater or equal to 1");
        //     // }
        // })

        $(".addProduct").on("click", function(){
            if($(".clone").length > 1){
                $("#removeProduct").removeClass("d-none");
            }
            
           $(".clone").clone().appendTo(".product-section");
        })

    })

    </script>