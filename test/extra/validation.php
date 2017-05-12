
<html>
<head>
<meta charset="utf-8" />
<style type="text/css">
label.error { float: none; color: red; padding-left: .5em; vertical-align: top; }
</style>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script>
$(function() {
   $( "#mytestform" ).validate({
           rules: {
                  'tx_booking_booking[newBooking][name]': "required",
                  'inputimage': { required: true, accept: "png|jpe?g|gif", filesize: 1048576  },

           },
           messages: { myFile: "File must be JPG, GIF or PNG, less than 1MB" }
   });
});

</script>
</head>
<body>
<form id="mytestform" name='' method='get'  action=''>
     
       <label for='aname'>Name:&nbsp;</label>
      <input name='tx_booking_booking[newBooking][name]' size='20' />
      <label for="food">Do you like Italian food:&nbsp;</label>
      <select id="italianstatus" name="italian_food">
              <option value="yes" selected="selected">Hell Yes!</option>
              <option value="no">Makes me wanna puke</option>
              <option value="sometimes">Just on Monday</option>
      </select>
      

<br>
      <input name="inputimage" type="file" id="myFile" />
      <input class="submit" type="submit" value="Submit" />
     
   </form>

 
</body>
</html>