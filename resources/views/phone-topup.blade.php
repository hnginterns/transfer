
@extends('layouts.user')

@section('title')
      Phone TopUp
@endsection
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link href="/css/style1.css" rel="stylesheet">

<div class="row">
    <div class="col col-lg-2 side-bar hidden-sm hidden-xs">
        <div class="sidy">
            <ul class="nav-list">
                <li class="side-items">
                    <a href="" class="side-item">Dashboard</a>
                </li>
                <li class="side-items">
                    <a href="" class="side-item">Wallet View</a>
                </li>
                <li class="side-items">
                    <a href="" class="side-item">Accounts</a>
                </li>
                <li class="side-items">
                    <a href="" class="side-item active">Phone TopUp</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col col-lg-10 col-md-10 col-sm-12">
        <div class="container">
            <div class="row" style="margin-top: 50px">
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="balance text-center">
                        <h3>TopUp Wallet Balance</h3>
                        <?php
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL =>
                        "https://mobileairtimeng.com/httpapi/balance.php?userid=%2008189115870&pass=dbcc49ee2fba9f150c5e82",
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
                    </div>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12">
                    <div class="header text-center">
                        <p>Refill Topup Wallet</p>
                    </div>

                    <form name="rave-form" id="rave-pay" class="admin-login topUp text-center">
                        <h6>Select an amount</h6>
                        <div class="row button-row">
                            <div class="col col-12 sec">
                                <button class="btn btn-primary custom-button" type="button" data-amount="500">N500
                                </button>
                                <button class="btn btn-primary custom-button" type="button" role="button"
                                        data-amount="1000">N1,000
                                </button>
                                <button class="btn btn-primary custom-button" type="button" role="button"
                                        data-amount="2000">N2,000
                                </button>
                            </div>
                        </div>
                        <div class="row button-row">
                            <div class="col col-12 sec">
                                <button class="btn btn-primary custom-button" type="button" data-amount="3000">N3,000
                                </button>
                                <button class="btn btn-primary custom-button" type="button" data-amount="4000">N4,000
                                </button>
                                <button class="btn btn-primary custom-button" type="button" data-amount="5000">N5,000
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Refill</button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="header text-center">
                    <p>Top Up Prepaid Mobile Phone</p>
                </div>
                <form action="/script.php" class="admin-login topUp" id="recharge" method="post">
                    <h5>Select recharge amount</h5>
                    <div class="row button-row">
                        <div class="col col-12">
                            <button class="btn btn-primary custom-button" type="button" data-amount="500">N500
                            </button>
                            <button class="btn btn-primary custom-button" type="button" role="button"
                                    data-amount="1000">N1,000
                            </button>
                            <button class="btn btn-primary custom-button" type="button" role="button"
                                    data-amount="2000">N2,000
                            </button>
                        </div>
                    </div>
                    <div class="row button-row">
                        <div class="col col-12">
                            <button class="btn btn-primary custom-button" type="button" data-amount="3000">N3,000
                            </button>
                            <button class="btn btn-primary custom-button" type="button" data-amount="4000">N4,000
                            </button>
                            <button class="btn btn-primary custom-button" type="button" data-amount="5000">N5,000
                            </button>
                        </div>
                    </div>
                    <div class="form-group" style="margin: 30px 0;">
                        <select class="form-control cus-input" name="benNumber" id="benNumber">
                            <option>Select beneficiary Number</option>
                            <option value="081483844">Chef's Line - 08138838383</option>
                            <option value="081483844">Chef Line - 08138838383</option>
                            <option value="081483844">Director's Line - 08138838383</option>
                            <option value="081483844">Queen's Line - 08138838383</option>
                            <option value="081483844">Manager's line - 08138838383</option>
                        </select>
                    </div>
                    <input type="number" name="amount" class="hide">
                    <div>
                        <button class="btn btn-primary custom-button" type="submit">Top Up</button>
                        <button class="btn btn-primary custom-button" type="button">History</button>
                    </div>
                </form>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="header text-center">
                    <p>TopUp Data Plans</p>
                </div>
                <form action="/datascript.php" class="admin-login topUp text-center" id="data-top">
                    <h5>Networks List</h5>
                    <ul class="providers-list">
                        <li class="provider"><img class="prov-img" src="/img/1.png" alt="9mobile"></li>
                        <li class="provider"><img class="prov-img" src="/img/2.png" alt="mtn"></li>
                        <li class="provider"><img class="prov-img" src="/img/3.png" alt="airtel"></li>
                        <li class="provider"><img class="prov-img" src="/img/4.png" alt="glo"></li>
                    </ul>
                    <h5>Data Plans</h5>
                    <div class="plans">
                        <div class="data-plan" data-amount="1000">
                            <p class="tp">1.5G</p>
                            <p class="tp">N1,000</p>
                        </div>
                        <div class="data-plan" data-amount="3000">
                            <p class="tp">2G</p>
                            <p class="tp">3,000</p>
                        </div>
                        <div class="data-plan" data-amount="3500">
                            <p class="tp">2.5G</p>
                            <p class="tp">N3,500</p>
                        </div>
                        <div class="data-plan" data-amount="7500">
                            <p class="tp">5G</p>
                            <p class="tp">N7,500</p>
                        </div>
                        <div class="data-plan" data-amount="15000">
                            <p class="tp">10G</p>
                            <p class="tp">N15,000</p>
                        </div>
                    </div>
                    <input type="number" class="hide" name="amount">
                    <button class="btn btn-primary"> TopUp All</button>
                </form>
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script type="text/javascript" src="wallet.js"></script>
<script>
    const raveForm = document.querySelector('#rave-pay');
    const recharge = document.querySelector('#recharge');
    const provider = document.querySelector('.providers-list');
    const plans = document.querySelector('#data-top');

    raveForm.addEventListener('click', selectButton);
    recharge.addEventListener('click', selectButton);
    provider.addEventListener('click', selectProvider);
    plans.addEventListener('click', selectPlan);

    function selectButton(e) {
        if (e.target.classList.contains('custom-button')) {
            let input = this['amount'];
            let buttons = [...this.querySelectorAll('.custom-button')];

            buttons.forEach(button => {
                button.classList.remove('selected')
            });
            e.target.classList.add('selected');
            if (input)input.value = e.target.dataset.amount;
        }
    }

    function selectProvider(e) {
        if (e.target.classList.contains('prov-img')) {
            let imgs = [...this.querySelectorAll('.prov-img')];
            imgs.forEach(img => {
                img.classList.remove('img-selected')
            });
            e.target.classList.add('img-selected');
        }
    }


    function selectPlan(e) {
        if (e.target.classList.contains('data-plan') || e.target.classList.contains('tp')) {
            let input = this['amount'];
            let plans = [...this.querySelectorAll('.data-plan')];

            plans.forEach(plan => {
                plan.classList.remove('selected')
            });
            if (e.target.classList.contains('tp')) {
                e.target.parentElement.classList.add('selected');
                input.value = e.target.parentElement.dataset.amount;
            } else {
                e.target.classList.add('selected');
                input.value = e.target.dataset.amount;
            }
        }
    }

</script>
@endsection