let numbers = [1, 4, 2, 3, 5, 7, 6, 11, 8, 10, 9];

for (let i = 0; i < numbers.length; i++) {
  for (let j = 0; j < numbers.length - 1; j++) {
    
    
    if (numbers[j] > numbers[j + 1]) {
      let temp = numbers[j];
      numbers[j] = numbers[j + 1];
      numbers[j + 1] = temp;
    }

  }
}

console.log(numbers);
