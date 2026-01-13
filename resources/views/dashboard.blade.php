<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cassette Rental</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background: #fafafa;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 48px;
            padding-bottom: 24px;
            border-bottom: 1px solid #e0e0e0;
        }

        .header-left h1 {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #666;
            font-size: 15px;
        }

        .header-right {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .user-info {
            font-size: 14px;
            color: #666;
            padding-right: 12px;
            border-right: 1px solid #e0e0e0;
        }

        button, .button {
            font-family: inherit;
            font-size: 14px;
            padding: 8px 16px;
            border: 1px solid #1a1a1a;
            background: white;
            color: #1a1a1a;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.15s ease;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        button:hover, .button:hover {
            background: #fafafa;
            border-color: #666;
        }

        button:active, .button:active {
            transform: scale(0.98);
        }

        button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        button.primary {
            background: #1a1a1a;
            color: white;
        }

        button.primary:hover:not(:disabled) {
            background: #333;
            border-color: #333;
        }

        button.secondary {
            background: white;
            color: #1a1a1a;
            border-color: #e0e0e0;
        }

        button.secondary:hover {
            background: #fafafa;
            border-color: #ccc;
        }

        select {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            background: white;
            color: #1a1a1a;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            border-color: #1a1a1a;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 16px;
            margin-bottom: 40px;
        }

        .stat {
            padding: 20px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .stat-label {
            color: #666;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #1a1a1a;
        }

        .card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }

        .list-item {
            padding: 16px 20px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.15s ease;
            gap: 12px;
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-item:hover {
            background: #fafafa;
        }

        .item-title {
            font-size: 15px;
        }

        .badge {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 4px;
            background: #f0f0f0;
            color: #666;
            font-weight: 500;
        }

        .badge.available {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .empty {
            padding: 60px 20px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .loading {
            padding: 40px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 20px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            font-size: 14px;
            animation: slideIn 0.2s ease;
            z-index: 1000;
            max-width: 300px;
        }

        .notification.success {
            border-left: 3px solid #2e7d32;
        }

        .notification.error {
            border-left: 3px solid #c62828;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 16px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .user-info {
                border-right: none;
                padding-right: 0;
            }

            h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .list-item {
                flex-direction: column;
                align-items: stretch;
            }

            .list-item select,
            .list-item button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <div class="header-left">
            <h1>Cassette Rental</h1>
            <p class="subtitle">Alugue o seu cassete</p>
        </div>
        <div class="header-right">
            <span class="user-info">{{ Auth::user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>

    <div class="stats">
        <div class="stat">
            <div class="stat-number" id="total-cassettes">—</div>
            <div class="stat-label">Total</div>
        </div>
        <div class="stat">
            <div class="stat-number" id="available-count">—</div>
            <div class="stat-label">Disponíveis</div>
        </div>
        <div class="stat">
            <div class="stat-number" id="rented-count">—</div>
            <div class="stat-label">Alugados</div>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Disponíveis Agora</h2>
        <div class="card" id="available-cassettes">
            <div class="loading">Processando...</div>
        </div>
    </div>

    <div class="grid">
        <div class="section">
            <h2 class="section-title">Alugar</h2>
            <div class="card">
                <div class="list-item">
                    <select id="cassette-select">
                        <option value="">Selecione um cassete...</option>
                    </select>
                    <button class="primary" onclick="rentSelectedCassette()">Alugar</button>
                </div>
            </div>
        </div>

        <div class="section">
            <h2 class="section-title">Devolver</h2>
            <div class="card" id="current-rentals">
                <div class="loading">Processando...</div>
            </div>
        </div>
    </div>
</div>

<script>
const apiBase = '/api';

async function loadData() {
    try {
        const cassettesRes = await fetch(`${apiBase}/cassettes`, { credentials: 'same-origin' });
        if (!cassettesRes.ok) throw new Error('Failed to fetch cassettes');
        const cassettes = await cassettesRes.json();

        const availableCassettes = cassettes.filter(c => c.available);
        
        document.getElementById('total-cassettes').textContent = cassettes.length;
        document.getElementById('available-count').textContent = availableCassettes.length;

        const availableList = document.getElementById('available-cassettes');
        const cassetteSelect = document.getElementById('cassette-select');
        
        availableList.innerHTML = '';
        cassetteSelect.innerHTML = '<option value="">Selecione um cassete...</option>';

        if (!availableCassettes.length) {
            availableList.innerHTML = '<div class="empty">Nenhum cassete disponível</div>';
            cassetteSelect.disabled = true;
        } else {
            cassetteSelect.disabled = false;
            
            availableCassettes.forEach(c => {
                const availableItem = document.createElement('div');
                availableItem.className = 'list-item';
                availableItem.innerHTML = `
                    <span class="item-title">${c.title}</span>
                    <span class="badge available">Disponível</span>
                `;
                availableList.appendChild(availableItem);

                const option = document.createElement('option');
                option.value = c.id;
                option.textContent = c.title;
                cassetteSelect.appendChild(option);
            });
        }

        const rentalsRes = await fetch(`${apiBase}/rentals`, { credentials: 'same-origin' });
        if (!rentalsRes.ok) throw new Error('Failed to fetch rentals');
        const rentals = await rentalsRes.json();
        const activeRentals = rentals.filter(r => !r.returned_at);

        document.getElementById('rented-count').textContent = activeRentals.length;

        const rentalsList = document.getElementById('current-rentals');
        rentalsList.innerHTML = '';

        if (!activeRentals.length) {
            rentalsList.innerHTML = '<div class="empty">Nenhum aluguel ativo</div>';
        } else {
            activeRentals.forEach(r => {
                const item = document.createElement('div');
                item.className = 'list-item';
                item.innerHTML = `
                    <span class="item-title">${r.cassette.title}</span>
                    <button class="secondary" onclick="returnCassette(${r.id})">Devolver</button>
                `;
                rentalsList.appendChild(item);
            });
        }
    } catch (err) {
        console.error(err);
        showNotification('Erro ao carregar dados', 'error');
    }
}

async function rentSelectedCassette() {
    const select = document.getElementById('cassette-select');
    const cassetteId = select.value;
    
    if (!cassetteId) {
        showNotification('Por favor, selecione um cassete', 'error');
        return;
    }
    
    await rentCassette(cassetteId);
}

async function rentCassette(cassetteId) {
    try {
        const res = await fetch(`${apiBase}/rentals`, {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'same-origin',
            body: JSON.stringify({ cassette_id: cassetteId })
        });

        if (!res.ok) {
            const data = await res.json();
            showNotification(data.message || 'Erro ao alugar', 'error');
            return;
        }

        showNotification('Alugado com sucesso', 'success');
        loadData();
    } catch (err) {
        console.error(err);
        showNotification('Erro ao alugar', 'error');
    }
}

async function returnCassette(rentalId) {
    try {
        const res = await fetch(`${apiBase}/rentals/${rentalId}/return`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            credentials: 'same-origin'
        });

        if (!res.ok) {
            const data = await res.json();
            showNotification(data.message || 'Erro ao devolver', 'error');
            return;
        }

        showNotification('Devolvido com sucesso', 'success');
        loadData();
    } catch (err) {
        console.error(err);
        showNotification('Erro ao devolver', 'error');
    }
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideIn 0.2s ease reverse';
        setTimeout(() => notification.remove(), 200);
    }, 2500);
}

loadData();
</script>

</body>
</html>