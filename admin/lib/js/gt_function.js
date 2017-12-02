/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//attendre que la page soit chargé
$(document).ready(function(){
   $("#gt_caroussel").caroussel({
       interval:1500,
       pause:false
       
    
   });
   
   
   $("#clic_couleur").click(function()
   {
        $(".clic").css("color","red");
   });
   
   
   
   
    
    
});

