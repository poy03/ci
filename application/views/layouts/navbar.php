<?php

echo '
<nav class="navbar navbar-default nav-stacked">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pos-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">POS</a>
    </div>
    <div class="collapse navbar-collapse" id="pos-navbar">
    <ul class="nav navbar-nav">
      <li><a href="'.base_url().'">Home</a></li>
      <li><a href="'.base_url("home/items").'">Items</a></li>
      <li><a href="'.base_url("home/sales").'">Sales</a></li>
      <li><a href="'.base_url("home/purchases").'">Purchases</a></li>
      <li><a href="'.base_url("home/receivables").'">Receivables</a></li>
      <li><a href="'.base_url("home/expenses").'">Expenses</a></li>
      <li><a href="'.base_url("home/payables").'">Payables</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="'.base_url("home/reports").'">Reports</a></li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="'.base_url("home/customers").'">Customers</a></li>
        <li><a href="'.base_url("home/salesman").'">Salesman</a></li>
        <li><a href="'.base_url("home/suppliers").'">Suppliers</a></li>
        <li><a href="'.base_url("home/users").'">Users</a></li>

        <li><a href="#" id="app-settings"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
        <li><a href="#" id="app-settings"><span class="glyphicon glyphicon-cog"></span> Maintenance</a></li>
        <li><a href="#" id="app-settings"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </li>
    </ul>
    </div>
  </div>
</nav>

';

?>