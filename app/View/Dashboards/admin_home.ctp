<style>
    #logs{
        max-height: 250px;
        min-height: 250px;
        overflow-y: auto;
    }
</style>
<div class="col-sm-6">

</div>
<div class="col-sm-6">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title lighter smaller">
                <i class="ace-icon fa fa-comment blue"></i>
                Logs
            </h4>
        </div>

        <div class="widget-body">
            <div class="widget-main no-padding">
                <div class="scrollable" id="logs">


                </div>


            </div><!-- /.widget-main -->
        </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
</div>
<script>
    $(function() {


        setInterval(function() {
            $.get("/knm/logs/getLogs/1", function(result) {
                $.each(result, function(i, item) {
                    var tag = '\
<div class="itemdiv dialogdiv">\n\
<div class="body">\n\
<div class="time">\n\
<i class="ace-icon fa fa-clock-o"></i>\n\
<span class="green">' + item.created + '</span>\n\
</div>\n\
<div class="text">' + item.description + '</div>\n\
</div>\n\
</div>';
                    $(tag).prependTo("#logs").fadeIn('slow');
                    //$("#logs").prepend().hide().show('slow');
                });

            }, 'json');
        }, 5000);
    });
</script>