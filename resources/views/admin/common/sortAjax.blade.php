<?php
use App\Services\SortService;

echo SortService::getOl($items);


?>
<script src="/js/jquery/external/jquery/jquery.js"></script>
<script src="/js/jquery/jquery-ui.js"></script>

<script src="/js/nested.js"></script>

<script>
    $(document).ready(function(){
        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
            toleranceElement: '> div',
            excludeRoot: true,
        });
    })
</script>
<style>
    .sortable div{
        cursor: all-scroll;
        padding: 10px;
        background: #e2e2e2;
        color: #404040;
        margin-bottom: 8px;
    }
</style>
