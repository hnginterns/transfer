@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')

      <div class="col-md-12 col-sm-12">
        <div class="row">
         <div class="container">
                    <hr>

                    <p>
                        <h3>Transaction History </h3>
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
                            </form>
                        </tbody>
                    </table>
                    <hr>
                </div>


                </div>
              

 





        </div>
      </div>


@endsection      
