<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   
<button type="button" class="modulebutton text-white bg-blue-700 hover:bg-blue-800 
focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Module</button>
<div class="moduleinput">

</div>
<div class="contentinput">
    
</div>
<div class="saveappend"></div>

<script>
   let modulebutton = document.querySelector('.modulebutton');
let class_input = document.querySelector('.classinput');

modulebutton.addEventListener('click', function() {
    let moduleinput = document.querySelector('.moduleinput');
    moduleinput.classList.add('flex','flex-col','w-1/4','space-y-2')
    let save_append=document.querySelector('.saveappend');
    let inputfield = document.createElement('input');
    inputfield.classList.add('inputclass', 'px-6', 'py-1', 'border','rounded-md');
         
    moduleinput.append(inputfield);
            
           //If you only want to submit button and  one input
        
      
        
        
         
        if(!document.querySelector('.save-button')){
            let save_button = document.createElement('button');
        save_button.classList.add(
            'save-button', // Add a unique class to identify the button
            'text-white', 
            'bg-blue-700', 
            'hover:bg-blue-800', 
            'focus:ring-4', 
            'focus:ring-blue-300', 
            'font-medium', 
            'rounded-lg', 
            'text-sm', 
            'px-5', 
            'py-2.5', 
            'me-2', 
            'mb-2', 
            'dark:bg-blue-600', 
            'dark:hover:bg-blue-700', 
            'focus:outline-none', 
            'dark:focus:ring-blue-800'
        );
        save_button.textContent = "Save";
       
        save_append.append(save_button);

        save_button.addEventListener('click',function(e){
            console.log("Clicked");
            
            //    let allInputClass=document.querySelectorAll('.inputclass');
               

            //    allInputClass.forEach(a=>{
            //     console.log(a.value);
                
            //    });

               //Alternative way

               let allInputClass=document.getElementsByClassName('inputclass');
               
                 let input_array=Array.from(allInputClass);
                  console.log(input_array);
                  
                 input_array.forEach(a=>{
                    console.log(a.value);
                    
                 })
               
               
               
        });
        
        }
        
        

   
            // Check if the button already exists
          
       //If you want to submit more than one input but isngle button
     
       
       
       
       

       
      })


</script>
</body>
</html>