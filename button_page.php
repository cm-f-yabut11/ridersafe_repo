<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!-- BUTTON SECTION -->
<section class="section button-section">
    <div class="container button-container">

        <div class="card button-card">

            <div class="pulse-ring"></div>

            <button id="safeButton" class="big-safe-btn">
                <span>SAFE</span>
            </button>

            <p class="button-subtext">
                Tap to confirm your safety
            </p>

        </div>

    </div>
</section>

<audio id="clickSound">
    <source src="click.mp3" type="audio/mpeg">
</audio>

<script>
const btn = document.getElementById("safeButton");
const sound = document.getElementById("clickSound");

btn.addEventListener("click", function() {
    sound.currentTime = 0;
    sound.play();

    btn.classList.add("pressed");

    setTimeout(() => {
        btn.classList.remove("pressed");
    }, 200);
});
</script>
 <div class="container safety-container">
    </div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
