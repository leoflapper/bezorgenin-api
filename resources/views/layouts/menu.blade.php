<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{{ route('companies.index') }}"><i class="fa fa-edit"></i><span>Bedrijven</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{{ route('addresses.index') }}"><i class="fa fa-edit"></i><span>Adressen</span></a>
</li>

<li class="{{ Request::is('mealCategories*') ? 'active' : '' }}">
    <a href="{{ route('mealCategories.index') }}"><i class="fa fa-edit"></i><span>Productcategorieën</span></a>
</li>

<li class="{{ Request::is('kitchens*') ? 'active' : '' }}">
    <a href="{{ route('kitchens.index') }}"><i class="fa fa-edit"></i><span>Categorieën</span></a>
</li>

<li class="{{ Request::is('meals*') ? 'active' : '' }}">
    <a href="{{ route('meals.index') }}"><i class="fa fa-edit"></i><span>Maaltijden</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Bestellingen</span></a>
</li>

