<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Template</title>
    <!-- CSS -->
    <link href="{{public_path('assets/css/style.css')}}" type="text/css" media="all" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700" />
</head>
<body>
    <div class="body-wrapper">
        <div class="page-des">
            <h4>allergy prescription mix receipt</h4>
            <img src="{{public_path('assets/images/logo.png')}}" alt="logoimg">
            <div class="clear"></div>
        </div>
        <ul class="address">
            <li>
                <img class="person-img" src="{{public_path('assets/images/person.png')}}" alt="">
                <h6>Zoë M. Harrold</h6><span> | </span><p>DOB: 11/01/1990</p> <span> | </span> <p>MRN:369452</p>
            </li>
            <li>
                <img class="person-img" src="{{public_path('assets/images/calender.png')}}" alt="">
                <p>Visit: 08/10/2018</p></li>
            <li>
                 <img class="person-img" src="{{public_path('assets/images/location.png')}}" alt="">
                <p>Baker Allergy and Asthma 9495 SW Locust St. Suite A, Tigard, OR 97223   </p>
            </li>
        </ul>
        <hr id="space1">
        <div class="prescription">
            <h3>Prescription Overview</h3>
            <ul>
                <li>
                    <img id="presc" src="{{public_path('assets/images/doc-check.png')}}" alt="">
                    <p>Prescribing provider: James W. Baker, MD</p>
                    <p>Signed 08/29/2018 by James W. Baker, MD</p>
                </li>
                <li>
                    <h5>Reason for Prescription
                    <img id="docimg" src="{{public_path('assets/images/doc.png')}}" alt="">
                    </h5>
                    <p>Allergy immunotherapy treatment of</p>
                    <p class="pnd">J30.1 - allergic rhinitis due to pollen</p>
                    <p class="prd">J30.1 - allergic rhinitis due to animal dander</p>
                </li>
            </ul>
        </div>
        <div class="bar-wrapper">
            <div class="expiration">
                <ul>
                    <img id="bottleimg" src="{{public_path('assets/images/tree.png')}}" alt="">
                    <li><h5>Mixed by</h5><p>Luke Barrat</p></li>
                    <li><h5>Mixed on</h5><p>09/01/2018</p></li>
                    <li><h5>Expiration</h5><p>09/01/2019</p></li>
                </ul>
            </div>
            <div class="barcode">
                <img src="{{public_path('assets/images/barcode.png')}}" alt="barcode">
            </div>
            <div class="clear"></div>
        </div>
        <hr id="space2">
        <div class="bottle-wrapper">
            <div class="bottle-info">
                <img id="bottle-information" src="{{public_path('assets/images/bottle.png')}}" alt="">
                <ul>
                    <li><h5>Bottle name</h5><p>TRS/GRS Vial 1</p></li>
                    <li><h5>Type</h5><p>New</p></li>
                </ul>
            </div>
            <div class="bottle-color">
                <table >
                    <tr style="text-align:center;">
                        <td>1:10,000</td>
                        <td>1:1,000</td>
                        <td>1:100</td>
                        <td>1:10</td>
                        <td>1:1</td>
                    </tr>
                    <tr>
                        <td><img src="{{ base_path() }}/public/assets/images/icon1.png"></td>
                        <td><img src="{{ base_path() }}/public/assets/images/icon2.png"></td>
                        <td><img src="{{ base_path() }}/public/assets/images/icon3.png"></td>
                        <td><img src="{{ base_path() }}/public/assets/images/icon4.png"></td>
                        <td><img src="{{ base_path() }}/public/assets/images/icon5.png"></td>
                        
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
        </div>
        <table class="Extract">
            <thead>
                <tr>
                    <th>Extract</th>
                    <th>Dose (at 1:1)</th>
                    <th>Dilution</th>
                    <th>units</th>
                    <th>Lot#</th>
                    <th>outdate</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tree Mix 1</td>
                    <td >0.5 mL</td>
                    <td >1:20</td>
                    <td>W/V</td>
                    <td>TM5642</td>
                    <td>12/25/2019</td>
                </tr>
                <tr>
                    <td>Fescue</td>
                    <td>0.2 mL</td>
                    <td>1000</td>
                    <td>BAU/ml</td>
                    <td>FC1112</td>
                    <td>12/25/2019</td>
                </tr>
                <tr>
                    <td>johnson</td>
                    <td>0.3 mL</td>
                    <td>1:20</td>
                    <td>BAU/ml</td>
                    <td>TM5642</td>
                    <td>12/25/2019</td>
                </tr>
            </tbody>
        </table>
        <table class="dillute">
            <thead>
                <tr>
                    <th>Diluents</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>HSA Saline</td>
                    <td>4ml</td>
                </tr>
            </tbody>
        </table>
        <table class="dillute totalamounts">
            <thead>
                <tr>
                    <th colspan=2>Total Amounts</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Extract</td>
                    <td>1ml</td>
                </tr>
                <tr>
                    <td>Diluents</td>
                    <td>4ml</td>
                </tr>
                <tr>
                    <td>% Glycerin</td>
                    <td>4ml</td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
    </script>
</body>
</html>