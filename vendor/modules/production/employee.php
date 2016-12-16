<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard Intersog! </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">



    <link href="css/ajax.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../vendors/mystyle/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php
        error_reporting( E_ERROR );
        require_once('../../../cfunctions.php');
        require_once "templates.php";
        myNavicetion();

        topMenu();
        HeadContent();

        FormDataEnter();
        EmployeeTable();

        FooterContent();
        myfooter();

        ?>

    </div>
</div>
<!--<script src="dataTable1.js"></script>-->

<?php
    loadScripts();
    //includeJStoTable1();
?>

<script>
    $("#cirk").css("display", "none");
    $("#tempText").css("display", "none");
    $('#datatable-buttons').css('display','table');
</script>
<script>
//     $('p.test').click(function(){$('body').append('<div>ycnex</div>')});



</script>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="js/moment/moment.min.js"></script>
<script src="js/datepicker/daterangepicker.js"></script>
<!-- Ion.RangeSlider -->
<script src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap Colorpicker -->
<script src="../vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- jquery.inputmask -->
<script src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<!-- jQuery Knob -->
<script src="../vendors/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Cropper -->
<script src="../vendors/cropper/dist/cropper.min.js"></script>


<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>
<script src="js/myJs/editEmployee.js"></script>
<script>
    $(document).ready(function() {
        $('#single_cal1').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_1"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal2').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_2"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal3').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_3"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#single_cal4').daterangepicker({
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
    });
</script>

<script>



    $(document).on('click', '#snddate', function(){
        var dateForQuery = $('#single_cal2').val();
        var ms = Date.parse(dateForQuery);
        var date = new Date(ms);
        var month = date.getMonth()+1;
        var sMonth="";
        var year = date.getFullYear();
        if (month<10) {
            sMonth = '0'+ month.toString();
        } else {
            sMonth = month.toString();
        }
        var sYear = year.toString();
        var fData = sYear + sMonth;
        dateForQuery = fData;
        alert(dateForQuery);
        

    });



</script>


</body>

</html>