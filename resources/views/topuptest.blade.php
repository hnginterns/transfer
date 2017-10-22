@extends('layouts.user') @section('title', 'Dashboard') @section('content')

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
        
                    <hr>

                    <p>
                        <h3>Top=Up History </h3>
                    </p>

                    <table class="table">
                        <thead>
                            <tr>
                                <td>phone number</td>
                                <td>Amount</td>
                                <td>Network</td>
                                <td>type</td>
                                <td>status</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>

                            </tr>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>

                            </tr>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>


                            </tr>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>


                            </tr>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>

                            </tr>
                            <tr>
                                <td>07061926206</td>
                                <td>2000</td>
                                <td>MTN</td>
                                <td>Airtime</td>
                                <td>Succes</td>
                                <td>12.09.13</td>


                            </tr>


                            </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>


                </div>






</div>
</div>


@endsection
