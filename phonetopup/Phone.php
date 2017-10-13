<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phone</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="content">
        <div class="header">
        <div class="row">
            <div class="col-lg-5"><img src="images/ham.png" alt="Hamburger" width="40" height="20">
            <h5>Phone Top up</h5></div><div class="col-lg-4"></div><div class="col-lg-3 inputbox" align="right">
            <input type="search" name="search" id="search" placeholder="Search">
            </div>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
        <div class="content_two">
        <div class="row">
        <div class="col-md-6" align="center" >
            <div class="balance"align="center"  >
                <h5>Balance</h5>
                <div class="box" align="center">
                        <p>Available <br>in Wallet<br>
                        <strong>
                            <?php
                                  $curl = curl_init();
                                  curl_setopt_array($curl, array(
                                    CURLOPT_URL => "https://mobileairtimeng.com/httpapi/balance.php?userid=%2008189115870&pass=dbcc49ee2fba9f150c5e82",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "GET",
                                    CURLOPT_HTTPHEADER => array(
                                      "cache-control: no-cache",
                                      "postman-token: 28c061c4-a48c-629f-3aa2-3e4cad0641ff"
                                    ),
                                  ));
                                  $response = curl_exec($curl);
                                  $err = curl_error($curl);
                                  curl_close($curl);
                                  if ($err) {
                                    echo "cURL Error #:" . $err;
                                  } else {
                                    echo $response;
                                  }
                            ?>
                            </strong></p>
                </div>
            </div>
            </div>
            <div class="col-md-6" align="center">
            <div class="wallet">
                    <h5>Refill Topup Wallet</h5>
                    <p>Select Amount</p>
                    <div class="button" align="center">
                         <form>
                            <button class="submit-amount" type="button" data-amount="500" value="500" id="submit">&nbsp; N500</button>
                            <button class="submit-amount" type="button" data-amount="1000" value="1000" id="submit">&nbsp; N1000</button>
                            <button class="submit-amount" type="button" data-amount="2000" value="2000" id="submit">&nbsp; N2000</button><br>
                            <button class="submit-amount" type="button" data-amount="3000" value="3000" id="submit">&nbsp; N3000</button>
                            <button class="submit-amount" type="button" data-amount="4000" value="4000" id="submit">&nbsp; N4000</button>
                            <button class="submit-amount" type="button" data-amount="5000" value="5000" id="submit">&nbsp; N5000</button>
                        </form>
                    </div>
            </div>
            </div>
            </div>
        </div>
        <br />
            <div class="thirdblock">
            <div class="row">
            <div class="col-lg-6">
                    <h5>Top Up Prepaid Mobile Phone</h5>
                    <div class="details">
                       <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Chef's Phone </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      <div class="row" >
      <div class="col-md-6">
      <p>Chef's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
                        
                            

      
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        CTO's Phone</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
       <div class="row" >
      <div class="col-md-6">
      <p>CTO's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        HRM's Phone</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="row" >
      <div class="col-md-6">
      <p>HRM's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
      </div>
      
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        MD's Phone</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="row" >
      <div class="col-md-6">
      <p>MD's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
      </div>
      
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        CSO's Phone</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="row" >
      <div class="col-md-6">
      <p>CSO's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
      </div>
      
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        DOCTOR's Phone</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse">
      <div class="panel-body">
      <div class="row" >
      <div class="col-md-6">
      <p>DOCTOR's Phone - <strong>417-873-60000</strong> </p>
                        <button type="button" class="history" data-toggle="modal" data-target="#myModal">Transaction History</button>
      </div>
       <div class="col-md-6"> 
       <div class="selectamount">
                                <div class="selecttopup"><h6>Select Amount <img src="images/naira.png" alt="naira" width="25px" height="25px" ></h6>
                                    
                                </div>
                                <div class="reach">
                                    <form action="script.php" method="POST">
                                            <input type="submit" name="load500" id="load500"  value="500"/>
                                            <input type="submit" name="load1000" id="load1000" value="1000"/>
                                            <input type="submit" name="load2000" id="load2000" value="2000"/>
                                            <input type="submit" name="load3000" id="load3000" value="3000"/>
                                            <input type="submit" name="load4000" id="load4000" value="4000"/>
                                            <input type="submit" name="load5000" id="load5000 " value="5000"/>                                            
                                    </form>
                                </div>
                               
                            </div>
       </div>
      </div>
      </div>
      
    </div>
  </div>
