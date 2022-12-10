var posicao2 = 0
var posicao = 0



document.querySelector('#proximo').addEventListener('click', () => {
  let items = ([...document.querySelectorAll('.item')].length - 3) *100
  if(items  == posicao){
    posicao = 0
  }else{
    posicao+=100
  }
    
    console.log(posicao)
    document.documentElement.style
    .setProperty('--posicao', `-${posicao}%`);
})

document.querySelector('#antes').addEventListener('click', () => {
  if(posicao <= 0){
    return
  }else{
    posicao-=100
  }
 
  console.log(posicao)
  document.documentElement.style
  .setProperty('--posicao', `-${posicao}%`);
})




document.querySelector('#proximo2').addEventListener('click', () => {
  let items = ([...document.querySelectorAll('.item2')].length - 3) *100
  if(items  == posicao2){
    posicao2= 0
  }else{
    posicao2+=100
  }
    
    console.log(posicao2)
    document.documentElement.style
    .setProperty('--posicao2', `-${posicao2}%`);
})

document.querySelector('#antes2').addEventListener('click', () => {
  if(posicao2 <= 0){
    return
  }else{
    posicao2-=100
  }
 
  console.log(posicao)
  document.documentElement.style
  .setProperty('--posicao2', `-${posicao2}%`);
})




const teste = (a) => {
  console.log('chamow??')
    document.querySelector(`#btn${a}`).click();

}