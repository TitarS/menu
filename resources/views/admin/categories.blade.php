<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Sergios">
    <title>Admin Category</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="col-sm-12">
    <main role="main">
        <h1>Admin Panel</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('category.create') }}" type="button" class="btn btn-success btn-lg btn-block">Create new category</a>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('sort') }}" type="button" class="btn btn-secondary btn-lg btn-block">Sort category</a>
            </div>
        </div>
        <hr>
        <h3>Categories</h3>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Родительская категория</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{ $category->title }}</td>
                    {{--@if(count($category->parent))--}}
                    @if($category->parent)
                        <td>{{ $category->parent->title }}</td>
                    @else
                        <td>Нету</td>
                    @endif
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Изменить</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="post" style="display: inline">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </main>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>