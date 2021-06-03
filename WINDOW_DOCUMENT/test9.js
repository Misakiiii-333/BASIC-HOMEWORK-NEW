// class Student {

//     avg() {
//         console.log((80 + 70) / 2);
//     }
// }
// var a001 = new Student();
// a001.avg();

class Student {
    avg(math, english) {
        console.log((math + english) / 2);
    }
}
var a001 = new Student();
a001.name="sato"; //プロパティを定義
a001.avg(80,70);

console.log(a001.name);
console.log(a001.gender); // プロパティが未定義のためundefinedと出力される