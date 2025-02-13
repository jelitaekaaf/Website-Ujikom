<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Laporan Keuangan</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Datatables css -->
        <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default"

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
            @include('layouts.backend.side')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            @include('layouts.backend.nav')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Data Tables</h4>
                            </div>

                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                    <li class="breadcrumb-item active">Laporan Keuangan</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row mb-3">  <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap gap-2"> <button class="btn btn-primary filter-button" data-filter="all">Semua</button>
                                        <button class="btn btn-secondary filter-button" data-filter="los-angeles">Los Angeles</button>
                                        <button class="btn btn-secondary filter-button" data-filter="chicago">Chicago</button>
                                        <button class="btn btn-secondary filter-button" data-filter="san-francisco">San Francisco</button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Laporan Keuangan -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Laporan Keuangan</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John Smith</td>
                                                    <td>Project Manager</td>
                                                    <td>Los Angeles</td>
                                                    <td>35</td>
                                                    <td>2023-08-10</td>
                                                    <td>$110,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Emily Davis</td>
                                                    <td>Marketing Specialist</td>
                                                    <td>Chicago</td>
                                                    <td>29</td>
                                                    <td>2022-12-05</td>
                                                    <td>$85,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Brown</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>31</td>
                                                    <td>2023-04-18</td>
                                                    <td>$120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Sarah Wilson</td>
                                                    <td>Financial Analyst</td>
                                                    <td>Houston</td>
                                                    <td>28</td>
                                                    <td>2023-10-30</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>David Miller</td>
                                                    <td>Product Manager</td>
                                                    <td>Seattle</td>
                                                    <td>33</td>
                                                    <td>2022-09-15</td>
                                                    <td>$125,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Jessica Thompson</td>
                                                    <td>HR Specialist</td>
                                                    <td>Miami</td>
                                                    <td>30</td>
                                                    <td>2023-01-25</td>
                                                    <td>$80,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Matthew Lee</td>
                                                    <td>Data Scientist</td>
                                                    <td>Denver</td>
                                                    <td>34</td>
                                                    <td>2022-11-08</td>
                                                    <td>$130,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Olivia Garcia</td>
                                                    <td>Graphic Designer</td>
                                                    <td>Atlanta</td>
                                                    <td>27</td>
                                                    <td>2023-07-20</td>
                                                    <td>$75,000</td>
                                                </tr>
                                                <tr>
                                                    <td>James Hernandez</td>
                                                    <td>Business Analyst</td>
                                                    <td>Phoenix</td>
                                                    <td>32</td>
                                                    <td>2023-03-12</td>
                                                    <td>$100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Emma Martinez</td>
                                                    <td>UX/UI Designer</td>
                                                    <td>Portland</td>
                                                    <td>29</td>
                                                    <td>2023-09-05</td>
                                                    <td>$90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>William Clark</td>
                                                    <td>Software Developer</td>
                                                    <td>Boston</td>
                                                    <td>28</td>
                                                    <td>2023-05-28</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Ava Taylor</td>
                                                    <td>Content Writer</td>
                                                    <td>Philadelphia</td>
                                                    <td>26</td>
                                                    <td>2022-10-22</td>
                                                    <td>$70,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Joseph White</td>
                                                    <td>Project Coordinator</td>
                                                    <td>Dallas</td>
                                                    <td>31</td>
                                                    <td>2023-02-15</td>
                                                    <td>$85,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Sophia Perez</td>
                                                    <td>Systems Analyst</td>
                                                    <td>San Diego</td>
                                                    <td>30</td>
                                                    <td>2023-12-10</td>
                                                    <td>$105,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Daniel Scott</td>
                                                    <td>Marketing Manager</td>
                                                    <td>Charlotte</td>
                                                    <td>33</td>
                                                    <td>2023-06-18</td>
                                                    <td>$110,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Isabella Rodriguez</td>
                                                    <td>Financial Advisor</td>
                                                    <td>Las Vegas</td>
                                                    <td>27</td>
                                                    <td>2023-11-05</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Logan Nguyen</td>
                                                    <td>Product Designer</td>
                                                    <td>Minneapolis</td>
                                                    <td>32</td>
                                                    <td>2022-12-30</td>
                                                    <td>$120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Mia Kim</td>
                                                    <td>HR Manager</td>
                                                    <td>Orlando</td>
                                                    <td>29</td>
                                                    <td>2023-08-25</td>
                                                    <td>$100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Benjamin King</td>
                                                    <td>Data Engineer</td>
                                                    <td>Salt Lake City</td>
                                                    <td>34</td>
                                                    <td>2022-09-10</td>
                                                    <td>$125,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Charlotte Thomas</td>
                                                    <td>Business Development Manager</td>
                                                    <td>Tampa</td>
                                                    <td>31</td>
                                                    <td>2023-03-28</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Ethan Martinez</td>
                                                    <td>Software Tester</td>
                                                    <td>Austin</td>
                                                    <td>28</td>
                                                    <td>2023-10-15</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Madison Jackson</td>
                                                    <td>UX/UI Developer</td>
                                                    <td>Washington D.C.</td>
                                                    <td>30</td>
                                                    <td>2023-01-10</td>
                                                    <td>$90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Lucas Adams</td>
                                                    <td>Content Manager</td>
                                                    <td>San Jose</td>
                                                    <td>27</td>
                                                    <td>2022-07-22</td>
                                                    <td>$75,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Chloe Walker</td>
                                                    <td>Project Analyst</td>
                                                    <td>Detroit</td>
                                                    <td>32</td>
                                                    <td>2023-05-05</td>
                                                    <td>$110,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Jack Wright</td>
                                                    <td>Technical Writer</td>
                                                    <td>Indianapolis</td>
                                                    <td>26</td>
                                                    <td>2023-02-20</td>
                                                    <td>$80,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Hannah Baker</td>
                                                    <td>Systems Administrator</td>
                                                    <td>Charlotte</td>
                                                    <td>33</td>
                                                    <td>2023-09-18</td>
                                                    <td>$105,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Liam Hall</td>
                                                    <td>Marketing Coordinator</td>
                                                    <td>San Francisco</td>
                                                    <td>28</td>
                                                    <td>2023-06-15</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Grace Young</td>
                                                    <td>Product Owner</td>
                                                    <td>Denver</td>
                                                    <td>29</td>
                                                    <td>2022-11-30</td>
                                                    <td>$120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Dylan Evans</td>
                                                    <td>Business Consultant</td>
                                                    <td>Seattle</td>
                                                    <td>34</td>
                                                    <td>2023-04-05</td>
                                                    <td>$100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Victoria Moore</td>
                                                    <td>Software Developer</td>
                                                    <td>Boston</td>
                                                    <td>27</td>
                                                    <td>2023-07-12</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Nathan Lopez</td>
                                                    <td>Marketing Specialist</td>
                                                    <td>Chicago</td>
                                                    <td>33</td>
                                                    <td>2023-02-28</td>
                                                    <td>$85,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Hailey Adams</td>
                                                    <td>Product Manager</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>2022-10-15</td>
                                                    <td>$125,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Andrew Thompson</td>
                                                    <td>Financial Analyst</td>
                                                    <td>Houston</td>
                                                    <td>29</td>
                                                    <td>2023-12-05</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Madeline Wilson</td>
                                                    <td>HR Specialist</td>
                                                    <td>Miami</td>
                                                    <td>32</td>
                                                    <td>2023-06-20</td>
                                                    <td>$80,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Aiden Garcia</td>
                                                    <td>Data Scientist</td>
                                                    <td>Denver</td>
                                                    <td>28</td>
                                                    <td>2023-11-08</td>
                                                    <td>$130,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Kayla Hernandez</td>
                                                    <td>Graphic Designer</td>
                                                    <td>Atlanta</td>
                                                    <td>31</td>
                                                    <td>2023-04-20</td>
                                                    <td>$75,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Landon Scott</td>
                                                    <td>Business Analyst</td>
                                                    <td>Phoenix</td>
                                                    <td>26</td>
                                                    <td>2023-09-12</td>
                                                    <td>$100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Sophie Martinez</td>
                                                    <td>UX/UI Designer</td>
                                                    <td>Portland</td>
                                                    <td>33</td>
                                                    <td>2023-01-05</td>
                                                    <td>$90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Henry Clark</td>
                                                    <td>Content Writer</td>
                                                    <td>Philadelphia</td>
                                                    <td>29</td>
                                                    <td>2022-08-22</td>
                                                    <td>$70,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Grace White</td>
                                                    <td>Project Coordinator</td>
                                                    <td>Dallas</td>
                                                    <td>30</td>
                                                    <td>2023-03-15</td>
                                                    <td>$85,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Lucas Perez</td>
                                                    <td>Systems Analyst</td>
                                                    <td>San Diego</td>
                                                    <td>27</td>
                                                    <td>2023-10-10</td>
                                                    <td>$105,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Emma Scott</td>
                                                    <td>Marketing Manager</td>
                                                    <td>Charlotte</td>
                                                    <td>34</td>
                                                    <td>2022-12-18</td>
                                                    <td>$110,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Noah Rodriguez</td>
                                                    <td>Financial Advisor</td>
                                                    <td>Las Vegas</td>
                                                    <td>31</td>
                                                    <td>2023-07-05</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Chloe Nguyen</td>
                                                    <td>Product Designer</td>
                                                    <td>Minneapolis</td>
                                                    <td>28</td>
                                                    <td>2023-02-20</td>
                                                    <td>$120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>William Kim</td>
                                                    <td>HR Manager</td>
                                                    <td>Orlando</td>
                                                    <td>33</td>
                                                    <td>2022-09-25</td>
                                                    <td>$100,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Emily King</td>
                                                    <td>Data Engineer</td>
                                                    <td>Salt Lake City</td>
                                                    <td>30</td>
                                                    <td>2023-04-10</td>
                                                    <td>$125,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Nicholas Thomas</td>
                                                    <td>Business Development Manager</td>
                                                    <td>Tampa</td>
                                                    <td>27</td>
                                                    <td>2023-11-28</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Oliver Martinez</td>
                                                    <td>Software Tester</td>
                                                    <td>Austin</td>
                                                    <td>34</td>
                                                    <td>2023-08-15</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Sophia Brown</td>
                                                    <td>UX/UI Developer</td>
                                                    <td>Washington D.C.</td>
                                                    <td>31</td>
                                                    <td>2022-07-10</td>
                                                    <td>$90,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Liam Wilson</td>
                                                    <td>Content Manager</td>
                                                    <td>San Jose</td>
                                                    <td>28</td>
                                                    <td>2023-12-22</td>
                                                    <td>$75,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Charlotte Garcia</td>
                                                    <td>Project Analyst</td>
                                                    <td>Detroit</td>
                                                    <td>33</td>
                                                    <td>2023-05-05</td>
                                                    <td>$110,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Ethan Wright</td>
                                                    <td>Technical Writer</td>
                                                    <td>Indianapolis</td>
                                                    <td>30</td>
                                                    <td>2023-01-20</td>
                                                    <td>$80,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Isabella Baker</td>
                                                    <td>Systems Administrator</td>
                                                    <td>Charlotte</td>
                                                    <td>27</td>
                                                    <td>2023-09-18</td>
                                                    <td>$105,000</td>
                                                </tr>
                                                <tr>
                                                    <td>James Hall</td>
                                                    <td>Marketing Coordinator</td>
                                                    <td>San Francisco</td>
                                                    <td>34</td>
                                                    <td>2022-06-15</td>
                                                    <td>$95,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Emma Young</td>
                                                    <td>Product Owner</td>
                                                    <td>Denver</td>
                                                    <td>29</td>
                                                    <td>2022-11-30</td>
                                                    <td>$120,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Aiden Evans</td>
                                                    <td>Business Consultant</td>
                                                    <td>Seattle</td>
                                                    <td>32</td>
                                                    <td>2023-04-05</td>
                                                    <td>$100,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col fs-13 text-muted text-center">
                                &copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- Datatables js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>

        <!-- dataTables.bootstrap5 -->
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

        <!-- buttons.colVis -->
        <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

        <!-- buttons.bootstrap5 -->
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>

        <!-- dataTables.keyTable -->
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>

        <!-- dataTable.responsive -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

        <!-- dataTables.select -->
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>

        <!-- Datatable Demo App Js -->
        <script src="assets/js/pages/datatable.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                $('.filter-button').click(function() {
                    var filter = $(this).data('filter');

                    // Hide all rows first
                    $('#datatable-buttons tbody tr').hide();

                    if (filter === 'all') {
                        // Show all rows if "All" is selected
                        $('#datatable-buttons tbody tr').show();
                    } else {
                        // Show rows based on the selected filter (city)
                        $('#datatable-buttons tbody tr').filter(function() {
                            return $(this).find('td:nth-child(3)').text().toLowerCase() === filter; // 3rd column is "Office"
                        }).show();
                    }

                    // Update button active state (optional)
                    $('.filter-button').removeClass('btn-primary').addClass('btn-secondary');
                    $(this).removeClass('btn-secondary').addClass('btn-primary');

                });


                // Initialize DataTable AFTER the filter buttons are set up
                $('#datatable-buttons').DataTable({
                    dom: 'Bfrtip', // Include buttons in the DataTable
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    // ... other DataTable options
                });


            });
        </script>

    </body>
</html>
