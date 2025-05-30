@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kitchen Guidelines and Policies</h1>
    </div>

    <div class="row">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);" onclick="showSection('guidelines')"><i class="fas fa-clipboard-list"></i> Guidelines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="showSection('policies')"><i class="fas fa-file-contract"></i> Policies</a>
                </li>
            </ul>
        </div>
    </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12" id="guidelines" class="content-section">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Guidelines</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check-circle text-success"></i>Please count meat according to the number of the students and place in the clean tupperware (74 pcs per tupperware).</li>
                        <li><i class="fas fa-check-circle text-success"></i>Please close and lock the door when kitchen is not in use.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Sterilize the spoons and forks after every meal.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Sterilize all the hanging utensils (e.g. ladle, tong, knives, etc.).</li>
                        <li><i class="fas fa-check-circle text-success"></i>Make sure to wash the curtains twice a month.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Make sure to turn off the refrigerator before cleaning and handle the fridge with care and not roughly.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Clean the refrigerator every two weeks and use cloth or face towel to clean the refrigerator.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Don’t use sharp objects such as knives, ice picks, etc.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Set the right temperature for the fridge: 1–6°C and for the freezer: -15°C.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Minimize the number of times you open the door in the refrigerator.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Observe proper segregation of frozen foods and vegetables.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Clean the burner or gas stoves twice (2) a day after cooking.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Make sure to turn off the stoves / gas tanks every night.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Make sure to remove the plastic cellophane before placing the vegetables in the designated area.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Ensure that one person is in the kitchen watching the food being cooked and monitoring the stove in case of fire or other emergency.</li>
                        <li><i class="fas fa-check-circle text-success"></i>All kitchen materials taken from the kitchen must be returned and washed immediately.</li>
                        <li><i class="fas fa-check-circle text-success"></i>Maintain cleanliness and orderliness of the kitchen.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12" id="policies" class="content-section" style="display: none;">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Policies</h6>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle text-success"></i>Wear a hairnet and facemask when you are entering the kitchen.</li>
    <li><i class="fas fa-check-circle text-success"></i>Saturday and Thursday are the schedules for the delivery of supplies (meat, vegetables). The kitchen team is in charge of receiving the delivery items and checking if items are complete based on the list ordered from Ate Tina. Ate Tina will collect the list every Monday and give feedback if there are lacking items.</li>
    <li><i class="fas fa-check-circle text-success"></i>The items should be washed first before storing them in the fridge and in the cabinet.</li>
    <li><i class="fas fa-check-circle text-success"></i>Eating inside the kitchen is not allowed. You can eat in the courtyard during meal time only.</li>
    <li><i class="fas fa-check-circle text-success"></i>Count the meat (fish, chicken) according to the number of students and store it in a clean Tupperware (92 pcs per Tupperware).</li>
    <li><i class="fas fa-check-circle text-success"></i>Clean the kitchen before and after using it.</li>
    <li><i class="fas fa-check-circle text-success"></i>Only the Kitchen and Dishwashing team are allowed to go inside the kitchen for cooking and serving the food. Dishwashers can go inside the kitchen since they are the ones who will return all the utensils that are used each time.</li>
    <li><i class="fas fa-check-circle text-success"></i>The Kitchen Team is in charge of preparing the ingredients for every meal. If the groupings in the Tasking conflict due to schedules, the Coordinator of the Kitchen will make a grouping to divide responsibilities for each meal.</li>
    <li><i class="fas fa-check-circle text-success"></i>The kitchen team must wake up early to prepare all the ingredients for breakfast, lunch, and dinner.</li>
    <li><i class="fas fa-check-circle text-success"></i>The Cook will prepare the food for dinner for both centers. If ever the Cook has something to do, the Kitchen Team will prepare the food for their co-scholars.</li>
    <li><i class="fas fa-check-circle text-success"></i>The Houseparents are in charge of cooking and monitoring the students while cooking their food for breakfast. They will also teach how to take charge in the kitchen.</li>
    <li><i class="fas fa-check-circle text-success"></i>If students have classes in the evening, the kitchen team members will pack the food into lunch boxes.</li>
    <li><i class="fas fa-check-circle text-success"></i>Personal cooking is not allowed in the kitchen. You can boil water for everyone. When you arrive in the center, you can cook the rice into fried rice if there are leftovers from breakfast and lunch.</li>
    <li><i class="fas fa-check-circle text-success"></i>Handle with care all the utensils that PN provides for you, students.</li>
    <li><i class="fas fa-check-circle text-success"></i>Make sure all burners and stoves are cleaned after using. Do not forget to close/turn off the Gasul Tank to avoid explosions.</li>
    <li><i class="fas fa-check-circle text-success"></i>Please avoid wasting food.</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .list-group-item {
        font-size: 1rem;
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }

    .card-body ul li {
        margin-bottom: 0.5rem;
    }

    .card-body ul li i {
        margin-right: 0.5rem;
    }
</style>

<script>
    function showSection(section) {

        document.getElementById('guidelines').style.display = 'none';
        document.getElementById('policies').style.display = 'none';


        document.getElementById(section).style.display = 'block';
    }


    showSection('guidelines');
</script>

@endsection