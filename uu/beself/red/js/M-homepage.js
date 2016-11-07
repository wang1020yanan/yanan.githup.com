/**
 * Created by adc on 2015/9/14.
 */
$(document).ready(
    function () {
          $(".hp-menu").click(
              function(){
                  $(".hp-menu").css('color','black');
                  setTimeout(
                      function(){
                          $(".hp-menu").css('color','#ff9801')
                      },200
                  );
              }
          );
    }
);