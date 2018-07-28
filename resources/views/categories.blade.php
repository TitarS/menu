<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
        padding-top: 50px;
    }
    .navbar-template {
        padding: 40px 15px;
    }
    @media (min-width: 767px) {
        .navbar-nav .dropdown-menu .caret {
            transform: rotate(-90deg);
        }
    }
</style>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Меню</a>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {!! $categories !!}
            </ul>

        </div>
    </div>
</div>
<main role="main">
    <div class="jumbotron">
        <div class="container">
            <a href="{{ route('category.index') }}" class="btn btn-group-lg btn-info">Admin</a>
            <h1 class="display-3">Hello</h1>

        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        $('.navbar a.dropdown-toggle').on('click', function(e) {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if(!$parent.parent().hasClass('nav')) {
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }

            $('.nav li.open').not($(this).parents("li")).removeClass("open");

            return false;
        });
    });
</script>