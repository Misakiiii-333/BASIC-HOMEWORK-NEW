var Student = class{
    //第一引数のnameを初期化メソッドのnameが受け取り、それをthis.nameに代入
    constructor(name) { 
        this.name =name; //thisにインスタンスが代入される

    }
    avg(math,english) {
        console.log((math + english) /2);
    }
}

var a001 = new Student("sato");
// a001.name = "sato"; //プロパティを定義
// a001.avg(80,70);
console.log(a001.name);

var a002 = new Student("tanaka");
// a002.name = "tanaka";
console.log(a002.name); 