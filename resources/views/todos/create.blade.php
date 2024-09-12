<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Create</title>
</head>
<body>
    <form action="" method="post">@csrf
        <small>Create a new Todo</small>
        @if(session()->has('error'))
        <p><span>x</span> {{session('error')}}</p>
        @endif
        @if(session()->has('success'))
        <p>{{session('success')}}</p>
        @endif
        <div>
            <label for="title">Title</label>
            <input type="text" title="title" placeholder="Enter title" id="title" value="{{old('title')}}">
            @error('title')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" placeholder="Some information about the Todo...">{{old(key: 'detail')}}</textarea>
            @error('detail')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="limit_date">Limit Date</label>
            <input type="date" name="limit_date" id="limit_date">
            @error('limit_date')
                <p><span>x</span> {{$message}}</p>
            @enderror
        </div><button>Submit</button>
    </form>
</body>
</html>