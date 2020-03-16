<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{{ route('companies.index') }}"><i class="fa fa-edit"></i><span>Companies</span></a>
</li>

<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{{ route('addresses.index') }}"><i class="fa fa-edit"></i><span>Addresses</span></a>
</li>

<li class="{{ Request::is('mealCategories*') ? 'active' : '' }}">
    <a href="{{ route('mealCategories.index') }}"><i class="fa fa-edit"></i><span>Meal Categories</span></a>
</li>

<li class="{{ Request::is('kitchens*') ? 'active' : '' }}">
    <a href="{{ route('kitchens.index') }}"><i class="fa fa-edit"></i><span>Kitchens</span></a>
</li>

<li class="{{ Request::is('meals*') ? 'active' : '' }}">
    <a href="{{ route('meals.index') }}"><i class="fa fa-edit"></i><span>Meals</span></a>
</li>

