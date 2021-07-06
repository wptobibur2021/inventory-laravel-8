
                <footer class="footer text-right">
                    2017 © Adminox. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{ asset('backend') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="{{ asset('backend') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/metisMenu.min.js"></script>
        <script src="{{ asset('backend') }}/assets/js/waves.js"></script>
        <script src="{{ asset('backend') }}/assets/js/jquery.slimscroll.js"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('backend') }}/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/jszip.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{ asset('backend') }}/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Counter js  -->
        <script src="{{ asset('backend') }}/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="{{ asset('backend') }}/assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="{{ asset('backend') }}/assets/plugins/d3/d3.min.js"></script>
        <script type="text/javascript" src="{{ asset('backend') }}/assets/plugins/c3/c3.min.js"></script>

        <!--Echart Chart-->
        <script src="{{ asset('backend') }}/assets/plugins/echart/echarts-all.js"></script>
        <!-- Parsley js -->
        <script type="text/javascript" src="{{ asset('backend') }}/assets/plugins/parsleyjs/parsley.min.js"></script>
        <!-- Dashboard init -->
        <script src="{{ asset('backend') }}/assets/pages/jquery.dashboard.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <!-- form repeater js -->
        <script src="{{ asset('backend') }}/assets/plugins/jquery-repeater/jquery.repeater.min.js"></script>
        <script src="{{ asset('backend') }}/assets/pages/form-repeater.int.js"></script>
        <!-- App js -->
        <script src="{{ asset('backend') }}/assets/js/jquery.core.js"></script>
        <script src="{{ asset('backend') }}/assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                $('form').parsley();

                $('.delete-confirm').on('click', function (event) {
                    event.preventDefault();
                    const url = $(this).attr('href');
                    swal({
                        title: 'Are you sure?',
                        text: 'You want this record permanantly delete!',
                        icon: 'warning',
                        buttons: ["Cancel", "Yes!"],
                    }).then(function(value) {
                        if (value) {
                            window.location.href = url;
                        }
                    });
                });


                $('.edit-confirm').on('click', function (event) {
                    event.preventDefault();
                    const url = $(this).attr('href');
                    swal({
                        title: 'Are you sure?',
                        text: 'You want this record information Edit!',
                        icon: 'warning',
                        buttons: ["Cancel", "Yes!"],
                    }).then(function(value) {
                        if (value) {
                            window.location.href = url;
                        }
                    });
                });

            } );

        </script>
    </body>
</html>
