
<html>
    <head>
        <?php include '../cabezera.php'; ?>
        <script type="text/javascript">
            $("document").ready(function () {
            
        $("#formulario").submit(function () {
                    var data = {
                        "action": "test"
                    };
                    
                    data = $(this).serialize() + "&" + $.param(data);
                
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "pruebaintermedio.php", //Relative or absolute path to response.php file
                        data: data,
                        success: function (echo) {
            
                            console.log(echo);
                            
                        }
                    });
                  
                });
            });
        </script>
    </head>
    <body>
        <form id="formulario"  method="post" accept-charset="utf-8">
            <input type="text" name="favorite_beverage" value="aaass" placeholder="Favorite restaurant" />
            <input type="text" name="favorite_restaurant" value="ssss" placeholder="Favorite beverage" />
            <select name="tipo">
                <option value="leer">l</option>
                <option value="set">set</option>
            </select>
            <input type="submit" name="submit" value="Submit form"  />
        </form> 
        
        <div class="the-return">
  [HTML is replaced when successful.]
</div>
    </body>
</html>