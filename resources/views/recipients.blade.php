<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/pssp.css" rel="stylesheet" type="text/css" media="all" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	@include('sweet::alert')
<ul class="list-group">
  @foreach($data as $key)     
  <li class="list-group-item list-group-item-success">  
    {{$key->name}} || <b class="list-group-item-primary">{{$key->details->bank_name}}</b>
    <a href="mailto:{{$key->email}}"><span class="badge badge-primary badge-pill">{{ $key->details->account_number}}</span></a> <a href="{{ route('recipient.delete', ['id' => $key->id, 'code' => $key->recipient_code])}}" class="btn btn-danger btn-sm">x</a>
    
    <a href="{{ route('recipient.update', ['code' => $key->recipient_code])}}" class="btn btn-info btn-xs fa fa-address-card-o">Update</a>
  </li> 
  @endforeach 

  <!-- <li class="list-group-item list-group-item-primary">
    ABC Bakery Inc.
    <span class="badge badge-primary badge-pill">146746379</span
  </li>
  <li class="list-group-item list-group-item-secondary">
    RegEdit Limited
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-success">
   Westeck Nigeria Ltd
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-danger">
    Youtre Limited
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-warning">
    Discovery Essence
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-info">
    Ade Confectionery
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-light">
  Luther Electronics
    <span class="badge badge-primary badge-pill">687910100</span
  </li>
  <li class="list-group-item list-group-item-dark">
  Samsong Ojught Limited
    <span class="badge badge-primary badge-pill">687910100</span
  </li> -->
</ul>
</body>
</head>
