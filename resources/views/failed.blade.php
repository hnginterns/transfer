<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }

        .modal-header,
        .modal-body {
            border-bottom: 2px solid #828282;;
        }

        .modal-body {
            text-align: center;
        }

        .modal-body h4 {
            color: #FF6200;
            font-weight: bold;
            font-size: 16px;
        }

        .modal-title {
            text-align: center;
            font-weight: bold;
        }

        table {
            text-align: left;
            width: 100%;
        }

        td {
            padding: 10px 30px;
        }

        tr > td:first-child {
            font-weight: bold;
        }

        .modal-footer h6 {
            color: #FF6200;
            text-align: left;
        }

        .modal-footer button {
            float: left;
            transition: color 2s, background 1s;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
            border-radius: 63px;
            padding-right: 20px;
            padding-left: 20px;
            background: #FF6200;
            color: white;
            border: none;
        }

        .modal-footer button:hover {
            background: white;
            color: #FF6200;
        }
    </style>
</head>
<body>
<!--<button class="btn btn-primary" data-toggle="modal" data-target="#modal">
    Launch failed transaction
</button>

<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content"> -->
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">TRANSFER RULES</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>YOUR TRANSACTION FAILED</h4>

                <table>
                    <tr>
                        @foreach($data as $key => $value)
                        <td>{{$key}}</td>
                        <td>{{$value}}</td>
                    </tr>
                    <tr>
                        <td>Reference No.</td>
                        <td>02CS44BDE55N</td>
                    </tr>
                    <tr>
                        <td>Transaction Date/Time</td>
                        <td>20-9-2017/05:30pm</td>
                    </tr>
                    <tr>
                        <td>Error code</td>
                        <td>2173</td>
                    </tr>
                    <tr>
                        <td>Error Message</td>
                        <td>Transaction unsuccessful :  Insufficient Balance Error 2173</td>
                    </tr>
                </table>

                <h6>This transaction will automatically close in 20 seconds and you will be redirected to your dashboard</h6>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <h6>Click print to print receipt for reference or ok to continue</h6>
                <button type="button" class="btn" data-dismiss="modal" id="print">Print</button>
                <button type="button" class="btn" id="close">OK</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(() => {
        var options = {
            backdrop: true,
            keyboard: false,
            show: false,
            remote: false
        }
        $("#modal").modal(options);
    });
</script>
<!-- <script src="js/script.js"></script> -->
</body>
</html>