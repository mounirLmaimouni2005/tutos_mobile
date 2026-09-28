fetch('../backend/categories.php')

.then(response =>response.json())
.then(data=>{

    const ul = document.getElementById("list_categories")
    
    data.forEach(category  =>  {
        const li = document.createElement("li");
        
        li.textContent=category.nom;
        ul.appendChild(li);
        
    });


});