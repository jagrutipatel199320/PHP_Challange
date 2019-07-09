//Getting value from "ajax.php".
function splitStr(str) {
  // body...
var output="";

              var temp =str.split(" or ");
              if(temp.length>1){
                for(var i=0;i<temp.length;i++){
                  if(temp[i].trim()!=null){
                    output+= `<a href="">/app/`+temp[i]+`</a>`;
                  }
                  if(temp.length!=1 && i!=temp.length-1){
                     output+= ` or `;
                  }
                }
              }
              var temp1 =str.split(" and ");
              if(temp1.length>1){
                   for(var i=0;i<temp1.length;i++){
                    if(temp1[i].trim()!=null){
                      output+= `<a href="">/app/`+temp1[i]+`</a>`;
                    }
                    if(temp1.length!=1 && i!=temp1.length-1){
                       output+= ` and `;
                    }
                }
            }else if(temp.length<=1){
              output+=  output+= `<a href="">/app/`+str+`</a>`;;
            }
            

            return output;
}
function resultFormate(data){
 var html="";
     $.each(data,function(index,item){
              html+=`<tr>
                <td>`+item.Description+`</td>
                <td>
                  <ul>`;
                  if(item.Lines_Business.Liability != ''){
                    html+= `<li>Liability:`
                    html+= splitStr(item.Lines_Business.Liability)
                    html+= `</li>`;
                  }
                  if(item.Lines_Business.Property != ''){
                     html+= `<li>Property: `+splitStr(item.Lines_Business.Property)+`</li>`;
                    }
                    if(item.Lines_Business.EO != ''){
                     html+= `<li>E&O: `+splitStr(item.Lines_Business.EO)+`</li>`;
                    }

                  if(item.Lines_Business.Excess != ''){
                     html+= `<li>Excess: `+splitStr(item.Lines_Business.Excess)+`</li>`;
                    }
                    if(item.Lines_Business.Umbrella != ''){
                     html+= `<li>Umbrella: `+splitStr(item.Lines_Business.Umbrella)+`</li>`;
                    }
                 html+=`</ul>
                </td></tr>`;
               });

      $("#display").html(html);
}


$(document).ready(function() {
  // list all data
 $.ajax({
         //AJAX type is "Post".
         type: "POST",
         dataType: 'json',
         //Data will be sent to "ajax.php".
         url: "ajax.php",
         //Data, that will be sent to "ajax.php".
         data: {
         },
         //If result found, this funtion will be called.
         success: function(data) {
          console.log(data);
            resultFormate(data);
          }
  });

   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
          $.ajax({
           type: "POST",
           dataType: 'json',
           url: "ajax.php",
           data: {
               search_text:$('#search').val(),
               search_language:$("input[name='language']:checked").val()
           },
           success: function(data) {
            console.log(data);
             resultFormate(data);
            }
        });
   });


  $("#language :radio").change(function(e){
      $.ajax({
           type: "POST",
           dataType: 'json',
           url: "ajax.php",
           data: {
                search_text:$('#search').val(),
                search_language:$("input[name='language']:checked").val()
           },
           success: function(data) {
             resultFormate(data);
            }
        });
    
  });
});

