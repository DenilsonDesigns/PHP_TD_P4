// alert("connectfed");

document.addEventListener("keydown", event => {
  const charList = "qwertyuiopasdfghjklzxcvbnm";
  const key = event.key.toLowerCase();
  console.log(key);

  if (charList.indexOf(key) !== -1) {
    $(`.keyboard #${key}`).click();
  }
});

//********SOURCES */
// https://medium.com/javascript-in-plain-english/how-to-detect-a-sequence-of-keystrokes-in-javascript-83ec6ffd8e93
//https://www.freecodecamp.org/news/here-is-the-most-popular-ways-to-make-an-http-request-in-javascript-954ce8c95aaa/
