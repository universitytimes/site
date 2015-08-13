  <script type="text/javascript">
    
    
    $(document).ready(function(){
    
    
    
    
    
        $("#section").bind('change', function () {
    var str = "";
  
    str = parseInt($("select option:selected").val());
        
        if(str == 1178){
            
         $("#posttypeselector").show();
         
             $("#newswoo").show();  
       
             
         $("#opinionwoo").hide();
         
         
          $(".changernews").attr("id", "articletype_noncename");
          
        
         
        
            
        
         
         $("#sportswoo").hide();
            
            
        }
        
        else if(str == 1180){
            
         $("#posttypeselector").show();
         
             
          $("#opinionwoo").show();  
          
           $(".changeropinion").attr("id", "articletype_noncename"); 
          
         $("#newswoo").hide();
            
        
         
         $("#sportswoo").hide();
            
            
        }
        
       
        
        
        
      else
          $("#posttypeselector").hide();
});

$('#section').trigger('change');

});

</script>
