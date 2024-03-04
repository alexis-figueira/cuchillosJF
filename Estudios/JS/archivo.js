class Animal {
    constructor (especie, edad, color){
        this.especie = especie ;
        this.edad = edad ;
        this.color = color ;
        // this.info = "Soy " + this.especie + ", tengo " + this.edad + " años y soy de color " + this.color ;
        this.info = `Soy ${this.especie}, tengo ${this.edad} años y soy de color ${this.color}` ;
    }
    verInfo(){
        document.write(this.info + "<br>")
    }
}

class Perro extends Animal {
    constructor(especia, edad, color, raza){
        super(especia, edad, color);
        this.raza = raza ;
    }
}


let perro = new Perro ("perro", 5, "marron", "doberman");
let gato = new Animal ("gato", 2, "azul");
let pajaro = new Animal ("perro", 5, "marron");

perro.verInfo();
gato.verInfo();
pajaro.verInfo();