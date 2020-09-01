<!DOCTYPE html>
<html lang="en">

<head>
    <?php !empty($meta) ? $this->load->view($meta['meta']) : '';?>
</head>

<body>
    <?php !empty($content) ? $this->load->view($content) : '';?>
    <?php !empty($modal) ? $this->load->view($modal) : '';?>
</body>

<?php !empty($footer) ? $this->load->view($footer['footer']) : '';?>

</html>