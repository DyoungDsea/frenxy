$(document).ready(function(){



    $(document).on("click","#unban", function(){
        var cid = $(this).attr("user");
        magicFunction('Unban this account?', 'ajax-success', 'UnBan', cid, 'Confirmed');
    })

    $(document).on("click","#ban", function(){
        var cid = $(this).attr("user");
        magicFunction('Ban this account?', 'ajax-success', 'Ban', cid, 'Confirmed');
    })

    $(document).on("click","#catDelete", function(){
        var cid = $(this).attr("user");
        magicFunction('Delete for me?', 'ajax-success', 'catDelete', cid, 'Deleted');
    })

    $(document).on("click","#imgDelete", function(){
        var cid = $(this).attr("user");
        magicFunction('Delete for me?', 'ajax-success', 'imgDelete', cid, 'Deleted');
    })

    $(document).on("click","#postDelete", function(){
        var cid = $(this).attr("user");
        magicFunction('Delete for me?', 'ajax-success', 'postDelete', cid, 'Deleted');
    })

    $(document).on("click","#confirmPost", function(){
        var cid = $(this).attr("user");
        magicFunction('Enable for me?', 'ajax-success', 'confirmPost', cid, 'Enabled!');
    })

    $(document).on("click","#disConfirmPost", function(){
        var cid = $(this).attr("user");
        magicFunction('Disable for me?', 'ajax-success', 'disConfirmPost', cid, 'Disabled!');
    })

    //sure 
    $(document).on("click","#gameSureOpen", function(){
        var cid = $(this).attr("user");
        magicFunction('Open for me?', 'ajax-success', 'gameSureOpen', cid, 'Confirmed');
    })

    $(document).on("click","#gameSureHide", function(){
        var cid = $(this).attr("user");
        magicFunction('Hide for me?', 'ajax-success', 'gameSureHide', cid, 'Confirmed');
    })

    $(document).on("click","#gameSureDelete", function(){
        var cid = $(this).attr("user");
        magicFunction('Delete for me?', 'ajax-success', 'gameSureDelete', cid, 'Deleted');
    })


    $(document).on("click","#gameWon", function(){
        var cid = $(this).attr("user");
        magicFunction('Mark as Won?', 'ajax-success', 'gameWon', cid, 'Confirmed');
    })

    $(document).on("click","#gameLost", function(){
        var cid = $(this).attr("user");
        magicFunction('Mark as Lost?', 'ajax-success', 'gameLost', cid, 'Confirmed');
    })

    $(document).on("click","#updateGames", function(){
        var cid = '';
        magicFunction('Approve all drafted games?', 'ajax-success', 'updateGames', cid, 'Approved');
    })


    $(document).on("change", "#catego", function(){
        var option = $(this).find('option:selected');
        var value= option.val();
        // console.log(value);
        if(value !=""){
            fireDataForMe("category-search", "Sub", value, "#sub");
        }        
    });

    $(document).on("change", "#update", function(){
        var option = $(this).find('option:selected');
        var value= option.val();
        var i = $(this).attr('index');
        // console.log(value);
        if(value !=""){
            fireDataForMe("category-search", "Sub", value, "#sub"+i);
        }        
    });
    
    $(document).on("click", "#copy", function(){
        var id = $(this).attr("data-id");
        var rtn = $(this).attr("data-rtn");
        // alert(rtn)
        // var copy = $("#copy"+id);
        copyToClipboard("#copy"+id);
        $("#"+rtn).text("Copied")
    })
    
    

})

$(function() {
    // code...
    var currentValue = $('.update option:selected'), i=1;
    currentValue.each(function(){
        var value = $(this).val();
        var gid = $(this).attr("pid");
        if(value !=""){
            fireDataForMe("category-search", "Subs", value, "#sub"+i++, gid);
        }
     });
});

function fireDataForMe(dataLink, dataPost, dataValue, dataId, addValue=''){
    $.ajax({
        url:dataLink,
        method:"POST",
        data:{search:dataPost,id:dataValue, value:addValue},
        success:function(data){
            $(dataId).html(data);           
        }    
    });
}



function magicFunction(sweetTitle, dataPost, dataTitle, dataId, dataSuccess, dataValueA='', dataValueB='', dataValueC='' ){
    Swal.fire({
        position: 'center',
        type: 'warning',
        title: sweetTitle,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'        
        }).then((result) => {
        if (result.value){
            sendAjaxMessage(dataPost, dataTitle, dataId, dataSuccess,'success', dataValueA, dataValueB, dataValueC)
        }
    });    
   
}


function sendAjaxMessage(dataPost, dataTitle, dataId, sweetTitle, sweetType, dataValueA='', dataValueB='', dataValueC='' ){
    $.ajax({
        url:dataPost,
        method:"POST",                    
        data:{Message:dataTitle, id:dataId, valueA:dataValueA, valueB:dataValueB, valueC:dataValueC},        
        success:function(){
            setInterval(function(){
                // window.location.assign(dataLink);
                window.location.reload();
            },2000);             
        }
    }) .done(function(){
        Swal.fire({
            type:sweetType, 
            title:sweetTitle
        });
    }) .fail(function(){
        Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
    });
}




//toast
function fireForMe(dataResult, dataType){
    $.toast({
       heading: 'Result', 
       text: dataResult, 
       position: 'bottom-right',
       loaderBg: '#ff6849',
       icon: dataType,
       hideAfter: 3500,
       stack: 6
   })
 }


//  function CopyToClipboard(containerid) {
//     if (document.selection) { 
//         var range = document.body.createTextRange();
//         range.moveToElementText(document.getElementById(containerid));
//         range.select().createTextRange();
//         document.execCommand("copy"); 
    
//     } else if (window.getSelection) {
//         var range = document.createRange();
//          range.selectNode(document.getElementById(containerid));
//          window.getSelection().addRange(range);
//          document.execCommand("copy");
//          alert("text copied") 
//     }}

//Copy to clipboard
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).html()).select();
    document.execCommand("copy");
    $temp.remove();
    // var btn = $(this).attr("title");
    // rtn.text("Copied");
  }