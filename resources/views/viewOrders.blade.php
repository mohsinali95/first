@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Products</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Manufacture</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($shop->product as $product)
                    <tr>
                        <td>{{++$sno}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->manufacture->name}}</td>
                        <td>{{$product->type}}</td>
                        <td class="price"><div>{{$product->price}}</div></td>
                        <td class="text-center"><input type="checkbox" class="form-check-input check" data-price={{$product->price}} data-id={{$product->id}}></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="font-weight-bold text-center">Total price </td>
                        <td><strong id="total" class="pl-0">0</strong></td>
                        <td></td>
                    </tr>
                    <tr id="show" style="display:none">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="font-weight-bold text-center">Discounted price </td>
                        <td><strong id="discount_price" class="pl-0">0</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-right">
                <button class="btn btn-primary" id="btn_order">Place Order</button>
                <a class="btn btn-primary" href="{{url('shops')}}" >Back</a>
            </div>

            <div class="mt-2 text-right">
                <label for="" class="font-weight-bold">Voucher Code </label>
                <input type="text" id="txt_voucher">
                <button id="btn_apply" class="btn btn-secondary" >Apply</button>
            </div>

            <table class="table mt-2">
                <thead>
                    <tr>
                        <th>Voucher Code</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="voucher_code" data-price=50>020202</td>
                        <td class="voucher_price">50</td>
                        <td>31-7-2018</td>
                        <td>31-8-2018</td>
                    </tr>
                    <tr>
                        <td class="voucher_code" data-price=100>110010</td>
                        <td class="voucher_price">100</td>
                        <td>31-7-2018</td>
                        <td>31-8-2018</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let products = [];
        let prices = [];
        $('.check').change(function(){
            let id = $(this).data('id');
            let price = $(this).data('price')
            if($(this).is(':checked')){
                products.push(id);
                prices.push(price)

            }else{
                remove(id);
                removeprice(price);
            }
            var total_price = prices.reduce((a,b) => a+b,0)
            $("#total").html(total_price);
        })

        $('#btn_order').click(function(){

            if($('.check').is(':checked')){
                var total_price = prices.reduce((a,b) => a+b,0)
                $.post('{{url("api/insertproduct")}}',
                {
                    products: products,
                    total_price: total_price
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
            }else{
                alert('Products not selected.')
            }


        })

        $('#btn_apply').click(function(){
            var voucher_price = [];
            var voucher_code = [];
            var total_price;
            var txt_voucher = $('#txt_voucher').val();

            $('.voucher_code').each(function(){
                voucher_price.push($(this).data("price"))
                voucher_code.push($(this).html())
            });

            for(var i=0; i<voucher_code.length; i++){
                if(txt_voucher.trim() == voucher_code[i]){
                    total_price = ($('#total').html())-voucher_price[i];
                    break;
                }
            }
            $('#discount_price').html(total_price)
            $('#show').show();

        })

        function remove(id){
            let index = products.indexOf(id);
            if(index != -1){
                products.splice(index,1)
            }
        }
        function removeprice(price){
            let index = prices.indexOf(price);
            if(index != -1){
                prices.splice(index,1)
            }
        }

    })
</script>
@endsection
