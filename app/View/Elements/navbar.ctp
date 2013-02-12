<div class="navbar nav">
  <div class="navbar-inner">
    <ul class="nav">
      <li><a href="/">Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Config System
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <?
            global $configurable;
            foreach($configurable as $c){
          ?>
            <li><?= $this->Html->link('Manage ' . Inflector::pluralize($c), '/config/' . $c) ?></li>
          <? } ?>
        </ul>
      </li>
      <li><a href="/items">Manage Item</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Maintenance
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Work Request</a></li>
          <li><a href="#">View Request</a></li>
          <li><a href="#">Work Orders</a></li>
          <li><a href="#">Reports by Engineer</a></li>
          <li><a href="#">Reports by Health Facility</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          Make Orders
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="#">Make Orders</a></li>
          <li><a href="#">View Orders</a></li>
        </ul>
      </li>
      <? if ($user){ ?>
        <li class="dropdown pull-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Account Info
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Change Password</a></li>
            <li><a href="/users/logout">Log out</a></li>
          </ul>
        </li>
      <? } ?>
    </ul>
  </div>
</div>