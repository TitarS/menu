<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Sort</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="col-sm-12">
    <main role="main">
        <h1>Admin Panel</h1>
        <hr>
        <div class="box">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-6">
                        <div style="padding-left:30px">
                            <span style="width:100%" id="save" class="btn btn-success">Сохранить</span>
                        </div>
                        <br>
                        <div id="sortableResult"></div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</div>
<script src="/js/jquery/external/jquery/jquery.js"></script>
<script src="/js/jquery/jquery-ui.js"></script>

<script src="/js/nested.js"></script>
<script>
    (function(){
        $.post('<?= route('categorySortAjax'); ?>', {_token: '<?= csrf_token() ?>'}, function(data){
            $('#sortableResult').html(data);
        });


        $('#save').on('click', function(){
            sortable = $('.sortable').nestedSortable('toArray');

            $('#sortableResult').slideUp(function(){
                $.post('{{ route('categorySortAjax') }}', { sortable: sortable, _token: '<?= csrf_token() ?>'}, function(data){
                    $('.sortableResult').html(data);
                    $('#sortableResult').slideDown();
                });
            });

        });
    })();
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
