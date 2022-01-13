// soal 1
let hitungPersegiPanjang = (panjang, lebar) => panjang * lebar;

console.log(hitungPersegiPanjang(1,2));



// soal 2
const newFunction = (firstName, lastName) => {

    return {
        firstName,
        lastName,
        fullName() { console.log(firstName + " " + lastName) } 
    }
}
   
//Driver Code 
newFunction("William", "Imoh").fullName();
  


// soal 3
const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
}

let {firstName,lastName,address,hobby} = newObject;

console.log(firstName, lastName, address, hobby)



// soal 4
const west = ["Will", "Chris", "Sam", "Holly"]
const east = ["Gill", "Brian", "Noel", "Maggie"]
const combined = [...west,...east];
//Driver Code
console.log(combined)


// soal 5
const planet = "earth" 
const view = "glass" 
var before = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}` 
console.log(before);