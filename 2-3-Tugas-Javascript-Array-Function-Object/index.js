// soal 1
var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];
daftarHewan = daftarHewan.sort();

for(var i = 0; i<daftarHewan.length ; i++)
{
    console.log(daftarHewan[i]);
}


// soal 2

function introduce(data)
{
    return "Nama saya " +data.name + ", umur saya " +data.age + " tahun, alamat saya di " +data.address + ", dan saya punya hobby yaitu " +data.hobby + "!"
}
 
var data = {name : "Vincent" , age : 20 , address : "Jalan Semarang" , hobby : "Coding" }
 
var perkenalan = introduce(data)
console.log(perkenalan)


//soal 3

function hitung_huruf_vokal(kalimat)
{
    return kalimat.length;

}

var hitung_1 = hitung_huruf_vokal("Muhammad")

var hitung_2 = hitung_huruf_vokal("Iqbal")

console.log(hitung_1 , hitung_2) // 3 2

// soal 4

function hitung(angka)
{
    return ((angka-1)*2);
}


console.log( hitung(0) ) // -2
console.log( hitung(1) ) // 0
console.log( hitung(2) ) // 2
console.log( hitung(3) ) // 4
console.log( hitung(5) ) // 8

