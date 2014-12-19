<?php echo $this->Html->script('jqGrid/jquery.jqGrid.min'); ?>
<?php echo $this->Html->script('jqGrid/i18n/grid.locale-vi'); ?>
<?php //echo $this->Html->script('date-time/bootstrap-datepicker.min');   ?>
<table id="grid-table"></table>

<div id="grid-pager"></div>
<script type="text/javascript">

    jQuery(function ($) {
        var grid_selector = "#grid-table";
        var pager_selector = "#grid-pager";

        //resize to fit page size
        $(window).on('resize.jqGrid', function () {
            $(grid_selector).jqGrid('setGridWidth', $(".page-content").width());
        });
        //resize on sidebar collapse/expand
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(document).on('settings.ace.jqGrid', function (ev, event_name, collapsed) {
            if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
                //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
                setTimeout(function () {
                    $(grid_selector).jqGrid('setGridWidth', parent_column.width());
                }, 0);
            }
        })



        jQuery(grid_selector).jqGrid({
            //direction: "rtl",

            url: '<?php echo SUB_DIR . '/manager/certs/index' ?>',
            datatype: "json",
            colNames: [' ', 'MSSV', 'Tên', 'Số CN', 'Ngày cấp', 'Ngày yêu cầu', 'Đã in', 'Đã nhận'],
            //height: 250,
            colModel: [
                {name: 'myac', index: '', width: 80, fixed: true, sortable: false, resize: false, search: false,
                    formatter: 'actions', formatoptions: {
                        keys: true,
                        //delbutton: false,//disable delete button
                        delOptions: {recreateForm: true, beforeShowForm: beforeDeleteCallback},
                        //editformbutton:true, editOptions:{recreateForm: true, beforeShowForm:beforeEditCallback}
                    }
                },
                {name: 'username', index: 'username', searchoptions: {sopt: ['cn', 'nc', 'eq']}, width: '100', editrules: {required: true}},
                {name: 'name', index: 'name', width: '200'},
                {name: 'cert_no', index: 'cert_no', width: '100', editable: true},
                {name: 'cert_date', width: '100', index: 'cert_date', formatter: 'date', editrules: {required: false, date: true}, formatoptions: {srcformat: 'Y-m-d', newformat: 'd/m/Y'}, editable: true, editoptions: {dataInit: function (elem) {
                            $(elem).datepicker({format: "d/m/yyyy"});
                        }}},
                {name: 'created', width: '100', index: 'created'},
                {name: 'da_in', width: '100', index: 'da_in', editable: true},
                {name: 'recieved', width: '100', index: 'recieved', editable: true}
            ],
            viewrecords: true,
            rowNum: 10,
            rowList: [5, 10, 20, 30],
            pager: pager_selector,
            altRows: true,
            toppager: true,
            multiselect: true,
            //multikey: "ctrlKey",
            multiboxonly: true,
            loadComplete: function () {
                var table = this;
                setTimeout(function () {
                    //styleCheckbox(table);
                    //updateActionIcons(table);
                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },
            editurl: "<?php echo SUB_DIR . '/certs/jqgridcrud'; ?>",
            caption: "Quản lý chứng nhận"
        });
        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

        //enable search/filter toolbar
        //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
        //jQuery(grid_selector).filterToolbar({});


        //switch element when editing inline
        function aceSwitch(cellvalue, options, cell) {
            setTimeout(function () {
                $(cell).find('input[type=checkbox]')
                        .addClass('ace ace-switch ace-switch-5')
                        .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate(cellvalue, options, cell) {
            setTimeout(function () {
                $(cell).find('input[type=text]')
                        .datepicker({format: 'yyyy-mm-dd', autoclose: true});
            }, 0);
        }


        //navButtons
        jQuery(grid_selector).jqGrid('navGrid', pager_selector,
                {//navbar options
                    edit: false,
                    //editicon: 'ace-icon fa fa-pencil blue',
                    add: false,
                    addicon: 'ace-icon fa fa-plus-circle purple',
                    del: true,
                    delicon: 'ace-icon fa fa-trash-o red',
                    search: true,
                    searchicon: 'ace-icon fa fa-search orange',
                    refresh: true,
                    refreshicon: 'ace-icon fa fa-refresh green',
                    view: false,
                    viewicon: 'ace-icon fa fa-search-plus grey',
                },
                {
                    //edit record form
                    //closeAfterEdit: true,
                    width: 'auto',
                    recreateForm: true,
                    beforeShowForm: function (e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    }
                },
        {
            //new record form
            //width: 700,
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            beforeShowForm: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }
        },
        {
            //delete record form
            recreateForm: true,
            beforeShowForm: function (e) {
                var form = $(e[0]);
                if (form.data('styled'))
                    return false;

                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);

                form.data('styled', true);
            },
            onClick: function (e) {
                alert(1);
            }
        },
        {
            //search form
            recreateForm: true,
            afterShowSearch: function (e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function () {
                style_search_filters($(this));
            }
            ,
            multipleSearch: true,
            /**
             multipleGroup:true,
             showQuery: true
             */
        },
                {
                    //view record form
                    recreateForm: true,
                    //width:"auto",
                    beforeShowForm: function (e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    }
                }
        )



        function style_edit_form(form) {
            //enable datepicker on "sdate" field and switches for "stock" field
            form.find('input[name=sdate]').datepicker({format: 'yyyy-mm-dd', autoclose: true})
                    .end().find('input[name=stock]')
                    .addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
            //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
            //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

            //update buttons classes
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
            buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

            buttons = form.next().find('.navButton a');
            buttons.find('.ui-icon').hide();
            buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
            buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
        }

        function style_delete_form(form) {
            var buttons = form.next().find('.EditButton .fm-button');
            buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
            buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
            buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
        }

        function style_search_filters(form) {
            form.find('.delete-rule').val('X');
            form.find('.add-rule').addClass('btn btn-xs btn-primary');
            form.find('.add-group').addClass('btn btn-xs btn-success');
            form.find('.delete-group').addClass('btn btn-xs btn-danger');
        }
        function style_search_form(form) {
            var dialog = form.closest('.ui-jqdialog');
            var buttons = dialog.find('.EditTable')
            buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
            buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
            buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
        }

        function beforeDeleteCallback(e) {
            var form = $(e[0]);
            if (form.data('styled'))
                return false;

            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);

            form.data('styled', true);
        }

        function beforeEditCallback(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_edit_form(form);
        }

        //replace icons with FontAwesome icons like above
        function updatePagerIcons(table) {
            var replacement =
                    {
                        'ui-icon-seek-first': 'ace-icon fa fa-angle-double-left bigger-140',
                        'ui-icon-seek-prev': 'ace-icon fa fa-angle-left bigger-140',
                        'ui-icon-seek-next': 'ace-icon fa fa-angle-right bigger-140',
                        'ui-icon-seek-end': 'ace-icon fa fa-angle-double-right bigger-140'
                    };
            $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function () {
                var icon = $(this);
                var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

                if ($class in replacement)
                    icon.attr('class', 'ui-icon ' + replacement[$class]);
            })
        }

        function enableTooltips(table) {
            $('.navtable .ui-pg-button').tooltip({container: 'body'});
            $(table).find('.ui-pg-div').tooltip({container: 'body'});
        }

        //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

        $(document).on('ajaxloadstart', function (e) {
            $(grid_selector).jqGrid('GridUnload');
            $('.ui-jqdialog').remove();
        });
    });
</script>