<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font awesome font -->
    <link rel="stylesheet" href="{!! asset('/css/fontawesome/css/all.min.css')!!}">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">   
</head>
<body>
    @include('layout.nav')
    
    <div class="container">
        <div class="col-md-12 "><br><br><br>
            @yield('content')
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.14/moment-timezone.min.js"></script>
    <script src="{!! asset('js/sale.js') !!}"></script>
    <!-- data table -->
    <script src="{!!asset('/js/DataTables-1.10.20 JS/jquery.dataTables.min.js')!!}"></script>
    <script>
        $(document).ready( function () {
            $('#data_table').DataTable();
        } );
    </script>    

    <script>        
    var arr_selected='';
        $(document).ready(function() {
            $('tbody').on('change','.productlist',function() {
                var query=$(this).children("option:selected").val(); 
               arr_selected=query;               
               
                var tr=$(this).parent().parent();                     
                if (query != "") { 
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{route('get.product.price')}}",
                        method: "POST",
                        dataType:"json",
                        data: { query: query,selected: query, _token: _token },                
                        beforeSend: function() {                               
                            $('.loading').show();
                            $('.total').hide();
                        },
                        success: function(data) {                            
                            
                            setTimeout(function() {                                
                                tr.find('.price').val(data[0]);
                                tr.find('.amount').val(data[0]);
                                tr.find('.balance').val(data[1]);
                                totalAmount();
                                $('.total').show();
                                $('.loading').hide();
                            }, 500);  
                        }                        
                    })                
                }
            });
        });
    </script>

<script>
        $(document).ready(function(){            
            $("thead").on("click",".addrow",function() {
                addrow(); ///create.blade.php                               
            });
        });
    </script>
</body>
</html>