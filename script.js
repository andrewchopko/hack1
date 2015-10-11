var main = function() { 
$('.icon-menu').click(function() { 
$('.menu').animate({ 
left: "0px" 
}, 200); 

$('body').animate({ 
left: "20%", 
width: "80%" 
}, 200); 
$(".description_doctor").animate({ 
paddingBottom: "30px" 
}, 200); 
$(".photo").animate({ 
height:"160px", 
width: "160px" 
}, 200); 
$(".autor").animate({ 
margin: "25px 7%" 
}, 200); 
}); 

$('.icon-close').click(function() { 
$('.menu').animate({ 
left: "-20%" 
}, 200); 

$('body').animate({ 
left: "0px", 
width: "100%" 
}, 200); 
$(".description_doctor").animate({ 
paddingBottom: "10px" 
}, 200); 
$(".photo").animate({ 
height:"200px", 
width: "200px" 
}, 200); 
$(".autor").animate({ 
margin: "25px 7%" 
}, 200); 
}); 
}; 

$(document).ready(main);