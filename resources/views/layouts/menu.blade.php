
<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{{ route('companies.index') }}"><i class="fa fa-edit"></i><span>Bedrijven</span></a>
</li>
@role('admin')
<li class="{{ Request::is('addresses*') ? 'active' : '' }}">
    <a href="{{ route('addresses.index') }}"><i class="fa fa-edit"></i><span>Adressen</span></a>
</li>
@endrole

<li class="{{ Request::is('kitchens*') ? 'active' : '' }}">
    <a href="{{ route('kitchens.index') }}"><i class="fa fa-edit"></i><span>Categorieën</span></a>
</li>

<li class="{{ Request::is('meals*') ? 'active' : '' }}">
    <a href="{{ route('meals.index') }}"><i class="fa fa-edit"></i><span>Producten</span></a>
</li>

<li class="{{ Request::is('mealCategories*') ? 'active' : '' }}">
    <a href="{{ route('mealCategories.index') }}"><i class="fa fa-edit"></i><span>Productcategorieën</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{{ route('orders.index') }}"><i class="fa fa-edit"></i><span>Bestellingen</span></a>
</li>


@role('admin')
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>
@endrole


<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.edit', 1) }}"><i class="fa fa-edit"></i><span>Profiel</span></a>
</li>
