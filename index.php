<!DOCTYPE html>
    <head>
        <title>Assignment4</title>
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       <style>
           
           .jumbotron{
               height: 100px;
               padding-top: 20px;
               border-radius: 0px;
               background-color: black ;
            }
            .container{
                align-items: center;
                justify-content: center; 
                padding: 40px 40px;
                margin-top: -30px;
            }
            #table{
                display:none;
            }
            .cont{
                padding-top: 0px;
                margin-top: -20px;
                text-align: center;
            }
            
                footer{
                position: fixed;
                left: 0;
                height: 10%;
                bottom: 0px;
                width: 100%;
                color:white;
                background color:#4DA8DA
                color: black;
                text-align: center;
                }
                
                
       </style>
    </head>
    <body>
        <div class="jumbotron text-center" ><h1 style="color: white; background color:#4DA8DA;">Restaurant Menu</h1></div>
       

        <div class="cont">
            <h1>Select the menu item to see its details</h1>
          </div>
          
          <div class="container">
            <select name="item restaurant-dropdown restaurant" class="custom-select custom-select-lg mb-3" id="restaurant">
              <option value="">Select Menu</option>
          </select>
          <br>
        
          <table id="table" class="table table-hover">
            <tr>
              <th>Name</th>
              <td id="menuname"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="psmall"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="plarge"></td>
            </tr>
            <tr>
              <th>Small Portion Name</th>
              <td id="spname"></td>
            </tr>
            <tr>
              <th>Large Portion Name</th>
              <td id="lpname"></td>
            </tr>
          </table>
        
      
          </div>
        
       
        
        
        <footer style="background color:#4DA8DA;">
            <!-- <div class="footer1">
                <div class="container-fluid"> -->
                    <p style=" background color:#4DA8DA; color: black;">&copy; Copyright 2020</p>
                    <h4 style=" background color:#4DA8DA; color:black;">LOVE FOR FOOD!!!</h4>
                    
                    <!-- </div>
              </div> -->
        </footer>
            
        <script src="jquery-3.5.1.min.js"></script>
        <script>
        let base_url = "https://foodforlove.000webhostapp.com/details.php";

        $("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });

        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].name;
                opt.value = data[key].name; 
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }

        
            function getMenuItemList(i)
            {
                
                let index=i.target.value;
                
                console.log(index);
                let url=base_url + "?req=menuName&name="+index;
                $.get(url,function(data,success){
                    
                        
                        if(data != null){
                        let x = data;
                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                        let smallpname = x.small_portion_name;
                        if(smallpname == null)
                        {
                            smallpname = "Not Available";
                        }
                        let largepname = x.large_portion_name;
                        if(largepname == null)
                        {
                            largepname = "Not Available";
                        }
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                        document.querySelector("#spname").textContent = smallpname;
                        document.querySelector("#lpname").textContent = largepname;
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
        
        

        
    </script>


        
    </body>
</html>