<!-- Bootstrap PDF Viewer -->
<?php echo $this->Html->css('bootstrap-pdf-viewer') ?>
<div id="viewer" class="pdf-viewer" data-url="/knm/files/TLC_huong_dan_su_dung_he_thong_knm.pdf"></div>
<!-- Bootstrap PDF Viewer -->
<?php echo $this->Html->script('pdf') ?>
<?php echo $this->Html->script('bootstrap-pdf-viewer') ?>
<script>
    var viewer;

    $(function() {
        viewer = new PDFViewer($('#viewer'));
    });
</script>