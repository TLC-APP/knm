<?php echo $this->Html->script('jqGrid/jquery.jqGrid.min'); ?>
<?php echo $this->Html->script('jqGrid/i18n/grid.locale-vi'); ?>
<?php echo $this->Html->script('bootbox'); ?>

<table id="grid-lop-co-the-mo"></table>

<div id="lop-co-the-mo-grid-pager"></div>
<script type="text/javascript">

    jQuery(function($) {
        var grid_selector = "#grid-lop-co-the-mo";
        var pager_selector = "#lop-co-the-mo-grid-pager";

        //resize to fit page size
        $(window).on('resize.jqGrid', function() {
            $(grid_selector).jqGrid('setGridWidth', $(".page-content").width());
        });
        //resize on sidebar collapse/expand
        var parent_column = $(grid_selector).closest('[class*="col-"]');
        $(document).on('settings.ace.jqGrid', function(ev, event_name, collapsed) {
            if (event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed') {
                //setTimeout is for webkit only to give time for DOM changes and then redraw!!!
                setTimeout(function() {
                    $(grid_selector).jqGrid('setGridWidth', parent_column.width());
                }, 0);
            }
        })



        jQuery(grid_selector).jqGrid({
            //direction: "rtl",
            rownumbers: true,
            url: '<?php echo SUB_DIR . '/manager/courses/lop_het_han/1' ?>',
            datatype: "json",
            colNames: [' ', 'Mã lớp', 'Kỹ năng', 'Ngày bắt đầu', 'Giảng viên', 'Đã đăng ký', 'Tình trạng'],
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
                {name: 'name', index: 'username', width: '100'},
                {name: 'chapter', index: 'chapter', width: '200'},
                {name: 'start', index: 'start', width: '100', formatter: 'date'},
                {name: 'teacher', width: '100', index: 'teacher'},
                {name: 'enrollno', width: '100', index: 'enrollno'},
                {name: 'trang_thai', width: '100', index: 'trang_thai'}
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
            loadComplete: function() {
                var table = this;
                setTimeout(function() {
                    //styleCheckbox(table);
                    //updateActionIcons(table);
                    updatePagerIcons(table);
                    enableTooltips(table);
                }, 0);
            },
            editurl: "<?php echo SUB_DIR . '/manager/courses/jqgridcrud'; ?>",
            caption: "Các lớp đủ điều kiện mở"
        });
        $(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

        //enable search/filter toolbar
        //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
        //jQuery(grid_selector).filterToolbar({});


        //switch element when editing inline
        function aceSwitch(cellvalue, options, cell) {
            setTimeout(function() {
                $(cell).find('input[type=checkbox]')
                        .addClass('ace ace-switch ace-switch-5')
                        .after('<span class="lbl"></span>');
            }, 0);
        }
        //enable datepicker
        function pickDate(cellvalue, options, cell) {
            setTimeout(function() {
                $(cell).find('input[type=text]')
                        .datepicker({format: 'yyyy-mm-dd', autoclose: true});
            }, 0);
        }


        //navButtons

        jQuery(grid_selector).jqGrid('navGrid', pager_selector,
                {//navbar options
                    add: false,
                    addicon: 'ace-icon fa fa-plus-circle purple',
                    del: true,
                    delicon: 'ace-icon fa fa-trash-o red',
                    search: true,
                    searchicon: 'ace-icon fa fa-search orange',
                    refresh: true,
                    refreshicon: 'ace-icon fa fa-refresh green',
                },
                {
                    width: 'auto',
                    recreateForm: true,
                    beforeShowForm: function(e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                        style_edit_form(form);
                    }
                },
        {
            closeAfterAdd: true,
            recreateForm: true,
            viewPagerButtons: false,
            beforeShowForm: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
                        .wrapInner('<div class="widget-header" />')
                style_edit_form(form);
            }
        },
        {
            //delete record form
            recreateForm: true,
            beforeShowForm: function(e) {
                var form = $(e[0]);
                if (form.data('styled'))
                    return false;

                form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                style_delete_form(form);

                form.data('styled', true);
            },
            onClick: function(e) {
                alert(1);
            }
        },
        {
            //search form
            recreateForm: true,
            afterShowSearch: function(e) {
                var form = $(e[0]);
                form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                style_search_form(form);
            },
            afterRedraw: function() {
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
                    beforeShowForm: function(e) {
                        var form = $(e[0]);
                        form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    }
                }
        ).navButtonAdd(pager_selector,
                {
                    caption: "",
                    title: "Mở lớp đã chọn",
                    buttonicon: "ace-icon fa fa-check-circle-o purple",
                    onClickButton: function() {
                        bootbox.confirm("Bạn chắc mở các lớp đã chọn ?", function(result) {
                            if (result) {
                                //lấy các dòng đã chọn
                                var rowKey = jQuery(grid_selector).jqGrid('getGridParam', 'selarrrow');
                                if (rowKey.length < 1) {
                                    alert('Vui lòng chọn lớp cần mở!');
                                } else {
                                    //Dùng ajax post du lieu len server xu ly
                                    $.post("/knm/manager/courses/mo_lop", {id: rowKey}, function(response) {
                                        //jQuery(grid_selector).jqGrid("reloadGrid");
                                        jQuery(grid_selector).trigger('reloadGrid', [{current: true}]);
                                    });
                                }
                            }
                        });

                    },
                    position: "first"
                }).navButtonAdd(pager_selector,
                /*Nut huy lop*/
                        {
                            caption: "",
                            title: "Hủy lớp đã chọn",
                            buttonicon: "ace-icon fa fa-times-circle purple",
                            onClickButton: function() {
                                bootbox.confirm("Bạn chắc mở các lớp đã chọn ?", function(result) {
                                    if (result) {
                                        //lấy các dòng đã chọn
                                        var rowKey = jQuery(grid_selector).jqGrid('getGridParam', 'selarrrow');
                                        if (rowKey.length < 1) {
                                            alert('Vui lòng chọn dòng cần hủy!');
                                        } else {
                                            //Dùng ajax post du lieu len server xu ly
                                            $.post("/knm/manager/courses/huy_lop", {id: rowKey}, function(response) {
                                                //jQuery(grid_selector).jqGrid("reloadGrid");
                                                jQuery(grid_selector).trigger('reloadGrid', [{current: true}]);
                                            });
                                        }

                                    }
                                });

                            },
                            position: "first"
                        }

                );
               

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
                    $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function() {
                        var icon = $(this);
                        var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

                        if ($class in replacement)
                            icon.attr('class', 'ui-icon ' + replacement[$class]);
                    });
                }

                function enableTooltips(table) {
                    $('.navtable .ui-pg-button').tooltip({container: 'body'});
                    $(table).find('.ui-pg-div').tooltip({container: 'body'});
                }

                //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

                $(document).on('ajaxloadstart', function(e) {
                    $(grid_selector).jqGrid('GridUnload');
                    $('.ui-jqdialog').remove();
                });
            });
</script>