<!DOCTYPE html>
    <head></head>
    <body> 
        <!--<script src="../bootstrap/jquery.min.js"></script>-->
        <!--<script src="../bootstrap/js/popper.min.js"></script>-->
        <!--<script src="../bootstrap/js/npm.js"></script>-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script>
        $(document).ready(function(){
            setTimeout("DisplayTime()", 1); 
        });
        function DisplayTime(){
            var dt = new Date();
            $("#CurrentTime").html(dt.toLocaleTimeString());
            setTimeout("DisplayTime()", 1);
        }
        $(document).ready(function(){
            $("#table1").DataTable();
        });
        $(document).ready(function(){
            $("#table2").DataTable();
        });
        $(document).ready(function(){
            $("#table3").DataTable();
        });
        $(document).ready(function(){
            $("#table4").DataTable();
        });
        $(document).ready(function(){
            $("#table5").DataTable();
        });
        $(document).ready(function(){
            $("#table6").DataTable();
        });
        $(document).ready(function(){
            $("#table7").DataTable();
        });
        $(document).ready(function(){
            $("#table8").DataTable();
        });
        $(document).ready(function(){
            $("#table9").DataTable();
        });
        $(document).ready(function(){
            $("#table10").DataTable();
        });
    </script>
    </body>
</html>