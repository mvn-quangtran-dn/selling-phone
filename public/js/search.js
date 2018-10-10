$('#search_user').on('keyup',function(){
  $value=$(this).val();
      $.ajax({
      type : 'get',
      url: "{{route('admin.users.search')}}",
      data:{'search':$value},
      success:function(data){
        $('tbody').html(data);
    }	
  });
})