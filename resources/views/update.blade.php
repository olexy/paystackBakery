<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update Recipient Information</h2>
  <form action="{{ route('recipient.save', ['code'=> $recipient[0]->recipientCode]) }}">
  {{ csrf_field() }}
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Recipient
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">{{ $recipient[0]->fullname}}</a></li>
  </ul>
</div>
    <div class="form-group input-group">
        <span class="input-group-addon">Description</span>
        <input id="msg" type="text" value="{{$recipient[0]->description}}" class="form-control" name="description" placeholder="Additional Info">
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>