</div>
                           
                           
                    </div>
                    </div>
                    <div class="col-lg-6" align="center">
                    <div class="details2">
                        <h6>TopUp Data Plans</h6><hr>
                        <div class="panel-group" id="credit">
                        <ul>
                            <li> <button type="button"  data-parent="#credit" data-toggle="collapse" data-target="#9mobile"><img src="images/1.png" width="40" height="40" alt="9mobile"> </button></li> 
                            <li> <button type="button" data-parent="#credit"  data-toggle="collapse" data-target="#mtn"><img src="images/2.png" width="40" height="40" alt="mtn"> </button></li> 
                            <li> <button  type="button" data-parent="#credit" data-toggle="collapse" data-target="#airtel"><img src="images/3.png" width="40" height="40" alt="airtel"></button> </li> 
                            <li> <button  type="button" data-parent="#credit" data-toggle="collapse" data-target="#glo"><img src="images/4.png" width="40" height="40" alt="glo"> </button></li> <hr>
                        </ul>
                        <div id="9mobile" class=" panel-collapse collapse in" >
                        <div class="panel">
                        <div class="data">
                            <form action="datascript.php" method="POST">
                               <button type="submit" name="data1000" id="data1000"  value="1000">1.5Gb <br> 30days<br> <strong>N1,000</strong></button>
                               <button type="submit" name="data2000" id="data2000"  value="2000">3.5Gb <br> 30days<br> <strong>N2,000</strong> </button>
                               <button type="submit" name="data3000" id="data3000"  value="3000">5Gb <br> 30days<br> <strong>N2,500</strong> </button>
                               <br>
                               <button type="submit" name="data4000" id="data4000"  value="4000">7Gb <br> 30days<br> <strong>N3,500</strong> </button>
                               <button type="submit" name="data5000" id="data5000"  value="5000">9Gb <br> 30days<br> <strong>N4,000</strong> </button>
                               <button type="submit" name="data6000" id="data6000"  value="6000">10Gb <br> 30days<br> <strong>N5,000</strong> </button>
                            </form>
                           </div>
                           </div>
                        </div>
                        <div id="mtn" class="panel-collapse collapse" >
                        <div class="data">
                        <form action="datascript.php" method="POST">
                               <button type="submit" name="data1000" id="data1000"  value="1000">1.5Gb <br> 30days<br> <strong>N1,000</strong></button>
                               <button type="submit" name="data2000" id="data2000"  value="2000">3.5Gb <br> 30days<br> <strong>N2,000</strong> </button>
                               <button type="submit" name="data3000" id="data3000"  value="3000">5Gb <br> 30days<br> <strong>N2,500</strong> </button>
                               <br>
                               <button type="submit" name="data4000" id="data4000"  value="4000">7Gb <br> 30days<br> <strong>N3,500</strong> </button>
                               <button type="submit" name="data5000" id="data5000"  value="5000">9Gb <br> 30days<br> <strong>N4,000</strong> </button>
                               <button type="submit" name="data6000" id="data6000"  value="6000">10Gb <br> 30days<br> <strong>N5,000</strong> </button>
                            </form>
                        </div>
                        </div>
                        <div id="airtel" class="panel-collapse collapse" >
                        <div class="data">
                       <form action="datascript.php" method="POST">
                               <button type="submit" name="data1000" id="data1000"  value="1000">1.5Gb <br> 30days<br> <strong>N1,000</strong></button>
                               <button type="submit" name="data2000" id="data2000"  value="2000">3.5Gb <br> 30days<br> <strong>N2,000</strong> </button>
                               <button type="submit" name="data3000" id="data3000"  value="3000">5Gb <br> 30days<br> <strong>N2,500</strong> </button>
                               <br>
                               <button type="submit" name="data4000" id="data4000"  value="4000">7Gb <br> 30days<br> <strong>N3,500</strong> </button>
                               <button type="submit" name="data5000" id="data5000"  value="5000">9Gb <br> 30days<br> <strong>N4,000</strong> </button>
                               <button type="submit" name="data6000" id="data6000"  value="6000">10Gb <br> 30days<br> <strong>N5,000</strong> </button>
                            </form>
                        </div>
                        </div>
                        <div id="glo" class="panel-collapse collapse" >
                        <div class="data">
                       <form action="datascript.php" method="POST">
                               <button type="submit" name="data1000" id="data1000"  value="1000">1.5Gb <br> 30days<br> <strong>N1,000</strong></button>
                               <button type="submit" name="data2000" id="data2000"  value="2000">3.5Gb <br> 30days<br> <strong>N2,000</strong> </button>
                               <button type="submit" name="data3000" id="data3000"  value="3000">5Gb <br> 30days<br> <strong>N2,500</strong> </button>
                               <br>
                               <button type="submit" name="data4000" id="data4000"  value="4000">7Gb <br> 30days<br> <strong>N3,500</strong> </button>
                               <button type="submit" name="data5000" id="data5000"  value="5000">9Gb <br> 30days<br> <strong>N4,000</strong> </button>
                               <button type="submit" name="data6000" id="data6000"  value="6000">10Gb <br> 30days<br> <strong>N5,000</strong> </button>
                            </form>
                        </div>
                        </div>
                        <br />
                        <br />


                        </div>
                    </div>
                     
                    <input type="button" class="topupbutton" value="TOP ALL">
            </div>
            
            
            </div>
            </div>
            
            
           </div>
           
            </div>
    </div>
    <section>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Transaction History</h4>
      </div>
      <div class="modal-body" >
        <div align="center" >
  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"></a>
