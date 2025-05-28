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
                                        <tr><td>Saturday</td><td><strong>Ampalaya with Egg</strong><br><ul><li><small>8 kgs. Ampalaya</small></li><li><small>100 pcs Egg</small></li><li><small>1 pc. Magic Sarap</small></li><li><small>2 pcs. Onions</small></li><li><small>2 pcs. Garlic</small></li><li><small>Oil</small></li><li><small>salt</small></li><li><small>Black Pepper</small></li><li><small>Soy sauce</small></li></ul></td><td><strong>Chicken Adobao</strong><br><ul><li><small>142 pcs. Chicken</small></li><li><small>1 pc Magic sarap</small></li><li><small>Salt</small></li><li><small>Vinegar</small></li><li><small>Black Pepper</small></li><li><small>2 pcs. Garlic</small></li><li><small>2 pcs. Onions</small></li><li><small>Soy sauce</small></li><li><small>Sili espada</small></li></ul></td><td><strong>Togue Guisado</strong><br><ul><li><small>10kgs. Togue</small></li><li><small>2kgs. Groundpork</small></li><li><small>1 pc. Magic sarap</small></li><li><small>2 pcs. Onions</small></li><li><small>2 pcs. Garlic</small></li><li><small>Oil</small></li><li><small>Salt</small></li><li><small>Black Pepper</small></li><li><small>Soy sauce</small></li></ul></td></tr>
                                        <tr><td>Sunday</td><td><strong>Sunny Side Up Egg with Energen</strong><br><ul><li><small>280 pcs. Eggs</small></li><li><small>Oil</small></li><li><small>Salt</small></li></ul></td><td><strong>Fried Fish or Escabeche</strong><br><ul><li><small>144 pcs. Fish</small></li><li><small>Oil</small></li><li><small>Vinegar</small></li><li><small>Ginger</small></li><li><small>1pc Magic sarap</small></li><li><small>Salt</small></li><li><small>Black pepper</small></li><li><small>2 pcs. Garlic</small></li><li><small>2 pcs. Onions</small></li><li><small>Soy sauce</small></li></ul></td><td><strong>Eggplant Guisado</strong><br><ul><li><small>14 kgs Eggplant</small></li><li><small>2 kgs Ginaling</small></li><li><small>2 pcs Onion</small></li><li><small>2pcs Garlic</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li></ul></td></tr>
                                        <tr><td>Monday</td><td><strong>Chicken Loaf</strong><br><ul><li><small>26 packs Chicken Loaf</small></li><li><small>Oil</small></li></ul></td><td><strong>Ground Pork</strong><br><ul><li><small>8 kgs. Ground Pork</small></li><li><small>1 kg Baguio Beans</small></li><li><small>2kgs. Potatoes</small></li><li><small>2kgs. Carrots</small></li><li><small>1pc Magic sarap</small></li><li><small>Salt</small></li><li><small>Black pepper</small></li><li><small>2 pcs. Garlic</small></li><li><small>2 pcs. Onions</small></li><li><small>Soy sauce</small></li><li><small>1 pc Knorr Cubes</small></li></ul></td><td><strong>Sari-Sari Guisado</strong><br><ul><li><small>2 whole squash</small></li><li><small>2 kgs. Eggplant</small></li><li><small>2kgs. String Beans</small></li><li><small>2kgs. Ground Pork</small></li><li><small>6 pcs Onion</small></li><li><small>6pcs Garlic</small></li><li><small>Patis</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li></ul></td></tr>
                                        <tr><td>Tuesday</td><td><strong>Bihon Guisado & Energen</strong><br><ul><li><small>6kgs. Bihon</small></li><li><small>2kgs. Ground Pork</small></li><li><small>1 pc. Cabbage</small></li><li><small>1pc Pechay</small></li><li><small>6 pcs Onion</small></li><li><small>6pcs Garlic</small></li><li><small>Patis</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Oil</small></li><li><small>1pc. Knorr Cube</small></li><li><small>Sibuyas Dahonan</small></li></ul></td><td><strong>Fried Fish</strong><br><ul><li><small>144 pcs Fish</small></li><li><small>Oil</small></li><li><small>Salt</small></li></ul></td><td><strong>Chop Suey</strong><br><ul><li><small>10 kgs. Chopsuey</small></li><li><small>2 kgs Ginaling</small></li><li><small>2 pcs Onion</small></li><li><small>2pcs Garlic</small></li><li><small>Patis</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li><li><small>Sugar</small></li><li><small>Cornstarch</small></li></ul></td></tr>
                                        <tr><td>Wednesday</td><td><strong>Hotdog & Ham</strong><br><ul><li><small>8 packs Hotdog</small></li><li><small>14 packs Ham</small></li><li><small>Oil</small></li></ul></td><td><strong>Fried Chicken</strong><br><ul><li><small>142 pcs. Chicken</small></li><li><small>1kg. Flour</small></li><li><small>1kg. Cornstarch</small></li><li><small>1pc. Magic Sarap</small></li><li><small>Oil</small></li><li><small>Black Pepper</small></li></ul></td><td><strong>Monggos with Buwad</strong><br><ul><li><small>4kgs. Monggos</small></li><li><small>140 pcs. Buwad</small></li><li><small>2pcs Knorr Cubes</small></li><li><small>2 pcs Onion</small></li><li><small>2pcs Garlic</small></li><li><small>Salt</small></li><li><small>MSG</small></li><li><small>2 pcs. Magic Sarap</small></li><li><small>2 pcs. Cabbage</small></li><li><small>Water</small></li><li><small>Oil</small></li></ul></td></tr>
                                        <tr><td>Thursday</td><td><strong>Sardines with Egg</strong><br><ul><li><small>40 cans Sardines</small></li><li><small>6 trays or 120 pcs. Eggs</small></li><li><small>2pcs. Onions</small></li><li><small>2pcs. Garlic</small></li><li><small>Oil</small></li><li><small>Black Pepper</small></li><li><small>Salt</small></li><li><small>MSG</small></li></ul></td><td><strong>Pork Menudo</strong><br><ul><li><small>10 kgs. Pork Menudo</small></li><li><small>1 kg Baguio Beans</small></li><li><small>2kgs. Potatoes</small></li><li><small>2kgs. Carrots</small></li><li><small>1pc Magic sarap</small></li><li><small>Salt</small></li><li><small>Black pepper</small></li><li><small>2 pcs. Garlic</small></li><li><small>2 pcs. Onions</small></li><li><small>Soy sauce</small></li><li><small>2 pcs. Knorr Cubes</small></li><li><small>Sugar</small></li></ul></td><td><strong>Baguio Beans Guisado</strong><br><ul><li><small>14 kgs. Baguio Beans</small></li><li><small>2 kgs Ginaling</small></li><li><small>2 pcs Onion</small></li><li><small>2pcs Garlic</small></li><li><small>Patis</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li></ul></td></tr>
                                        <tr><td>Friday</td><td><strong>Egg Humba</strong><br><ul><li><small>10 kgs. Egg</small></li><li><small>2 kgs. Sugar Dahonan</small></li><li><small>2 pcs. Onion</small></li><li><small>2 pcs. Garlic</small></li><li><small>Soy Sauce</small></li><li><small>Vinegar</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li><li><small>Sugar</small></li><li><small>Cornstarch</small></li></ul></td><td><strong>Chicken Halang-Halang</strong><br><ul><li><small>142 pcs. Chicken</small></li><li><small>Water</small></li><li><small>2 pcs. Charcoal</small></li><li><small>1kg Sili</small></li><li><small>2 pcs. Magic Sarap</small></li><li><small>2 pcs. Garlic</small></li><li><small>2 pcs. Onion</small></li><li><small>2 pcs. Knorr Cubes</small></li></ul></td><td><strong>Chop Suey</strong><br><ul><li><small>10 kgs. Chopsuey</small></li><li><small>2 kgs Ginaling</small></li><li><small>2 pcs Onion</small></li><li><small>2pcs Garlic</small></li><li><small>Patis</small></li><li><small>2 pcs Magic Sarap</small></li><li><small>Vetsin</small></li><li><small>Salt</small></li><li><small>Water</small></li><li><small>Oil</small></li><li><small>Sugar</small></li><li><small>Cornstarch</small></li></ul></td></tr>
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
                                        <tr><td>Saturday</td><td>Luncheon Meat & Hotdog<br>6 packs Hotdog, 13 packs Luncheon Meat, Oil</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili espada</td><td>Utan Bisaya & Buwad<br>4 pcs Squash, 2 kg Alugbati, 2 kgs Malunggay, 2 kgs Eggplant, 2 kgs String Beans, 140 pcs Buwad, Vetsin, Salt, Water, Ginger</td></tr>
                                        <tr><td>Sunday</td><td>Tomato with Egg<br>2 kgs. Tomatoes, 100 pcs. Egg, Oil, Black Pepper, 1 pc Magic sarap, Salt, 2 pcs. Garlic, 2 pcs. Onions, Sibuyas Dahonan</td><td>Pork Lumpia<br>6kgs. Ginaling, 8pcs. Sayote, 3 packs (50 pcs per pack) Lumpia Wrapper divided into two per piece, 2pc Magic sarap, Salt, Black Pepper, 2 pcs. Garlic, 2 pcs. Onion, 1 pc Knorr Cubes</td><td>Eggplant Guisado<br>14 kgs Eggplant, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Monday</td><td>Chicken Loaf<br>26 packs Chicken Loaf, Oil</td><td>Fried Fish<br>144 pcs Fish, Oil, Salt</td><td>String Beans<br>10 kgs String Beans, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil</td></tr>
                                        <tr><td>Tuesday</td><td>Sayote with Sardines<br>15 pcs Sayote, 40 cans Sardines, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Black Pepper</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili espada</td><td>Upo Guisado<br>6 pcs. Upo(Bottle Gourd), 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Cabbage(Optional)</td></tr>
                                        <tr><td>Wednesday</td><td>Ham & Egg<br>142 pcs. Eggs, 14 packs Ham, Oil</td><td>Fried Fish<br>144 pcs Fish, Oil, Salt</td><td>Monggos with Buwad<br>4kgs. Monggos, 140 pcs. Buwad, 2pcs Knorr Cubes, 2 pcs Onion, 2pcs Garlic, Salt, MSG, 2 pcs. Magic Sarap, 2 pcs. Cabbage, Water, Oil</td></tr>
                                        <tr><td>Thursday</td><td>Hotdog & Ham<br>8 packs Hotdog, 14 packs Ham, Oil</td><td>Chicken Adobo<br>142 pcs. Chicken, 1 pc Magic sarap, Salt, Vinegar, Black Pepper, 2 pcs. Garlic, 2 pcs. Onions, Soy sauce, Sili espada</td><td>Chop Suey<br>10 kgs. Chopsuey, 2 kgs Ginaling, 2 pcs Onion, 2pcs Garlic, Patis, 2 pcs Magic Sarap, Vetsin, Salt, Water, Oil, Sugar, Cornstarch</td></tr>
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