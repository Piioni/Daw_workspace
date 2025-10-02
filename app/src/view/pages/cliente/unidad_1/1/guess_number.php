<?php
$title = 'Number Guessing Game';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<h1> Adivina mi numero!!!</h1>
<p> El objetivo del juego es adivinar un numero al azar del 1 - 50, en el menor numero de intentos posibles.</p>
<p> El juego comienza cuando se pulsa el boton "Empezar Juego".</p>
<p> El juego termina cuando se acierta el numero.</p>
<p> El juego se puede reiniciar en cualquier momento pulsando el boton "Reiniciar" </p>


<button id="startGameBtn">Empezar Juego</button>
<button id="resetGameBtn" disabled>Reiniciar</button>

<div id="gameArea" style="display:none;">
    <label for="userGuess"> Introduce un numero entre 1 y 50:</label>
    <input type="number" id="userGuess" min="1" max="50">
    <button id="submitGuessBtn">Enviar</button>
    <p id="feedback"></p>
    <p id="attempts"></p>
</div>

<script>
    let randomNumber
    let attempts
    const startGameBtn = document.querySelector('#startGameBtn')
    const resetGameBtn = document.querySelector('#resetGameBtn')

    const userGuess = document.querySelector('#userGuess')
    const submitGuessBtn = document.querySelector('#submitGuessBtn')
    const feedback = document.querySelector('#feedback')
    const attemptsDisplay = document.querySelector('#attempts')

    startGameBtn.addEventListener('click', startGame)
    resetGameBtn.addEventListener('click', resetGame)
    submitGuessBtn.addEventListener('click', submitGuess)

    function startGame() {
        randomNumber = Math.floor(Math.random() * 50) + 1
        attempts = 0
        feedback.textContent = 'Good Luck!'
        attemptsDisplay.textContent = ''
        userGuess.value = ''
        document.querySelector('#gameArea').style.display = 'block'
        startGameBtn.disabled = true
        resetGameBtn.disabled = false
    }

    function resetGame() {
        randomNumber = null
        attempts = 0
        feedback.textContent = 'Too bad!, good luck next time'
        attemptsDisplay.textContent = ''
        userGuess.value = ''
        startGameBtn.disabled = false
        resetGameBtn.disabled = true
    }

    function submitGuess() {
        const guess = Number(userGuess.value)
        if (!guess || guess < 1 || guess > 50) {
            feedback.textContent = 'Please enter a valid number between 1 and 50.'
            return
        }

        attempts++
        if (guess === randomNumber) {
            if (attempts === 1) {
                feedback.textContent = `Increible, lo has acertado a la primera!!! lmao`
            }
            feedback.textContent = 'Has acertado!!!'
            attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
            startGameBtn.disabled = false
            resetGameBtn.disabled = true
        } else if (guess < randomNumber) {
            feedback.textContent = 'El numero es mayor'
            attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
        } else {
            feedback.textContent = 'El numero es menor'
            attemptsDisplay.textContent = `Numero de intentos: ${attempts}`
        }
    }
</script>