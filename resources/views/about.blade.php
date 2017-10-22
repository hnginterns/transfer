@extends('layouts.pages')
@section('main-text', 'Make money transfers sweet as pie')
@section('sub-text', 'TransferRules lets you receive payments locally and globally with no hassles and zero set up fees')
@section('content')

<!-- SECTION ONE BEGINS -->

<div id="section-1">
    <div id="about">
        <div id="about-text">
            <p id="heading">about</p>
            <p>
                Our mission is to get people who are ready to work in an environment where they have to tackle real work issues. With minimal guidance, instinct kicks and the best ones come out of the lot and start the second phase of the internship where the tasks get increasingly harder.
            </p>
        </div>
        <img id="about-img" src="img/wallet.png">
    </div>
</div>

<!-- SECTION ONE ENDS -->

<!-- SPACER -->

<div id="spacer">
    <p id="heading">Our Sponsors</p>
    <p id="sub-heading">
        We're not in this alone. Transfer Rules is funded and advised by top venture capital firms and investors
    </p>

    <div id="sponsors">
        <img src="img/sponsor1.png" alt="sponsor - hotelsng">
        <img src="img/sponsor2.png" alt="sponsor - flutterwave">
        <img src="img/sponsor3.png" alt="sponsor - rave">
    </div>
</div>

<!-- SPACER ENDS-->

<!-- SECTION 2 -->

<div id="section-2">
    <div>
        <p id="heading">
            Already registered on TransferRules? 
        </p>
        <p id="sub-heading">
           Transfer funds today,  It’s simple, no stress, no fuss.
        </p>
        <button id="get-started"><a href="https://finance.hotels.ng/login">Sign in</a></button>
    </div>
    <img src="img/get-started.png" alt="get started image">
</div>

<!-- SECTION 2 ENDS -->

@endsection
