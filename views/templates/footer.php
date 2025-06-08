<body>
    <main>
    </main>

    <footer>
        <div class="footer-left">
            Loja Online &copy; 2025
        </div>
        <div class="footer-right">
            <ul>
                <li><strong>Admin:</strong> carlos@gmail.com | Senha: 1234</li>
                <li><strong>Cliente:</strong> eminhojr@gmail.com | Senha: 1234</li>
            </ul>
        </div>
    </footer>
</body>

<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    body {
        font-family: Arial, sans-serif;
    }

    main {
        flex: 1;
        padding: 20px;
    }

    footer {
        background-color: #1a1a1a;
        color: #aaa;
        font-size: 14px;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .footer-left {
        flex: 1;
    }

    .footer-right ul {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: right;
    }

    .footer-right li {
        line-height: 1.5;
    }

    @media (max-width: 600px) {
        footer {
            flex-direction: column;
            text-align: center;
        }

        .footer-right ul {
            text-align: center;
        }
    }
</style>
