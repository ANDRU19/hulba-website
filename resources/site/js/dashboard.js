/* globals Chart:false, feather:false */
$(function () {

//emoji

if($('*').is('.emoji-picker-container')){
window.emojiPicker = new EmojiPicker({
  emojiable_selector: '[data-emojiable=true]',
  assetsPath: 'lib/img/',
  popupButtonClasses: 'fa-solid fa-chevron-down'
});
window.emojiPicker.discover();
}

// tooltip install  
$('[data-toggle="tooltip"]').tooltip();

// sortable table
if($('*').is('#sortable')){
  $( "#sortable" ).sortable();
}

feather.replace()

//bootstrap mob menu
$('.dropdown-toggle').dropdown();  

//radio information block
$('.radio-info-block').click(function(){
	var target = $('#block-' + $(this).val());
 
	$('.block-text').not(target).hide(0);
	target.fadeIn(500);
});


//switch 
$("#switch1").on('change', function(){
  if($(this).is(':checked')){
    $(".my-hide-field").removeAttr("disabled");
    $("#my-hide-link").removeClass("hide-link");    
  }
  else {
    $(".my-hide-field").prop('disabled',true);
    $("#my-hide-link").addClass("hide-link");
  }
});


$("#p1-1").on('click', function(){
  if($(this).is(':checked')){
    $(".my-hide-field2").prop('disabled',true);
    $(".my-hide-field3").removeAttr("disabled"); 
  }
});

$("#p1-2").on('click', function(){
  if($(this).is(':checked')){
    $(".my-hide-field3").prop('disabled',true);
    $(".my-hide-field2").removeAttr("disabled"); 
  }  
});



//bootstrap modal
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

//date range picker
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });

//color picker
  var link;
  $('#color-wrapper').on('click', 'a', function (event) {
    link = $(this).parent().attr('id');
    $('#color-wrapper a').removeClass("active-color");
    $(this).addClass("active-color");
    $('#color-value').val(link);
    console.log(link);
  })

/* show file value after file select */
if($('*').is('.custom-file-input')){
  document.querySelector('.custom-file-input').addEventListener('change',function(e){
    var fileName = document.getElementById("myInput").files[0].name;
    var nextSibling = e.target.nextElementSibling
    nextSibling.innerText = fileName
  })
}

/* add FAQ */
  var MaxInputs = 20; 
  var Wrap  = $("#Wrapper1"); 
  var AddButton = $("#INeedMore"); 
  var x = Wrap.length; 
  var FieldCount=0; 
   
  $(AddButton).click(function (e)  
  {
          if(x <= MaxInputs) 
          {
              FieldCount++; 
              $(Wrap).append('<div class="col-12 mb-5"><input type="text" class="form-control mb-2" id="faq['+ FieldCount +']" name="faq['+ FieldCount +']" placeholder="Write your question here" value=""><textarea class="form-control" id="faq_answer['+ FieldCount +']" rows="7" placeholder="Write your answer here"></textarea><a href="#" class="removeclass text-right mt-2 d-flex justify-content-end"><button type="button" class="btn btn-sm btn-transperent"><i class="fa-solid fa-trash-can"></i></button></a></div>');
              x++;   
          }
  return false;
  });
   
  $("body").on("click",".removeclass", function(e){
          if( x >= 1 ) {
                  $(this).parent('div').remove();
                  x--;
          }
  return false;
}); 

  
var MaxInputs2 = 20; 
var Wrap2  = $("#Wrapper2"); 
var AddButton2 = $("#INeedMore2"); 
var x2 = Wrap2.length; 
var FieldCount2=0; 
 
$(AddButton2).click(function (e)  
{
        if(x2 <= MaxInputs2) 
        {
            FieldCount2++;             
            $(Wrap2).append('<div class="col-12 mb-3 d-flex"><div class="lead emoji-picker-container mr-2 my-caret"><input type="text" class="form-control my-caret" data-emojiable="true" name="emoji['+ FieldCount2 +']" maxlength="1"></div><div class="w-100 pr-2"><input type="text" class="form-control mb-2" id="emoji_text['+ FieldCount2 +']" name="emoji_text['+ FieldCount2 +']" placeholder="eg Exclusive members area" value=""></div><a href="#" class="removeclass2"><button type="button" class="btn btn-sm btn-transperent my-fx-btn"><i class="fa-solid fa-trash-can"></i></button></a></div> ');
            x2++;  
            window.emojiPicker.discover(); 
        }
return false;
});
 
$("body").on("click",".removeclass2", function(e){
        if( x2 >= 1 ) {
                $(this).parent('div').remove();
                x2--;
        }
return false;
}); 


//select modal

if($('*').is('#mode1')){
  $("#mode1").on("change", function () { 
           
    if($(this).val() === 'Draft_mode'){      
      $("#dot").removeClass("dot-green");
      $("#dot").addClass("dot-grey");
  }
    if($(this).val() === 'Active_mode'){
       $('#exampleModal2').modal('show');
       $("#dot").removeClass("dot-grey");
       $("#dot").addClass("dot-green");
   }
});
}


//scroll
var $page = $('html, body');
$('a[href*="#"]').click(function() {
    $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 400);
    return false;
});

//clear Input field
/*
$('.a1').click(function() {


$(".clear_field").trigger('reset');

});
*/



/*
$('.emoji-menu').click(function(){

    $(".emoji-menu").addClass("hide-link");
});
*/

});