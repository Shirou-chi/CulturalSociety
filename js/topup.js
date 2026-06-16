document.addEventListener('DOMContentLoaded', function () {
    const bitcoinInput = document.getElementById('bitcoin-amount');
    const tax = document.getElementById('tax-amount');
    const discount = document.getElementById('dis-amount');
    const totalAmount = document.getElementById('total-amount');
    const payBtn = document.getElementById('payBtn');

    bitcoinInput.addEventListener('input', function () {
        let bitcoinAmount = parseInt(bitcoinInput.value);

        if (isNaN(bitcoinAmount) || bitcoinAmount <= 0 || bitcoinInput.value.includes('.')) {
            alert("Please enter a valid non-negative integer for Bitcoin amount.");
            bitcoinAmount = 0;
            bitcoinInput.value = "";
            payBtn.disabled = true;
        }
        else{
            payBtn.disabled = false;
        }

        const bitcoinPriceInMYR = 1 / 10;


        const taxRate = 6;
        const taxAmount = (bitcoinPriceInMYR * taxRate * bitcoinAmount) / 100;


        const discountRate = 10;
        const discountAmount = (bitcoinPriceInMYR * discountRate * bitcoinAmount) / 100;


        const totalAmountInMYR = bitcoinAmount * bitcoinPriceInMYR + taxAmount - discountAmount;


        document.getElementById('btc-amount').textContent = bitcoinAmount.toFixed(2) + ' BTC';
        document.getElementById('btc-price').textContent = (bitcoinAmount * bitcoinPriceInMYR).toFixed(2) + ' MYR';
        tax.textContent = taxAmount.toFixed(2) + ' MYR';
        discount.textContent = discountAmount.toFixed(2) + ' MYR';
        totalAmount.textContent = totalAmountInMYR.toFixed(2) + ' MYR';
    });





});



function goBack() {
    window.history.back();
}