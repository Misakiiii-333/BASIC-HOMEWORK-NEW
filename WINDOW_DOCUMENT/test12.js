class Student {

    constructor(name) {
        this.name = name;
    }

    cal_avg(data) {
        var sum = 0;
        for(var i = 0;i < data.length; i++) { //配列の要素をひとつずつ変数に格納
            sum += data[i];
        }
        var avg = sum / data.length;
        return avg;
    }

    judge(avg) {
        var result;
        if(60 <= avg) {
            result = "passed";
        } else {
            result = "failed"
        }
        return result;
    }
}
var a001 = new Student("sato");//インスタンス化
var data =[70,65,50,10,30];　
//平均点をavgメソッドで計算し、returnで返ってきたものをavgに格納
var avg = a001.cal_avg(data);
var result = a001.judge(avg);//avgメソッドで判定

console.log(data.length);
console.log(a001.name);
console.log(avg);
console.log(result);