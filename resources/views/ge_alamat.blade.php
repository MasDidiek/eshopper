<script async src="https://maps.googleapis.com/maps/api/geocode/json?latlng=-6.1045917,106.939519&key=AIzaSyD4ULw0TXRCvk5YaDkVBUdUwDZXLMs8opc" type="text/javascript"></script>

<?php

$data = json_decode("https://maps.googleapis.com/maps/api/geocode/json?latlng=-6.1045917,106.939519&key=AIzaSyD4ULw0TXRCvk5YaDkVBUdUwDZXLMs8opc");

echo $data;
?>