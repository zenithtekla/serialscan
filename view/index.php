<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>X-editable starter template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>

    <!-- x-editable (bootstrap version) -->
    <link href="http://vitalets.github.com/x-editable/assets/x-editable/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://vitalets.github.com/x-editable/assets/x-editable/bootstrap-editable/js/bootstrap-editable.js"></script>

    <!-- mocking ajax -->
    <script src="http://vitalets.github.com/x-editable/assets/mockjax/jquery.mockjax.js"></script>

    <!-- main.js -->
    <script src="../js/main.js"></script>
</head>

<body class="container">
<p>Prompt user input for program instantiation</p>
<div>
  <div id="msg" class="alert hide"></div>
  <div class="col-md-11 right-scroll">
  <table id="user" class="table table-bordered table-striped">
    <tbody>
      <tr>
          <td style="width: 300px">Enter username</td>
          <td><a href="#" class="myeditable" id="new_username" data-type="text" data-pk="1" data-name="username" data-original-title="Enter username"></a></td>
      </tr>
      <tr>
          <td>Password</td>
          <td><a href="#" class="myeditable" id="password" data-type="text" data-pk="2" data-name="password" data-original-title="Enter password"></a></td>
      </tr>
      <tr>
          <td><b>Assembly-number</b></td>
          <td><a href="#" class="myeditable" id="assembly-number" data-type="text" data-pk="3" data-name="assembly-number" data-original-title="Enter assembly-number"></a></td>
      </tr>
      <tr>
          <td><b>Revision</b></td>
          <td><a href="#" class="myeditable" id="revision" data-type="text" data-pk="4" data-name="revision" data-original-title="Enter revision"></a></td>
      </tr>
      <tr>
          <td><b>Sale-order</b></td>
          <td><a href="#" class="myeditable" id="sale-order" data-type="text" data-pk="5" data-name="sale-order" data-original-title="Enter sale-order"></a></td>
      </tr>
  <!--    <tr>
          <td>Turn-around date</td>
          <td><a href="#" class="myeditable" id="turnaround" data-type="date" data-pk="6" data-url="/post" data-placement="right" data-name="date" data-original-title="Enter turnaround date"></a></td>
      </tr>
      <tr>
          <td>Note (optional)</td>
          <td><a href="#" class="myeditable" id="note" data-type="textarea" data-pk="7" data-name="note" data-original-title="Write a note"></a></td>
      </tr>
  -->
    </tbody>
  </table>
  </div>

  <div>
      <button id="save-btn" class="btn btn-success">Start new session!</button>
      <button id="reset-btn" class="btn btn-danger pull-right">Reset</button>
  </div>
</div>

</body>
</html>