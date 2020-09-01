<script>
var base_url = "<?php echo base_url(); ?>";
</script>

<script src="<?php echo base_url('assets/dashboard/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>vendor/jquery.3.2.1.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>

<script src="<?php echo base_url('assets/dashboard/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>js/sb-admin-2.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.2.2/dist/latest/bootstrap-autocomplete.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="<?php echo base_url('assets/dashboard/'); ?>vendor/sweetalert/sweetalert.min.js">
</script>
<script src="<?php echo base_url('assets/dashboard/'); ?>js/init.js"></script>

<?php
if (!empty($footer['js'])) {
    foreach ($footer['js'] as $js) {
        ?>
<script id="rendered-js" src="<?php echo base_url($js); ?>"></script>
<?php }
}
?>

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>