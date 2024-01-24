<html>

    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('pos/main.css')}}">

        <head>

    <body>

        <div class='container-fluid mt-5'>
            <div class='row'>
                <div class='col-6'>
                   <div class='catigories'>
                        <div class='row'>
                            <div class='col-12'>
                                <div class="card">
                                    <div class="card-header">
                                        @lang('catigory')
                                        <i class="fa fa-tags "></i>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($catigory as $row)
                                            <button class='btn btn-primary m-2'>{{$row->name}}</button>
                                        @endforeach
                                    </div>
                                  </div>
                            </div>



                        </div>
                   </div>


                    <div class='products'>

                            <div class="card">
                                <div class="card-header">
                                  @lang('Products')
                                  <i class="fa fa-shopping-cart "></i>
                                </div>
                                <div class="card-body">
                                    <div class='row'>
                                    @foreach($product as  $row)
                                    <div class='product text-center col-3'>
                                        <p>{{$row->name}}</p>
                                        <p class='text-primary'>@lang('price') :  {{$row->last_price}} $</p>
                                        <p>@lang('store') :  {{$row->store}}</p>

                                    </div>
                                    @endforeach
                                </div>
                              </div>


                        </div>
                    </div>

                </div>
                <div class='col-6'>
                    <div class='order'>
                        <div class='total text-right'>
                            <table class="table">
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <tbody>
                                    <tr>
                                        <th>sub total</th>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <th>discount</th>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <th><h3>Total</h3></th>
                                        <td><h3>20</h3></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    <div class='searsh'>
                        <input type='text' id='searchInput' class='form-control m-2' name='search' placeholder="seach">
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th colspan="2">Item name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Amount</th>
                          </tr>
                        </thead>
                        <tbody class='orderList'>

                          <tr class='order'>
                            <th scope="row">
                                <button class='btn btn-danger'>-</button>
                            </th>
                            <td colspan="2" style="width: 40%;" class='orderName'>Mark</td>
                            <td style="width: 30%;">
                                <button class='btn btn-success' onclick="increment(1)">+</button>
                                <input style="width: 70px;" type="number" class='qtyinput' name='qty' id="qty1" value="1" min='1' />
                                <button class='btn btn-danger' onclick="decrement(1)">-</button>
                            </td>
                            <td class='order-unit'>test</td>
                            <td class='order-amount'>test</td>
                          </tr>

                          <tr>
                            <th scope="row">
                                <button class='btn btn-danger'>-</button>
                            </th>
                            <td colspan="2" style="width: 40%;">Mark</td>
                            <td style="width: 30%;">
                                <button class='btn btn-success' onclick="increment(2)">+</button>
                                <input style="width: 70px;" type="number"  class='qtyinput'  name='qty' id="qty2" value="1" min='1' />
                                <button class='btn btn-danger' onclick="decrement(2)">-</button>
                            </td>
                            <td>test</td>
                            <td>test</td>
                          </tr>

                        </tbody>
                      </table>



                    </div>
                </div>
            </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



        <script>

            $(document).ready(function() {
                        $("#searchInput").focus();
                    });

            $(document).on('click' , function(){
              $("#searchInput").focus();
            });
        $(document).keydown(function(event) {
        if (event.which === 13) { // 13 represents the Enter key
            // Perform your action here
            var orderId = $("#searchInput").val(); // The ID of the order
            var url = '/order/' + orderId; // Construct the URL based on the route pattern

            $.ajax({
            url: url,
            method: 'GET', // HTTP method (e.g., GET, POST, PUT, DELETE)
            dataType: 'json', // Expected data type ('json', 'xml', 'text', etc.)
            success: function(response) {

                var amount = response[0].last_price  ;

                // Handle the successful response from the server
                $('.orderList').append(`
                <tr class='order'>
                            <th scope="row">
                                <button class='btn btn-danger'>-</button>
                            </th>
                            <td colspan="2" style="width: 40%;" class='orderName'>${response[0].name}</td>
                            <td style="width: 30%;">
                                <button class='btn btn-success' onclick="increment(1)">+</button>
                                <input style="width: 70px;" type="number" class='qtyinput' name='qty' id="qty1" value="1" min='1' />
                                <button class='btn btn-danger' onclick="decrement(1)">-</button>
                            </td>
                            <td class='order-unit'>${response[0].last_price}</td>
                            <td class='order-amount'>${response[0].last_price}</td>
                          </tr>
                `);
            },
            error: function(xhr, status, error) {
                // Handle errors or failed HTTP requests
                console.log('Error:', error);
            }
            });

            // Add your code to do something when the Enter key is pressed

            $("#searchInput").val('') ;
        }
        });




            function increment(id) {


                console.log(id)
              var input = document.getElementById('qty'+id);
              input.value = parseInt(input.value) + 1;
            }

            function decrement(id) {

              var input = document.getElementById('qty'+id);
              if(input.value != 1){
                input.value = parseInt(input.value) - 1;
              }

            }
          </script>
    </body>


</html>
