
@extends('layouts.user')

@section('title')
      Phone TopUp
@endsection
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link href="/css/style1.css" rel="stylesheet">

<div class="row">
       <div class="col col-12">
         <div class="container">
                <div class="row" style="margin: 50px 0 0">
                    <div class="col col-lg-6 col-md-12 col-sm-12">
                        <div class="balance text-center">
                            <h6>Available balance in wallet</h6>

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
                        echo "<h5 class='balance-text'> cURL Error #:" . $err . "</h5>";
                        } else {
                        echo "<h5 class='balance-text'>" .$response . "</h5>";
                        }
                        ?>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-12 col-sm-12" style="border-left: 1px solid rgba(0,0,0,0.2); padding: 10px 15px;">
                        <h5 style="font-weight: 600">Refill Topup Wallet</h5>

                        <form name="rave-form" id="rave-pay" class="admin-login topUp text-center">
                            <h6>Select an amount</h6>
                            <div class="row button-row">
                                <div class="col col-12 sec">
                                    <button class="btn btn-primary custom-button" type="button" data-amount="500">N500
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" role="button" data-amount="1000">N1,000
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" role="button" data-amount="2000">N2,000
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
                            <!-- <button type="submit" class="btn btn-primary">Refill</button> -->
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row" id="app" style="max-width: 100%; margin: 0">
                <div class="header topUp text-center">
                    <h5 class="header-text">Top Up Prepaid Mobile Phone</h5>
                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12" style="padding: 20px;">
                    <div class="list-group">
                        <a @click.prevent="selectNumber(beneficiary)" v-for="beneficiary of beneficiaries" class="list-group-item list-group-item-action ben-list flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">@{{beneficiary.name}}</h5>
                            </div>
                            <p class="mb-1">@{{beneficiary.number}}</p>
                            <button class="btn btn-warning btn-sm hue-bg">TopUp</button>
                        </a>
                    </div>

                </div>
                <div class="col col-lg-6 col-md-12 col-sm-12" style="padding: 0 10px">
                    <div class="alert alert-success" role="alert" v-if="success" style="margin: 10px 0;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="success = !success">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        You've added a beneficiary for top up
                    </div>
                    <template v-if="editing">
                        <form class="admin-login topUp" id="recharge" @submit.prevent="submit()">
                            <div class="alert alert-danger" role="alert" v-show="error">
                                Please ensure that the form is complete before submitting!
                            </div>
                            <h5 class="subheader">Select Network Provider</h5>
                            <div class="form-group" style="margin: 30px 0;">
                                <!-- <select class="form-control" name="benNumber" id="benNumber" v-model="selected.provider">
                                <option value="">Select Network Provider</option>
                                <option v-for="line of providers" :value="line.code">@{{line.name}}</option>
                            </select> -->
                                <ul class="providers-list">
                                    <li class="provider" @click="selectProvider(line.code, line.name)" v-for="line of providers">
                                        <img :class="{'img-selected': selected.providerId === line.code}" :src="line.icon" :alt="line.name">
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <h5 class="subheader">Select recharge amount</h5>
                            <div class="row button-row">
                                <div class="col col-12">
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(500)" :class="{selected: selected.amount === 500}">N500
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(1000)" :class="{selected: selected.amount === 1000}">N1,000
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(2000)" :class="{selected: selected.amount === 2000}">N2,000
                                    </button>
                                </div>
                            </div>
                            <div class="row button-row">
                                <div class="col col-12">
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(3000)" :class="{selected: selected.amount === 3000}">N3,000
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(4000)" :class="{selected: selected.amount === 4000}">N4,000
                                    </button>
                                    <button class="btn btn-primary custom-button" type="button" @click="selectAmount(5000)" :class="{selected: selected.amount === 5000}">N5,000
                                    </button>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" style="margin: 30px 0;">
                                <select class="form-control" name="benNumber" id="benNumber" v-model="selected.dataPlan">
                                    <option value="">
                                        <template v-if="selected.provider === ''"> Select network to view their data plans</template>
                                        <template v-else>Select a plan</template>
                                    </option>
                                    <option value="" v-if="noPlan">Sorry we don't provide plans for that network</option>
                                    <option v-if="!noPlan" v-for="plan of selectedPlan.plans" :value="plan.price">@{{plan.data}}</option>
                                </select>
                            </div>
                            <button class="btn btn-primary sub" type="submit">Finish</button>
                            <button class="btn btn-primary sub" type="reset" @click="editing = !editing">Cancel</button>

                        </form>
                    </template>
                    <template v-else-if="!editing && topUpList.length">
                        <div class="list-group" style="margin: 15px 0">
                            <a href="#" @click.prevent="" class="list-group-item list-group-item-action flex-column align-items-start" v-for="(item, index) of topUpList">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"> @{{item.name}} </h5>
                                    <span class="badge" :class="badgeColor(item.provider)">@{{item.provider}}</span>
                                </div>
                                <p class="mb-1"> @{{item.number}} </p>
                                <div>
                                    <span class="badge badge-dark" v-if="item.amount">N@{{item.amount}}</span>
                                    <span class="badge badge-secondary" v-if="item.dataPlan">N@{{item.dataPlan}}</span>
                                </div>

                                <button class="btn btn-danger btn-sm" @click="remove(index)" style="border-radius: 23px; margin: 10px 0; cursor: pointer">Remove</button>

                            </a>
                        </div>
                        <div class="text-center">

                            <button class="btn btn-primary custom-button topUp">Top Up All</button>
                            <button class="btn btn-primary custom-button topUp" data-toggle="modal" data-target="bs-example-modal-lg">History</button>
                        </div>
                    </template>
                    <template v-else>
                        <div class="text-center py-5">
                            <h5 class="subheader white-text">Select a beneficiary in the left area to top up</h5>
                            <p class="white-text">Then submit the form to add to list</p>
                        </div>
                    </template>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title heading" id="gridSystemModalLabel">Top Up Details Page</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="subheading">
                                This Week - September,2017
                            </p>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-5">
                            <p>
                                <span class="subheading">Approved by:</span> Admin
                            </p>
                        </div>
                    </div>
                    <hr/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Network Provider</th>
                                    <th>Amount</th>
                                    <th>TopUp description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Thursday</td>
                                    <td>9:56pm</td>
                                    <td class="text-center">
                                        <img src="../images/call.png" alt="call">
                                    </td>
                                    <td>Amount</td>
                                    <td>TopUp description</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>9:56pm</td>
                                    <td class="text-center">
                                        <img src="../images/call.png" alt="call">
                                    </td>
                                    <td>Amount</td>
                                    <td>TopUp description</td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>9:56pm</td>
                                    <td class="text-center">
                                        <img src="../images/call.png" alt="call">
                                    </td>
                                    <td>Amount</td>
                                    <td>TopUp description</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn buttone custom-button btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
     <script src="https://unpkg.com/vue"></script>
    <!--<script src="js/vue.js"></script>-->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

    <script>
        const app = new Vue({
            el: '#app',
            data: {
                selected: {
                    name: '',
                    number: '',
                    amount: '',
                    dataPlan: '',
                    provider: '',
                    providerId: ' '
                },
                editing: false,
                topUpList: [],
                noPlan: false,
                beneficiaries: [{
                        name: 'John',
                        number: '08138383833'
                    },
                    {
                        name: 'Peter',
                        number: '08153343222'
                    }, {
                        name: 'Inyene',
                        number: '08149320235'
                    }, {
                        name: 'Chef John',
                        number: '08183838334'
                    }
                ],
                error: false,
                success: false,
                providers: [{
                        name: 'MTN',
                        code: 15,
                        icon: "images/2.png"
                    },
                    {
                        name: 'Airtel',
                        code: 1,
                        icon: "images/3.png"
                    },
                    {
                        name: '9Mobile',
                        code: 2,
                        icon: "images/1.png"
                    },
                    {
                        name: 'GLO',
                        code: 6,
                        icon: "images/4.png"
                    }
                ],
                dataPlans: {
                    "15": {
                        plans: [{
                                data: 30,
                                price: 100
                            },
                            {
                                data: 750,
                                price: 500
                            },
                            {
                                data: 1500,
                                price: 1000
                            },
                            {
                                data: 3500,
                                price: 2000
                            }
                        ]
                    },
                    "2": {
                        plans: [{
                                data: 200,
                                price: 200
                            },
                            {
                                data: 1000,
                                price: 1000
                            },
                            {
                                data: 1500,
                                price: 1200
                            },
                            {
                                data: 2500,
                                price: 2000
                            },
                            {
                                data: 3500,
                                price: 2500
                            }
                        ]
                    },
                    "1": {
                        plans: [{
                                data: 30,
                                price: 100
                            },
                            {
                                data: 100,
                                price: 200
                            },
                            {
                                data: 750,
                                price: 500
                            },
                            {
                                data: 1500,
                                price: 1000
                            },
                            {
                                data: 3500,
                                price: 2000
                            },
                            {
                                data: 5000,
                                price: 2500
                            }
                        ]
                    }
                }

            },
            methods: {
                selectNumber: function (beneficiary) {
                    this.selected.name = beneficiary.name;
                    this.selected.number = beneficiary.number;
                    this.editing = true;
                    this.success = false;
                },
                selectProvider: function (providerId, provider) {
                    this.selected.provider = this.selected.provider === provider ? '' : provider;
                    this.selected.providerId = this.selected.providerId === providerId ? '' : providerId
                },
                selectAmount: function (amount) {
                    this.selected.amount = this.selected.amount === amount ? '' : amount;
                },
                remove: function (index) {
                    this.topUpList.splice(index, 1)
                },
                submit: function () {
                    let sel = this.selected;
                    if (sel.provider !== '' && ((sel.amount === '' && sel.dataPlan !== '') || (sel.amount !==
                            '' && sel.dataPlan === '') || (sel.amount !== '' && sel.dataPlan !== ''))) {
                        this.topUpList.push(this.selected);
                        this.editing = false;
                        this.selected = {
                            name: '',
                            number: '',
                            amount: '',
                            dataPlan: '',
                            provider: '',
                            providerId: ' '
                        }
                        this.success = true;
                        this.error = false;
                        return
                    } else {
                        this.error = true;
                    }
                },
                badgeColor: function (name) {
                    switch (name) {
                        case 'MTN':
                            return 'badge-warning'
                            break;

                        case 'Airtel':
                            return 'badge-danger'
                            break;
                        case '9Mobile':
                            return 'badge-success'
                            break
                        case 'GLO':
                            return 'badge-success'
                            break;
                        case 'Visaphone':
                            return 'badge-danger'
                            break;
                        default:
                            return 'badge-primary'
                            break
                    }
                }
            },
            computed: {
                selectedPlan: function () {
                    if (this.selected.providerId !== '') {
                        if (this.dataPlans[this.selected.providerId]) {
                            this.noPlan = false;
                            return this.dataPlans[this.selected.providerId]
                        } else {
                            this.noPlan = true;
                            return {}
                        }
                    } else {
                        return {};
                    }
                }
            }
        })
    </script>@endsection