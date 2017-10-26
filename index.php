<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <script src="https://use.fontawesome.com/3ef54e1b84.js"></script>
    <script src="tracker.js"></script>

    <style>
        *:disabled {
            background-color:#cccccc !important;
            border:none !important;
        }
        .btn-col{width:61px;}
    </style>
</head>
<body>

<div class="container-fluid">

    <header class="navbar">
        <div class="col">
            <small><a data-mode="restore" id="btn-mode" href="#" class="">Enter <span id="lbl-mode">Restore</span> Mode</a></small>
        </div><!-- END col -->
        <div class="col- text-right">
            <strong>Total Time spent on ended tasks:</strong> <span id="tally"></span>
        </div>
    </header>

            <form id="form-new" method="get">
            <div class="form-group row">
                <div class="col-10">
                    <input id="task" class="form-control" name="task" placeholder="Enter new task name...">
                </div><!-- END col -->
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-block btn-success">Add</button>
                </div><!-- END col -->
            </div><!-- END form-group -->
        </form>

    <hr>

    <table class="table table-bordered table-stripped">

        <thead>
        <tr>
            <th>Task</th>
            <th>Start</th>
            <th>End</th>
            <th>Time</th>
            <th colspan="2">Controls</th>
        </tr>
        </thead>

        <tbody id="log"></tbody>

    </table>

</div><!-- END container -->


</body>


</html>