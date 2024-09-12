<?php 
include_once "header.php";
?>
<div class="content">
    <div class="container-fluid px-5 mb-5 mt-3">
        <div class="contents px-5">
            <div class="row">
                <div class="col-12 mb-3">
                    <h1 class="mb-0">'Planting's Name' Corn Planting Information</h1>
                </div>                
                <div class="col-12 mb-3 d-flex justify-content-end">
                <a href="addPlanting.php" class="btn btn-primary mx-5">Edit Information</a>
                </div>
                <div class="col-12 mb-3">
                <h4 class="h4 mb-0">General Info</h4>
                    <hr class="bg-dark my-2" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Name:<span class="ms-2 text-dark">Corn</span></p>
                        <p class="h6 mb-1 text-primary">Variety:<span class="ms-2 text-dark">Dent Corn</span></p>
                        <p class="h6 mb-1 text-primary">Latin Name:<span class="ms-2 text-dark">Zea Mays</span></p>
                        <p class="h6 mb-1 text-primary">Genus:<span class="ms-2 text-dark">Zea</span></p>
                        <p class="h6 mb-1 text-primary">Country Origin:<span class="ms-2 text-dark">U.S.A.</span></p>
                        <p class="h6 mb-1 text-primary">Planted On (Date)<!-- Calendar -->:<span class="ms-2 text-dark">12/04/2024</span></p>
                        <p class="h6 mb-1 text-primary">Planted In (Field)<!-- Dropdown -->:<span class="ms-2 text-dark">Field 1</span></p>
                        <p class="h6 mb-1 text-primary">Average Height:<span class="ms-2 text-dark">243 cm</span></p>
                        <p class="h6 mb-1 text-primary">Average Spread:<span class="ms-2 text-dark">35 cm</span></p>
                        <p class="h6 mb-1 text-primary">Internal ID:<span class="ms-2 text-dark">P001</span></p>
                        <p class="h6 mb-1 text-primary">Notes:<span class="ms-2 text-dark">The corn, while a bit burnt...</span></p>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h4 class="h4 mb-0">Soil/Sun Conditions</h4>
                    <hr class="bg-dark my-2" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Soil Type:<span class="ms-2 text-dark">Brown Soil</span></p>
                        <p class="h6 mb-1 text-primary">Planting Method:<span class="ms-2 text-dark">Direct Seeded</span></p>
                        <p class="h6 mb-1 text-primary">Sun Requirements<!-- Dropdown -->:<span class="ms-2 text-dark">Full Sun</span></p>
                        <p class="h6 mb-1 text-primary">Pest/Disease Resistance:<span class="ms-2 text-dark">Mites</span></p>
                        <p class="h6 mb-1 text-primary">Fertilizer Requirements:<span class="ms-2 text-dark">Cow Fertilizer, Natural</span></p>
                        <p class="h6 mb-1 text-primary">Ideal Soil pH level:<span class="ms-2 text-dark">8.3</span></p>
                        <p class="h6 mb-1 text-primary">Vertical Spacing:<span class="ms-2 text-dark">14 cm</span></p>
                        <p class="h6 mb-1 text-primary">Horizontal Spacing:<span class="ms-2 text-dark">6 cm</span></p>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <h4 class="h4 mb-0">Watering and Yield</h4>
                    <hr class="bg-dark my-2" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Watering Quantity:<span class="ms-2 text-dark">1500l/day</span></p>
                        <p class="h6 mb-1 text-primary">Watering Cycle:<span class="ms-2 text-dark">2/day</span></p>
                        <p class="h6 mb-1 text-primary">Watering Times:<span class="ms-2 text-dark">10:00, 20:00</span></p>
                        <p class="h6 mb-1 text-primary">Growth Rate:<span class="ms-2 text-dark">8.4 cm/week</span></p>
                        <p class="h6 mb-1 text-primary">Expected Harvest Date:<!-- Calendar --><span class="ms-2 text-dark">14/09/2024</span></p>
                        <p class="h6 mb-1 text-primary">Actual Harvest Date:<!-- Calendar, placeholder if the user hasn't added anything should be '-' --><span class="ms-2 text-dark">17/09/2024</span></p>
                        <p class="h6 mb-1 text-primary">Expected Yield:<span class="ms-2 text-dark">4000 kg</span></p>
                        <p class="h6 mb-1 text-primary">Actual Yield:<span class="ms-2 text-dark">3458 kg</span></p>
                    </div>
                </div>
                <div class="col-12 mb-3">
                <h4 class="h4 mb-0">Finances</h4>
                    <hr class="bg-dark my-2" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Cost of Investment:<span class="ms-2 text-dark">2100€</span></p>
                        <p class="h6 mb-1 text-primary">Market Price at Harvest:<span class="ms-2 text-dark">1€/kg</span></p>
                        <p class="h6 mb-1 text-primary">Revenue:<span class="ms-2 text-dark">2700€</span></p>
                        <p class="h6 mb-1 text-primary">Profit/Loss:<span class="ms-2 text-dark">600€</span></p>
                    </div>
                </div>
                <div class="col-12 mb-3">
                <h4 class="h4 mb-0">Harvesting</h4>
                    <hr class="bg-dark my-2" style="margin-right: 420px;">
                    <div class="ms-3" id="layout-body">
                        <p class="h6 mb-1 text-primary">Harvest Method:<span class="ms-2 text-dark">Tractor</span></p>
                        <p class="h6 mb-1 text-primary">Storage: <!-- Choosing through warehouse (For later) --> <span class="ms-2 text-dark">North Silo</span></p>
                        <p class="h6 mb-1 text-primary">Storage Conditions:<span class="ms-2 text-dark">32°C, 24% Humidity, Metal walls</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>