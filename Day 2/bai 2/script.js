function sliceString(str, bp) {
    let start = 0,
      numString = 1;
    while (start < str.length - 1) {
      if (start + bp >= str.length) {
        console.log("String" + numString + ":");
        for (let i = start; i < str.length; i++){
          console.log(str[i]);
        }
        start = str.length - 1;
      } else if (str[start + bp] == " ") {
        console.log("String" + numString + ":");
        for (let i = start; i < start + bp; i++) {
          console.log(str[i]);
        }
        start += bp + 1;
        numString++;
      } else if (str[start + bp] != " ") {
        for (let j = start + bp; j < str.length; j++) {
          if (str[j] == " " || j == str.length - 1) {
            console.log("String" + numString + ":");
            for (let i = start; i < j; i++) {
              console.log(str[i]);
            }
            start = j + 1;
            numString++;
            break;
          }
        }
      }
    }
  }
  let str = "Chung toi toi HTC hoc Magento";
  let bp = 5;
  sliceString(str, bp);
