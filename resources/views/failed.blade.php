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

<!--<button class="btn btn-primary" data-toggle="modal" data-target="#modal">
    Launch failed transaction
</button> -->

<div style="display: none;" class="modal fade" id="fmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">TRANSFER RULES</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>YOUR TRANSACTION FAILED</h4>
                <h6 id="fmsg"></h6>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        var options = {
            backdrop: false,
            keyboard: false,
            show: true,
            remote: false
        }
       //$("#fmodal").modal(options);
    });
</script>
<!-- <script src="js/script.js"></script> -->
</body>
</html>
