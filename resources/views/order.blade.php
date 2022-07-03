<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Working with HTML Forms</title>
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{{--    <style>--}}



{{--        *::after,--}}
{{--        *:before{--}}
{{--            padding: 0;--}}
{{--            margin: 0;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        html{--}}
{{--            font:normal 20px/1.5 sans-serif;--}}
{{--            direction: rtl;--}}
{{--        }--}}
{{--        h1{--}}
{{--            margin: 1rem 2rem;--}}
{{--        }--}}
{{--        form{--}}
{{--            margin: 2rem;--}}
{{--            width: 800px;--}}
{{--        }--}}
{{--        .form-box{--}}
{{--            padding: 1rem;--}}
{{--            clear: both;--}}
{{--            width: 100%;--}}
{{--            position: relative;--}}
{{--            float: inside;--}}


{{--        }--}}
{{--        .form-box label{--}}
{{--            font-size: 1rem;--}}
{{--            float: left;--}}
{{--            width: 100px;--}}
{{--            margin-left: 700px;--}}
{{--        }--}}
{{--        .form-box input{--}}
{{--            /*font-size: 1rem;*/--}}
{{--            /*width: 300px;*/--}}
{{--            padding: 0.25rem 1rem;--}}
{{--        }--}}
{{--        .form-box select{--}}
{{--            font-size: 1rem;--}}
{{--            /*width: 300px;*/--}}
{{--            padding: 0.25rem 1rem;--}}
{{--        }--}}
{{--        .form-box option{--}}
{{--            font-size: 1rem;--}}
{{--            width: 300px;--}}
{{--            padding: 0.25rem 1rem;--}}
{{--        }--}}
{{--        .form-box input[type="checkbox"]{--}}
{{--            font-size: 1rem;--}}

{{--        }--}}
{{--        .form-box button{--}}
{{--            font-size: 1rem;--}}
{{--            border: none;--}}
{{--            padding: 0.25rem 2rem;--}}
{{--            margin-right: 70rem;--}}
{{--            color: white;--}}
{{--            background-color: cornflowerblue;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        .error::after{--}}
{{--            background-color: hsl(10, 60%, 50%);--}}
{{--            color: papayawhip;--}}
{{--            font-size: 1rem;--}}
{{--            line-height: 1.8;--}}
{{--            width: 350px;--}}
{{--            padding-left: 1rem;--}}
{{--            position:absolute;--}}
{{--            right: 0;--}}
{{--            content: attr(data-errormsg);--}}
{{--        }--}}
{{--        table, th, td {--}}
{{--            border:1px solid rgb(2, 2, 2);--}}
{{--        }--}}
{{--    </style>--}}
</head>
<body style="direction: rtl">
{{--<h1> A Web Page</h1>--}}
<br>
<div class="container">
    <form action="{{route('order.store')}}" method="post" >
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-box" data-errormsg="">
                    <label for="input-age" class="form-label">الصنف</label>
                    <select name = "item" id="input-age" tabindex="4" class="form-control">
                        <option value="سولار">سولار</option>
                        <option value="بنزين">بنزين</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <input name = "kind"type="radio" id="html" name="fav_language" value="لتر" class=" form-check-input">
                <label for="html" class="form-label">لترات</label><br>
                <input name = "kind" type="radio" id="css" name="fav_language" value="شيكل" class=" form-check-input" >
                <label for="css" class="form-label">مبلغ</label><br>
            </div>
            <div class="col"><div class="form-box" data-errormsg="">
                    <label for="input-password" class="form-label">الكمية</label>
                    <input name = "Quantity" type="text" id="input-password" tabindex="2" class="form-control" />
                </div></div>

            <div class="col">            <div class="form-box error" data-errormsg="">
                    <label for="input-first" class="form-label">السائق</label>
                    <select name = "driver_id" id="input-age" tabindex="4" class="form-control">
                        @foreach ($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </div></div>
            <div class="col"> <input type="hidden"  name = "states" value="false">
                <div class="form-box">
                    <button id="button-send" class="btn btn-success">اعتماد</button>
                </div></div>










    </form>

</div>
<hr style=" border: 10px solid black;
          border-radius: 5px;">

<h1>الطلبات السابقة</h1>

<table class="table">
    <thead>
    <tr>
        <th scope="col">رقم الطلب</th>
        <th scope="col">التاريخ</th>
        <th scope="col">الصنف</th>
        <th scope="col">الكمية</th>
        <th scope="col">السائق</th>
        <th scope="col">الحالة</th>
        <th scope="col">###</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
        <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->item }}</td>
            <td>{{ $order->Quantity}} {{$order->kind }}</td>
            <td>{{ $order->getdrive->name }}</td>
            <td>{{ $order->states }}</td>
            <td>

                @if ($order->states == 'True')

                @else
                    <a  onclick="myFunction({{$order->id}})" href="#"
                        role="button">Update</a>
                @endif

            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</div>


<script>
    function myFunction(id) {
        let isconfirmed = confirm("confirm Data");
        if(isconfirmed){
            window.location.href='/order/update/'+id;

        }else{
            alert("cancel")
        }
    }
</script>
</body>
</html>



