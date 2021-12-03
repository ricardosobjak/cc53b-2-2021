//alert("Hello!!!");

// Declaração de variável
var a = 5;
a = 'Ricardo';

/*
 DEFINIÇÃO DE VARIÁVEIS
*/
let x = 5;
let y = 9;

const z = x + y;
console.log('A soma de ' + x + ` e ` + y + ' é ' + z);
console.log(`A soma de ${x} e ${y} é ${z}`);
console.log(a);

/*
 DEFINIÇÃO DE FUNÇÕES
*/
function soma(a, b) {
  return a + b;
}

// Definição de um arrow function (função de seta)
const ola = (nome = 'usuário') => {
  console.log(`Olá ${nome}`);
};

console.log(soma(10, 50));

ola();
ola('Juca');

/**
 * Estrutra de decisão
 */
var tempo = 'sol';

if (tempo == 'chuva') {
  console.log('Vou ficar em casa');
} else {
  console.log('Vou à praia!');
}

/**
 * Estrutura de repetição
 */
for (let i = 0; i <= 10; i++) {
  console.log(`2 * ${i} = ${2 * i}`);
}

let cont = 0;
while (cont < 10) {
  console.log(`Contei ${cont++}`);
}

do {
  console.log(`Contando reverso: ${cont--}`);
} while (cont > 0);

/**
 * ARRAYS
 */

const frutas = ['Maça', 'Banana', 'Melancia', 'Melão', 'Morango'];

console.log(frutas);

for(let i=0; i < frutas.length; i++) {
  console.log( frutas[i] );
}
