const canvas = document.getElementById('canvas1');
const ctx = canvas.getContext('2d');
canvas.width = 700;
canvas.height = 900;


// ctx.fillStyle = 'red';
// ctx.fillRect(100, 150, 200, 150);

// ctx.lineWidth = 10;
// ctx.strokeStyle = 'blue';
// ctx.lineCap = 'round';
// ctx.strokeRect(140, 100, 200, 150);

// ctx.beginPath();
// ctx.moveTo(300, 300);
// ctx.lineTo(350, 400);
// ctx.stroke();


//global settings

ctx.lineWidth = 10;
ctx.strokeStyle = 'magenta';

class Line {
    constructor(canvas){
        this.canvas = canvas;
        this.startX = Math.floor(Math.random() * this.canvas.width);
        this.startY = Math.floor(Math.random() * this.canvas.height);
        this.endX = Math.floor(Math.random() * this.canvas.width);
        this.endY = Math.floor(Math.random() * this.canvas.height);
        this.lineWidth = Math.floor(Math.random() * 15 + 1);
        this.hue = Math.floor(Math.random() * 360);
    }
    draw(context){
        context.strokeStyle = 'hsl(' + this.hue + ', 100%, 50%)';
        context.lineWidth = this.lineWidth;
        context.beginPath();
        context.moveTo(this.startX, this.startY);
        context.lineTo(this.endX, this.endY);
        context.stroke();
    }


}

const linesArray = [];
const numberOfLines = 50;
for (let i = 0; i < numberOfLines; i++){
    linesArray.push(new Line(canvas));
}

console.log(linesArray);
linesArray.forEach(line => line.draw(ctx));