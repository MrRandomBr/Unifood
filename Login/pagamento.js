document.addEventListener("DOMContentLoaded", function() {
    const resumoCarrinho = document.getElementById('resumo-carrinho');
    const formPagamento = document.getElementById('form-pagamento');
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const pixImageContainer = document.getElementById('pix-image-container');
    let total = 0;

    function displayCarrinho() {
        resumoCarrinho.innerHTML = '<h2>Resumo do Carrinho</h2>';
        carrinho.forEach(item => {
            const itemElement = document.createElement('div');
            itemElement.textContent = `${item.nome} - ${item.preco}`;
            resumoCarrinho.appendChild(itemElement);
            total += parseFloat(item.preco.replace('R$ ', '').replace(',', '.'));
        });

        const totalElement = document.createElement('p');
        totalElement.textContent = `Total: R$ ${total.toFixed(2).replace('.', ',')}`;
        resumoCarrinho.appendChild(totalElement);
    }

    formPagamento.addEventListener('submit', function(event) {
        event.preventDefault();
        processarPagamento();
    });


    displayCarrinho();
});