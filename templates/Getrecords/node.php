<?php
        $this->disableAutoLayout();

?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
src = "jquery.js";
const string = 'foo';

// $.ajax({
//         headers: { "Content-Type": "text/plain" },
//         url: 'localhost:8080',
//         data: JSON.stringify(string),
//         method: 'POST'
//     }).done(function(data) {
//         //i dont understand what it is for
//         if (console && console.log) {}
//     });
// $(document).ready(function() {
//   $("#button_1").click(function(e) {
//     // e.preventDefault();
//     $.ajax({
//       method: "POST",
//       type: "POST",
//       url: "localhost:8080",
//       data: {
//         // id: $("#button_1").val(),
//         // access_token: $("#access_token").val()
//         data: JSON.stringify(string),
//     },
//       success: function(result) {
//         alert('ok');
//       },
//       error: function(result) {
//         alert('error');
//       }
//     });
//   });
// });
</script>
<head><title>N</title>
</head>
<body>
<h1>Node</h1>
<form action="/getrecords/node" method="POST">
<button id="button_1" type="submit"> 
    x
</button>
</form>
</body>