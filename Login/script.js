document.addEventListener("DOMContentLoaded", function() {
    fetch('cardapio.php')
        .then(response => response.json())
        .then(data => {
            const cardapio = document.getElementById('cardapio');
            const carrinho = document.getElementById('carrinho');
            const totalElement = document.getElementById('total');
            const avancarButton = document.getElementById('avancar');
            let total = 0;
            let carrinhoItens = JSON.parse(localStorage.getItem('carrinho')) || [];

            function updateLocalStorage() {
                localStorage.setItem('carrinho', JSON.stringify(carrinhoItens));
            }

            data.forEach(item => {
                const card = document.createElement('div');
                card.className = 'card';

                const img = document.createElement('img');
                img.src = item.imagem;
                img.alt = item.nome;
                card.appendChild(img);

                const nome = document.createElement('h2');
                nome.textContent = item.nome;
                card.appendChild(nome);

                const preco = document.createElement('p');
                preco.textContent = item.preco;
                card.appendChild(preco);

                const button = document.createElement('button');
                button.textContent = 'Adicionar';
                button.addEventListener('click', () => {
                    addItemToCart(item);
                });
                card.appendChild(button);

                cardapio.appendChild(card);
            });

            function addItemToCart(item) {
                const itemElement = document.createElement('div');
                const itemName = document.createElement('span');
                itemName.textContent = `${item.nome} - ${item.preco}`;
                const itemQuantity = document.createElement('span');
                itemQuantity.textContent = `1`;
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remover';
                removeButton.addEventListener('click', () => {
                    carrinho.removeChild(itemElement);
                    total -= parseFloat(item.preco.replace('R$ ', '').replace(',', '.'));
                    carrinhoItens = carrinhoItens.filter(cartItem => cartItem.id !== item.id);
                    updateTotal();
                    updateLocalStorage();
                });

                itemElement.appendChild(itemName);
                itemElement.appendChild(itemQuantity);
                itemElement.appendChild(removeButton);
                carrinho.appendChild(itemElement);

                total += parseFloat(item.preco.replace('R$ ', '').replace(',', '.'));
                carrinhoItens.push(item);
                updateTotal();
                updateLocalStorage();
            }

            function updateTotal() {
                totalElement.textContent = `R$ ${total.toFixed(2).replace('.', ',')}`;
            }

            avancarButton.addEventListener('click', () => {
                window.location.href = 'pagamento.html';
            });

            carrinhoItens.forEach(item => {
                const itemElement = document.createElement('div');
                const itemName = document.createElement('span');
                itemName.textContent = `${item.nome} - ${item.preco}`;
                const itemQuantity = document.createElement('span');
                itemQuantity.textContent = `1`;
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remover';
                removeButton.addEventListener('click', () => {
                    carrinho.removeChild(itemElement);
                    total -= parseFloat(item.preco.replace('R$ ', '').replace(',', '.'));
                    carrinhoItens = carrinhoItens.filter(cartItem => cartItem.id !== item.id);
                    updateTotal();
                    updateLocalStorage();
                });

                itemElement.appendChild(itemName);
                itemElement.appendChild(itemQuantity);
                itemElement.appendChild(removeButton);
                carrinho.appendChild(itemElement);

                total += parseFloat(item.preco.replace('R$ ', '').replace(',', '.'));
                updateTotal();
            });
        })
        .catch(error => console.error('Erro ao carregar o cardápio:', error));
});
