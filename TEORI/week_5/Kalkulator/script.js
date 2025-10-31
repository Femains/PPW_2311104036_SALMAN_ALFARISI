const display = document.getElementById("display");
let isResultShown = false;

function appendValue(value) {
  if (isResultShown) {
    display.value = "";
    isResultShown = false;
  }
  display.value += value;
}

function clearDisplay() {
  display.value = "";
}

function deleteLast() {
  display.value = display.value.slice(0, -1);
}

function calculate() {
  try {
    display.value = eval(display.value);
    isResultShown = true;
  } catch {
    display.value = "Error";
    isResultShown = true;
  }
}
