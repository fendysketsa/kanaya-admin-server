<body id="page-top">
    <div id="wrapper">
        <?php !empty($sidebar) ? $this->load->view($sidebar) : '';?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
                <?php !empty($top) ? $this->load->view($top) : '';?>
                <?php !empty($pages) ?
(!empty($pages['pages']) ?
    $this->load->view($pages['pages']) : $this->load->view($pages)) : '';?>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kanaya 2019</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>