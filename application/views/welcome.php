<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Instant Search With Arrow Key Navigation</title> 
<link href="assets/css/stylesheet.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="assets/js/search.js"></script> 

<script> 

    //arrow key navigation 
    $(document).keydown(function(e){ 

        //jump from search field to search results on keydown 
        if (e.keyCode == 40) {  
            $("#keyword").blur(); 
              return false; 
        } 

        //hide search results on ESC 
        if (e.keyCode == 27) {  
            $("#results").hide(); 
            $("#keyword").blur(); 
              return false; 
        } 

        //focus on search field on back arrow or backspace press 
        if (e.keyCode == 37 || e.keyCode == 8) {  
            $("#keyword").focus(); 
        } 

    }); 
    // 


 $(document).ready(function() { 

	var api_url = "/dict";
    //clear search field & change search text color 
    $("#keyword").focus(function() { 
        $("#keyword").css('color','#333333'); 
        var sv = $("#keyword").val(); //get current value of search field 
        if (sv == 'Search') { 
            $("#keyword").val(''); 
        } 
    }); 
    // 

    //post form on keydown or onclick, get results 
    $("#keyword").bind('keyup click', function() { 
        $.post(api_url, $("#search").serialize(),  function(data){ 
                    //hide results if no more than 2 characters 
                    if (data == 'hide') { 
                        $('#results').hide(); 
                    } 

                    //show results if more than 2 characters 
                    if (data != 'hide') { 
                        $("#results").html(data); 
                        if (data) { 
                            $("#results").show(); 
                        } 
                    } 
            }); 
    }); 
    // 

    //hide results when clicked outside of search field 
    $("body").click(function() { 
        $("#results").hide(); 
    }); 
    // 

}); 


</script>  

</head> 

<body> 
<div id="wrapper">
	<h1>Instant Search Kanji</h1> 

	<h2>Example keywords (nihongo, daigaku, minpo, launch)<br /> 
	  <br /> 
	</h2> 

	<form id="search" name="search" method="post" action="" autocomplete="off"> 
	  <input name="keyword" type="text" id="keyword" value="Search" /> 
	  <div id="results"></div> 
	</form> 


	<br /> 
	<br /> 
	<br /> 

	<a href="http://localhost">Kanji Search</a> 

</div>
</body> 
</html> 