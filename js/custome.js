$(document).ready(function() {
                $("li[id]").click(function(){
                                var value = $(this).attr('id');
                                $(".loading").fadeIn();
                                $.ajax({
                                        url : 'index.php',
                                        data : 'style='+value,
                                        cache : false,
                                        success : function(){
                                                location.reload();
                                        }
                                });
                        });
});