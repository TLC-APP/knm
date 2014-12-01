<style>
    .spinner {
        display: inline-block;
        opacity: 0;
        max-width: 0;

        -webkit-transition: opacity 0.25s, max-width 0.45s; 
        -moz-transition: opacity 0.25s, max-width 0.45s;
        -o-transition: opacity 0.25s, max-width 0.45s;
        transition: opacity 0.25s, max-width 0.45s; /* Duration fixed since we animate additional hidden width */
    }

    .has-spinner.active {
        cursor:progress;
    }

    .has-spinner.active .spinner {
        opacity: 1;
        max-width: 50px; /* More than it will ever come, notice that this affects on animation duration */
    }
    #loading{
        display: none;
        text-align: center;
    }
</style>

<div id="loading">
<?php echo $this->Html->image('ajax-loader.gif');?>    
        Đang tải dữ liệu ...

</div>