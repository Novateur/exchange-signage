<?php
  require("../includes/functions.php");
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Exchange Rate</title>
</head>
<body class="" style="font-family: verdana">

<p id="typing_on"></p>
<textarea id="textarea" rows="6" cols="20"></textarea>
  <script src="../js/jquery.min.js"></script>
  <script>
      var textarea = $('#textarea');
var typingStatus = $('#typing_on');
var lastTypedTime = new Date(0); // it's 01/01/1970, actually some time in the past
var typingDelayMillis = 5000; // how long user can "think about his spelling" before we show "No one is typing -blank space." message

function refreshTypingStatus() {
    if (!textarea.is(':focus') || textarea.val() == '' || new Date().getTime() - lastTypedTime.getTime() > typingDelayMillis) {
        typingStatus.html('No one is typing -blank space.');
    } else {
        typingStatus.html('User is typing...');
    }
}
function updateLastTypedTime() {
    lastTypedTime = new Date();
}

setInterval(refreshTypingStatus, 100);
textarea.keypress(updateLastTypedTime);
textarea.blur(refreshTypingStatus);
  </script>
</body>
</html>