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

        .modal-header {
            border-bottom: 2px solid #828282;
        }

        .modal-body {
            border-bottom: none;
        }

        .modal-footer {
            border-top: none;
            border-bottom: 2px solid #828282;
            margin-bottom: 30px;
            margin-top: 0px;
            padding: 0px 40px;
            padding-bottom: 50px;
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
            text-align: center;
        }

        #body-footer {
            padding-left: 18px !important;
            font-size: 12px;
            /* text-align: left; */
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
        .button {
            margin: 0;
            text-align: center;
        }
        .modal-footer button:hover {
            background: white;
            color: #FF6200;
        }
    </style>
</head>
<body>
<!--<button class="btn btn-primary" data-toggle="modal" data-target="#modal">
    Launch successful transaction
</button> -->

<!--<div class="modal fade" id="modal">
    <div class="modal-dialog">
        <div class="modal-content">-->
            <!-- Modal Header -->
            <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <h4 class="modal-title">TRANSFER RULES</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>YOUR TRANSACTION WAS SUCCESSFULL</h4>

                <table>
                    <tr>
                        <td>Merchant Name</td>
                        <td>Nwauwa Victor Ifeanyi</td>
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
                        <td>Beneficiary wallet id</td>
                        <td>2173</td>
                    </tr>
                    <tr>
                        <td>Beneficiary wallet name</td>
                        <td>Wallet 2</td>
                    </tr>
                    <tr>
                        <td>Narration</td>
                        <td>Lorem puddj dkjfdju jkdf/h/iuhiu lkn/il/nzns</td>
                    </tr>
                </table>

                <p id="body-footer"> This transaction will automatically close in 20 seconds and you will be redirected to your dashboard</p>
            </div>
            <!-- Modal Footer -->
            
            <div class="modal-footer">
                <div class="col-md-12 col-md-offset-5">
                <h6 class="text-center">Click print to print receipt for reference or ok to continue</h6>
                <button type="button" class="btn" data-dismiss="modal" id="print">Print</button>
                <button type="button" class="btn" data-dismiss="modal" id="print">Send via email</button>
                <button type="button" class="btn" id="close">OK</button>
            </div>
        </div>
            <p style="text-align: center; font-size: 13px;">Copyright &#169; 2017 Transfer Rules | Rave Pay | Privacy Policy | Terms Of Service</p>
       <!-- </div>
    </div>
</div>-->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--    $(document).ready(() => {
        var options = {
            backdrop: true,
            keyboard: false,
            show: false,
            remote: false
        }
        $("#modal").modal(options);
    });
</script> -->
<!-- <script src="js/script.js"></script> -->
</body>
</html>