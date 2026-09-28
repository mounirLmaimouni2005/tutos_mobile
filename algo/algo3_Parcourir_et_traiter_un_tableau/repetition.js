let numbers = [4, 7, 2, 7, 9, 4, 5]; 
let rptNumbers = []; 

for(let i = 0; i < numbers.length; i++){ 

    let counter = 0;

    for(let x = 0; x < numbers.length; x++){ 

        if(numbers[i] == numbers[x]){ 
            counter++;
        }
    }

    if(counter > 1){

        let alreadyExist = false;

        for(let x = 0; x < i; x++){

            if(numbers[i] == numbers[x]){
                alreadyExist = true;
            }
        }

        if(alreadyExist == false){
            rptNumbers.push(numbers[i]);
    }
}
}
console.log(rptNumbers)
