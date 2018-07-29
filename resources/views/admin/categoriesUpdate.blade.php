<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Jumbotron Template for Bootstrap</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="jumbotron.css" rel="stylesheet">
</head>
<body>
<main role="main">
    <h1>Update category</h1>
    <div class="col-sm-12">
{{--        <form action="{{ route('category.update', $category->id) }}" method="post">
            <input type="hidden" name="_method" value="put" />--}}
        {{ Form::open([
        'route' => ['category.update', $category->id],
        'method' => 'put'
        ]) }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Имя</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $category->title }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect2">Родительская категория</label>
                {{--<select name="parent_id" multiple class="form-control" id="exampleFormControlSelect2">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>--}}
                {{ Form::select(
                'parent_id',
                ['' => ''] + $parents,
                $category->getParentId(),
                ['class' => 'form-control',
                'id' => 'exampleFormControlSelect2']
                ) }}
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('category.index') }}"  class="btn btn-danger">Back</a>
        </form>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
