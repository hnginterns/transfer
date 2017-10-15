<link rel="stylesheet" href="css/custom.css" >

@extends('layouts.admin')

@section('content')


<div class="container">
      <!-- Example row of columns -->
      <div class="row" >
        <div class="col-md-2">
          <!----------side bar goes here ---->
        </div>
        <div class="col-md-10 border" id="body">
            <div class="row" id="balanceDiv">
                <div class="col-md-6 balance">
                    <div class="balHolder">
                      <h2>Wallet</h2>
                      <div class="text-center" >
                          <h3>Available Balance</h3>
                          <p id="wallet-balance">#1,000,000</p>
                      </div>
                    </div>
                    <div class="balHolder">
                      <h2>Phone Top Up</h2>
                      <div class="text-center">
                          <h3>Available Balance</h3>
                          <p>#1,000,000</p>
                      </div>
                    </div>
                </div> 
                <div class="col-md-6">
                    <h2>Refill Top Up Wallet</h2>
                    <div id="wallet-topUpBtn" class="text-center">
                        <h3>Select Amount</h3>
                            <div class="row">
                                  <div class="col-md-4">
                                    <div class="ck-button">
                                        <label>
                                          <input type="checkbox" name=""> <span>500</span>
                                        </label>
                                     </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="ck-button">
                                      <label>
                                         <input type="checkbox" name=""> <span>1000</span>
                                      </label>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="ck-button">
                                      <label>
                                        <input type="checkbox" name=""> <span>2000</span>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                 <div class="row">
                                     <div class="col-md-4">
                                        <div class="ck-button">
                                            <label>
                                              <input type="checkbox" name=""> <span>5000</span>
                                            </label>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                         <div class="ck-button">
                                            <label>
                                              <input type="checkbox" name=""> <span>10000</span>
                                             </label>
                                          </div>
                                        </div>
                                      <div class="col-md-4">
                                          <div class="ck-button">
                                              <label>
                                                 <input type="checkbox" name=""> <span>100000</span>
                                              </label>
                                           </div>
                                          </div>
                                         </div>
                         <button class="btn btn-primary btn-block">TOP UP WALLET</button>
                    </div>
                    
                    
                </div>            
            </div>
            <div class="container-fiuld">
                <div class="container text-center topUpHeader">
                    <h2 style="">Top Up Prepaid Mobile Phones</h2>
                </div>
                 
            </div>
            <div class="container-fiuld">
                <div class="row">
                    <div class="col-md-7">
                        <div class="text-center benHeader">
                            <h2>Select beneficiaries number</h2>
                        </div>
                        <div id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                              <h5 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Chef's okon Phone
                                </a>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                              <div class="row text-center">
                                        <div class="col-md-6">
                                            <div class="benName">
                                                <h4>Chef<span>-417-879-60000</span></h4>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary history-btn" data-toggle="modal" data-target="#transaction-history">TopUp History <i class="fa fa-history" aria="hidden"></i></button>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <h4 class="border">Choose Amount</h4>
                                            <div class="top-up-btn">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>500</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>1000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>2000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>5000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>100000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <!-- hidden input element to save network type and data selection-->
                                                    <input class="network-type" type="hidden" name="network_type" value="">
                                                    <input class="data-type" type="hidden" name="data_type" value="">
                                                </div>
                                            </div>
                                        </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  CTO's Phone
                                </a>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="card-block">
                               <div class="row text-center">
                                        <div class="col-md-6">
                                            <div class="benName">
                                                <h4>CTO<span>-417-879-60000</span></h4>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary">TopUp History <i class="fa fa-history" aria="hidden"></i></button>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <h4 class="border">Choose Amount</h4>
                                            <form method="post">
                                              <div class="top-up-btn">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>500</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>1000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>2000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>5000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>10000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>100000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <input class="network-type" type="hidden" name="network_type" value="">
                                                  <input class="data-type" type="hidden" name="data_type" value="">
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Chairman's Phone
                                </a>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                              <div class="card-block">
                               <div class="row text-center">
                                        <div class="col-md-6">
                                            <div class="benName">
                                                <h4>Chairman<span>-417-879-60000</span></h4>
                                            </div>
                                            <div>
                                                <button class="btn histoty-btn">TopUp History <i class="fa fa-history" aria="hidden"></i></button>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <h4 class="border">Choose Amount</h4>
                                            <form method="post">
                                              <div class="top-up-btn">
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>500</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>1000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>2000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <div class="row">
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>5000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>10000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-md-4">
                                                        <div class="ck-button">
                                                          <label>
                                                            <input type="checkbox" name=""> <span>100000</span>
                                                          </label>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <input class="network-type" type="hidden" name="network_type" value="">
                                                      <input class="data-type" type="hidden" name="data_type" value="">
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                           <div class="card">
                            <div class="card-header" role="tab" id="headingFour">
                              <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Chef's Phone
                                </a>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                              <div class="card-block">
                                <div class="row text-center">
                                        <div class="col-md-6">
                                            <div class="benName">
                                                <h4>Chef<span>-417-879-60000</span></h4>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary">TopUp History <i class="fa fa-history" aria="hidden"></i></button>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <h4 class="border">Choose Amount</h4>
                                            <form method="post">
                                            <div class="top-up-btn">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="ck-button">
                                                        <label>
                                                          <input type="checkbox" name=""> <span>10000</span>
                                                        </label>
                                                      </div>
                                                    </div>
                                                </div>
                                                <input class="network-type" type="hidden" name="network_type" value="">
                                                      <input class="data-type" type="hidden" name="data_type" value="">
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                    <div class="col-md-5" id="dataTopUp">
                        <div class="text-center benHeader">
                             <h2>TopUp Data Balance</h2>
                        </div>
                        <div class="row">
                            <div class="switch-field">
                              <input type="radio" id="switch_mtn" name="network" value="mtn" checked/>
                              <label for="switch_mtn"><img src="img/mtn.png"></label>
                              <input type="radio" id="switch_airtel" name="network" value="airtel" />
                              <label for="switch_airtel"><img src="img/airtel.png"></label>
                              <input type="radio" id="switch_9mobile" name="network" value="9mobile" />
                              <label for="switch_9mobile"><img src="img/9mobile.png"></label>
                              <input type="radio" id="switch_glo" name="network" value="glo" />
                              <label for="switch_glo"><img src="img/glo.png"></label>
                            </div>
                        </div>
                        <div class="data-bundles">
                        <!-------------------------- MTN Bundle ---------------->
                          <div class="box mtn">
                            <div class="data-buddles-field">
                              <input type="radio" id="switch_mtn_100" name="dataPlan" value="100" />
                              <label for="switch_mtn_100">
                                <div>
                                  <p class="data-allocated">30mb</p>
                                  <p class="data-bundle-duration">1 day</p>
                                  <p class="data-amount">100</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_mtn_500" name="dataPlan" value="500" />
                              <label for="switch_mtn_500">
                                <div>
                                  <p class="data-allocated">750mb</p>
                                  <p class="data-bundle-duration">7 days</p>
                                  <p class="data-amount">500</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_mtn_1000" name="dataPlan" value="1000" />
                              <label for="switch_mtn_1000">
                                <div>
                                  <p class="data-allocated">1.5gb</p>
                                  <p class="data-bundle-duration">30 days</p>
                                  <p class="data-amount">1000</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_mtn_2000" name="dataPlan" value="2000" />
                              <label for="switch_mtn_2000">
                                <div>
                                  <p class="data-allocated">3.5gb</p>
                                  <p class="data-bundle-duration">30 days</p>
                                  <p class="data-amount">2000</p>
                                </div>
                              </label>
                            </div>
                          </div>
                          <!-------------  Airtel Data ---------------->
                          <div class="box airtel">
                            <div class="data-buddles-field">
                              <input type="radio" id="switch_airtel_100" name="dataPlan" value="100" />
                              <label for="switch_airtel_100">
                                <div>
                                  <p class="data-allocated">30mb</p>
                                  <p class="data-bundle-duration">1 day</p>
                                  <p class="data-amount">100</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_airtel_500" name="dataPlan" value="500" />
                              <label for="switch_airtel_500">
                                <div>
                                  <p class="data-allocated">750mb</p>
                                  <p class="data-bundle-duration">7 days</p>
                                  <p class="data-amount">500</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_airtel_1000" name="dataPlan" value="1000" />
                              <label for="switch_airtel_1000">
                                <div>
                                  <p class="data-allocated">1.5gb</p>
                                  <p class="data-bundle-duration">30 days</p>
                                  <p class="data-amount">1000</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_airtel_2000" name="dataPlan" value="2000" />
                              <label for="switch_airtel_2000">
                                <div>
                                  <p class="data-allocated">3.5gb</p>
                                  <p class="data-bundle-duration">30 days</p>
                                  <p class="data-amount">2000</p>
                                </div>
                              </label>
                              <input type="radio" id="switch_airtel_2500" name="dataPlan" value="2500" checked/>
                              <label for="switch_airtel_2500">
                                <div>
                                  <p class="data-allocated">5gb</p>
                                  <p class="data-bundle-duration">30 days</p>
                                  <p class="data-amount">2500</p>
                                </div>
                              </label>
                            </div>
                          </div>
                          <!-----------------  9mobile data plans ------------------>
                          <div class="box 9mobile">
                            <div class="data-buddles-field">
                                <input type="radio" id="switch_9mobile_200" name="dataPlan" value="200" checked/>
                                <label for="switch_9mobile_200">
                                  <div>
                                    <p class="data-allocated">200mb</p>
                                    <p class="data-bundle-duration">7 days</p>
                                    <p class="data-amount">500</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_9mobile_1000" name="dataPlan" value="1000" checked/>
                                <label for="switch_9mobile_1000">
                                  <div>
                                    <p class="data-allocated">1gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">1000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_9mobile_2000" name="dataPlan" value="2000" checked/>
                                <label for="switch_9mobile_2000">
                                  <div>
                                    <p class="data-allocated">2.5gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">2000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_9mobile_2500" name="dataPlan" value="2500" checked/>
                                <label for="switch_9mobile_2500">
                                  <div>
                                    <p class="data-allocated">3.5gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">2500</p>
                                  </div>
                                </label>
                              </div>
                            </div>
                            <!------------------ glo bundle ------------>
                            <div class="box glo">
                              <!--
                              <div class="data-buddles-field">
                                <input type="radio" id="switch_glo_3200" name="dataPlan" value="3200" checked/>
                                <label for="switch_glo_3200">
                                  <div>
                                    <p class="data-allocated">3.2gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">1000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_7500" name="dataPlan" value="7500" checked/>
                                <label for="switch_glo_7500">
                                  <div>
                                    <p class="data-allocated">7.5gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">2000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_10000" name="dataPlan" value="10000" checked/>
                                <label for="switch_glo_10000">
                                  <div>
                                    <p class="data-allocated">10gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">2500</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_12000" name="dataPlan" value="12000" checked/>
                                <label for="switch_glo_12000">
                                  <div>
                                    <p class="data-allocated">12gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">3000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_16000" name="dataPlan" value="6000" checked/>
                                <label for="switch_glo_16000">
                                  <div>
                                    <p class="data-allocated">16gb</p>
                                    <p class="data-bundle-duration">60 days</p>
                                    <p class="data-amount">4000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_24000" name="dataPlan" value="24000" checked/>
                                <label for="switch_glo_24000">
                                  <div>
                                    <p class="data-allocated">24gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">5000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_32gb" name="dataPlan" value="32000" checked/>
                                <label for="switch_glo_32000">
                                  <div>
                                    <p class="data-allocated">32gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">8000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_46000" name="dataPlan" value="46000" checked/>
                                <label for="switch_glo_46000">
                                  <div>
                                    <p class="data-allocated">46gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">10000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_60000" name="dataPlan" value="60000" checked/>
                                <label for="switch_glo_60gb">
                                  <div>
                                    <p class="data-allocated">60gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">15000</p>
                                  </div>
                                </label>
                                <input type="radio" id="switch_glo_90000" name="dataPlan" value="90000" checked/>
                                <label for="switch_glo_90gb">
                                  <div>
                                    <p class="data-allocated">90gb</p>
                                    <p class="data-bundle-duration">30 days</p>
                                    <p class="data-amount">18000</p>
                                  </div>
                                </label>
                              </div>
                            </div>-->
                        </div>
                        <button class="btn btn-primary btn-block">TOP ALL</button>
                       

                    </div>
                </div>
                
            </div>
        </div>

      </div>
        <!---Modal for transaction history-->
    <div class="modal fade" id="transaction-history">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Transaction History</h4>
              </div>
              <div class="modal-body">
              <div class="box-header with-border">
                <h3 class="box-title"> Details</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" value="johseph.mbassey2@gmail.com"  type="Email" disabled>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" value="Jonesky"  type="text" disabled>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" value="***********"  type="Password" disabled>
                </div>

                <div class="form-group">
                  <label>Api Id</label>
                  <input class="form-control" value="jjdcjf68fv25s8dxe4cvvrf8r8frf"  type="text" disabled>
                </div>
                 <div class="form-group">
                  <label>Top-Up Amount</label>
                  <input class="form-control"  type="text" >
                </div>
                <div class="pagination">
                    <ul>
                      <i><a href="">previous</a></li>
                      <li class="active"><a href="">1</a></li>
                      <li><a href="">2</a></li>
                      <li><a href="">3</a></li>
                      <li><a href="">4</a></li>
                      <i><a href="">last</a></li>
                    </ul>
                </div>
                <div class="controls">
                   <button type="button" class="btn btn-default">Cancel</button>
                </div>
              </form>

              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>-->
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <!--Customize javascript -->

   
    <script type="text/javascript" src="js/phonetopup.js"></script>
@endsection
