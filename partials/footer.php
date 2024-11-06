<link rel="stylesheet" href="../STYLE/footer.css">

<footer>
        <div class="interface">

            <section class="top-footer">

                <a href="#"><button><i class="bi bi-instagram"></i></button></a>
                <a href="#"><button><i class="bi bi-facebook"></i></button></a>
                <a href="#"><button><i class="bi bi-twitter-x"></i></button></i></a>
                <a href="#"><button><i class="bi bi-github"></i></button></a>


            </section>

            <section class="middle-footer">
                <a href="#">Suporte</a>
                <a href="#">Informações</a>
                <a href="#">Marketing</a>
            </section>

            <section class="bottom-footer">
                <p>TravelsGo 2024 &copy; Todos os direitos reservados</p>
            </section>
        </div>
    </footer>
    <script src="../JS/geral.js"></script>
    <script>
    // Verifica se a mensagem existe
    window.onload = function() {
        var msg = document.querySelector(".alerta");
        if (msg) {
            setTimeout(function() {
                msg.style.transition = "opacity 1s";
                msg.style.opacity = 0;
                // Remove a mensagem do DOM após a animação
                setTimeout(function() {
                    msg.remove();
                }, 1000); // Tempo da animação (1 segundo)
            }, 5000); // Tempo de exibição (5 segundos)
        }
    };
</script>
</body>
</html>