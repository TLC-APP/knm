<div class="row bootbox">
            <!-- The login modal. Don't display it initially -->
            <?php
            echo $this->Form->create('Course', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),
                'class' => 'form-horizontal',
                'id' => 'addcourseform_element',
                'style' => "display: none;"
            ));
            ?>

            <?php
            echo $this->Form->input('chapter_id', array('label' => false));

            echo $this->Form->button('Lưu', array('class' => "btn btn-default", 'id' => 'addButton'));
            echo $this->Form->end();
            ?>



            <script>
                $(document).ready(function () {
                    $('#addcourseform')
                            .bootstrapValidator({
                                feedbackIcons: {
                                    valid: 'glyphicon glyphicon-ok',
                                    invalid: 'glyphicon glyphicon-remove',
                                    validating: 'glyphicon glyphicon-refresh'
                                }

                            });
                });

            </script>
        </div>