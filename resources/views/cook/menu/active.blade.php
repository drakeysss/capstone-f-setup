@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Weekly Menu and Ingredients</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="menuTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="week1-tab" data-bs-toggle="tab" data-bs-target="#week1" type="button" role="tab">Week 1 & 3</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="week2-tab" data-bs-toggle="tab" data-bs-target="#week2" type="button" role="tab">Week 2 & 4</button>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="menuTabContent">
                        <div class="tab-pane fade show active" id="week1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Morning</th>
                                            <th>Afternoon</th>
                                            <th>Evening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Saturday</td><td>Ampalaya with Egg<br>8 kgs. Ampalaya, 100 pcs Egg, 1 pc. Magic Sarap, 2 pcs. Onions, 2 pcs. Garlic, Oil, salt, Black Pepper, Soy sauce</td><td><strong>Chicken Adobao</strong><br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili spada</td><td><strong>Togue Guisado</strong><br>10kgs. Togue, 2kgs. Groundpork, 1 pc. Magic sarap, 2 pcs. Onions, 2 pcs. Garlic, Oil, Salt, Black Pepper, Soy sauce</td></tr>
                                        <tr><td>Sunday</td><td>Sunny Side Up Egg with Energen<br>280 pcs. Eggs, Oil, Salt</td><td>Fried Fish or Escabeche<br>144 pcs. Fish, Oil, Vinegar, Ginger, 1pc Magic sarap, Salt, Black pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce</td><td>Eggplant Guisado<br>14 kgs Eggplant, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Monday</td><td>Chicken Loaf<br>26 packs Chicken Loaf, Oil</td><td>Ground Pork<br>8 kgs. Ground Pork, 1 kg Baguio Beans, 2kgs. Potatoes, 2kgs. Carrots, 1pc Magic sarap, Salt, Black pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, 1 pc Knorr Cubes</td><td>Sari-Sari Guisado<br>2 whole squash, 2 kgs. Eggplant, 2kgs. String Beans, 2kgs. Ground Pork, 6 pcs Onion, 6pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Tuesday</td><td>Bihon Guisado & Energen<br>6kgs. Bihon, 2kgs. Ground Pork, 1 pc. Cabbage, 1pc Pechay, 6 pcs Onion, 6pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Oil, 1pc. Knorr Cube, Sibuyas Dahonan</td><td>Fried Fish<br>144 pcs Fish, Oil, Salt</td><td>Chop Suey<br>10 kgs. Chopsuey, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Sugar, Cornstarch</td></tr>
                                        <tr><td>Wednesday</td><td>Hotdog & Ham<br>8 packs Hotdog, 14 packs Ham, Oil</td><td>Fried Chicken<br>142 pcs. Chicken, 1kg. Flour, 1kg. Cornstarch, 1pc. Magic Sarap, Oil, Black Pepper</td><td>Monggos with Buwad<br>4kgs. Monggos, 140 pcs. Buwad, 2pcs Knorr Cubes, 2 pcs Onion, 2pcs Garlic, Salt, MSG, 2 pcs. Magic Sarap, 2 pcs. Cabbage, Water, Oil</td></tr>
                                        <tr><td>Thursday</td><td>Sardines with Egg<br>40 cans Sardines, 6 trays or 120 pcs. Eggs, 2pcs. Onions, 2pcs. Garlic, Oil, Black Pepper, Salt, MSG</td><td>Pork Menudo<br>10 kgs. Pork Menudo, 1 kg Baguio Beans, 2kgs. Potatoes, 2kgs. Carrots, 1pc Magic sarap, Salt, Black pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, 2 pcs. Knorr Cubes, Sugar</td><td>Baguio Beans Guisado<br>14 kgs. Baguio Beans, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Friday</td><td>Hotdog Omelette<br>8 packs hotdog, 120 pcs egg, 10 pcs Magic sarap, onions, garlic, bell pepper, salt</td><td>Chicken Halang-Halang<br>142 pcs. Chicken, Water, 2 pcs. Charcoal, 1kg Sili, 2 pcs. Magic Sarap, 2 pcs. Garlic, 2 pcs. Onion, 2 pcs. Knorr Cubes</td><td>Chop Suey<br>10 kgs. Chopsuey, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Sugar, Cornstarch</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="week2" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Breakfast</th>
                                            <th>Afternoon</th>
                                            <th>Evening</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Saturday</td><td>Luncheon Meat & Hotdog<br>6 packs Hotdog, 13 packs Luncheon Meat, Oil</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili spada</td><td>Utan Bisaya & Buwad<br>4 pcs Squash, 2 kg Alugbati, 2 kgs Malunggay, 2 kgs Eggplant, 2 kgs String Beans, 140 pcs Buwad, Vetsin, Salt, Water, Ginger</td></tr>
                                        <tr><td>Sunday</td><td>Tomato with Egg<br>2 kgs. Tomatoes, 100 pcs. Egg, Oil, Black Pepper, 1 pc Magic sarap, Salt, 2 pcs. Garlic, 2 pcs. Onions, Sibuyas Dahonan</td><td>Pork Lumpia<br>6kgs. Ginaling, 8pcs. Sayote, 3 packs (50 pcs per pack) Lumpia Wrapper divided into two per piece, 2pc Magic sarap, Salt, Black Pepper, 2 pcs. Garlic, 2 pcs. Onion, 1 pc Knorr Cubes</td><td>Eggplant Guisado<br>14 kgs Eggplant, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Monday</td><td>Chicken Loaf<br>26 packs Chicken Loaf, Oil</td><td>Fried Fish<br>144 pcs Fish, Oil, Salt</td><td>String Beans<br>10 kgs String Beans, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Tuesday</td><td>Sayote with Sardines<br>15 pcs Sayote, 40 cans Sardines, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Black Pepper</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili spada</td><td>Upo Guisado<br>6 pcs. Upo(Bottle Gourd), 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Cabbage(Optional)</td></tr>
                                        <tr><td>Wednesday</td><td>Ham & Egg<br>142 pcs. Eggs, 14 packs Ham, Oil</td><td>Fried Fish<br>144 pcs Fish, Oil, Salt</td><td>Monggos with Buwad<br>4kgs. Monggos, 140 pcs. Buwad, 2pcs Knorr Cubes, 2 pcs Onion, 2pcs Garlic, Salt, MSG, 2 pcs. Magic Sarap, 2 pcs. Cabbage, Water, Oil</td></tr>
                                        <tr><td>Thursday</td><td>Hotdog & Ham<br>8 packs Hotdog, 14 packs Ham, Oil</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili spada</td><td>Chop Suey<br>10 kgs. Chopsuey, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Sugar, Cornstarch</td></tr>
                                        <tr><td>Friday</td><td>Egg Humba<br>10 kgs. Egg, 2 kgs. Sugar Dahonan, 2 pcs. Onion, 2 pcs. Garlic, Soy Sauce, Vinegar, Salt, Water, Oil, Sugar, Cornstarch</td><td>Pork Menudo<br>10 kgs. Pork Menudo, 1 kg Baguio Beans, 2kgs. Potatoes, 2kgs. Carrots, 1pc Magic sarap, Salt, Black pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, 2 pcs. Knorr Cubes, Sugar</td><td>Baguio Beans Guisado<br>14 kgs. Baguio Beans, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 