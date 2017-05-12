<!DOCTYPE HTML>
<form method="GET" action="http://search.issuu.com/api/2_0/document">
  <input type="text" name="q" size="40" maxlength="256" value="query string">

  <input type="submit" name="search_button" value="Search">
</form>


<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script type="text/javascript">
	$.getJSON('http://search.issuu.com/api/2_0/document?q=alt&responseParams=%2A', function(data){
    alert(data);
    console.log(data);

	/*$.getJSON('http://search.issuu.com/api/2_0/document?q=alt&responseParams=%2A&format=json&signature=cdb85d846e3c43b94e1e96fec695629f', function(data){
    alert(data);
    console.log(data);*/

   /* $.getJSON('http://api.issuu.com/1_0?action=issuu.documents.list&apiKey=3g49x2esszskgxxi38xst7q0qds4hqng&access=public&responseParams=title%2Cdescription&format=json&signature=fd0ffb5d73963c2ba2a54987031f6f30', function(data){
    alert(data);
    console.log(data);*/
});


/*  ?q=jamie&responseParams=%2A
$.ajax({
	url: 'https://search.issuu.com/api/2_0/document',
	data: 'q=alt&responseParams=%2A',
	dataType: 'JSON',
	crossDomain: true,
	cache: false,
    contentType: "application/json; charset=utf-8;",
    processData: false,
	type: 'post',
	async: false,
	success: function(data){
		if(data){
			myArr = $.parseJSON(data);
			alert("data:"+myArr);
		}
		if(callback!=null){
        		callback(data, form_data, obj);	
        }
	},
	error: function (data, status, e) {
        	alert("error:"+e);
    }
	
});*/
</script>
<?php

$url = 'http://search.issuu.com/api/2_0/document?q=alt&responseParams=%2A&pageSize=10&sortBy=epoch';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_USERAGENT, 'MyBot/1.0 (http://192.168.0.123/issuu.php)');

$result = curl_exec($ch);

if (!$result) {
  exit('cURL Error: '.curl_error($ch));
}
$data = json_decode($result, TRUE);
foreach ($data['response']['docs'] as $key => $value) {
	echo "<pre>";
	print_r($value);
	
}

die;
//var_dump($result);
?>