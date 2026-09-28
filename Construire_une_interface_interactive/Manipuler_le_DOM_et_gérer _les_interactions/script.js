document.addEventListener('DOMContentLoaded', () => {

    //get elements
        let showformBtn = document.querySelector('#btn-show-form');
        showformBtn.hidden = false;

        let sectionForm = document.querySelector('#section-form');
        sectionForm.hidden = true;

        let inputNom = document.querySelector('#categorie');
        let inputColor = document.querySelector('#colour');
        let btnAjouter = document.querySelector('#btn-ajouter');
        let btnCancel = document.querySelector('#btn-cancel-form')

        let tbody = document.querySelector('#table-categories-body');

    // hide button novelle catesgorie and show form
        showformBtn.addEventListener('click', function(e) {
            e.preventDefault();
            sectionForm.hidden = false;
            showformBtn.hidden = true;

        });

   // add categorie
        btnAjouter.addEventListener('click' , function(e){
        e.preventDefault();

        let inputnomValue = inputNom.value;
        let inputcolorValue = inputColor.value;

         let tr = document.createElement('tr');
        let th1 = document.createElement('th');
        let th2 = document.createElement('th');
         
         th1.innerHTML = inputnomValue;
         th2.innerHTML = inputcolorValue;

         tr.appendChild(th1);
         tr.appendChild(th2);

         tbody.insertAdjacentElement('beforeend' , tr);

        inputNom.value = "";
        inputColor.value = "";

            
        })     

        // reast element
        btnCancel.addEventListener('click' , function(e){
            e.preventDefault();
            inputNom.value = "";
            inputColor.value = "";
        })
});

