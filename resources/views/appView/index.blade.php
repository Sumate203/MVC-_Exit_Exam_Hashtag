<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account IO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Account IO</h2>
            </div>
                <div>
                    <a href="{{ route('appView.create') }}" class="btn btn-success">Create Hashtag</a>
                </div>
            <form action = "{{ route('ran') }}" method="POST" >
                @csrf//สำคัญมากอย่าลืมใส่เดีั้ยวเเตก
                <div class="col-md-12">
                    <button type="submit" class="mt-3 btn btn-primary">random message</button>
                </div>
            </form>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-3">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered mt-3">
                <tr>
                    <th width="20px">No.</th>
                    <th>message</th>
                </tr>
                @foreach($appView as $table)
                 <tr> {{-- ดึงข้อมูลจากดาต้าเบท --}}
                    <td>{{ $table->id}}</td>
                    <td>{{ $table->message}}</td>
                   
                 </tr>
                @endforeach
            </table>
            {!! $appView->links('pagination::bootstrap-5') !!}
        </div>
    </div>
   
</body>
</html>