@extends('layouts.user') @section('title', 'Dashboard') @section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

<style type="text/css">
    .units {
        background: #222d32;
        color: #fff;
        margin: 1%;
        padding: 2%;
    }
    
    tbody {
        display: block;
        height: 200px;
        overflow: auto;
    }
    
    thead,
    tbody tr {
        display: table;
        width: 50%;
        table-layout: fixed;
    }
    
    thead {
        width: calc( 50% - 1em)
    }
    
    .radiotext {
        margin: 10px 10px 0px 0px;
    }
</style>

<div class="col-md-12 col-sm-12">
    <div class="row">
        <div class="container">
            <hr>

            <p>
                <h3>Phone Number List </h3>
            </p>

            <table class="table">
                <thead>
                    <tr>
                        <td>Choose</td>
                        <td>Name</td>
                        <td>phone number</td>
                        <td>Network</td>
                    </tr>
                </thead>
                <tbody>
                    <form action="">
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label><input type="radio" id='regular' name="optradio"></label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>Joseph bassey</label>
                                </div>
                            </td>
                            <td>
                                <div class="radiotext">
                                    <label for='regular'>07061926206</label>
                                </div>
                            </td>

                            <td>
                                <div class="radiotext">
                                    <label for='regular'>MTN</label>
                                </div>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
            <hr>
        </div>


    </div>

    <select class="selectpicker" data-style="btn-info">
                                 <option>Choose Network</option>

                 <option>MTN</option>
                 <option>GLO</option>
                 <option>Airtel</option>

                 <option>9Mobile</option>
</select>








</div>
</div>


@endsection
