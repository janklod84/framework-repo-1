$('#send').click(function () {
     
      // recueillir 
      $.ajax({
         url: '/admin/login',
         type: 'POST',
         data: {'id': 2},
         success: function (res) {
         	console.log(res);
         },
         error: function () {
         	alert('Error');
         }
      });
});