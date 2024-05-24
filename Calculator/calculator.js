// To enable Buttons function
    let display = document.getElementById('display');
    let openBracket = document.getElementById('openBracket');
    let closeBracket = document.getElementById('closeBracket');
    let ans_btn = document.getElementById('ans');
    let delete_btn = document.getElementById('delete');
    let clear_btn = document.getElementById('clear');
    let percentage = document.getElementById('percentage');
    let squareRoot = document.getElementById('squareRoot');
    let multiply = document.getElementById('multiply');
    let divide = document.getElementById('divide');
    let plus = document.getElementById('plus');
    let minus = document.getElementById('minus');
    let period = document.getElementById('period');
    let plus_minus = document.getElementById('plus-minus');
    let number_btn = document.querySelectorAll('.num-btn');
    let result = document.querySelector('.result');

    openBracket.addEventListener('click', () => displayVal('('));
    closeBracket.addEventListener('click', () => displayVal(')'));
    ans_btn.addEventListener('click', () => displayVal('ans'));
    delete_btn.addEventListener('click', deleteVal);
    clear_btn.addEventListener('click', clearVal);
    percentage.addEventListener('click', () => displayVal('%'));
    squareRoot.addEventListener('click', () => displayVal('√'));
    multiply.addEventListener('click', () => displayVal('*'));
    divide.addEventListener('click', () => displayVal('/'));
    plus.addEventListener('click', () => displayVal('+'));
    minus.addEventListener('click', () => displayVal('-'));
    period.addEventListener('click', () => displayVal('.'));
    plus_minus.addEventListener('click', toggleSign);
    result.addEventListener('click', calculate);

    number_btn.forEach(button => {
        button.addEventListener('click', function() {
            displayVal(this.textContent);
        });
    });

    //To display functionality

    function displayVal(value) {
        if (display.value == 'Error') {
            display.value = value;
        } else {
            display.value += value;
        }
    }

    function deleteVal() {
        display.value = display.value.slice(0, -1);
    }

    function clearVal() {
        display.value = '';
    }

    function calculate() {
        try {
            let expression = display.value.replace(/√/g, 'Math.sqrt(').replace(/%/g, '/100');
            let openBrackets = (expression.match(/Math.sqrt\(/g) || []).length;
            let closeBrackets = (expression.match(/\)/g) || []).length;
            expression += ')'.repeat(openBrackets - closeBrackets);
            display.value = eval(expression);
        } catch (e) {
            display.value = 'Error';
        }
    }

    function toggleSign() {
        if (display.value.startsWith('-')) {
            display.value = display.value.substring(1);
        } else {
            display.value = '-' + display.value;
        }
    }