<table class="table table-size table-striped">
  <tr>
    <th class="modal-table">This Week - September, 2017</th>
    <th class="modal-table">Number Approved by: Admin</th>
  </tr>
  <tr>
    <td class="modal-table">Thursday    9:39pm</td>
    <td class="modal-table">Phone Topup (N2000)</td>
   </tr>
  <tr>
    <td class="modal-table">Tuesday 10:05pm </td>
    <td class="modal-table">Data Topup (1.5GB - N1000) 30days</td>
  </tr>
  <tr>
    <td class="modal-table">Tuesday 9:39am  </td>
    <td class="modal-table">Phone Topup (N1000)</td>
  </tr>
  <tr>
    <th class="modal-table" colspan="2">Previous Weeks - September, 2017</th>
  </tr>
  <tr>
    <td class="modal-table">Thursday    9:39pm</td>
    <td class="modal-table">Phone Topup (N2000)</td>
  </tr>
  <tr>
    <td class="modal-table">Tuesday 10:05pm</td>
    <td class="modal-table">Data Topup (1.5GB - N1000) 30days</td>
  </tr>
  <tr>
    <td class="modal-table">Tuesday 9:39am </td>
    <td class="modal-table">Phone Topup (N1000)</td>
  </tr>
  <tr>
    <td class="modal-table">Thursday    9:39pm</td>
    <td class="modal-table">Phone Topup (N1000)</td>
  </tr>
  <tr>
    <td class="modal-table">Tuesday 10:05pm</td>
    <td class="modal-table">Data Topup (1.5GB - N1000) 30days</td>
  </tr>
</table>
</div>
      </div>
    </div>

  </div>
</div>
    </section>
     <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script type="text/javascript" src="wallet.js"></script>
</body>
</html>