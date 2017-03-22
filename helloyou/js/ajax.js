/**
 * Example function ajax with Wordpress
 * Step 1 : Verify if element is present on the DOM
 * Step 2 : Change @param {action} by the name of action define in the file PHP
 * Step 3 : Change @param {datas} by your datas
 * Step 4 : Treatment response
 */

var buttonTools = document.querySelector(".button_tools");
if (typeof(buttonTools) != 'undefined' && buttonTools != null){
    buttonTools.addEventListener("click", function(){
        jQuery.post(
            ajaxurl,
            {
                'action': 'mon_action',
                'datas': 'someData'
            },
            function(response){
                console.log(response);
            }
        );
    })
}