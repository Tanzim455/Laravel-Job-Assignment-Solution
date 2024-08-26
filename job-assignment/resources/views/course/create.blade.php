<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
   
<button type="button" class="modulebutton text-white bg-blue-700 hover:bg-blue-800 
focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Module</button>
<div class="moduleinput"></div>
<div class="contentinput"></div>
<div class="saveappend"></div>

<div class="successOrFailure">

<script>
    let modulebutton = document.querySelector('.modulebutton');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let alertmessage=document.querySelector('.successOrFailure');
    modulebutton.addEventListener('click', function() {
        let moduleinput = document.querySelector('.moduleinput');
        moduleinput.classList.add('flex', 'flex-col', 'w-1/4', 'space-y-2');
        let save_append = document.querySelector('.saveappend');
        
        // Create and append input field
        let inputfield = document.createElement('input');
        inputfield.classList.add('inputclass', 'px-6', 'py-1', 'border', 'rounded-md');
        moduleinput.append(inputfield);
        
        // Check if save button already exists
        if (!document.querySelector('.save-button')) {
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

            save_button.addEventListener('click', async function(e) {
                e.preventDefault();
                console.log("Clicked");

                let allInputClass = document.querySelectorAll('.inputclass');
                let inputData=[];
                allInputClass.forEach(async input => {
                    console.log(input.value);
                    inputData.push({ title: input.value });
                   
                });
                const response = await fetch('http://127.0.0.1:8000/course-module/store', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    addMoreInputFields: inputData,
                }),
            });

            let message = await response.json();
            
            
            if(message.status===200){
                allInputClass.forEach(async input => {
                    input.value='';
                   
                });
                    alertmessage.textContent=`${message.message}`;
                    alertmessage.classList.add('p-4','mb-4','text-sm','text-green-800','rounded-lg','bg-green-50','dark:bg-gray-800', 'dark:text-green-400');
                    
                 }
                 if (message.status === 400) {
    const errors = message.errors;

    for (const field in errors) {
        if (errors.hasOwnProperty(field)) {
           console.log(field);
           
            
            const messages = errors[field];
            messages.forEach(message => {
                alertmessage.textContent=`${message}`;
                alertmessage.classList.add('p-4', 'mb-4', 'text-sm', 'text-green-800', 'rounded-lg', 'bg-red-50', 'dark:bg-red-800', 'dark:text-red-400');
                // You can display this message in the UI as needed
            });
        }
    }
}



                
                
            });
        }
    });
</script>
</body>
</html>
