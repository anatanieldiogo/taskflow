
// $('#store_list_form').on('submit', function (e) {
//     e.preventDefault();
    
//     $.ajax({
//         type: 'POST',
//         url: '/create-list',
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
//         },
//         data: new FormData(this),
//         dataType: "json",
//         contentType: false,
//         cache: false,
//         processData: false,
//         success: function (response) {
//             $('.list-content-home').empty();
//             getLists()
            
//             closeGuideWrapperPanels()
//         },
//         error: function(data){
//             //console.log(data)
//         }
//     });
// });


function openTodo(){
    $('.todo-view').css('display', 'flex');
    //$('.todo-view').toggle();
}

$('#closeTask').click(function (e) { 
    e.preventDefault();
    $('.todo-view').css('display', 'none');
});

