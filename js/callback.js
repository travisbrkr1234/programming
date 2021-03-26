var a = "123abc";

// regex \g[a-Z]*?
// direct comparison to actual letters +4
// parsing - parseInt() - Rons a cheater but that is ok....
// What happens when passed accented characters?

var b = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
// Gonna use str.toLowerCase() var alphabetCaps = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

// returns true if a letter found in the passed in string
function containsALetter(fromPostMan, alphabet) {
  for(var i = 0; i < fromPostMan.length;i++) {
    // console.log(fromPostMan[i]);
    //
    for(var j=0;j<alphabet.length;j++) {
      console.log(fromPostMan[i].toLowerCase() === alphabet[j]);
      if(fromPostMan[i].toLowerCase() === alphabet[j]) {
        return true;
      }
    }
  }
}

// call a function
containsALetter(a,b);


// for (var i = 0; i<=2 ;i++) {
  // console.log(i);
// }


// console.log(typeof Number.isInteger(fromPostMan));
// console.log(Number.isInteger(fromPostMan));
// console.log("====================");
// console.log(typeof fromPostMan);
// console.log(typeof Number(fromPostMan));


// if(typeof fromPostMan === 'number') {
//   console.log('I am a number');
// } else {
//   console.log('I am a NOT A Number, verrrry niiice');
// }